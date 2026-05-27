@extends('layouts.master')

@section('title', 'Edit Certification')

@section('content')

<!-- Success Message -->
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card border-0 shadow mb-4">

    <form action="{{route('update-certification', $certification->id)}}" method="POST">

        @csrf
        @method('PUT')
        
        <div class="card-body p-4">
           
            <h3 class="fs-4 mb-1 mt-3">Edit Your Certification</h3>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-4">
                        <label for="name" class="mb-2">Certification*</label>
                        <input type="text" name="name" id="name" placeholder="Enter Certification" class="form-control" value="{{$certification->name}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-4">
                        <label for="institution" class="mb-2">Issuing Authority*</label>
                        <input type="text" name="institution" id="institution" placeholder="Enter Issuing Authority" class="form-control" value="{{$certification->institution}}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-4">
                        <label for="grade" class="mb-2">Grade*</label>
                        <input type="text" name="grade" id="grade" placeholder="Enter Grade" class="form-control" value="{{$certification->grade}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-4">
                        <label for="year" class="mb-2">Year Obtained*</label>
                        <input type="date" name="year" id="year" class="form-control" value="{{$certification->year}}">
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="mb-4">
                        <label for="duration" class="mb-2">Duration*</label>
                        <input type="text" name="duration" id="duration" placeholder="Enter Duration" class="form-control" value="{{$certification->duration}}">
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer p-4">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>

@endsection