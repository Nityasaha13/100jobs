@extends('layouts.master')

@section('content')

<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Post</li> 
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-9">
                <div class="card border-0 shadow mb-4 ">
                    <form action="{{route('create-post')}}" method="POST">
                        @csrf
                        @method('POST')

                        <div class="card-body card-form p-4">
                            <h3 class="fs-4 mb-1">Job Details</h3>
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label for="" class="mb-2">Title<span class="req">*</span></label>
                                    <input type="text" placeholder="Job Title" id="title" name="role" class="form-control">
                                </div>
                            </div>
                            
                            <div class="row">                                
                                <div class="col-md-12  mb-4">
                                    <label for="" class="mb-2">Content<span class="req">*</span></label>
                                    <textarea class="form-control" name="description" id="description" cols="5" rows="5" placeholder="Description"></textarea>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="" class="mb-2">Photo/Video<span class="req">*</span></label>
                                    <input type="file">
                                </div>
                            </div>
                        </div> 
                        <div class="card-footer  p-4">
                            <input type="hidden" name="user_id" value="">
                            <button type="submit" class="btn btn-primary">Publish</button>
                        </div> 
                    </form>
                </div>              
            </div>
            
        </div>
    </div>
</section>

@endsection