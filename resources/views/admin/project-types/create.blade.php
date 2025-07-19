@extends('layouts.admin')

@php
    $pageTitle = 'Create Category';
@endphp

@section('content')
<div class="max-w-2xl">
    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center space-x-2 text-sm text-slate-600 mb-2">
            <a href="{{ route('admin.project-types.index') }}" class="hover:text-slate-900">Categories</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-slate-900">Create New Category</span>
        </div>
        <h1 class="text-2xl font-bold text-slate-900">Create New Category</h1>
        <p class="mt-1 text-slate-600">Add a new project category to organize your portfolio.</p>
    </div>

    <form action="{{ route('admin.project-types.store') }}" method="POST" class="space-y-8">
        @csrf

        <!-- Basic Information -->
        <div class="bg-white shadow rounded-lg">
            <div class="px-6 py-4 border-b border-slate-200">
                <h3 class="text-lg font-medium text-slate-900">Category Information</h3>
                <p class="mt-1 text-sm text-slate-500">Enter the details for your new project category.</p>
            </div>
            
            <div class="p-6 space-y-6">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-slate-700 mb-2">Category Name *</label>
                    <input type="text" 
                           name="name" 
                           id="name" 
                           value="{{ old('name') }}"
                           class="block w-full rounded-lg border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500 transition-colors @error('name') border-red-500 @enderror"
                           placeholder="E-commerce Websites"
                           required>
                    @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-slate-500 text-sm mt-1">A descriptive name for this project category.</p>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-slate-700 mb-2">Description (Optional)</label>
                    <textarea name="description" 
                              id="description" 
                              rows="4"
                              class="block w-full rounded-lg border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500 transition-colors @error('description') border-red-500 @enderror"
                              placeholder="Describe what types of projects belong in this category...">{{ old('description') }}</textarea>
                    @error('description')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-slate-500 text-sm mt-1">Optional description to help explain this category to visitors.</p>
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
                        Category is active and visible on the website
                    </label>
                </div>
            </div>
        </div>

        <!-- Preview -->
        <div class="bg-slate-50 border border-slate-200 rounded-lg">
            <div class="px-6 py-4 border-b border-slate-200">
                <h3 class="text-lg font-medium text-slate-900">Category Preview</h3>
                <p class="mt-1 text-sm text-slate-500">This is how your category will appear on the website.</p>
            </div>
            
            <div class="p-6">
                <div class="bg-white p-6 rounded-lg border border-slate-200 hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-slate-900" id="preview-name">E-commerce Websites</h3>
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800" id="preview-status">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Active
                        </span>
                    </div>
                    <p class="text-slate-600 text-sm mb-4" id="preview-description">Complete online stores with payment integration, inventory management, and customer accounts.</p>
                    <div class="flex items-center justify-between text-sm text-slate-500">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"/>
                            </svg>
                            0 projects
                        </span>
                        <span>Just created</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="flex items-center justify-between">
            <a href="{{ route('admin.project-types.index') }}" 
               class="bg-slate-200 text-slate-700 px-6 py-3 rounded-lg font-semibold hover:bg-slate-300 transition-colors">
                Cancel
            </a>
            <button type="submit" 
                    class="bg-slate-900 text-white px-8 py-3 rounded-lg font-semibold hover:bg-slate-800 transition-colors flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Create Category
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
    const nameInput = document.getElementById('name');
    const namePreview = document.getElementById('preview-name');
    if (nameInput && namePreview) {
        nameInput.addEventListener('input', function() {
            namePreview.textContent = this.value || 'Category Name';
        });
    }

    // Description preview
    const descriptionInput = document.getElementById('description');
    const descriptionPreview = document.getElementById('preview-description');
    if (descriptionInput && descriptionPreview) {
        descriptionInput.addEventListener('input', function() {
            descriptionPreview.textContent = this.value || 'Category description will appear here...';
        });
    }

    // Status preview
    const statusInput = document.getElementById('is_active');
    const statusPreview = document.getElementById('preview-status');
    if (statusInput && statusPreview) {
        statusInput.addEventListener('change', function() {
            if (this.checked) {
                statusPreview.className = 'inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800';
                statusPreview.innerHTML = `
                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    Active
                `;
            } else {
                statusPreview.className = 'inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800';
                statusPreview.innerHTML = `
                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    Inactive
                `;
            }
        });
    }
});
</script>
@endpush