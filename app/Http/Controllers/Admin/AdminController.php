<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectType;
use App\Models\AdminSetting;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_projects' => Project::count(),
            'active_projects' => Project::active()->count(),
            'project_types' => ProjectType::count(),
            'recent_projects' => Project::with('projectType')->latest()->limit(5)->get()
        ];

        return view('admin.dashboard', compact('stats'));
    }

    public function settings()
    {
        $settings = AdminSetting::getMultiple([
            'admin_name',
            'admin_email',
            'admin_telegram',
            'company_name',
            'company_address',
            'projects_delivered',
            'client_satisfaction'
        ]);
        
        return view('admin.settings', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        $request->validate([
            'admin_name' => 'required|string|max:255',
            'admin_email' => 'required|email|max:255',
            'admin_telegram' => 'nullable|string|max:100',
            'company_name' => 'nullable|string|max:255',
            'company_address' => 'nullable|string|max:500',
            'projects_delivered' => 'required|integer|min:0',
            'client_satisfaction' => 'required|integer|min:0|max:100'
        ]);

        foreach ($request->only([
            'admin_name', 
            'admin_email', 
            'admin_telegram', 
            'company_name', 
            'company_address',
            'projects_delivered',
            'client_satisfaction'
        ]) as $key => $value) {
            AdminSetting::set($key, $value);
        }

        return redirect()->route('admin.settings')->with('success', 'Settings updated successfully!');
    }
}