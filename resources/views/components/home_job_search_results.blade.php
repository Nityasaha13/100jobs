@if($jobs->count())
    @foreach($jobs as $job)
        <div class="job-item results">
            <a href = {{route('single-job', $job->id)}}>
                <h5>{{ $job->role }}</h5>
            </a>
        </div>
    @endforeach
    <div class="job-item view-alljobs">
        <a href={{route('jobs')}}>View All Vacancies</a>
    </div>
@else
    <div class="job-item results none">
        <h5>No jobs found.</h5>
    </div>
    <div class="job-item view-alljobs">
        <a href={{route('jobs')}}>View All Vacancies</a>
    </div>
@endif