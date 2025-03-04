@extends('layouts.master')

@section('title', 'All Jobs')

@section('content')

<section class="section-3 py-5 bg-2">
    <div class="container">     
        <div class="row">

            <div class="col-6 col-md-10">
                <h2>Find Jobs:</h2>  
            </div>

            <div class="col-6 col-md-2">
                <div class="align-end">
                    @include('components.job_sort_form')
                </div>
            </div>

        </div>

        <div class="row pt-5">
            @include('components.all_jobs_sidebar')

            <div class="col-md-8 col-lg-9">
                <div class="job_listing_area">

                    <div id="job-results" class="job_lists">
                        @include('components.job_list')
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
        let timer;

        function fetchResults() {
            $.ajax({
                url: '{{ route("search") }}',
                type: 'GET',
                data: $('#search-form').serialize() + '&sort=' + $('#sort').val(),
                success: function(response) {
                    $('#job-results').fadeOut(200, function() {
                        $(this).html(response).fadeIn(200);
                    });
                },
                error: function(xhr) {
                    console.error('AJAX request failed', xhr);
                }
            });
        }

        $('#search-form input, #search-form select, #sort').on('input change', function() {
            clearTimeout(timer);
            timer = setTimeout(fetchResults, 400);
        });

    });
</script>
@endsection



