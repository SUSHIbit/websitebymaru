@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-white overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Ccircle cx="30" cy="30" r="1.5"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                Student-Friendly Website
                <span class="block text-slate-300">Projects & Source Code</span>
            </h1>
            <p class="text-xl md:text-2xl text-slate-300 mb-8 max-w-3xl mx-auto leading-relaxed">
                Perfect for students and beginners! Get complete website source code with documentation. 
                Learn while building your online presence affordably.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('services') }}" 
                   class="bg-white text-slate-900 px-8 py-4 rounded-lg font-semibold hover:bg-slate-100 transition-all duration-200 transform hover:scale-105 shadow-lg">
                    Browse Projects
                </a>
                <a href="#about" 
                   class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-slate-900 transition-all duration-200">
                    Learn More
                </a>
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
        </svg>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Why Choose Our Projects?</h2>
            <p class="text-xl text-slate-600 max-w-2xl mx-auto">
                Every project comes with complete source code, perfect for students learning web development.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="text-center group">
                <div class="bg-slate-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-slate-200 transition-colors">
                    <svg class="w-8 h-8 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-slate-900 mb-3">Complete Source Code</h3>
                <p class="text-slate-600">
                    Get full access to all code files with detailed comments. Perfect for learning and customization.
                </p>
            </div>
            
            <!-- Feature 2 -->
            <div class="text-center group">
                <div class="bg-slate-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-slate-200 transition-colors">
                    <svg class="w-8 h-8 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-slate-900 mb-3">Student-Friendly</h3>
                <p class="text-slate-600">
                    Affordable prices designed for students and beginners. Learn professional web development skills.
                </p>
            </div>
            
            <!-- Feature 3 -->
            <div class="text-center group">
                <div class="bg-slate-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-slate-200 transition-colors">
                    <svg class="w-8 h-8 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M12 2.5l-.878.878c-2.122 2.121-2.122 5.656 0 7.778L12 12l.878-.878c2.122-2.122 2.122-5.657 0-7.778L12 2.5z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-slate-900 mb-3">Full Support</h3>
                <p class="text-slate-600">
                    Get help when you need it! Comprehensive documentation and friendly support included.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-6">
                    Learn by Building Real Projects
                </h2>
                <p class="text-lg text-slate-600 mb-6">
                    We create affordable website projects specifically for students and beginners who want to learn 
                    web development. Each project includes complete source code, setup instructions, and detailed 
                    documentation to help you understand how everything works.
                </p>
                <p class="text-lg text-slate-600 mb-8">
                    Whether you need a website for your assignment, small business, or personal project, 
                    our source code packages provide everything you need to get started and learn along the way.
                </p>
                
                <!-- Stats -->
                <div class="grid grid-cols-2 gap-6">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-slate-900">{{ $stats['projects_delivered'] ?? '10' }}+</div>
                        <div class="text-slate-600">Projects Delivered</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-slate-900">{{ $stats['client_satisfaction'] ?? '95' }}%</div>
                        <div class="text-slate-600">Happy Students</div>
                    </div>
                </div>
            </div>
            
            <div class="relative">
                <div class="bg-white p-8 rounded-2xl shadow-lg">
                    <h3 class="text-xl font-semibold text-slate-900 mb-4">What You Get</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-slate-600">Complete source code with comments</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-slate-600">Step-by-step setup instructions</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-slate-600">Friendly support via Telegram</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-slate-600">Student-friendly pricing</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Overview -->
@if($projectTypes && $projectTypes->count() > 0)
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Available Project Categories</h2>
            <p class="text-xl text-slate-600 max-w-2xl mx-auto">
                Explore our different types of website projects perfect for students and beginners.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projectTypes as $projectType)
            <div class="bg-slate-50 p-8 rounded-xl hover:shadow-lg transition-all duration-200 group">
                <div class="w-12 h-12 bg-slate-200 rounded-lg flex items-center justify-center mb-6 group-hover:bg-slate-300 transition-colors">
                    <svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-slate-900 mb-3">{{ $projectType->name }}</h3>
                <p class="text-slate-600 mb-4">
                    {{ $projectType->description ?: 'Perfect projects for learning and building your skills.' }}
                </p>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-slate-500">{{ $projectType->active_projects_count }} {{ Str::plural('project', $projectType->active_projects_count) }}</span>
                    <a href="{{ route('services') }}?type={{ $projectType->slug }}" class="text-slate-700 font-medium hover:text-slate-900 transition-colors">
                        View Projects →
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('services') }}" 
               class="bg-slate-900 text-white px-8 py-4 rounded-lg font-semibold hover:bg-slate-800 transition-colors inline-flex items-center">
                View All Projects
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>
@endif

<!-- Contact Section -->
<section id="contact" class="py-20 bg-slate-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Get in Touch</h2>
            <p class="text-xl text-slate-300 max-w-2xl mx-auto">
                Have questions about our projects? Need help with customization? Contact us for friendly support!
            </p>
        </div>
        
        <div class="max-w-4xl mx-auto">
            <!-- Contact Information Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                @if(isset($contactInfo))
                    @if($contactInfo['admin_name'])
                    <!-- Contact Person -->
                    <div class="text-center">
                        <div class="bg-slate-800 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">Contact Person</h3>
                        <p class="text-slate-300">{{ $contactInfo['admin_name'] }}</p>
                    </div>
                    @endif
                    
                    @if($contactInfo['admin_email'])
                    <!-- Email -->
                    <div class="text-center">
                        <div class="bg-slate-800 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">Email</h3>
                        <a href="mailto:{{ $contactInfo['admin_email'] }}" class="text-slate-300 hover:text-white transition-colors">
                            {{ $contactInfo['admin_email'] }}
                        </a>
                    </div>
                    @endif

                    <!-- Telegram -->
                    <div class="text-center">
                        <div class="bg-slate-800 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-slate-300" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">Telegram</h3>
                        <a href="https://t.me/kidsushiii" target="_blank" class="text-slate-300 hover:text-white transition-colors">
                            @kidsushiii
                        </a>
                    </div>
                @endif
            </div>

            <!-- Quick Contact CTA -->
            <div class="text-center">
                <div class="bg-slate-800 p-8 rounded-2xl inline-block">
                    <h3 class="text-xl font-bold mb-4">Quick Contact</h3>
                    <p class="text-slate-300 mb-6 max-w-md">
                        For fastest response and instant support, contact us directly on Telegram. 
                        We're here to help students and answer any questions!
                    </p>
                    
                    <a href="https://t.me/kidsushiii" 
                       class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-lg font-semibold transition-colors inline-flex items-center">
                        <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/>
                        </svg>
                        Contact on Telegram
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">
            Ready to Start Learning?
        </h2>
        <p class="text-xl text-slate-600 mb-8">
            Browse our collection of student-friendly website projects and start building your skills today!
        </p>
        <a href="{{ route('services') }}" 
           class="bg-slate-900 text-white px-8 py-4 rounded-lg font-semibold hover:bg-slate-800 transition-all duration-200 transform hover:scale-105 inline-flex items-center">
            Explore Projects Now
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
        </a>
    </div>
</section>
@endsection