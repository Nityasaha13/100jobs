<div class="col-lg-3">
    <div class="card border-0 shadow mb-4 p-3">
        <div class="s-body text-center mt-3">
            <img src="{{route('home')}}/storage/{{$user->avatar ?? '/avatars/avatar7.png'}}" alt="avatar"  class="rounded-circle img-fluid" style="width: 150px; height:150px">
            <h5 class="mt-3 pb-0">{{ $user->name }}</h5>
            <p class="text-muted mb-1 fs-6">{{ $user->bio }}</p>
            <div class="d-flex justify-content-center mb-2">
                <button data-bs-toggle="modal" data-bs-target="#avatarModal" type="button" class="btn btn-primary">Change Profile Picture</button>
            </div>
        </div>
    </div>
    <div class="card account-nav border-0 shadow mb-4 mb-lg-0">
        <div class="card-body p-0">
            <ul class="list-group list-group-flush ">
                <li class="list-group-item d-flex justify-content-between p-3">
                    <a href="{{ route('profile') }}">Profile Settings</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <a href="{{ route('post-job') }}">Post a Job</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <a href="{{ route('my-jobs') }}">My Jobs</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <a href="{{ route('applied-jobs') }}">Jobs Applied</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <a href="{{ route('saved-jobs') }}">Saved Jobs</a>
                </li>                                                        
            </ul>
        </div>
    </div>
</div>