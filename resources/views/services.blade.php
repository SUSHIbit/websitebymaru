@extends('layouts.app')

@section('content')
<!-- Page Header -->
<section class="bg-slate-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Website Projects for Students</h1>
            <p class="text-xl text-slate-300 max-w-2xl mx-auto">
                Discover our collection of affordable website projects with complete source code, perfect for learning and assignments.
            </p>
        </div>
    </div>
</section>

<!-- Filter Section -->
<section class="py-8 bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-slate-50 p-6 rounded-xl">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-4">
                <h3 class="text-lg font-semibold text-slate-900">Filter by Category</h3>
                <div class="text-sm text-slate-600">
                    {{ $projects->total() }} {{ Str::plural('project', $projects->total()) }} found
                </div>
            </div>
            
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('services') }}" 
                   class="filter-btn {{ $selectedType === 'all' ? 'active' : '' }}">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                    All Projects
                    <span class="ml-2 bg-slate-200 text-slate-700 px-2 py-0.5 rounded-full text-xs">{{ $projects->total() }}</span>
                </a>
                
                @foreach($projectTypes as $type)
                <a href="{{ route('services') }}?type={{ $type->slug }}" 
                   class="filter-btn {{ $selectedType === $type->slug ? 'active' : '' }}">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                    {{ $type->name }}
                    <span class="ml-2 bg-slate-200 text-slate-700 px-2 py-0.5 rounded-full text-xs">{{ $type->active_projects_count }}</span>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Projects Grid -->
<section class="py-12 bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($projects->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($projects as $project)
                <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group">
                    <!-- Project Image -->
                    <div class="relative h-48 bg-slate-200 overflow-hidden">
                        @if($project->main_image_url)
                            <img src="{{ $project->main_image_url }}" 
                                 alt="{{ $project->title }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-slate-300 to-slate-400 flex items-center justify-center">
                                <svg class="w-16 h-16 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            </div>
                        @endif
                        
                        <!-- Project Type Badge -->
                        <div class="absolute top-4 left-4">
                            <span class="bg-white/90 backdrop-blur-sm text-slate-700 px-3 py-1 rounded-full text-sm font-medium">
                                {{ $project->projectType->name }}
                            </span>
                        </div>
                        
                        <!-- Price Badge -->
                        <div class="absolute top-4 right-4">
                            <span class="bg-slate-900/90 backdrop-blur-sm text-white px-3 py-1 rounded-full text-sm font-bold">
                                {{ $project->formatted_price }}
                            </span>
                        </div>
                    </div>
                    
                    <!-- Project Info -->
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-slate-900 mb-2 group-hover:text-slate-700 transition-colors">
                            {{ $project->title }}
                        </h3>
                        
                        <p class="text-slate-600 mb-4 line-clamp-3">
                            {{ $project->short_description }}
                        </p>
                        
                        <!-- Key Features Preview -->
                        @if($project->key_features && count($project->key_features) > 0)
                        <div class="mb-4">
                            <div class="flex flex-wrap gap-2">
                                @foreach(array_slice($project->key_features, 0, 3) as $feature)
                                <span class="bg-slate-100 text-slate-600 px-2 py-1 rounded text-xs">
                                    {{ $feature }}
                                </span>
                                @endforeach
                                @if(count($project->key_features) > 3)
                                <span class="bg-slate-100 text-slate-600 px-2 py-1 rounded text-xs">
                                    +{{ count($project->key_features) - 3 }} more
                                </span>
                                @endif
                            </div>
                        @endif
                        
                        <!-- Action Buttons -->
                        <div class="flex items-center justify-between">
                            <a href="{{ route('project.detail', $project->slug) }}" 
                               class="bg-slate-900 text-white px-6 py-2 rounded-lg font-medium hover:bg-slate-800 transition-colors">
                                View Details
                            </a>
                            
                            <a href="{{ $project->telegram_buy_link }}" 
                               target="_blank"
                               class="text-blue-600 hover:text-blue-700 font-medium transition-colors flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/>
                                </svg>
                                Buy Now
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            @if($projects->hasPages())
            <div class="mt-12 flex justify-center">
                {{ $projects->appends(request()->query())->links() }}
            </div>
            @endif
            
        @else
            <!-- Empty State -->
            <div class="text-center py-16">
                <div class="max-w-md mx-auto">
                    <svg class="w-16 h-16 text-slate-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6-4h6m2 5.291A7.962 7.962 0 0112 15c-2.34 0-4.29-1.01-5.824-2.471M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <h3 class="text-xl font-semibold text-slate-900 mb-2">No projects found</h3>
                    <p class="text-slate-600 mb-6">
                        @if($selectedType !== 'all')
                            No projects are available in this category yet. Try browsing other categories.
                        @else
                            We're currently preparing amazing projects for you. Check back soon!
                        @endif
                    </p>
                    @if($selectedType !== 'all')
                    <a href="{{ route('services') }}" 
                       class="bg-slate-900 text-white px-6 py-3 rounded-lg font-medium hover:bg-slate-800 transition-colors">
                        View All Projects
                    </a>
                    @endif
                </div>
            </div>
        @endif
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">
            Need a Custom Project?
        </h2>
        <p class="text-xl text-slate-600 mb-8">
            Don't see exactly what you need for your assignment or project? Contact us for custom development solutions tailored to your requirements.
        </p>
        @if(isset($contactInfo) && $contactInfo['admin_telegram'])
        <a href="https://t.me/{{ $contactInfo['admin_telegram'] }}?text=Hello, I'm interested in a custom project" 
           target="_blank"
           class="bg-blue-600 text-white px-8 py-4 rounded-lg font-semibold hover:bg-blue-700 transition-colors inline-flex items-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                <path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/>
            </svg>
            Request Custom Project
        </a>
        @endif
    </div>
</section>
@endsection

@push('head')
<style>
.filter-btn {
    @apply inline-flex items-center px-4 py-3 rounded-lg font-medium transition-all duration-200 border-2 shadow-sm;
}

.filter-btn:not(.active) {
    @apply bg-white text-slate-600 border-slate-200 hover:border-slate-300 hover:bg-slate-50 hover:shadow-md;
}

.filter-btn.active {
    @apply bg-slate-900 text-white border-slate-900 shadow-lg;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Custom pagination styles */
.pagination {
    @apply flex items-center space-x-2;
}

.pagination .page-item {
    @apply block;
}

.pagination .page-link {
    @apply px-3 py-2 text-slate-600 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 hover:text-slate-700 transition-colors;
}

.pagination .page-item.active .page-link {
    @apply bg-slate-900 text-white border-slate-900;
}

.pagination .page-item.disabled .page-link {
    @apply text-slate-400 cursor-not-allowed hover:bg-white hover:text-slate-400;
}
</style>
@endpush