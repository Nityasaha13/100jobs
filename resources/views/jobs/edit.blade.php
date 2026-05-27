@extends('layouts.master')

@section('title', 'Edit Job')

@section('content')

{{-- <h2 class="text-center">Welcome! {{ Auth::user()->name }}</h2> --}}

<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Job</li> 
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">

            @include('layouts.partials.profile_sidebar')

            <div class="col-lg-9">
                <div class="card border-0 shadow mb-4 ">
                    <form action="{{route('update-job', $job->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card-body card-form p-4">
                            <h3 class="fs-4 mb-1">Edit Job Details</h3>

                            @if(session('message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('message') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="" class="mb-2">Role<span class="req">*</span></label>
                                    <input type="text" placeholder="Job Title" id="title" name="role" class="form-control" value="{{$job->role}}">
                                </div>
                                <div class="col-md-6  mb-4">
                                    <label for="" class="mb-2">Category<span class="req">*</span></label>
                                    <select name="category" id="category" class="form-select">
                                        <option {{$job->category == 'Engineering'  ? 'selected' : ''}}>Engineering</option>
                                        <option {{$job->category == 'Software Developement'  ? 'selected' : ''}}>Software Developement</option>
                                        <option {{$job->category == 'Information Technology'  ? 'selected' : ''}}>Information Technology</option>
                                        <option {{$job->category == 'Web Developement'  ? 'selected' : ''}}>Web Developement</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="" class="mb-2">Job Type<span class="req">*</span></label>
                                    <select name="job_type" class="form-select">
                                        <option {{$job->job_type == 'Full Time'  ? 'selected' : ''}}>Full Time</option>
                                        <option {{$job->job_type == 'Part Time'  ? 'selected' : ''}}>Part Time</option>
                                        <option {{$job->job_type == 'Remote'  ? 'selected' : ''}}>Remote</option>
                                        <option {{$job->job_type == 'Freelance'  ? 'selected' : ''}}>Freelance</option>
                                    </select>
                                </div>
                                <div class="mb-4 col-md-6">
                                    <label for="" class="mb-2">Location<span class="req">*</span></label>
                                    <input type="text" placeholder="location" id="location" name="location" class="form-control" value="{{$job->location}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-4 col-md-6">
                                    <label for="" class="mb-2">Salary (monthly)</label>
                                    <input type="text" placeholder="Salary" id="salary" name="salary" class="form-control" value="{{$job->salary}}">
                                </div>

                                <div class="mb-4 col-md-6">
                                    <label for="" class="mb-2">Key Skills<span class="req">*</span></label>
                                    <input type="text" placeholder="skills" id="location" name="skills" class="form-control" value="{{$job->skills}}">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="" class="mb-2">Description<span class="req">*</span></label>
                                <textarea class="form-control" name="description" id="description" cols="5" rows="5" placeholder="Description">{{$job->description}}</textarea>
                            </div>
                            <div class="mb-4">
                                <label for="" class="mb-2">Qualifications</label>
                                <textarea class="form-control" name="qualification" id="qualifications" cols="5" rows="5" placeholder="Qualifications">{{$job->qualification}}</textarea>
                            </div>

                            <h3 class="fs-4 mb-1 mt-5 border-top pt-5">Company Details</h3>

                            <div class="row">
                                <div class="mb-4 col-md-6">
                                    <label for="" class="mb-2">Name<span class="req">*</span></label>
                                    <input type="text" placeholder="Company Name" id="company_name" name="company" class="form-control" value="{{$job->company}}">
                                </div>

                                <div class="mb-4 col-md-6">
                                    <label for="" class="mb-2">Website (Social Media)</label>
                                    <input type="text" placeholder="Enter URL" id="website" name="company_website" class="form-control" value="{{$job->company_website}}">
                                </div>
                            </div>
                        </div> 
                        <div class="card-footer  p-4">
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div> 
                    </form>
                </div>              
            </div>
            
        </div>
    </div>
</section>

@include('layouts.partials.user_avatar')


@endsection