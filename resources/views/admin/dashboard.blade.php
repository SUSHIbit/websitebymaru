@extends('layouts.admin')

@section('content')
<div class="space-y-8">
    <!-- Header -->
    <div>
        <h2 class="text-2xl font-bold tracking-tight">Dashboard Overview</h2>
        <p class="text-muted-foreground">Welcome back! Here's what's happening with your projects.</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
        <!-- Total Projects -->
        <div class="stats-card">
            <div class="card-header flex flex-row items-center justify-between space-y-0 pb-2">
                <h3 class="text-sm font-medium">Total Projects</h3>
                <div class="stats-icon bg-slate-100">
                    <svg class="h-4 w-4 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
            </div>
            <div class="card-content">
                <div class="text-2xl font-bold">{{ $stats['total_projects'] }}</div>
                <p class="text-xs text-muted-foreground">All time projects</p>
            </div>
        </div>

        <!-- Active Projects -->
        <div class="stats-card">
            <div class="card-header flex flex-row items-center justify-between space-y-0 pb-2">
                <h3 class="text-sm font-medium">Active Projects</h3>
                <div class="stats-icon bg-green-100">
                    <svg class="h-4 w-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
            <div class="card-content">
                <div class="text-2xl font-bold">{{ $stats['active_projects'] }}</div>
                <p class="text-xs text-muted-foreground">Currently visible</p>
            </div>
        </div>

        <!-- Categories -->
        <div class="stats-card">
            <div class="card-header flex flex-row items-center justify-between space-y-0 pb-2">
                <h3 class="text-sm font-medium">Categories</h3>
                <div class="stats-icon bg-blue-100">
                    <svg class="h-4 w-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                </div>
            </div>
            <div class="card-content">
                <div class="text-2xl font-bold">{{ $stats['project_types'] }}</div>
                <p class="text-xs text-muted-foreground">Project types</p>
            </div>
        </div>

        <!-- Quick Action -->
        <div class="stats-card bg-slate-900 text-slate-50 border-slate-900">
            <div class="card-header flex flex-row items-center justify-between space-y-0 pb-2">
                <h3 class="text-sm font-medium text-slate-100">Quick Action</h3>
                <div class="stats-icon bg-slate-800">
                    <svg class="h-4 w-4 text-slate-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                </div>
            </div>
            <div class="card-content">
                <a href="{{ route('admin.projects.create') }}" 
                   class="text-lg font-semibold text-slate-50 hover:text-slate-200 transition-colors">
                    Add New Project
                </a>
                <p class="text-xs text-slate-300">Create something amazing</p>
            </div>
        </div>
    </div>

    <!-- Recent Projects -->
    <div class="card">
        <div class="card-header">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="card-title">Recent Projects</h3>
                    <p class="card-description">Your latest project activity</p>
                </div>
                <a href="{{ route('admin.projects.index') }}" 
                   class="text-sm font-medium text-slate-900 hover:underline">
                    View all
                </a>
            </div>
        </div>
        
        <div class="card-content">
            @if($stats['recent_projects']->count() > 0)
            <div class="overflow-x-auto">
                <table class="table">
                    <thead class="table-header">
                        <tr class="table-row">
                            <th class="table-head">Project</th>
                            <th class="table-head">Category</th>
                            <th class="table-head">Price</th>
                            <th class="table-head">Status</th>
                            <th class="table-head">Created</th>
                            <th class="table-head"></th>
                        </tr>
                    </thead>
                    <tbody class="table-body">
                        @foreach($stats['recent_projects'] as $project)
                        <tr class="table-row">
                            <td class="table-cell">
                                <div class="flex items-center gap-3">
                                    <div class="avatar">
                                        @if($project->main_image_url)
                                        <img class="avatar-image object-cover rounded-md" 
                                             src="{{ $project->main_image_url }}" 
                                             alt="{{ $project->title }}">
                                        @else
                                        <div class="avatar-fallback">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"/>
                                            </svg>
                                        </div>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="font-medium">{{ $project->title }}</div>
                                        <div class="text-sm text-muted-foreground line-clamp-1">
                                            {{ Str::limit($project->short_description, 60) }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="table-cell">
                                <span class="badge badge-secondary">
                                    {{ $project->projectType->name }}
                                </span>
                            </td>
                            <td class="table-cell font-medium">
                                {{ $project->formatted_price }}
                            </td>
                            <td class="table-cell">
                                @if($project->is_active)
                                <span class="badge badge-success">
                                    <div class="w-1 h-1 bg-green-600 rounded-full mr-1"></div>
                                    Active
                                </span>
                                @else
                                <span class="badge bg-red-100 text-red-800">
                                    <div class="w-1 h-1 bg-red-600 rounded-full mr-1"></div>
                                    Inactive
                                </span>
                                @endif
                            </td>
                            <td class="table-cell text-muted-foreground">
                                {{ $project->created_at->format('M j, Y') }}
                            </td>
                            <td class="table-cell">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('project.detail', $project->slug) }}" 
                                       target="_blank"
                                       class="action-button"
                                       title="View on site">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </a>
                                    <a href="{{ route('admin.projects.edit', $project) }}" 
                                       class="action-button"
                                       title="Edit">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="empty-state">
                <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-lg bg-slate-100">
                    <svg class="h-6 w-6 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <h3 class="mt-4 text-lg font-semibold">No projects yet</h3>
                <p class="mt-2 text-sm text-muted-foreground">Get started by creating your first project.</p>
                <a href="{{ route('admin.projects.create') }}" 
                   class="btn-default mt-4">
                    <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Add New Project
                </a>
            </div>
            @endif
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid gap-4 md:grid-cols-3">
        <!-- Add Project -->
        <div class="card hover:shadow-md transition-shadow">
            <div class="card-header">
                <div class="flex items-center gap-4">
                    <div class="stats-icon bg-blue-100">
                        <svg class="h-4 w-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold">Add New Project</h3>
                        <p class="text-sm text-muted-foreground">Create a new project for sale</p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.projects.create') }}" class="btn-default w-full">
                    Create Project
                </a>
            </div>
        </div>

        <!-- Manage Categories -->
        <div class="card hover:shadow-md transition-shadow">
            <div class="card-header">
                <div class="flex items-center gap-4">
                    <div class="stats-icon bg-green-100">
                        <svg class="h-4 w-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold">Manage Categories</h3>
                        <p class="text-sm text-muted-foreground">Organize your project types</p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.project-types.index') }}" class="btn-outline w-full">
                    Manage Categories
                </a>
            </div>
        </div>

        <!-- Settings -->
        <div class="card hover:shadow-md transition-shadow">
            <div class="card-header">
                <div class="flex items-center gap-4">
                    <div class="stats-icon bg-purple-100">
                        <svg class="h-4 w-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold">Site Settings</h3>
                        <p class="text-sm text-muted-foreground">Configure contact info and more</p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.settings') }}" class="btn-secondary w-full">
                    Update Settings
                </a>
            </div>
        </div>
    </div>
</div>
@endsection