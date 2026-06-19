<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SkillController;

Route::get('/', function () {
    return view('about');
});

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Secured Admin Routes
Route::middleware('auth')->group(function () {
    Route::get('/admin', [ProjectController::class, 'index'])->name('admin.index');
    Route::post('/admin/projects', [ProjectController::class, 'store'])->name('admin.projects.store');
    Route::put('/admin/projects/{id}', [ProjectController::class, 'update'])->name('admin.projects.update');
    Route::delete('/admin/projects/{id}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');

    Route::post('/admin/achievements', [AchievementController::class, 'store'])->name('admin.achievements.store');
    Route::put('/admin/achievements/{id}', [AchievementController::class, 'update'])->name('admin.achievements.update');
    Route::delete('/admin/achievements/{id}', [AchievementController::class, 'destroy'])->name('admin.achievements.destroy');

    Route::post('/admin/galleries', [GalleryController::class, 'store'])->name('admin.galleries.store');
    Route::put('/admin/galleries/{id}', [GalleryController::class, 'update'])->name('admin.galleries.update');
    Route::delete('/admin/galleries/{id}', [GalleryController::class, 'destroy'])->name('admin.galleries.destroy');

    Route::post('/admin/skills', [SkillController::class, 'store'])->name('admin.skills.store');
    Route::put('/admin/skills/{id}', [SkillController::class, 'update'])->name('admin.skills.update');
    Route::delete('/admin/skills/{id}', [SkillController::class, 'destroy'])->name('admin.skills.destroy');

    Route::get('/admin.html', [ProjectController::class, 'index']);
});

$pages = ['about', 'gallery', 'skill', 'project', 'achievements', 'contact', 'chat'];

foreach ($pages as $page) {
    Route::get("/$page", function () use ($page) {
        $data = [];
        if ($page === 'project') $data['projects'] = \App\Models\Project::where('status', 'Aktif')->latest()->get();
        if ($page === 'achievements') $data['achievements'] = \App\Models\Achievement::latest()->get();
        if ($page === 'gallery') $data['galleries'] = \App\Models\Gallery::latest()->get();
        if ($page === 'skill') $data['skills'] = \App\Models\Skill::all();
        return view($page, $data);
    });
    
    // Support legacy .html links
    Route::get("/$page.html", function () use ($page) {
        $data = [];
        if ($page === 'project') $data['projects'] = \App\Models\Project::where('status', 'Aktif')->latest()->get();
        if ($page === 'achievements') $data['achievements'] = \App\Models\Achievement::latest()->get();
        if ($page === 'gallery') $data['galleries'] = \App\Models\Gallery::latest()->get();
        if ($page === 'skill') $data['skills'] = \App\Models\Skill::all();
        return view($page, $data);
    });
}
