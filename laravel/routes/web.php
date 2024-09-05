<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use App\Mail\JobPosted;
use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/mail-content', function () {
    $job = new Job([
        'title' => 'Job Title',
        'salary' => 'Salary',
        'employer_id' => 1,
        'id' => 1
    ]);
    return new JobPosted($job);
});

Route::view('/', 'home');
Route::view('/contact', 'contact');

// jobs
Route::controller(JobController::class)->group(function () {
    Route::get('/jobs', [JobController::class, 'index']);
    Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
    Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth');

    Route::get('/jobs/{job}', [JobController::class, 'show']);
    Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware(['auth'])->can('update', 'job');
    Route::patch('/jobs/{job}', [JobController::class, 'update'])->middleware(['auth'])->can('update', 'job');
    Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->middleware(['auth'])->can('delete', 'job');
});


// Auth
Route::get('/register', [RegisterUserController::class, 'create']);
Route::post('/register', [RegisterUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
