<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectType;
use App\Models\AdminSetting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $contactInfo = AdminSetting::getContactInfo();
        
        return view('home', compact('contactInfo'));
    }

    public function services(Request $request)
    {
        $projectTypes = ProjectType::active()
            ->withCount('activeProjects')
            ->having('active_projects_count', '>', 0)
            ->get();

        $query = Project::active()->with(['projectType', 'mainImage']);

        // Filter by project type if provided
        if ($request->has('type') && $request->type !== 'all') {
            $projectType = ProjectType::where('slug', $request->type)->first();
            if ($projectType) {
                $query->where('project_type_id', $projectType->id);
            }
        }

        $projects = $query->latest()->paginate(12);
        $selectedType = $request->type ?? 'all';
        $contactInfo = AdminSetting::getContactInfo();

        return view('services', compact('projects', 'projectTypes', 'selectedType', 'contactInfo'));
    }

    public function projectDetail($slug)
    {
        $project = Project::active()
            ->with(['projectType', 'images' => function($query) {
                $query->ordered();
            }])
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedProjects = Project::active()
            ->where('project_type_id', $project->project_type_id)
            ->where('id', '!=', $project->id)
            ->with('mainImage')
            ->limit(3)
            ->get();

        $contactInfo = AdminSetting::getContactInfo();

        return view('project-detail', compact('project', 'relatedProjects', 'contactInfo'));
    }
}