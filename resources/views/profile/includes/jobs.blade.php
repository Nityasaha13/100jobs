<div class="card border-0">
    <div class="card-body card-form">

        <div class="table-responsive">
            <table class="table ">
                <thead class="bg-light">
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Company</th>
                        <th scope="col">Location</th>
                    </tr>
                </thead>
                <tbody class="border-0">
                    @foreach($user->jobs as $job)
                        <tr class="active">
                            <td>
                                <div class="job-name fw-500"><a href="{{route('single-job',$job->id)}}">{{$job->role}}</a></div>
                            </td>
                            <td>{{$job->company}}</td>
                            <td>{{$job->location}}</td>
                        </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
    </div>
</div>