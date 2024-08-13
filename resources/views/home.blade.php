@extends('layouts.master')

@section('title')
    Home
@endsection

@section('banner')
    <section class="section-0 lazy d-flex bg-image-style dark align-items-center "   class="" data-bg="storage/images/banner5.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-8">
                    <h1>Find your dream job</h1>
                    <p>Thounsands of jobs available.</p>
                    <div class="banner-btn mt-5"><a href="{{route('jobs')}}" class="btn btn-primary mb-4 mb-sm-0">Explore Now</a></div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('content')
    
    <section class="section-1 py-5"> 
        <div class="container">
            <form id="home-search-form" action="{{ route('home-search') }}" method="GET">
                <div class="card border-0 shadow p-5">
                    <div class="row">
                        <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                            <input type="text" class="form-control" name="keywords" id="search-keywords" placeholder="Keywords">
                        </div>
                        <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                            <input type="text" class="form-control" name="location" id="search-location" placeholder="Location">
                        </div>
                        <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                            <select name="category" id="category" class="form-select">
                                <option value="">Select a Category</option>
                                <option value="Software Engineering">Software Engineering</option>
                                <option value="Software Development">Software Development</option>
                                <option value="Information Technology">Information Technology</option>
                                <option value="Web Development">Web Development</option>
                                <option value="System Engineer">System Engineer</option>
                                <option value="DevOps">DevOps</option>
                            </select>
                        </div>
                        
                        <div class="col-md-3 mb-xs-3 mb-sm-3 mb-lg-0">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-block">Search</button>
                            </div>                        
                        </div>
                    </div>            
                </div>
            </form>
        </div>
        
        <div class="section-results"> 
            <div class="container">
                <div id="search-results" class="card border-0 shadow" style="display:none">
                    <!-- Search results will be injected here -->
                </div>
            </div>
        </div>
    </section>
    
    
    <section class="section-2 bg-2 py-5">
        <div class="container">
            <h2>Popular Categories</h2>
            <div class="row pt-5">
                @foreach($categories as $category)
                    <div class="col-lg-4 col-xl-3 col-md-6">
                        <div class="single_catagory">
                            <a href="{{ route('search') }}">
                                <h4 class="pb-2">{{ $category->category }}</h4>
                            </a>
                            <p class="mb-0"> <span>{{ $category->job_count }}</span> Available positions</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
    {{-- <section class="section-3  py-5">
        <div class="container">
            <h2>Featured Jobs</h2>
            <div class="row pt-5">
                <div class="job_listing_area">                    
                    <div class="job_lists">
                        <div class="row">
                            @foreach($jobs as $job)
                            <div class="col-md-4">
                                <div class="card border-0 p-3 shadow mb-4">
                                    <div class="card-body">
                                        <h3 class="border-0 fs-5 pb-2 mb-0">{{$job->role}}</h3>
                                        <p>{{ Str::words($job->description, 15, '...') }}</p>
                                        <div class="bg-light p-3 border">
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                <span class="ps-1">{{$job->location}}</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                <span class="ps-1">{{$job->job_type}}</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-inr"></i></span>
                                                <span class="ps-1">{{$job->salary}}</span>
                                            </p>
                                        </div>

                                        <div class="d-grid mt-3">
                                            <a href="{{route('single-job',$job->id)}}" class="btn btn-primary btn-lg">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach 
                                                     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    
    <section class="section-3 bg-2 py-5">
        <div class="container">
            <h2>Latest Jobs</h2>
            <div class="row pt-5">
                <div class="job_listing_area">                    
                    <div class="job_lists">
                        <div class="row">
                            @foreach($jobs as $job)
                            <div class="col-md-4">
                                <div class="card border-0 p-3 shadow mb-4">
                                    <div class="card-body">
                                        <h3 class="border-0 fs-5 pb-2 mb-0">{{$job->role}}</h3>
                                        <p>{{ Str::words($job->description, 15, '...') }}</p>
                                        <div class="bg-light p-3 border">
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                <span class="ps-1">{{$job->location}}</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                <span class="ps-1">{{$job->job_type}}</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-inr"></i></span>
                                                <span class="ps-1">{{$job->salary}}</span>
                                            </p>
                                        </div>

                                        <div class="d-grid mt-3">
                                            <a href="{{route('single-job',$job->id)}}" class="btn btn-primary btn-lg">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach                                                   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
@endsection


@section('scripts')
<script>
    $(document).ready(function() {
        $('#home-search-form').on('submit', function(e) {
            e.preventDefault();
            
            $.ajax({
                url: $(this).attr('action'),
                method: 'GET',
                data: $(this).serialize(), 
                success: function(response) {
                    $('#search-results').html(response).show();
                },
                error: function(xhr) {
                    $('#search-results').html('<p>An error occurred while processing your request.</p>').show();
                }
            });
        });
    });
</script>
@endsection