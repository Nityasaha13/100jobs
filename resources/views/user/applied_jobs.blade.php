@extends('layouts.master')

@section('title', 'Applied Jobs')

@section('content')

{{-- <h2 class="text-center">Welcome! {{ Auth::user()->name }}</h2> --}}

<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Jobs Applied </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">

            @include('layouts.partials.profile_sidebar')

            <div class="col-lg-9">
                <div class="card border-0 shadow mb-4 p-3">
                    <div class="card-body card-form">
                        <h3 class="fs-4 mb-1">Jobs You Applied On</h3>
                        <div class="table-responsive">
                            <table class="table ">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">Role</th>
                                        <th scope="col">Company</th>
                                        <th scope="col">Applied At</th>
                                        <th scope="col">View Job</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="border-0">
                                    @foreach($jobs->userappliedjobs as $job)

                                        <tr class="active">
                                            <td>
                                                <div class="job-name fw-500">{{$job->role}}</div>
                                            </td>
                                            <td>{{$job->company}}</td>
                                            <td>{{$job->location}}</td>
                                            <td><a href="{{route('single-job',$job->id)}}"> <i class="fa fa-eye" aria-hidden="true"></i> View Job</a></td>
                                            
                                            <td>
                                                <div class="action-dots">
                                                    <a href="#" class="" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="{{ asset('storage/' . $user->resume) }}"> <i class="fa fa-eye" aria-hidden="true"></i> View Resume</a></li>
                                                        <li><a class="dropdown-item" href="{{route('remove-appliedjob',$job->id)}}"><i class="fa fa-trash" aria-hidden="true"></i> Withdraw Application</a></li>
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