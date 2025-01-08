<?php

use App\Http\Controllers\Teacher\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Teacher\Auth\TeacherAccountController;
use App\Http\Controllers\Teacher\ProfileController;
use App\Http\Controllers\Teacher\DashboardController;
use Illuminate\Support\Facades\Route;

// Guest Routes (for registration and login)
Route::middleware('guest:teacher')->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

// Authenticated Routes (for teacher dashboard, profile, logout)
Route::middleware(['auth:teacher'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    
    // Routes for approving or rejecting products
    Route::post('approve/{id}', [DashboardController::class, 'approve'])->name('approve');
    Route::post('reject/{id}', [DashboardController::class, 'reject'])->name('reject');
    Route::delete('delete/{id}', [DashboardController::class, 'delete'])->name('delete');
    Route::get('accounts', [TeacherAccountController::class, 'index'])->name('accounts.index');

    // Route to store a new teacher (popup form submission)
    Route::post('accounts', [TeacherAccountController::class, 'store'])->name('accounts.store');

    // Route to delete a teacher account
    Route::delete('accounts/{id}', [TeacherAccountController::class, 'destroy'])->name('accounts.destroy');
});
// Teacher Blog Management Routes
use App\Http\Controllers\Teacher\BlogController as TeacherBlogController;

Route::middleware(['auth:teacher'])->prefix('teacher')->name('teacher.')->group(function () {
    // Blog Management
    Route::get('blogs/pending', [TeacherBlogController::class, 'index'])->name('blogs.pending'); // View pending blogs
    Route::post('blogs/pending/{id}', [TeacherBlogController::class, 'markAsPending'])->name('teacher.blogs.pending');

    Route::post('blogs/approve/{id}', [TeacherBlogController::class, 'approve'])->name('blogs.approve'); // Approve a blog
    Route::post('blogs/reject/{id}', [TeacherBlogController::class, 'reject'])->name('blogs.reject'); // Reject a blog
    Route::post('blogs/pending/{id}', [TeacherBlogController::class, 'markAsPending'])->name('blogs.pending'); // Mark blog as pending
    Route::delete('blogs/delete/{id}', [TeacherBlogController::class, 'delete'])->name('blogs.delete'); // Delete a blog

    Route::get('teacher/blogs/{id}', [BlogController::class, 'show'])->name('teacher.blogs.show');
    Route::get('teacher/blogs/pending/{id}', [BlogController::class, 'pending'])->name('teacher.blogs.pending');

    Route::get('blogs/{id}/show', [TeacherBlogController::class, 'show'])->name('blogs.show'); // View a specific blog

});
use App\Http\Controllers\AdminNewsletterController;

Route::get('/teacher/newsletter', [AdminNewsletterController::class, 'showForm'])->name('teacher.newsletter.form');
Route::get('/teacher/newsletter', [AdminNewsletterController::class, 'showSubscribers'])->name('teacher.newsletter.form');

Route::post('/teacher/newsletter/send', [AdminNewsletterController::class, 'send'])->name('teacher.newsletter.send');




