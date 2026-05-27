<?php

namespace App\Http\Controllers;
use App\Models\Job; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Job::select('category', DB::raw('count(*) as job_count'))
                    ->groupBy('category')
                    ->get();

        // Fetch all jobs (if needed elsewhere in the view)
        $jobs = Job::all();
        
        return view('home', ['jobs' => $jobs, 'categories' => $categories]);
    }
}
