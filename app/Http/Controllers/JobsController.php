<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Job; 
use App\Models\User;


use Illuminate\Http\Request;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $jobs=Job::where('id', '=', 2)->get();
        $jobs=Job::all(); 
        // dd($jobs);
        return view('jobs/index', ['jobs' => $jobs]);
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
        $data=$request->all();

        $job = Job::create([
            'role' => $data['role'],
            'company' => $data['company'],
            'company_website' => $data['company_website'],
            'location' => $data['location'],
            'job_type' => $data['job_type'],
            'category' => $data['category'],
            'description' => $data['description'],
            'salary' => $data['salary'],
            'skills' => $data['skills'],
            'qualification' => $data['qualification'],
            'user_id' => $data['user_id'],
        ]);

        return redirect(route('profile'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $job = Job::find($id);
        // dd($job);
        $employer = User::find($job->user_id);
        // dd($employer);

        return view('jobs/single_job',['job' => $job, 'employer' => $employer]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $job = Job::find($id);
        $user=  Auth::user(); 
        return view('jobs.edit' , ['job' => $job, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data =  $request;
        $job = Job::find($id);
        
        $job -> update([
            'role' => $data['role'],
            'company' => $data['company'],
            'company_website' => $data['company_website'],
            'location' => $data['location'],
            'job_type' => $data['job_type'],
            'category' => $data['category'],
            'description' => $data['description'],
            'salary' => $data['salary'],
            'skills' => $data['skills'],
            'qualification' => $data['qualification']
        ]);

        return back()->with('message' , 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $job = Job::find($id);
        
        $job -> delete();

        return back();
    }
}
