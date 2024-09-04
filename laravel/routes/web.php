<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/jobs', fn() => view('jobs', ['jobs' => Job::with('employer')->simplePaginate(perPage: 3)]));

Route::get('/jobs/{id}', function ($id) {
    $job = Job::with('employer')->find($id);

    if (! $job) {
        abort(404);
    }

    return view(
        'job',
        ['job' => $job]
    );
});

Route::get('/contact', function () {
    return view('contact');
});
