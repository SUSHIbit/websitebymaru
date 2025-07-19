@extends('layouts.admin')

@php
    $pageTitle = 'Create Project';
@endphp

@section('content')
<div class="max-w-4xl">
    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center space-x-2 text-sm text-slate-600 mb-2">
            <a href="{{ route('admin.projects.index') }}" class="hover:text-slate-900">Projects</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-slate-900">Create New Project</span>
        </div>
        <h1 class="text-2xl font-bold text-slate-900">Create New Project</h1>
        <p class="mt-1 text-slate-600">Add a new website project for students to purchase.</p>
    </div>

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        <!-- Basic Information -->
        <div class="bg-white shadow rounded-lg">
            <div class="px-6 py-4 border-b border-slate-200">
                <h3 class="text-lg font-medium text-slate-900">Basic Information</h3>
                <p class="mt-1 text-sm text-slate-500">Enter the main details about your project.</p>
            </div>
            
            <div class="p-6 space-y-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-slate-700 mb-2">Project Title *</label>
                    <input type="text" 
                           name="title" 
                           id="title" 
                           value="{{ old('title') }}"
                           class="block w-full rounded-lg border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500 transition-colors @error('title') border-red-500 @enderror"
                           placeholder="Student Portfolio Website"
                           required>
                    @error('title')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-slate-500 text-sm mt-1">A descriptive title for your project that will appear in listings.</p>
                </div>

                <!-- Short Description -->
                <div>
                    <label for="short_description" class="block text-sm font-medium text-slate-700 mb-2">Short Description *</label>
                    <textarea name="short_description" 
                              id="short_description" 
                              rows="3"
                              class="block w-full rounded-lg border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500 transition-colors @error('short_description') border-red-500 @enderror"
                              placeholder="Perfect for students who need a professional portfolio website for assignments or personal use..."
                              required>{{ old('short_description') }}</textarea>
                    @error('short_description')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-slate-500 text-sm mt-1">A concise description for project cards and listings (max 500 characters).</p>
                </div>

                <!-- Long Description -->
                <div>
                    <label for="long_description" class="block text-sm font-medium text-slate-700 mb-2">Full Description *</label>
                    <textarea name="long_description" 
                              id="long_description" 
                              rows="8"
                              class="block w-full rounded-lg border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500 transition-colors @error('long_description') border-red-500 @enderror"
                              placeholder="Detailed description of the project, technologies used, perfect for students learning web development..."
                              required>{{ old('long_description') }}</textarea>
                    @error('long_description')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-slate-500 text-sm mt-1">Complete description that appears on the project detail page.</p>
                </div>

                <!-- Project Type and Price -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Project Type -->
                    <div>
                        <label for="project_type_id" class="block text-sm font-medium text-slate-700 mb-2">Project Category *</label>
                        <select name="project_type_id" 
                                id="project_type_id" 
                                class="block w-full rounded-lg border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500 transition-colors @error('project_type_id') border-red-500 @enderror"
                                required>
                            <option value="">Select a category</option>
                            @foreach($projectTypes as $type)
                            <option value="{{ $type->id }}" {{ old('project_type_id') == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('project_type_id')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Price -->
                    <div>
                        <label for="price" class="block text-sm font-medium text-slate-700 mb-2">Price (RM) *</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-slate-500 sm:text-sm">RM</span>
                            </div>
                            <input type="number" 
                                   name="price" 
                                   id="price" 
                                   step="0.01"
                                   min="0"
                                   value="{{ old('price') }}"
                                   class="block w-full rounded-lg border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500 transition-colors pl-12 @error('price') border-red-500 @enderror"
                                   placeholder="50.00"
                                   required>
                        </div>
                        @error('price')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-slate-500 text-sm mt-1">Project price in Malaysian Ringgit (e.g., 50.00).</p>
                    </div>
                </div>

                <!-- Website Link -->
                <div>
                    <label for="website_link" class="block text-sm font-medium text-slate-700 mb-2">Live Demo Link (Optional)</label>
                    <input type="url" 
                           name="website_link" 
                           id="website_link" 
                           value="{{ old('website_link') }}"
                           class="block w-full rounded-lg border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500 transition-colors @error('website_link') border-red-500 @enderror"
                           placeholder="https://demo.example.com">
                    @error('website_link')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-slate-500 text-sm mt-1">Optional link to a live demo of this project.</p>
                </div>

                <!-- Telegram Username -->
                <div>
                    <label for="telegram_username" class="block text-sm font-medium text-slate-700 mb-2">Telegram Username (Optional)</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-slate-500 sm:text-sm">@</span>
                        </div>
                        <input type="text" 
                               name="telegram_username" 
                               id="telegram_username" 
                               value="{{ old('telegram_username') }}"
                               class="block w-full rounded-lg border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500 transition-colors pl-8 @error('telegram_username') border-red-500 @enderror"
                               placeholder="yourusername">
                    </div>
                    @error('telegram_username')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-slate-500 text-sm mt-1">Optional custom Telegram username for this project. Leave blank to use default from settings.</p>
                </div>

                <!-- Active Status -->
                <div class="flex items-center">
                    <input type="checkbox" 
                           name="is_active" 
                           id="is_active" 
                           value="1"
                           {{ old('is_active', true) ? 'checked' : '' }}
                           class="h-4 w-4 text-slate-600 focus:ring-slate-500 border-slate-300 rounded">
                    <label for="is_active" class="ml-2 block text-sm text-slate-900">
                        Project is active and visible on the website
                    </label>
                </div>
            </div>
        </div>

        <!-- What You Get -->
        <div class="bg-white shadow rounded-lg">
            <div class="px-6 py-4 border-b border-slate-200">
                <h3 class="text-lg font-medium text-slate-900">What Students Will Get</h3>
                <p class="mt-1 text-sm text-slate-500">List what students will receive when they purchase this project.</p>
            </div>
            
            <div class="p-6">
                <div id="what-you-get-container" class="space-y-3">
                    <div class="what-you-get-item flex items-center space-x-2">
                        <input type="text" 
                               name="what_you_get[]" 
                               class="block w-full rounded-lg border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500 transition-colors flex-1"
                               placeholder="Complete source code with detailed comments"
                               value="{{ old('what_you_get.0') }}">
                        <button type="button" onclick="removeItem(this)" class="text-red-600 hover:text-red-700 p-2 flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <button type="button" onclick="addWhatYouGetItem()" class="mt-3 text-slate-600 hover:text-slate-900 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Add Item
                </button>
            </div>
        </div>

        <!-- Key Features -->
        <div class="bg-white shadow rounded-lg">
            <div class="px-6 py-4 border-b border-slate-200">
                <h3 class="text-lg font-medium text-slate-900">Key Features</h3>
                <p class="mt-1 text-sm text-slate-500">Highlight the main features and capabilities of your project.</p>
            </div>
            
            <div class="p-6">
                <div id="key-features-container" class="space-y-3">
                    <div class="key-features-item flex items-center space-x-2">
                        <input type="text" 
                               name="key_features[]" 
                               class="block w-full rounded-lg border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500 transition-colors flex-1"
                               placeholder="Responsive design"
                               value="{{ old('key_features.0') }}">
                        <button type="button" onclick="removeItem(this)" class="text-red-600 hover:text-red-700 p-2 flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <button type="button" onclick="addKeyFeatureItem()" class="mt-3 text-slate-600 hover:text-slate-900 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Add Feature
                </button>
            </div>
        </div>

        <!-- Project Images -->
        <div class="bg-white shadow rounded-lg">
            <div class="px-6 py-4 border-b border-slate-200">
                <h3 class="text-lg font-medium text-slate-900">Project Images</h3>
                <p class="mt-1 text-sm text-slate-500">Upload images to showcase your project. The first image will be used as the main thumbnail.</p>
            </div>
            
            <div class="p-6">
                <div id="images-container" class="space-y-6">
                    <div class="image-upload-item border border-slate-200 rounded-lg p-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">Image File</label>
                                <input type="file" 
                                       name="images[]" 
                                       accept="image/*"
                                       class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-slate-50 file:text-slate-700 hover:file:bg-slate-100">
                                <p class="text-slate-500 text-sm mt-1">JPG, PNG, GIF, or WebP. Max 2MB.</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">Image Description</label>
                                <textarea name="image_descriptions[]" 
                                          rows="3"
                                          class="block w-full rounded-lg border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500 transition-colors"
                                          placeholder="Describe what this image shows..."></textarea>
                            </div>
                        </div>
                        <button type="button" onclick="removeImageItem(this)" class="mt-3 text-red-600 hover:text-red-700 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Remove Image
                        </button>
                    </div>
                </div>
                
                <button type="button" onclick="addImageItem()" class="mt-4 text-slate-600 hover:text-slate-900 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Add Another Image
                </button>
                
                <div class="mt-4 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-blue-600 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div>
                            <p class="text-sm text-blue-800 font-medium">Image Guidelines:</p>
                            <ul class="text-sm text-blue-700 mt-1 space-y-1">
                                <li>• The first image will be used as the main thumbnail in project listings</li>
                                <li>• Images will be displayed in the order they are uploaded</li>
                                <li>• Add descriptive text for each image to help students understand what they're seeing</li>
                                <li>• Maximum 20 images per project</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="flex items-center justify-between">
            <a href="{{ route('admin.projects.index') }}" 
               class="bg-slate-200 text-slate-700 px-6 py-3 rounded-lg font-semibold hover:bg-slate-300 transition-colors">
                Cancel
            </a>
            <button type="submit" 
                    class="bg-slate-900 text-white px-8 py-3 rounded-lg font-semibold hover:bg-slate-800 transition-colors flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Create Project
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
// Add What You Get item
function addWhatYouGetItem() {
    const container = document.getElementById('what-you-get-container');
    const newItem = document.createElement('div');
    newItem.className = 'what-you-get-item flex items-center space-x-2';
    newItem.innerHTML = `
        <input type="text" 
               name="what_you_get[]" 
               class="block w-full rounded-lg border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500 transition-colors flex-1"
               placeholder="What students will receive...">
        <button type="button" onclick="removeItem(this)" class="text-red-600 hover:text-red-700 p-2 flex-shrink-0">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
            </svg>
        </button>
    `;
    container.appendChild(newItem);
}

// Add Key Feature item
function addKeyFeatureItem() {
    const container = document.getElementById('key-features-container');
    const newItem = document.createElement('div');
    newItem.className = 'key-features-item flex items-center space-x-2';
    newItem.innerHTML = `
        <input type="text" 
               name="key_features[]" 
               class="block w-full rounded-lg border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500 transition-colors flex-1"
               placeholder="Project feature...">
        <button type="button" onclick="removeItem(this)" class="text-red-600 hover:text-red-700 p-2 flex-shrink-0">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
            </svg>
        </button>
    `;
    container.appendChild(newItem);
}

// Add Image item
function addImageItem() {
    const container = document.getElementById('images-container');
    const imageCount = container.children.length;
    
    if (imageCount >= 20) {
        alert('Maximum 20 images allowed per project.');
        return;
    }
    
    const newItem = document.createElement('div');
    newItem.className = 'image-upload-item border border-slate-200 rounded-lg p-4';
    newItem.innerHTML = `
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Image File</label>
                <input type="file" 
                       name="images[]" 
                       accept="image/*"
                       class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-slate-50 file:text-slate-700 hover:file:bg-slate-100">
                <p class="text-slate-500 text-sm mt-1">JPG, PNG, GIF, or WebP. Max 2MB.</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Image Description</label>
                <textarea name="image_descriptions[]" 
                          rows="3"
                          class="block w-full rounded-lg border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500 transition-colors"
                          placeholder="Describe what this image shows..."></textarea>
            </div>
        </div>
        <button type="button" onclick="removeImageItem(this)" class="mt-3 text-red-600 hover:text-red-700 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
            </svg>
            Remove Image
        </button>
    `;
    container.appendChild(newItem);
}

// Remove item (generic)
function removeItem(button) {
    const container = button.closest('.what-you-get-item, .key-features-item');
    if (container.parentNode.children.length > 1) {
        container.remove();
    } else {
        alert('At least one item is required.');
    }
}

// Remove image item
function removeImageItem(button) {
    const container = button.closest('.image-upload-item');
    container.remove();
}

// Auto-resize textareas
document.addEventListener('DOMContentLoaded', function() {
    const textareas = document.querySelectorAll('textarea');
    textareas.forEach(textarea => {
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        });
    });
});
</script>
@endpush