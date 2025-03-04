@extends('layouts.master')

@section('title', 'Add Education')

@section('content')

<!-- Success Message -->
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card border-0 shadow mb-4">

    <form action="{{route('add-education')}}" method="POST">

        @csrf
        @method('POST')
        <div class="card-body p-4">
            <h3 class="fs-4 mb-1 mt-3">Add Education</h3>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-4">
                        <label for="college" class="mb-2">College*</label>
                        <input type="text" name="college" id="college" placeholder="Enter College" class="form-control" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-4">
                        <label for="degree" class="mb-2">Degree*</label>
                        <input type="text" name="degree" id="degree" placeholder="Enter Degree" class="form-control" value="">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-4">
                        <label for="grades" class="mb-2">Grades*</label>
                        <input type="text" name="grades" id="grades" placeholder="Enter Grades" class="form-control" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-4">
                        <label for="skills_learned" class="mb-2">Skills Learned</label>
                        <input type="text" name="skills_learned" id="skills_learned" placeholder="Enter Skills Learned" class="form-control" value="">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-4">
                        <label for="start" class="mb-2">Start*</label>
                        <input type="date" name="start" id="start" placeholder="Enter Start Year" class="form-control" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-4">
                        <label for="end" class="mb-2">End*</label>
                        <input type="date" name="end" id="end" placeholder="Enter End Year" class="form-control" value="">
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer p-4">
            <input type="hidden" name="user_id" value="{{ $user->id}}">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>

@endsection