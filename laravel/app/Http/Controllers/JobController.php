<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('jobs.index', ['jobs' => Job::with('employer')->latest()->simplePaginate(perPage: 3)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);
        $job = Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => Auth::user()->companies()->first()->id,
        ]);

        if (! $job) {
            abort(500);
        }

        Mail::to($job->employer->user)->send(
            new JobPosted($job)
        );
        return redirect("/jobs/{$job->id}");
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view(
            'jobs.show',
            ['job' => $job]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        // TODO: Authorize 
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);


        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);

        return redirect("/jobs/{$job->id}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        // TODO: Authorize 
        $job->delete();
        return redirect('/jobs');
    }
}
