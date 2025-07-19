<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectType;
use Illuminate\Http\Request;

class ProjectTypeController extends Controller
{
    public function index()
    {
        $projectTypes = ProjectType::withCount('projects')->latest()->paginate(10);
        
        return view('admin.project-types.index', compact('projectTypes'));
    }

    public function create()
    {
        return view('admin.project-types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:project_types',
            'description' => 'nullable|string|max:1000',
            'is_active' => 'boolean'
        ]);

        ProjectType::create([
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('admin.project-types.index')->with('success', 'Project type created successfully!');
    }

    public function show(ProjectType $projectType)
    {
        // Not needed for admin, redirect to edit
        return redirect()->route('admin.project-types.edit', $projectType);
    }

    public function edit(ProjectType $projectType)
    {
        return view('admin.project-types.edit', compact('projectType'));
    }

    public function update(Request $request, ProjectType $projectType)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:project_types,name,' . $projectType->id,
            'description' => 'nullable|string|max:1000',
            'is_active' => 'boolean'
        ]);

        $projectType->update([
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('admin.project-types.index')->with('success', 'Project type updated successfully!');
    }

    public function destroy(ProjectType $projectType)
    {
        if ($projectType->projects()->count() > 0) {
            return redirect()->route('admin.project-types.index')
                ->with('error', 'Cannot delete project type with existing projects!');
        }

        $projectType->delete();

        return redirect()->route('admin.project-types.index')->with('success', 'Project type deleted successfully!');
    }
}