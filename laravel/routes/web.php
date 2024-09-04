<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// index
Route::get('/jobs', fn() => view('jobs.index', ['jobs' => Job::with('employer')->latest()->simplePaginate(perPage: 3)]));


// store
Route::post('/jobs', function () {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);
    $job = Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);

    if (! $job) {
        abort(500);
    }
    return redirect("/jobs/{$job->id}");
});

// create
Route::get('/jobs/create', function () {
    return view('jobs.create');
});


// view
Route::get('/jobs/{job}', function (Job $job) {
    return view(
        'jobs.show',
        ['job' => $job]
    );
});

// Edit
Route::get('/jobs/{job}/edit', function (Job $job) {
    return view('jobs.edit', ['job' => $job]);
});

// Update
Route::patch('/jobs/{job}', function (Job $job) {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);

    // TODO: Authorize 

    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);

    return redirect("/jobs/{$job->id}");
});

// Destroy
Route::delete('/jobs/{job}', function (Job $job) {
    // TODO: Authorize 
    $job->delete();

    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});
