@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-white overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Ccircle cx="30" cy="30" r="1.5"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                Premium Web Development
                <span class="block text-slate-300">Projects for Sale</span>
            </h1>
            <p class="text-xl md:text-2xl text-slate-300 mb-8 max-w-3xl mx-auto leading-relaxed">
                Discover professionally crafted websites, e-commerce stores, and web applications. 
                Ready-to-deploy solutions that save you time and deliver exceptional results.
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
                Every project is built with modern technologies, best practices, and attention to detail.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="text-center group">
                <div class="bg-slate-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-slate-200 transition-colors">
                    <svg class="w-8 h-8 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-slate-900 mb-3">Ready to Deploy</h3>
                <p class="text-slate-600">
                    Complete source code with documentation. Set up and launch your project within hours, not weeks.
                </p>
            </div>
            
            <!-- Feature 2 -->
            <div class="text-center group">
                <div class="bg-slate-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-slate-200 transition-colors">
                    <svg class="w-8 h-8 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-slate-900 mb-3">Quality Assured</h3>
                <p class="text-slate-600">
                    Built with modern frameworks, responsive design, and following industry best practices for reliability.
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
                    Comprehensive documentation and support included. Get help when you need it most.
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
                    Professional Web Solutions
                </h2>
                <p class="text-lg text-slate-600 mb-6">
                    We specialize in creating high-quality web projects that businesses can purchase and deploy immediately. 
                    Each project is carefully crafted with modern technologies and designed to meet specific business needs.
                </p>
                <p class="text-lg text-slate-600 mb-8">
                    From e-commerce stores to complex web applications, our projects come with complete source code, 
                    documentation, and ongoing support to ensure your success.
                </p>
                
                <!-- Stats -->
                <div class="grid grid-cols-2 gap-6">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-slate-900">50+</div>
                        <div class="text-slate-600">Projects Delivered</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-slate-900">100%</div>
                        <div class="text-slate-600">Client Satisfaction</div>
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
                            <span class="text-slate-600">Complete source code with documentation</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-slate-600">Installation and setup instructions</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-slate-600">Extended support and updates</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-slate-600">Commercial license included</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Overview -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Project Categories</h2>
            <p class="text-xl text-slate-600 max-w-2xl mx-auto">
                Explore our diverse range of professional web projects across different categories.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- E-commerce -->
            <div class="bg-slate-50 p-8 rounded-xl hover:shadow-lg transition-all duration-200 group">
                <div class="w-12 h-12 bg-slate-200 rounded-lg flex items-center justify-center mb-6 group-hover:bg-slate-300 transition-colors">
                    <svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-slate-900 mb-3">E-commerce Stores</h3>
                <p class="text-slate-600 mb-4">
                    Complete online stores with payment integration, inventory management, and customer accounts.
                </p>
                <a href="{{ route('services') }}?type=e-commerce-websites" class="text-slate-700 font-medium hover:text-slate-900 transition-colors">
                    View Projects →
                </a>
            </div>
            
            <!-- Business Websites -->
            <div class="bg-slate-50 p-8 rounded-xl hover:shadow-lg transition-all duration-200 group">
                <div class="w-12 h-12 bg-slate-200 rounded-lg flex items-center justify-center mb-6 group-hover:bg-slate-300 transition-colors">
                    <svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-slate-900 mb-3">Business Websites</h3>
                <p class="text-slate-600 mb-4">
                    Professional corporate websites with CMS, contact forms, and modern design.
                </p>
                <a href="{{ route('services') }}?type=business-websites" class="text-slate-700 font-medium hover:text-slate-900 transition-colors">
                    View Projects →
                </a>
            </div>
            
            <!-- Web Applications -->
            <div class="bg-slate-50 p-8 rounded-xl hover:shadow-lg transition-all duration-200 group">
                <div class="w-12 h-12 bg-slate-200 rounded-lg flex items-center justify-center mb-6 group-hover:bg-slate-300 transition-colors">
                    <svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-slate-900 mb-3">Web Applications</h3>
                <p class="text-slate-600 mb-4">
                    Custom web applications with advanced functionality and user management systems.
                </p>
                <a href="{{ route('services') }}?type=web-applications" class="text-slate-700 font-medium hover:text-slate-900 transition-colors">
                    View Projects →
                </a>
            </div>
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

<!-- Contact Section -->
<section id="contact" class="py-20 bg-slate-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Get in Touch</h2>
            <p class="text-xl text-slate-300 max-w-2xl mx-auto">
                Ready to purchase a project or have questions? Contact us directly through Telegram for instant support.
            </p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Info -->
            <div class="space-y-8">
                @if(isset($contactInfo))
                    @if($contactInfo['admin_name'])
                    <div class="flex items-start">
                        <div class="bg-slate-800 p-3 rounded-lg mr-4">
                            <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold mb-1">Contact Person</h3>
                            <p class="text-slate-300">{{ $contactInfo['admin_name'] }}</p>
                        </div>
                    </div>
                    @endif
                    
                    @if($contactInfo['admin_email'])
                    <div class="flex items-start">
                        <div class="bg-slate-800 p-3 rounded-lg mr-4">
                            <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold mb-1">Email</h3>
                            <a href="mailto:{{ $contactInfo['admin_email'] }}" class="text-slate-300 hover:text-white transition-colors">
                                {{ $contactInfo['admin_email'] }}
                            </a>
                        </div>
                    </div>
                    @endif
                    
                    @if($contactInfo['admin_phone'])
                    <div class="flex items-start">
                        <div class="bg-slate-800 p-3 rounded-lg mr-4">
                            <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold mb-1">Phone</h3>
                            <a href="tel:{{ $contactInfo['admin_phone'] }}" class="text-slate-300 hover:text-white transition-colors">
                                {{ $contactInfo['admin_phone'] }}
                            </a>
                        </div>
                    </div>
                    @endif
                @endif
            </div>
            
            <!-- Telegram Contact -->
            <div class="bg-slate-800 p-8 rounded-2xl">
                <h3 class="text-2xl font-bold mb-4">Quick Contact</h3>
                <p class="text-slate-300 mb-6">
                    For fastest response and instant support, contact us directly on Telegram. 
                    We're available to answer questions and process orders quickly.
                </p>
                
                @if(isset($contactInfo) && $contactInfo['admin_telegram'])
                <a href="https://t.me/{{ $contactInfo['admin_telegram'] }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-lg font-semibold transition-colors inline-flex items-center w-full justify-center">
                    <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/>
                    </svg>
                    Contact on Telegram
                </a>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">
            Ready to Get Started?
        </h2>
        <p class="text-xl text-slate-600 mb-8">
            Browse our collection of premium web projects and find the perfect solution for your business needs.
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