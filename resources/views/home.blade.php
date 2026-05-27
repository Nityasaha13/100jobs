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
        
        <div class="section-results" id="section-results"> 
            <div class="container">
                <div id="search-results" class="card border-0" style="display:none">
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
                            <a href="{{ route('jobs') }}">
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
            <h2>New Jobs</h2>
            <div class="row pt-5">
                <div class="job_listing_area">                    
                    <div class="job_lists">
                        @include('components.job_list')
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    
    <section class="section-3 bg-2 py-5">
        <div class="container">
            <h2>Featured Jobs</h2>
            <div class="row pt-5">
                <div class="job_listing_area">                    
                    <div class="job_lists">
                        @include('components.job_list')                       
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

            // Add loader SVG before making the AJAX request
            var loaderSvg = '<div class="text-center py-3 job-search"><svg class="loader" width="40px" height="40px" viewBox="0 0 50 50"><circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle></svg></div>';
            $('#search-results').html(loaderSvg).show();

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

        // Close the search results div when clicking outside of the container
        $(document).mouseup(function(e) {
            var container = $("#search-results");

            if (!container.is(e.target) && container.has(e.target).length === 0) {
                $('#search-results').hide();
            }
        });

        function searchJobs() {
            var keywords = $('#search-keywords').val();
            var location = $('#search-location').val();
            var category = $('#category').val();

            // Add loader SVG before making the AJAX request
            var loaderSvg = '<div class="text-center py-3 job-search"><svg class="loader" width="40px" height="40px" viewBox="0 0 50 50"><circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle></svg></div>';
            $('#search-results').html(loaderSvg).show();

            $.ajax({
                url: '{{ route('home-search') }}',
                method: 'GET',
                data: {
                    keywords: keywords,
                    location: location,
                    category: category
                },
                success: function(response) {
                    $('#search-results').html(response).show();
                },
                error: function(xhr) {
                    $('#search-results').html('<p>An error occurred while processing your request.</p>').show();
                }
            });
        }

        // Trigger search on form submission
        $('#search-keywords,#search-location').on('keyup', function(e) {
            searchJobs();   
        });

        // Trigger search on category change
        $('#category').on('change', function() {
            searchJobs(); 
        });

    });
</script>
@endsection