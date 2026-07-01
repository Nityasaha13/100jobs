@extends('layouts.master')

@section('title', 'Feed')

@section('content')

<section class="section-3 py-5 bg-2">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Latest Posts:</h2>
            </div>
        </div>

        <div class="row pt-5">
            <div class="col-12">
                <div class="post_listing_area">
                    <div id="post-results" class="post_lists">
                        @include('components.posts_list', ['posts' => $posts])
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
