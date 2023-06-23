<?php

namespace App\Http\Controllers;

use App\Models\Job;

class JobController extends Controller
{
    public function index()
    {
        $filters = request()->only(Job::$filters);

        return view('job.index',
            [
                'jobs' => Job::with('employer')->filter($filters)->get(),
                'experience' => Job::$experience,
                'categories' => Job::$categories
            ]);
    }

    public function show(Job $job)
    {
        return view('job.show', ['job' => $job->load('employer.jobs')]);
    }
}
