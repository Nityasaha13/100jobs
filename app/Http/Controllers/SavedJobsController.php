<?php

namespace App\Http\Controllers;

use App\Models\SavedJobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavedJobsController extends Controller
{
    public function save_job(Request $request)
    {
        $jobid = $request['job_id'];
        $user_id = Auth::user()->id;

        // Check if the job is already saved
        $savedJob = SavedJobs::where('user_id', $user_id)->where('job_id', $jobid)->first();

        if ($savedJob) {
            return back()->with('message', 'Job already saved.');
        }

        // Save the job
        if($request['save']=='yes'){
            $applied_to = SavedJobs::create([
                'user_id' => $user_id,
                'job_id' => $jobid
            ]);
        }else{
            return back()->with('message', 'Something is wrong');
        }

        return back()->with('message', 'Job saved successfully.');
    }

    public function remove_saved_job($jobid)
    {
        $user_id = auth()->user()->id;

        // Find the saved job
        $savedJob = SavedJobs::where('user_id', $user_id)->where('job_id', $jobid)->first();

        if (!$savedJob) {
            return back()->with('message', 'Job not found in saved jobs.');
        }

        // Delete the saved job
        $savedJob->delete();

        return back()->with('message', 'Job removed from saved jobs.');
    }
}
