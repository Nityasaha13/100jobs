@extends('layouts.master')

@section('content')

<!-- Success Message -->
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card border-0 shadow mb-4">

    <form action="{{route('add-experience')}}" method="POST">

        @csrf
        @method('POST')
        <div class="card-body p-4">
            
            <h3 class="fs-4 mb-1 mt-3">Add Experience</h3>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-4">
                        <label for="name" class="mb-2">Company*</label>
                        <input type="text" name="company" id="name" placeholder="Enter Company Name" class="form-control" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-4">
                        <label for="role" class="mb-2">Role*</label>
                        <input type="text" name="role" id="role" placeholder="Enter Your Role" class="form-control" value="">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-4">
                        <label for="start" class="mb-2">Start*</label>
                        <input type="date" name="start" id="start" placeholder="Enter Start Date" class="form-control" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-4">
                        <label for="end" class="mb-2">Last Date (leave if currently working)</label>
                        <input type="date" name="end" id="end" class="form-control" value="">
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="mb-4">
                        <label for="skills_gained" class="mb-2">Skills Gained*</label>
                        <input type="text" name="skills_gained" id="skills_gained" placeholder="Enter Skills" class="form-control" value="">
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer p-4">
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>

@endsection