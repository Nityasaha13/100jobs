<?php

namespace App\Http\Controllers;
use App\Models\Job;
use App\Models\User;

use App\Models\AppliedJobs;
use Illuminate\Http\Request;

class CandidatesController extends Controller
{
    public function index(Job $job){
        return view('candidates.index', ['candidates' => $job->appliedusers]);
    }
}
