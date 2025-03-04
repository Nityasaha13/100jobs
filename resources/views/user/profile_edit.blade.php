
@extends('layouts.master')

@section('title', 'Edit Profile')

@section('content')

<!-- Success Message -->
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card border-0 shadow mb-4">
    <form action="{{ route('update-profile') }}" method="post" enctype="multipart/form-data">

        @csrf
        @method('put')

        <div class="card-body p-4">
            <h3 class="fs-4 mb-1">Edit Profile</h3>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label for="name" class="mb-2">Name*</label>
                    <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control" value="{{ $user->name }}">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="email" class="mb-2">Email*</label>
                    <input type="email" name="email" id="email" placeholder="Enter Email" class="form-control" value="{{ $user->email }}">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="contact" class="mb-2">Contact No*</label>
                    <input type="text" name="contact" id="contact" placeholder="Contact" class="form-control" value="{{ $user->contact }}">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="bio" class="mb-2">Bio*</label>
                    <input type="text" name="bio" id="bio" placeholder="Bio" class="form-control" value="{{ $user->bio }}">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="key_skills" class="mb-2">Key Skills*</label>
                    <input type="text" name="key_skills" id="key_skills" placeholder="Key Skills" class="form-control" value="{{ $user->key_skills }}">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="city" class="mb-2">City*</label>
                    <input type="text" name="city" id="city" placeholder="City" class="form-control" value="{{ $user->city }}">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="country" class="mb-2">Country*</label>
                    <input type="text" name="country" id="country" placeholder="Country" class="form-control" value="{{ $user->country }}">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="resume" class="mb-2">Resume*</label>
                    <input type="file" name="resume" id="resume" class="form-control">
                </div>
                @if ($user->resume)
                <div class="col-md-6 mb-4">
                    <label for="resume_link" class="mb-2">Your Current Resume</label>
                    <a href="{{ asset('storage/' . $user->resume) }}" target="_blank" class="form-control">View</a>
                </div>
                @endif
            </div>
        </div>
        <div class="card-footer p-4">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>

@endsection