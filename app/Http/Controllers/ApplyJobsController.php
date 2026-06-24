<?php

namespace App\Http\Controllers;
use App\Models\Job;
use App\Models\AppliedJobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ApplyJobsController extends Controller
{
    public function index(){
        $user = Auth::user();

        $user->applied_jobs;
        dd($user);
    }

    public function apply(Request $request)
    {
        $job_id = $request['job_id'];
        $user_id = Auth::user()->id;

        $hasApplied = AppliedJobs::where('user_id', $user_id)
        ->where('job_id', $job_id)
        ->exists();

        if ($hasApplied) {
            return back()->with('message', 'You have already applied for this job. You can view your applications in your profile.');
        }
        
        // dd($user_id);
        if($request['qualified']=='yes'){
            $applied_to = AppliedJobs::create([
                'user_id' => $user_id,
                'job_id' => $job_id
            ]);
        }else{
            return back()->with('message', 'Something is wrong');
        }

        return back()->with('message', 'Successfully applied for this job');
    }


    public function delete(Job $job){
        $user = Auth::user();
        $applied_job = AppliedJobs::where('job_id', $job->id)->where('user_id', $user->id)->first();

        if ($applied_job) {
            $applied_job->delete();
        }
        
        return back();
    }
}
