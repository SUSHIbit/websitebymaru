@extends('layouts.app')

@section('content')
<!-- Project Header -->
<section class="bg-slate-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center space-x-2 text-slate-300 mb-4">
            <a href="{{ route('services') }}" class="hover:text-white transition-colors">Projects</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <a href="{{ route('services') }}?type={{ $project->projectType->slug }}" class="hover:text-white transition-colors">
                {{ $project->projectType->name }}
            </a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-white">{{ $project->title }}</span>
        </div>
        
        <h1 class="text-4xl md:text-5xl font-bold mb-6">{{ $project->title }}</h1>
        
        <div class="flex flex-wrap items-center gap-4">
            <span class="bg-white/10 backdrop-blur-sm text-white px-4 py-2 rounded-full">
                {{ $project->projectType->name }}
            </span>
            <span class="bg-green-600 text-white px-4 py-2 rounded-full font-bold">
                {{ $project->formatted_price }}
            </span>
        </div>
    </div>
</section>

<!-- Project Content -->
<section class="py-12 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Project Description -->
        <div class="prose prose-lg prose-slate max-w-none mb-12">
            <div class="bg-slate-50 p-8 rounded-xl">
                <h2 class="text-2xl font-bold text-slate-900 mb-4">Project Description</h2>
                <div class="text-slate-700 leading-relaxed whitespace-pre-line">{{ $project->long_description }}</div>
            </div>
        </div>

        <!-- Website Link -->
        @if($project->website_link)
        <div class="bg-blue-50 border border-blue-200 p-8 rounded-xl mb-12">
            <h2 class="text-2xl font-bold text-slate-900 mb-4 flex items-center">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
                Live Demo
            </h2>
            <p class="text-slate-700 mb-4">Check out the live demo of this project to see how it works:</p>
            <a href="{{ $project->website_link }}" 
               target="_blank" 
               class="inline-flex items-center bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
                View Live Demo
            </a>
        </div>
        @endif

        <!-- Price (Highlighted) -->
        <div class="bg-gradient-to-r from-slate-900 to-slate-800 text-white p-8 rounded-xl mb-12 text-center">
            <h2 class="text-2xl font-bold mb-2">Project Price</h2>
            <div class="text-5xl font-bold mb-4">{{ $project->formatted_price }}</div>
            <p class="text-slate-300">One-time purchase with complete source code and support</p>
        </div>

        <!-- What You Will Get -->
        @if($project->what_you_get && count($project->what_you_get) > 0)
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-6">What You Will Get</h2>
            <div class="bg-green-50 border border-green-200 rounded-xl p-8">
                <ul class="space-y-4">
                    @foreach($project->what_you_get as $item)
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-slate-700 text-lg">{{ $item }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

        <!-- Key Features -->
        @if($project->key_features && count($project->key_features) > 0)
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-6">Key Features</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($project->key_features as $feature)
                <div class="bg-slate-50 p-4 rounded-lg flex items-center">
                    <svg class="w-5 h-5 text-slate-600 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span class="text-slate-700">{{ $feature }}</span>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Images Section -->
        @if($project->images && $project->images->count() > 0)
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-8">Project Gallery</h2>
            <div class="space-y-12">
                @foreach($project->images as $image)
                <div class="bg-slate-50 rounded-xl overflow-hidden">
                    <div class="aspect-video bg-slate-200">
                        <img src="{{ $image->image_url }}" 
                             alt="{{ $image->description ?: $project->title }}"
                             class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                    
                    @if($image->description)
                    <div class="p-6">
                        <p class="text-slate-700 text-lg leading-relaxed">{{ $image->description }}</p>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Buy Project Button -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-700 p-8 rounded-xl text-center text-white mb-12">
            <h2 class="text-2xl font-bold mb-4">Ready to Purchase?</h2>
            <p class="text-blue-100 mb-6 text-lg">
                Get instant access to the complete project with source code, documentation, and friendly support.
            </p>
            <a href="{{ $project->telegram_buy_link }}" 
               target="_blank"
               class="bg-white text-blue-600 px-8 py-4 rounded-lg font-bold text-lg hover:bg-blue-50 transition-all duration-200 transform hover:scale-105 inline-flex items-center shadow-lg">
                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/>
                </svg>
                Buy Project - {{ $project->formatted_price }}
            </a>
        </div>
    </div>
</section>

<!-- Related Projects -->
@if($relatedProjects && $relatedProjects->count() > 0)
<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Related Projects</h2>
            <p class="text-xl text-slate-600">
                Explore more projects in the {{ $project->projectType->name }} category
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($relatedProjects as $relatedProject)
            <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group">
                <div class="relative h-48 bg-slate-200 overflow-hidden">
                    @if($relatedProject->main_image_url)
                        <img src="{{ $relatedProject->main_image_url }}" 
                             alt="{{ $relatedProject->title }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-slate-300 to-slate-400 flex items-center justify-center">
                            <svg class="w-16 h-16 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                    @endif
                    
                    <div class="absolute top-4 right-4">
                        <span class="bg-slate-900/90 backdrop-blur-sm text-white px-3 py-1 rounded-full text-sm font-bold">
                            {{ $relatedProject->formatted_price }}
                        </span>
                    </div>
                </div>
                
                <div class="p-6">
                    <h3 class="text-xl font-bold text-slate-900 mb-2 group-hover:text-slate-700 transition-colors">
                        {{ $relatedProject->title }}
                    </h3>
                    
                    <p class="text-slate-600 mb-4 line-clamp-2">
                        {{ $relatedProject->short_description }}
                    </p>
                    
                    <a href="{{ route('project.detail', $relatedProject->slug) }}" 
                       class="bg-slate-900 text-white px-6 py-2 rounded-lg font-medium hover:bg-slate-800 transition-colors inline-block">
                        View Details
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('services') }}?type={{ $project->projectType->slug }}" 
               class="bg-slate-900 text-white px-8 py-3 rounded-lg font-semibold hover:bg-slate-800 transition-colors">
                View All {{ $project->projectType->name }}
            </a>
        </div>
    </div>
</section>
@endif

<!-- Contact Section -->
<section class="py-16 bg-slate-900 text-white">
    <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold mb-4">Have Questions?</h2>
        <p class="text-xl text-slate-300 mb-8">
            Need more information about this project or want to discuss customizations? 
            Contact us directly for quick support.
        </p>
        
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            @if(isset($contactInfo) && $contactInfo['admin_telegram'])
            <a href="https://t.me/{{ $contactInfo['admin_telegram'] }}?text=Hello, I have questions about {{ $project->title }}" 
               target="_blank"
               class="bg-blue-600 text-white px-8 py-4 rounded-lg font-semibold hover:bg-blue-700 transition-colors inline-flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/>
                </svg>
                Ask Questions
            </a>
            @endif
            
            @if(isset($contactInfo) && $contactInfo['admin_email'])
            <a href="mailto:{{ $contactInfo['admin_email'] }}?subject=Question about {{ $project->title }}" 
               class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-slate-900 transition-colors inline-flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                Send Email
            </a>
            @endif
        </div>
    </div>
</section>
@endsection

@push('head')
<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.prose {
    color: inherit;
}

.prose h1, .prose h2, .prose h3, .prose h4, .prose h5, .prose h6 {
    color: inherit;
}

.prose p {
    margin-bottom: 1rem;
}

.prose ul, .prose ol {
    padding-left: 1.5rem;
}

.prose li {
    margin-bottom: 0.5rem;
}
</style>
@endpush