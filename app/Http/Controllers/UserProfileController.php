<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job; 
use App\Models\AppliedJobs;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        $user->educations;
        $user->certifications;
        $user->experiences;
        return view('user.profile', compact('user'));
    }

    public function post_job()
    {
        $user=  Auth::user(); 
        // $jobs=Job::all();
        return view('user/post_job', ['user' => $user]);
    }

    public function my_jobs()
    {
        $user=  Auth::user(); 
        // dd($user->id);
        // $jobs = AppliedJobs::where('user_id', '=', $user->id)->get();
        $user->applied_jobs;
        // dd($user1); 
        $user->jobs;
        return view('user/my_jobs', compact('user'));
    }

    public function applied_jobs()
    {
        $user=  Auth::user();  
        return view('user/applied_jobs', ['user' => $user]);
    }

    public function saved_jobs()
    {
        $user=  Auth::user(); 
        return view('user/saved_jobs', ['user' => $user]);
    }

}
