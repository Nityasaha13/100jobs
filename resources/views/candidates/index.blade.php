@extends('layouts.master')

@section('content')

<!-- Success Message -->
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card border-0 shadow mb-4">

    <div class="card-body p-4">
        
        <h3 class="fs-4 mb-1 mt-3">Applied Candidates</h3>
        
        <div class="table-responsive">
            <table class="table ">
                <thead class="bg-light">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Email</th>
                        <th scope="col">Skills</th>
                        <th scope="col">Resume</th>
                    </tr>
                </thead>
                <tbody class="border-0">
                    @if($candidates  && $candidates->count() > 0)
                        @foreach($candidates as $applicant)
                            <tr class="active">
                                <td>
                                    <div class="job-name fw-500"><a href="{{ route('public-profile', $applicant->slug) }}">{{$applicant->name}}</a></div>
                                </td>
                                <td>{{$applicant->contact}}</td>
                                <td>{{$applicant->email}}</td>
                                <td>{{$applicant->key_skills}}</td>
                                <td><a href="/storage/{{$applicant->resume}}"><i class="fa fa-eye" aria-hidden="true"></i> View</a></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center">No one applied for this job.</td>
                        </tr>
                    @endif
                </tbody>
                
            </table>
        </div>

    </div>
</div>

@endsection