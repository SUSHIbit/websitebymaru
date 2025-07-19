@extends('layouts.admin')

@php
    $pageTitle = 'Edit Project';
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
            <span class="text-slate-900">Edit {{ $project->title }}</span>
        </div>
        <h1 class="text-2xl font-bold text-slate-900">Edit Project</h1>
        <p class="mt-1 text-slate-600">Update project information and settings.</p>
    </div>

    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- Basic Information -->
        <div class="bg-white shadow rounded-lg">
            <div class="px-6 py-4 border-b border-slate-200">
                <h3 class="text-lg font-medium text-slate-900">Basic Information</h3>
                <p class="mt-1 text-sm text-slate-500">Update the main details about your project.</p>
            </div>
            
            <div class="p-6 space-y-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-slate-700 mb-2">Project Title *</label>
                    <input type="text" 
                           name="title" 
                           id="title" 
                           value="{{ old('title', $project->title) }}"
                           class="block w-full rounded-lg border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500 transition-colors @error('title') border-red-500 @enderror"
                           placeholder="Modern E-commerce Store"
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
                              placeholder="Brief description that appears in project listings..."
                              required>{{ old('short_description', $project->short_description) }}</textarea>
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
                              placeholder="Detailed description of the project, its features, technologies used, and benefits..."
                              required>{{ old('long_description', $project->long_description) }}</textarea>
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
                            <option value="{{ $type->id }}" {{ old('project_type_id', $project->project_type_id) == $type->id ? 'selected' : '' }}>
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
                        <label for="price" class="block text-sm font-medium text-slate-700 mb-2">Price *</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-slate-500 sm:text-sm">$</span>
                            </div>
                            <input type="number" 
                                   name="price" 
                                   id="price" 
                                   step="0.01"
                                   min="0"
                                   value="{{ old('price', $project->price) }}"
                                   class="block w-full rounded-lg border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500 transition-colors pl-8 @error('price') border-red-500 @enderror"
                                   placeholder="2500.00"
                                   required>
                        </div>
                        @error('price')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-slate-500 text-sm mt-1">Project price in USD (e.g., 2500.00).</p>
                    </div>
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
                               value="{{ old('telegram_username', $project->telegram_username) }}"
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
                           {{ old('is_active', $project->is_active) ? 'checked' : '' }}
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
                <h3 class="text-lg font-medium text-slate-900">What You Get</h3>
                <p class="mt-1 text-sm text-slate-500">List what customers will receive when they purchase this project.</p>
            </div>
            
            <div class="p-6">
                <div id="what-you-get-container" class="space-y-3">
                    @if($project->what_you_get && count($project->what_you_get) > 0)
                        @foreach($project->what_you_get as $index => $item)
                        <div class="what-you-get-item flex items-center space-x-2">
                            <input type="text" 
                                   name="what_you_get[]" 
                                   class="block w-full rounded-lg border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500 transition-colors flex-1"
                                   placeholder="What customers will receive..."
                                   value="{{ old('what_you_get.'.$index, $item) }}">
                            <button type="button" onclick="removeItem(this)" class="text-red-600 hover:text-red-700 p-2 flex-shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                        @endforeach
                    @else
                        <div class="what-you-get-item flex items-center space-x-2">
                            <input type="text" 
                                   name="what_you_get[]" 
                                   class="block w-full rounded-lg border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500 transition-colors flex-1"
                                   placeholder="Complete source code with documentation"
                                   value="{{ old('what_you_get.0') }}">
                            <button type="button" onclick="removeItem(this)" class="text-red-600 hover:text-red-700 p-2 flex-shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    @endif
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
                    @if($project->key_features && count($project->key_features) > 0)
                        @foreach($project->key_features as $index => $feature)
                        <div class="key-features-item flex items-center space-x-2">
                            <input type="text" 
                                   name="key_features[]" 
                                   class="block w-full rounded-lg border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500 transition-colors flex-1"
                                   placeholder="Project feature..."
                                   value="{{ old('key_features.'.$index, $feature) }}">
                            <button type="button" onclick="removeItem(this)" class="text-red-600 hover:text-red-700 p-2 flex-shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                        @endforeach
                    @else
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
                    @endif
                </div>
                <button type="button" onclick="addKeyFeatureItem()" class="mt-3 text-slate-600 hover:text-slate-900 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Add Feature
                </button>
            </div>
        </div>

        <!-- Existing Images -->
        @if($project->images->count() > 0)
        <div class="bg-white shadow rounded-lg">
            <div class="px-6 py-4 border-b border-slate-200">
                <h3 class="text-lg font-medium text-slate-900">Current Images</h3>
                <p class="mt-1 text-sm text-slate-500">Manage existing project images. Click to remove any image you no longer want.</p>
            </div>
            
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4" id="existing-images">
                    @foreach($project->images as $image)
                    <div class="existing-image-item bg-slate-50 rounded-lg p-4 border border-slate-200" data-image-id="{{ $image->id }}">
                        <div class="aspect-video bg-slate-200 rounded-lg overflow-hidden mb-3">
                            <img src="{{ $image->image_url }}" 
                                 alt="{{ $image->description }}" 
                                 class="w-full h-full object-cover">
                        </div>
                        <p class="text-sm text-slate-600 mb-3 line-clamp-2">{{ $image->description ?: 'No description' }}</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-slate-500">
                                @if($image->sort_order === 1)
                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs font-medium">Main Image</span>
                                @else
                                Image {{ $image->sort_order }}
                                @endif
                            </span>
                        <button type="button" 
                                data-image-id="{{ $image->id }}"
                                onclick="removeExistingImage(this.getAttribute('data-image-id'))"
                                class="text-red-600 hover:text-red-800 text-sm flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Remove
                        </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

        <!-- Add New Images -->
        <div class="bg-white shadow rounded-lg">
            <div class="px-6 py-4 border-b border-slate-200">
                <h3 class="text-lg font-medium text-slate-900">Add New Images</h3>
                <p class="mt-1 text-sm text-slate-500">Upload additional images for this project.</p>
            </div>
            
            <div class="p-6">
                <div id="images-container" class="space-y-6">
                    <!-- Initially empty - images added via JavaScript -->
                </div>
                
                <button type="button" onclick="addImageItem()" class="text-slate-600 hover:text-slate-900 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Add New Image
                </button>
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
                Update Project
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
               placeholder="What customers will receive...">
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

// Add New Image item
function addImageItem() {
    const container = document.getElementById('images-container');
    const existingImages = document.querySelectorAll('.existing-image-item').length;
    const newImages = container.children.length;
    
    if (existingImages + newImages >= 20) {
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
                       name="new_images[]" 
                       accept="image/*"
                       class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-slate-50 file:text-slate-700 hover:file:bg-slate-100">
                <p class="text-slate-500 text-sm mt-1">JPG, PNG, GIF, or WebP. Max 2MB.</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Image Description</label>
                <textarea name="new_image_descriptions[]" 
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

// Remove new image item
function removeImageItem(button) {
    const container = button.closest('.image-upload-item');
    container.remove();
}

// Remove existing image
function removeExistingImage(imageId) {
    if (confirm('Are you sure you want to remove this image? This action cannot be undone.')) {
        fetch(`/secret-admin-access/projects/images/${imageId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.querySelector(`[data-image-id="${imageId}"]`).remove();
            } else {
                alert('Error removing image. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error removing image. Please try again.');
        });
    }
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

@push('head')
<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endpush