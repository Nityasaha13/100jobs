

@extends('layouts.master')

@section('content')


<section class="section-3 py-5 bg-2 ">
    <div class="container">     
        <div class="row">
            <div class="col-6 col-md-10 ">
                <h2>Find Jobs</h2>  
            </div>
            <div class="col-6 col-md-2">
                <div class="align-end">
                    <select name="sort" id="sort" class="form-control">
                        <option value="">Latest</option>
                        <option value="">Oldest</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row pt-5">

            @include('components.all_jobs_sidebar')

            <div class="col-md-8 col-lg-9 ">
                <div class="job_listing_area">                    
                    <div class="job_lists">
                        <div class="row">
                        @foreach($jobs as $job)
                            <div class="col-md-4">
                                <div class="card border-0 p-3 shadow mb-4">
                                    <div class="card-body">
                                        <h3 class="border-0 fs-5 pb-2 mb-0">{{$job->role}}</h3>
                                        <p>{{ Str::words($job->description, 15, '...') }}</p>
                                        <div class="bg-light p-3 border">
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                <span class="ps-1">{{$job->location}}</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                <span class="ps-1">{{$job->job_type}}</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-inr"></i></span>
                                                <span class="ps-1">{{$job->salary}}</span>
                                            </p>
                                        </div>

                                        <div class="d-grid mt-3">
                                            <a href="{{route('single-job',$job->id)}}" class="btn btn-primary btn-lg">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach               
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

@endsection