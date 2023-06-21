<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::query();
        $search = request('search');

        $jobs->when(request('search'), function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        });


        $jobs->when(request('min_salary'), fn ($query, $min_salary) => $query->where('salary', '>=', $min_salary));
        $jobs->when(request('max_salary'), fn ($query, $max_salary) => $query->where('salary', '<=', $max_salary));

        $jobs->when(request('category'), fn ($query, $category)  => $query->where('category', $category));
        $jobs->when(request('experience'), fn ($query, $experience) => $query->where('experience', $experience));

        return view('job.index',['jobs' => $jobs->get(), 'experience' => Job::$experience, 'categories' => Job::$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('job.show',['job' => Job::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
