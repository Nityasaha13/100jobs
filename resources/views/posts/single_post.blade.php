@extends('layouts.master')

@section('title')
{{ $post->title }}
@endsection

@section('content')

<section class="section-4 bg-2">
    <div class="container pt-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{route('posts')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp;Back to Feed</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow border-0">
                    @if($post->thumbnail)
                        <img src="{{route('home')}}/storage/{{$post->thumbnail}}" class="card-img-top" alt="{{ $post->title }}" style="max-height: 420px; object-fit: cover;">
                    @endif
                    <div class="card-body p-4">
                        <h1 class="fs-2 mb-2">{{ $post->title }}</h1>

                        @if($post->caption)
                            <p class="text-muted mb-3">{{ $post->caption }}</p>
                        @endif

                        <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                            @if($author)
                                <img src="{{route('home')}}/storage/{{$author->avatar ?? '/avatars/avatar7.png'}}" alt="avatar" class="rounded-circle" style="width:45px; height:45px; object-fit:cover;">
                                <div class="ms-2" style="line-height:1.2em">
                                    <div style="font-weight:600">
                                        <a href="{{route('public-profile', $author->slug)}}" target="_blank">{{ $author->name }}</a>
                                    </div>
                                    <small class="text-muted">{{ $post->created_at->format('M d, Y') }}</small>
                                </div>
                            @else
                                <small class="text-muted">{{ $post->created_at->format('M d, Y') }}</small>
                            @endif
                        </div>

                        <div class="post-content" style="white-space: pre-line;">{{ $post->content }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
