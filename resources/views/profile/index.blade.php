@extends('layouts.master')
@section('title') User @endsection

@section('customstyle')
    @vite(['resources/css/public-profile.css'])
@endsection

@section('content')

<section class="section-2 bg-2 py-5">
    <div class="container">
        <div class="profile-header">
            <div class="profile-img">
                <img src="{{route('home')}}/storage/{{$user->avatar ?? '/avatars/avatar7.png'}}" width="200" alt="Profile Image">
            </div>
            <div class="profile-nav-info">
                <h3 class="user-name">{{$user->name}}</h3>
                <div class="address">
                <p id="state" class="state">{{$user->city}}</p>
                <p id="country" class="country">{{$user->country}}.</p>
                </div>
        
            </div>
            {{-- <div class="profile-option">
                <div class="notification">
                <i class="fa fa-bell"></i>
                <span class="alert-message">3</span>
                </div>
            </div> --}}
        </div>
    
        <div class="main-bd mt-4">
            <div class="left-side col-lg-3">
                <div class="profile-side">
                    <p class="mobile-no"><i class="fa fa-phone"></i>{{$user->contact}}</p>
                    <p class="user-mail"><i class="fa fa-envelope"></i> {{$user->email}}</p>
                    <div class="user-bio">
                    <h3 class="fs-4 pb-0 pt-2">Bio</h3>
                    <p class="bio">
                        {{$user->bio}}
                    </p>
                </div>

                <div class="social-menu">
                    <ul>
                        <li><a href="" target="_blank"><i class="fab fa-github"></i></a></li>
                        <li><a href="" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="" target="_blank"><i class="fa-solid fa-link"></i></a></li>
                    </ul>
                </div>
                </div>
        
            </div>
            <div class="right-side col-lg-8">
        
                <div class="nav">
                    <ul>
                        <li onclick="tabs(0)" class="user-post active">Posts</li>
                        <li onclick="tabs(1)" class="user-review">About</li>
                        <li onclick="tabs(2)" class="user-setting"> Jobs</li>
                    </ul>
                </div>

                <div class="profile-body">
                    <div class="profile-posts tab">
                        @include('profile.includes.posts')
                    </div>

                    <div class="profile-about tab">    
                        @include('profile.includes.about')
                    </div>

                    <div class="profile-jobs tab">
                        <div class="account-setting">
                            @include('profile.includes.jobs')
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
    @vite(['resources/js/public-profile.js'])
@endsection