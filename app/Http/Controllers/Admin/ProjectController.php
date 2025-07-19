<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectType;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('projectType')->latest()->paginate(10);
        
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $projectTypes = ProjectType::active()->get();
        
        return view('admin.projects.create', compact('projectTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'long_description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'what_you_get' => 'nullable|array',
            'what_you_get.*' => 'string|max:255',
            'key_features' => 'nullable|array',
            'key_features.*' => 'string|max:255',
            'project_type_id' => 'required|exists:project_types,id',
            'is_active' => 'boolean',
            'telegram_username' => 'nullable|string|max:100',
            'website_link' => 'nullable|url|max:255',
            'images' => 'nullable|array|max:20',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'image_descriptions' => 'nullable|array',
            'image_descriptions.*' => 'nullable|string|max:500'
        ]);

        $project = Project::create([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'price' => $request->price,
            'what_you_get' => array_filter($request->what_you_get ?? []),
            'key_features' => array_filter($request->key_features ?? []),
            'project_type_id' => $request->project_type_id,
            'is_active' => $request->has('is_active'),
            'telegram_username' => $request->telegram_username,
            'website_link' => $request->website_link
        ]);

        // Handle image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('projects/' . $project->id, 'public');
                
                ProjectImage::create([
                    'project_id' => $project->id,
                    'image_path' => $path,
                    'description' => $request->image_descriptions[$index] ?? null,
                    'sort_order' => $index + 1
                ]);
            }
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully!');
    }

    public function show(Project $project)
    {
        // Not needed for admin, but keeping for completeness
        return redirect()->route('admin.projects.edit', $project);
    }

    public function edit(Project $project)
    {
        $project->load('images');
        $projectTypes = ProjectType::active()->get();
        
        return view('admin.projects.edit', compact('project', 'projectTypes'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'long_description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'what_you_get' => 'nullable|array',
            'what_you_get.*' => 'string|max:255',
            'key_features' => 'nullable|array',
            'key_features.*' => 'string|max:255',
            'project_type_id' => 'required|exists:project_types,id',
            'is_active' => 'boolean',
            'telegram_username' => 'nullable|string|max:100',
            'website_link' => 'nullable|url|max:255',
            'new_images' => 'nullable|array|max:20',
            'new_images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'new_image_descriptions' => 'nullable|array',
            'new_image_descriptions.*' => 'nullable|string|max:500'
        ]);

        $project->update([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'price' => $request->price,
            'what_you_get' => array_filter($request->what_you_get ?? []),
            'key_features' => array_filter($request->key_features ?? []),
            'project_type_id' => $request->project_type_id,
            'is_active' => $request->has('is_active'),
            'telegram_username' => $request->telegram_username,
            'website_link' => $request->website_link
        ]);

        // Handle new image uploads
        if ($request->hasFile('new_images')) {
            $maxOrder = $project->images()->max('sort_order') ?? 0;
            
            foreach ($request->file('new_images') as $index => $image) {
                $path = $image->store('projects/' . $project->id, 'public');
                
                ProjectImage::create([
                    'project_id' => $project->id,
                    'image_path' => $path,
                    'description' => $request->new_image_descriptions[$index] ?? null,
                    'sort_order' => $maxOrder + $index + 1
                ]);
            }
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully!');
    }

    public function destroy(Project $project)
    {
        // Delete associated images from storage
        foreach ($project->images as $image) {
            if (Storage::disk('public')->exists($image->image_path)) {
                Storage::disk('public')->delete($image->image_path);
            }
        }
        
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully!');
    }

    public function deleteImage(ProjectImage $image)
    {
        // Delete image file from storage
        if (Storage::disk('public')->exists($image->image_path)) {
            Storage::disk('public')->delete($image->image_path);
        }
        
        $image->delete();

        return response()->json(['success' => true]);
    }
}