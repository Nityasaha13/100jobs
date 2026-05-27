@extends('layouts.master')

@section('title', ' Pofile - Post Job')

@section('content')

{{-- <h2 class="text-center">Welcome! {{ Auth::user()->name }}</h2> --}}

<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Post a Job</li> 
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">

            @include('layouts.partials.profile_sidebar')

            <div class="col-lg-9">
                <div class="card border-0 shadow mb-4 ">
                    <form action="{{route('create-job')}}" method="POST">
                        @csrf
                        @method('POST')

                        <div class="card-body card-form p-4">
                            <h3 class="fs-4 mb-1">Job Details</h3>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="" class="mb-2">Role<span class="req">*</span></label>
                                    <input type="text" placeholder="Job Title" id="title" name="role" class="form-control">
                                </div>
                                <div class="col-md-6  mb-4">
                                    <label for="" class="mb-2">Category<span class="req">*</span></label>
                                    @include('components.job_category_select')
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="" class="mb-2">Job Type<span class="req">*</span></label>
                                    @include('components.job_type_select')
                                </div>
                                <div class="mb-4 col-md-6">
                                    <label for="" class="mb-2">Location<span class="req">*</span></label>
                                    <input type="text" placeholder="location" id="location" name="location" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-4 col-md-6">
                                    <label for="" class="mb-2">Salary (monthly)</label>
                                    <input type="text" placeholder="Salary" id="salary" name="salary" class="form-control">
                                </div>

                                <div class="mb-4 col-md-6">
                                    <label for="" class="mb-2">Key Skills<span class="req">*</span></label>
                                    <input type="text" placeholder="skills" id="location" name="skills" class="form-control">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="" class="mb-2">Description<span class="req">*</span></label>
                                <textarea class="form-control" name="description" id="description" cols="5" rows="5" placeholder="Description"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="" class="mb-2">Qualifications</label>
                                <textarea class="form-control" name="qualification" id="qualifications" cols="5" rows="5" placeholder="Qualifications"></textarea>
                            </div>

                            <h3 class="fs-4 mb-1 mt-5 border-top pt-5">Company Details</h3>

                            <div class="row">
                                <div class="mb-4 col-md-6">
                                    <label for="" class="mb-2">Name<span class="req">*</span></label>
                                    <input type="text" placeholder="Company Name" id="company_name" name="company" class="form-control">
                                </div>

                                <div class="mb-4 col-md-6">
                                    <label for="" class="mb-2">Website (Social Media)</label>
                                    <input type="text" placeholder="Enter URL" id="website" name="company_website" class="form-control">
                                </div>
                            </div>
                        </div> 
                        <div class="card-footer  p-4">
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <button type="submit" class="btn btn-primary">Post Job</button>
                        </div> 
                    </form>
                </div>              
            </div>
            
        </div>
    </div>
</section>

@include('layouts.partials.user_avatar')


@endsection