@extends('layouts.master')

@section('title') User - Dashboard @endsection

@section('content')

{{-- <h2 class="text-center">Welcome! {{ $user->name }}</h2> --}}

<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Account Settings</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">

            @include('layouts.partials.profile_sidebar')

            <div class="col-lg-9">
                <div class="card border-0 shadow mb-4">

                    <div class="card-body p-4">
                        <h3 class="fs-4 mb-1">My Profile</h3>
                        <div class="row">
                            <div class="col-md-6 mb-1">
                                <label for="name" class="mb-2">Name: {{ $user->name }}</label>
                            </div>
                            <div class="col-md-6 mb-1">
                                <label for="email" class="mb-2">Email: {{ $user->email }}</label>
                            </div>
                            <div class="col-md-6 mb-1">
                                <label for="contact" class="mb-2">Contact No: {{ $user->contact }}</label>
                            </div>
                            <div class="col-md-6 mb-1">
                                <label for="bio" class="mb-2">Bio : {{ $user->bio }}</label>
                            </div>
                            <div class="col-md-6 mb-1">
                                <label for="city" class="mb-2">City: {{ $user->city }}</label>
                            </div>
                            <div class="col-md-6 mb-1">
                                <label for="country" class="mb-2">Country: {{ $user->country }}</label>
                            </div>
                            <div class="col-md-6 mb-1">
                                <label for="country" class="mb-2">Key Skills: {{ $user->key_skills }}</label>
                            </div>
                            @if ($user->resume)
                            <div class="col-md-6 mb-1">
                                <a href="{{ asset('storage/' . $user->resume) }}" target="_blank" class="resume"><i class="fa fa-file" aria-hidden="true"></i> View Resume</a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer p-4">
                        <a href="{{route('edit-profile', $user->id)}}"><button type="submit" class="btn btn-primary">Edit Profile</button></a>
                    </div>
                    
                </div>


                <!-- Experience Section -->
                @include('experience.index')

                <!-- Education Section -->
                @include('education.index') 

                <!-- Certifications Section -->
                @include('certification.index')  


                {{-- <div class="card border-0 shadow mb-4">
                    <div class="card-body p-4">
                        <h3 class="fs-4 mb-1">Change Password</h3>
                        <div class="mb-4">
                            <label for="old_password" class="mb-2">Old Password*</label>
                            <input type="password" name="old_password" id="old_password" placeholder="Old Password" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="new_password" class="mb-2">New Password*</label>
                            <input type="password" name="new_password" id="new_password" placeholder="New Password" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="confirm_password" class="mb-2">Confirm Password*</label>
                            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" class="form-control">
                        </div>                        
                    </div>
                    <div class="card-footer p-4">
                        <button type="button" class="btn btn-primary">Update</button>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>

</section>

@include('layouts.partials.user_avatar')

@endsection
