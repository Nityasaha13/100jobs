@extends('layouts.master')

@section('title')
Job Details - {{$job->role}}
@endsection

@section('content')

<section class="section-4 bg-2">    
    <div class="container pt-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{route('jobs')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp;Back to Jobs</a></li>
                    </ol>
                </nav>
            </div>
        </div> 
    </div>
    <div class="container job_details_area">
        <div class="row pb-5">
            <div class="col-md-8">
                <div class="card shadow border-0">
                    <div class="job_details_header">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                
                                <div class="jobs_conetent">
                                    
                                    <h4>{{$job->role}}</h4>

                                    @if(session('message'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('message') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                    
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            <p> <i class="fa fa-map-marker"></i>  {{$job->location}}</p>
                                        </div>
                                        <div class="location">
                                            <p> <i class="fa fa-clock-o"></i> {{$job->job_type}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jobs_right">
                                <div class="apply_now">
                                    <a class="heart_mark" href="#"> <i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="descript_wrap white-bg">
                        <div class="single_wrap">
                            <h4>Job description</h4>
                            <p>{{$job->description}}</p>
                        </div>
                        
                        <div class="single_wrap">
                            <h4>Qualifications</h4>
                            <p>{{$job->qualification}}</p>
                        </div>

                        <div class="employer-section">
                            <div class="row mb-3 d-flex align-items-center">
                                <div class="employer-pic col-md-1">
                                  <img src="{{route('home')}}/storage/{{$employer->avatar}}" style="width:50px; border-radius:50%;">  
                                </div>
                                <div class="employer-details col-md-10" style="margin-left:10px;line-height:0.8em">
                                    <div class="employer-name" style="font-weight:600">
                                        <a href="{{route('public-profile', $employer->id)}}" target="_blank">{{$employer->name}}</a>
                                    </div>
                                    <div class="employer-bio">
                                        <p style="margin:0; line-height:1.2em;">{{$employer->bio}}</p>
                                    </div>
                                </div>
                            </div>                              
                        </div>

                        <div class="border-bottom"></div>
                        <div class="pt-3 text-end">
                            <a href="#" class="btn btn-secondary">Save</a>
                            <button data-bs-toggle="modal" data-bs-target="#apply-for-job" type="button" class="btn btn-primary">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow border-0">
                    <div class="job_sumary">
                        <div class="summery_header pb-1 pt-4">
                            <h3>Job Summery</h3>
                        </div>
                        <div class="job_content pt-3">
                            <ul>
                                <li>Published on: <span>{{ $job->created_at->toDateString() }}</span></li>
                                <li>Salary: <span>{{$job->salary}}</span>/month</li>
                                <li>Location: <span>{{$job->location}}</span></li>
                                <li>Job Type: <span> {{$job->job_type}}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card shadow border-0 my-4">
                    <div class="job_sumary">
                        <div class="summery_header pb-1 pt-4">
                            <h3>Company Details</h3>
                        </div>
                        <div class="job_content pt-3">
                            <ul>
                                <li>Name: <span>{{$job->company}}</span></li>
                                <li>Website: <span><a href="#">{{$job->company_website}}</a></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('components.apply_for_job')

@endsection