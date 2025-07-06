<div class="card border-0">
    <div class="card-body card-form">
        
        @if(Auth::check())
            <div class="header-section" style="margin:10px 0px; text-align:right">
                <a href="{{route('create-post')}}" class="btn btn-primary">Add Post</a>
            </div>
        @endif

        <h4>Comning soon!</h4>
    </div>
</div>