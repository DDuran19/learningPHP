<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/jobs', fn() => view('jobs.index', ['jobs' => Job::with('employer')->latest()->simplePaginate(perPage: 3)]));

Route::post('/jobs', function () {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);
    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);
    // return view('jobs.index', ['jobs' => Job::with('employer')->simplePaginate(perPage: 3)]);
    return redirect('/jobs');
});


Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::with('employer')->find($id);

    if (! $job) {
        abort(404);
    }

    return view(
        'jobs.show',
        ['job' => $job]
    );
});

Route::get('/contact', function () {
    return view('contact');
});
