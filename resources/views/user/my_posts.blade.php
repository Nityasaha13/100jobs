@extends('layouts.master')

@section('title', 'Your Posts')

@section('content')

{{-- <h2 class="text-center">Welcome! {{ Auth::user()->name }}</h2> --}}

<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('profile') }}">Profile</a></li>
                        <li class="breadcrumb-item active">Your Posts</li>
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
                                <h3 class="fs-4 mb-1">Your Activity</h3>
                            </div>
                            <div style="margin-top: -10px;">
                                <a href="{{route('write-post')}}" class="btn btn-primary">Write a Post</a>
                            </div>
                            
                        </div>
                        <div class="table-responsive">

                            @if(session('message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('message') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if(count($user->posts) > 0)
                            <table class="table ">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Caption</th>
                                        <th scope="col">Posted On</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="border-0">
                                    @foreach($user->posts as $post)
                                        <tr class="active">
                                            <td>
                                                <div class="job-name fw-500">{{$post->title}}</div>
                                            </td>
                                            <td>{{ Str::limit($post->caption, 60) }}</td>
                                            <td>{{ $post->created_at->format('M d, Y') }}</td>

                                            <td>
                                                <div class="action-dots">
                                                    <a href="#" class="" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="{{route('single-post',$post)}}"> <i class="fa fa-eye" aria-hidden="true"></i> View</a></li>
                                                        <li><a class="dropdown-item" href="{{route('edit-post', $post)}}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></li>
                                                        <li><a class="dropdown-item" href="{{route('delete-post', $post)}}"><i class="fa fa-trash" aria-hidden="true"></i> Remove</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            @else
                                <p class="text-muted mb-0 py-3">You haven't written any posts yet.</p>
                            @endif
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</section>

@include('layouts.partials.user_avatar')


@endsection