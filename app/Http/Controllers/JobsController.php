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
        $jobs = Job::orderBy('created_at', 'desc')->get();
        
        return view('jobs/index', ['jobs' => $jobs]);
    }


    public function get_all_jobs()
    {
        $jobs = Job::orderBy('created_at', 'desc')->get();
        
        return $jobs;
    }

    
    /**
     * Show the search results.
     */
    public function search()
    {
        $jobs=Job::all(); 
        return view('jobs.search_result', ['jobs' => $jobs]);
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

        $cuser = Auth::user();

        return view('jobs/single_job',['job' => $job, 'employer' => $employer], ['current_user' => $cuser]);
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

    
    public function search_job(Request $request)
    {
        $query = Job::query();

        if ($request->has('keywords') && $request->keywords != '') {
            $query->where('role', 'like', '%' . $request->keywords . '%');
        }

        if ($request->has('location') && $request->location != '') {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

        if ($request->has('job_type') && is_array($request->job_type)) {
            $query->whereIn('job_type', $request->job_type);
        }

        if ($request->has('sort') && $request->sort != '') {
            if ($request->sort == 'Latest') {
                $query->orderBy('created_at', 'desc');
            } else if ($request->sort == 'Oldest') {
                $query->orderBy('created_at', 'asc');
            }
        }

        $jobs = $query->get();

        return view('components.job_list', ['jobs' => $jobs]);
    }

    public function home_search_job(Request $request)
    {
        $query = Job::query();

        if ($request->filled('keywords')) {
            $query->where('role', 'like', '%' . $request->input('keywords') . '%');
        }

        if ($request->filled('location')) {
            $query->where('location', 'like', '%' . $request->input('location') . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        $jobs = $query->orderBy('created_at', 'desc')->get();

        if ($request->ajax()) {
            return view('components.home_job_search_results', ['jobs' => $jobs])->render();
        }

        return view('home', ['jobs' => $jobs]);
    }


    public function get_user_jobs($user_id, $job_id)
    {
        $user = User::find($user_id);
        // $job = Job::find($job_id);

        $sjobIds = $user->saved_jobs->pluck('job_id');
        $alljobs = Job::whereIn('id', $sjobIds)->get();

        // return response()->json($alljobs, 200);

        if ($alljobs->isEmpty()) {
            return response()->json(['message' => 'No saved jobs found'], 404);
        }

        foreach ($alljobs as $job) {
            if ($job->id == $job_id) {
                return response()->json(['message' => 'saved'], 200);
            }
        }
    }


    public function get_applied_jobs($user_id, $job_id){
        $user = User::find($user_id);
        $appliedJobs = $user->applied_on_jobs->pluck('job_id');

        if ($appliedJobs->contains($job_id)) {
            return response()->json(['message' => 'applied'], 200);
        } else {
            return response()->json(['message' => 'not applied'], 404);
        }
    }

}
