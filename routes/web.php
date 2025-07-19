<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\ProjectTypeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/project/{slug}', [HomeController::class, 'projectDetail'])->name('project.detail');

// Dashboard redirect (fix for Breeze default redirect)
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin Routes - Protected with secret URL path
Route::prefix('secret-admin-access')->middleware('auth')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Settings
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
    Route::put('/settings', [AdminController::class, 'updateSettings'])->name('settings.update');
    
    // Project Types Management
    Route::get('/project-types', [ProjectTypeController::class, 'index'])->name('project-types.index');
    Route::get('/project-types/create', [ProjectTypeController::class, 'create'])->name('project-types.create');
    Route::post('/project-types', [ProjectTypeController::class, 'store'])->name('project-types.store');
    Route::get('/project-types/{projectType}/edit', [ProjectTypeController::class, 'edit'])->name('project-types.edit');
    Route::put('/project-types/{projectType}', [ProjectTypeController::class, 'update'])->name('project-types.update');
    Route::delete('/project-types/{projectType}', [ProjectTypeController::class, 'destroy'])->name('project-types.destroy');
    
    // Projects Management  
    Route::get('/projects', [AdminProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [AdminProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [AdminProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{project}/edit', [AdminProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{project}', [AdminProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}', [AdminProjectController::class, 'destroy'])->name('projects.destroy');
    
    // Project Images Management
    Route::delete('/projects/images/{image}', [AdminProjectController::class, 'deleteImage'])->name('projects.images.delete');
});

// Authentication Routes (Laravel Breeze)
require __DIR__.'/auth.php';