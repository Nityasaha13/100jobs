<div class="card border-0">

    <div class="card-body p-4">
        
        @if(Auth::check())
            <div class="header-section" style="margin:10px 0px; text-align:right">
                <a href="{{route('profile')}}" class="btn btn-primary">Edit Profile</a>
            </div>
        @endif
        <h3 class="fs-4 mb-1">My Profile</h3>
        <div class="row">
            <div class="col-md-6 mb-1">
                <label for="name" class="mb-2">Name: {{ $user->name }}</label>
            </div>
            <div class="col-md-6 mb-1">
                <label for="email" class="mb-2">Email: {{ $user->email }}</label>
            </div>
            <div class="col-md-6 mb-1">
                <label for="contact" class="mb-2">Contact No: {{ $user->contact }}</label>
            </div>
            <div class="col-md-6 mb-1">
                <label for="bio" class="mb-2">Bio : {{ $user->bio }}</label>
            </div>
            <div class="col-md-6 mb-1">
                <label for="city" class="mb-2">City: {{ $user->city }}</label>
            </div>
            <div class="col-md-6 mb-1">
                <label for="country" class="mb-2">Country: {{ $user->country }}</label>
            </div>
            <div class="col-md-6 mb-1">
                <label for="country" class="mb-2">Key Skills: {{ $user->key_skills }}</label>
            </div>
            @if ($user->resume)
            <div class="col-md-6 mb-1">
                <a href="{{ asset('storage/' . $user->resume) }}" target="_blank" class="resume"><i class="fa fa-file" aria-hidden="true"></i> View Resume</a>
            </div>
            @endif
        </div>
    </div>

    <div class="card-body p-4">
        
        <h3 class="fs-4">Certifications</h3>
        @if ($user->certifications->isNotEmpty())
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Certification</th>
                        <th>Issuing Authority</th>
                        <th>Grade</th>
                        <th>Year Obtained</th>
                        <th>Duration</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->certifications as $certification)
                        <tr>
                            <td>{{ $certification->name }}</td>
                            <td>{{ $certification->institution }}</td>
                            <td>{{ $certification->grade }}</td>
                            <td>{{ $certification->year }}</td>
                            <td>{{ $certification->duration }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
            <p>No certifications found.</p>
        @endif
        
    </div>

    <div class="card-body p-4">
        <h3 class="fs-4">Education History</h3>
        @if ($user->educations->isNotEmpty())
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>College</th>
                        <th>Degree</th>
                        <th>Grade</th>
                        <th>Skills Learned</th>
                        <th>Start</th>
                        <th>End</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->educations as $education)
                        <tr>
                            <td>{{ $education->college }}</td>
                            <td>{{ $education->degree }}</td>
                            <td>{{ $education->grades }}</td>
                            <td>{{ $education->skills_learned }}</td>
                            <td>{{ $education->start }}</td>
                            <td>{{ $education->end }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
            <p>No education history found.</p>
        @endif

    </div>

    <div class="card-body p-4">
            
        <h3 class="fs-4">Experience</h3>
        @if ($user->experiences->isNotEmpty())
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Company</th>
                        <th>Role</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Skills</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->experiences as $experience)
                        <tr>
                            <td>{{ $experience->company }}</td>
                            <td>{{ $experience->role }}</td>
                            <td>{{ $experience->start }}</td>
                            <td>{{ $experience->end }}</td>
                            <td>{{ $experience->skills_gained }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
            <p>No certifications found.</p>
        @endif

    </div>

</div>