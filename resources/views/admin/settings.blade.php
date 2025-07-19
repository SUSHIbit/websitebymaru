@extends('layouts.admin')

@php
    $pageTitle = 'Settings';
@endphp

@section('content')
<div class="max-w-4xl">
    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-slate-900">Site Settings</h1>
        <p class="mt-1 text-slate-600">Configure your site's contact information and statistics.</p>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- Contact Information -->
        <div class="bg-white shadow rounded-lg">
            <div class="px-6 py-4 border-b border-slate-200">
                <h3 class="text-lg font-medium text-slate-900">Contact Information</h3>
                <p class="mt-1 text-sm text-slate-500">This information will be displayed on your public website.</p>
            </div>
            
            <div class="p-6 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Admin Name -->
                    <div>
                        <label for="admin_name" class="block text-sm font-medium text-slate-700 mb-2">Full Name</label>
                        <input type="text" 
                               name="admin_name" 
                               id="admin_name" 
                               value="{{ old('admin_name', $settings['admin_name'] ?? '') }}"
                               class="block w-full rounded-lg border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500 transition-colors @error('admin_name') border-red-500 @enderror"
                               placeholder="Maru"
                               required>
                        @error('admin_name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-slate-500 text-sm mt-1">Your name as it appears on the contact page.</p>
                    </div>

                    <!-- Admin Email -->
                    <div>
                        <label for="admin_email" class="block text-sm font-medium text-slate-700 mb-2">Contact Email</label>
                        <input type="email" 
                               name="admin_email" 
                               id="admin_email" 
                               value="{{ old('admin_email', $settings['admin_email'] ?? '') }}"
                               class="block w-full rounded-lg border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500 transition-colors @error('admin_email') border-red-500 @enderror"
                               placeholder="contact@websitebymaru.com"
                               required>
                        @error('admin_email')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-slate-500 text-sm mt-1">Public email address for student inquiries.</p>
                    </div>

                    <!-- Telegram Username -->
                    <div class="md:col-span-2">
                        <label for="admin_telegram" class="block text-sm font-medium text-slate-700 mb-2">Telegram Username</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-slate-500 sm:text-sm">@</span>
                            </div>
                            <input type="text" 
                                   name="admin_telegram" 
                                   id="admin_telegram" 
                                   value="{{ old('admin_telegram', $settings['admin_telegram'] ?? '') }}"
                                   class="block w-full rounded-lg border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500 transition-colors pl-8 @error('admin_telegram') border-red-500 @enderror"
                                   placeholder="yourusername">
                        </div>
                        @error('admin_telegram')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-slate-500 text-sm mt-1">Your Telegram username (without @) for project purchases and support.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Company Information -->
        <div class="bg-white shadow rounded-lg">
            <div class="px-6 py-4 border-b border-slate-200">
                <h3 class="text-lg font-medium text-slate-900">Company Information</h3>
                <p class="mt-1 text-sm text-slate-500">Optional company details for your website footer.</p>
            </div>
            
            <div class="p-6 space-y-6">
                <!-- Company Name -->
                <div>
                    <label for="company_name" class="block text-sm font-medium text-slate-700 mb-2">Company Name</label>
                    <input type="text" 
                           name="company_name" 
                           id="company_name" 
                           value="{{ old('company_name', $settings['company_name'] ?? '') }}"
                           class="block w-full rounded-lg border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500 transition-colors @error('company_name') border-red-500 @enderror"
                           placeholder="WebsiteByMaru">
                    @error('company_name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-slate-500 text-sm mt-1">Your business or brand name.</p>
                </div>

                <!-- Company Address -->
                <div>
                    <label for="company_address" class="block text-sm font-medium text-slate-700 mb-2">Company Address</label>
                    <textarea name="company_address" 
                              id="company_address" 
                              rows="3"
                              class="block w-full rounded-lg border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500 transition-colors @error('company_address') border-red-500 @enderror"
                              placeholder="Temerluh, Pahang, Malaysia">{{ old('company_address', $settings['company_address'] ?? '') }}</textarea>
                    @error('company_address')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-slate-500 text-sm mt-1">Your business address (optional).</p>
                </div>
            </div>
        </div>

        <!-- Statistics -->
        <div class="bg-white shadow rounded-lg">
            <div class="px-6 py-4 border-b border-slate-200">
                <h3 class="text-lg font-medium text-slate-900">Homepage Statistics</h3>
                <p class="mt-1 text-sm text-slate-500">Update the statistics that appear on your homepage.</p>
            </div>
            
            <div class="p-6 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Projects Delivered -->
                    <div>
                        <label for="projects_delivered" class="block text-sm font-medium text-slate-700 mb-2">Projects Delivered</label>
                        <input type="number" 
                               name="projects_delivered" 
                               id="projects_delivered" 
                               min="0"
                               value="{{ old('projects_delivered', $settings['projects_delivered'] ?? '10') }}"
                               class="block w-full rounded-lg border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500 transition-colors @error('projects_delivered') border-red-500 @enderror"
                               required>
                        @error('projects_delivered')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-slate-500 text-sm mt-1">Total number of projects delivered to students and clients.</p>
                    </div>

                    <!-- Client Satisfaction -->
                    <div>
                        <label for="client_satisfaction" class="block text-sm font-medium text-slate-700 mb-2">Client Satisfaction (%)</label>
                        <input type="number" 
                               name="client_satisfaction" 
                               id="client_satisfaction" 
                               min="0" 
                               max="100"
                               value="{{ old('client_satisfaction', $settings['client_satisfaction'] ?? '95') }}"
                               class="block w-full rounded-lg border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500 transition-colors @error('client_satisfaction') border-red-500 @enderror"
                               required>
                        @error('client_satisfaction')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-slate-500 text-sm mt-1">Percentage of happy students and clients (0-100).</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Preview Section -->
        <div class="bg-slate-50 border border-slate-200 rounded-lg">
            <div class="px-6 py-4 border-b border-slate-200">
                <h3 class="text-lg font-medium text-slate-900">Contact Information Preview</h3>
                <p class="mt-1 text-sm text-slate-500">This is how your contact information will appear on the website.</p>
            </div>
            
            <div class="p-6">
                <div class="bg-white p-6 rounded-lg border border-slate-200">
                    <h4 class="text-lg font-semibold text-slate-900 mb-4">Get in Touch</h4>
                    
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-slate-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span class="text-slate-700">
                                <span id="preview-name">{{ $settings['admin_name'] ?? 'Your Name' }}</span>
                            </span>
                        </div>
                        
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-slate-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span class="text-slate-700">
                                <span id="preview-email">{{ $settings['admin_email'] ?? 'your@email.com' }}</span>
                            </span>
                        </div>
                        
                        <div class="flex items-center" id="preview-telegram-container" @if(!isset($settings['admin_telegram']) || !$settings['admin_telegram']) style="display: none;" @endif>
                            <svg class="w-5 h-5 text-slate-400 mr-3" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/>
                            </svg>
                            <span class="text-slate-700">
                                @<span id="preview-telegram">{{ $settings['admin_telegram'] ?? 'yourusername' }}</span>
                            </span>
                        </div>
                    </div>

                    <!-- Stats Preview -->
                    <div class="mt-6 pt-6 border-t border-slate-200">
                        <h5 class="font-semibold text-slate-900 mb-3">Homepage Statistics</h5>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-slate-900"><span id="preview-projects">{{ $settings['projects_delivered'] ?? '10' }}</span>+</div>
                                <div class="text-slate-600 text-sm">Projects Delivered</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-slate-900"><span id="preview-satisfaction">{{ $settings['client_satisfaction'] ?? '95' }}</span>%</div>
                                <div class="text-slate-600 text-sm">Happy Students</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Save Button -->
        <div class="flex justify-end">
            <button type="submit" 
                    class="bg-slate-900 text-white px-8 py-3 rounded-lg font-semibold hover:bg-slate-800 transition-colors flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Save Settings
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
// Live preview updates
document.addEventListener('DOMContentLoaded', function() {
    // Name preview
    const nameInput = document.getElementById('admin_name');
    const namePreview = document.getElementById('preview-name');
    if (nameInput && namePreview) {
        nameInput.addEventListener('input', function() {
            namePreview.textContent = this.value || 'Your Name';
        });
    }

    // Email preview
    const emailInput = document.getElementById('admin_email');
    const emailPreview = document.getElementById('preview-email');
    if (emailInput && emailPreview) {
        emailInput.addEventListener('input', function() {
            emailPreview.textContent = this.value || 'your@email.com';
        });
    }

    // Telegram preview
    const telegramInput = document.getElementById('admin_telegram');
    const telegramPreview = document.getElementById('preview-telegram');
    const telegramContainer = document.getElementById('preview-telegram-container');
    if (telegramInput && telegramPreview && telegramContainer) {
        telegramInput.addEventListener('input', function() {
            if (this.value.trim()) {
                telegramPreview.textContent = this.value;
                telegramContainer.style.display = 'flex';
            } else {
                telegramContainer.style.display = 'none';
            }
        });
    }

    // Projects delivered preview
    const projectsInput = document.getElementById('projects_delivered');
    const projectsPreview = document.getElementById('preview-projects');
    if (projectsInput && projectsPreview) {
        projectsInput.addEventListener('input', function() {
            projectsPreview.textContent = this.value || '0';
        });
    }

    // Satisfaction preview
    const satisfactionInput = document.getElementById('client_satisfaction');
    const satisfactionPreview = document.getElementById('preview-satisfaction');
    if (satisfactionInput && satisfactionPreview) {
        satisfactionInput.addEventListener('input', function() {
            satisfactionPreview.textContent = this.value || '0';
        });
    }
});
</script>
@endpush