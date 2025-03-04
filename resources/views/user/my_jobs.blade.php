@extends('layouts.master')

@section('title', 'Saved Jobs')

@section('content')

{{-- <h2 class="text-center">Welcome! {{ Auth::user()->name }}</h2> --}}

<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">My Jobs</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">

            @include('layouts.partials.profile_sidebar')

            <div class="col-lg-9">
                <div class="card border-0 shadow mb-4 p-3">
                    <div class="card-body card-form">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="fs-4 mb-1">Your Posted Jobs</h3>
                            </div>
                            <div style="margin-top: -10px;">
                                <a href="{{route('post-job')}}" class="btn btn-primary">Post a Job</a>
                            </div>
                            
                        </div>
                        <div class="table-responsive">
                            <table class="table ">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Company</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Candidates Applied</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="border-0">
                                    @foreach($user->jobs as $job)
                                        <tr class="active">
                                            <td>
                                                <div class="job-name fw-500">{{$job->role}}</div>
                                            </td>
                                            <td>{{$job->company}}</td>
                                            <td>{{$job->location}}</td>
                                            <td><a href="{{route('candidates',$job->id)}}">{{count($job->appliedusers)}} Applicants</a></td>
                                            
                                            <td>
                                                <div class="action-dots">
                                                    <a href="#" class="" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="{{route('single-job',$job->id)}}"> <i class="fa fa-eye" aria-hidden="true"></i> View</a></li>
                                                        <li><a class="dropdown-item" href="{{route('edit-job', $job->id)}}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></li>
                                                        <li><a class="dropdown-item" href="{{route('delete-job', $job->id)}}"><i class="fa fa-trash" aria-hidden="true"></i> Remove</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</section>

@include('layouts.partials.user_avatar')


@endsection