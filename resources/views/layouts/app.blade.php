<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Student-Friendly Web Development Projects' }} - {{ config('app.name', 'WebsiteByMaru') }}</title>
    
    <meta name="description" content="{{ $description ?? 'Affordable web development projects perfect for students and small businesses. Get complete source code and learn while building your online presence.' }}">
    <meta name="keywords" content="student websites, affordable web development, website source code, beginner-friendly projects">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Additional head content -->
    @stack('head')
</head>
<body class="font-sans antialiased bg-slate-50 text-slate-900">
    <!-- Navigation -->
    <nav class="bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-slate-900 hover:text-slate-700 transition-colors">
                        Website<span class="text-slate-600">ByMaru</span>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-8">
                        <a href="{{ route('home') }}" 
                           class="nav-link {{ request()->routeIs('home') ? 'text-slate-900 border-b-2 border-slate-900' : 'text-slate-600 hover:text-slate-900' }}">
                            Home
                        </a>
                        <a href="{{ route('home') }}#about" class="nav-link text-slate-600 hover:text-slate-900">
                            About
                        </a>
                        <a href="{{ route('services') }}" 
                           class="nav-link {{ request()->routeIs('services') || request()->routeIs('project.detail') ? 'text-slate-900 border-b-2 border-slate-900' : 'text-slate-600 hover:text-slate-900' }}">
                            Projects
                        </a>
                        <a href="{{ route('home') }}#contact" class="nav-link text-slate-600 hover:text-slate-900">
                            Contact
                        </a>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="inline-flex items-center justify-center p-2 rounded-md text-slate-600 hover:text-slate-900 hover:bg-slate-100">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="md:hidden hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white border-t border-slate-200">
                <a href="{{ route('home') }}" class="mobile-nav-link {{ request()->routeIs('home') ? 'bg-slate-100 text-slate-900' : 'text-slate-600' }}">Home</a>
                <a href="{{ route('home') }}#about" class="mobile-nav-link text-slate-600">About</a>
                <a href="{{ route('services') }}" class="mobile-nav-link {{ request()->routeIs('services') || request()->routeIs('project.detail') ? 'bg-slate-100 text-slate-900' : 'text-slate-600' }}">Projects</a>
                <a href="{{ route('home') }}#contact" class="mobile-nav-link text-slate-600">Contact</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="col-span-1 md:col-span-2">
                    <h3 class="text-2xl font-bold text-white mb-4">Website<span class="text-slate-400">ByMaru</span></h3>
                    <p class="text-slate-400 mb-4 max-w-md">
                        Student-friendly web development projects with complete source code. 
                        Perfect for learning and building your online presence affordably.
                    </p>
                    @if(isset($contactInfo))
                    <div class="space-y-2">
                        @if($contactInfo['admin_email'])
                        <p class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                            </svg>
                            {{ $contactInfo['admin_email'] }}
                        </p>
                        @endif
                    </div>
                    @endif
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-semibold text-white mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a></li>
                        <li><a href="{{ route('home') }}#about" class="hover:text-white transition-colors">About</a></li>
                        <li><a href="{{ route('services') }}" class="hover:text-white transition-colors">Projects</a></li>
                        <li><a href="{{ route('home') }}#contact" class="hover:text-white transition-colors">Contact</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="text-lg font-semibold text-white mb-4">Get in Touch</h4>
                    @if(isset($contactInfo) && $contactInfo['admin_telegram'])
                    <a href="https://t.me/{{ $contactInfo['admin_telegram'] }}" 
                       class="inline-flex items-center bg-slate-800 hover:bg-slate-700 text-white px-4 py-2 rounded-lg transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/>
                        </svg>
                        Contact on Telegram
                    </a>
                    @endif
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="border-t border-slate-800 mt-8 pt-8 text-center text-slate-400">
                <p>&copy; {{ date('Y') }} {{ $contactInfo['company_name'] ?? 'WebsiteByMaru' }}. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Mobile Menu Script -->
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            const button = this;
            const isOpen = !menu.classList.contains('hidden');
            
            if (isOpen) {
                menu.classList.add('hidden');
                button.querySelector('.inline-flex').classList.remove('hidden');
                button.querySelector('.hidden').classList.add('hidden');
            } else {
                menu.classList.remove('hidden');
                button.querySelector('.inline-flex').classList.add('hidden');
                button.querySelector('.hidden').classList.remove('hidden');
            }
        });
    </script>

    <!-- Additional body scripts -->
    @stack('scripts')
</body>
</html>

<style>
.nav-link {
    @apply px-3 py-2 text-sm font-medium transition-all duration-200 border-b-2 border-transparent hover:border-slate-300;
}

.mobile-nav-link {
    @apply block px-3 py-2 text-base font-medium rounded-md hover:bg-slate-100 hover:text-slate-900 transition-colors;
}
</style>