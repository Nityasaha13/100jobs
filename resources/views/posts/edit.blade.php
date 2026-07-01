@extends('layouts.master')

@section('title', 'Edit Post')

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
                        <li class="breadcrumb-item"><a href="{{ route('my-posts') }}">My Posts</a></li>
                        <li class="breadcrumb-item active">Edit Post</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">

            @include('layouts.partials.profile_sidebar')

            <div class="col-lg-9">
                <div class="card border-0 shadow mb-4 ">
                    <form action="{{route('update-post', $post)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card-body card-form p-4">
                            <h3 class="fs-4 mb-1">Edit Post Details</h3>

                            @if(session('message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('message') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="mb-4">
                                <label for="title" class="mb-2">Title<span class="req">*</span></label>
                                <input type="text" placeholder="Post Title" id="title" name="title" class="form-control" value="{{ old('title', $post->title) }}">
                            </div>

                            <div class="mb-4">
                                <label for="caption" class="mb-2">Caption</label>
                                <input type="text" placeholder="A short caption" id="caption" name="caption" class="form-control" value="{{ old('caption', $post->caption) }}">
                            </div>

                            <div class="mb-4">
                                <label for="thumbnail" class="mb-2">Thumbnail</label>
                                @if($post->thumbnail)
                                    <div class="mb-2">
                                        <img src="{{route('home')}}/storage/{{$post->thumbnail}}" alt="thumbnail" style="max-width: 200px; border-radius: 6px;">
                                    </div>
                                @endif
                                <input type="file" id="thumbnail" name="thumbnail" class="form-control" accept="image/*">
                                <small class="text-muted">Leave empty to keep the current image.</small>
                            </div>

                            <div class="mb-4">
                                <label for="content" class="mb-2">Content<span class="req">*</span></label>
                                <textarea class="form-control" name="content" id="content" cols="5" rows="10" placeholder="Write your post...">{{ old('content', $post->content) }}</textarea>
                            </div>
                        </div>
                        <div class="card-footer  p-4">
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
