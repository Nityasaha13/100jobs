<div class="row">
    @if($posts->isNotEmpty())
        @foreach($posts as $post)
            <div class="col-md-4 d-flex align-items-stretch">
                <div class="card border-0 shadow mb-4 w-100 d-flex flex-column">
                    @if($post->thumbnail)
                        <a href="{{route('single-post', $post)}}">
                            <img src="{{route('home')}}/storage/{{$post->thumbnail}}" class="card-img-top" alt="{{ $post->title }}" style="height: 200px; object-fit: cover;">
                        </a>
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h3 class="border-0 fs-5 pb-2 mb-0">{{ $post->title }}</h3>

                        @if($post->caption)
                            <p class="text-muted mb-2">{{ Str::limit($post->caption, 80) }}</p>
                        @endif

                        <p>{{ Str::words($post->content, 20, '...') }}</p>

                        <div class="d-flex align-items-center mt-2 small text-muted">
                            <span>{{ optional($post->user)->name }}</span>
                            <span class="ms-auto">{{ $post->created_at->format('M d, Y') }}</span>
                        </div>

                        <!-- Spacer div to push the button to the bottom -->
                        <div class="mt-auto">
                            <div class="d-grid mt-3">
                                <a href="{{route('single-post', $post)}}" class="btn btn-primary btn-lg">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p>No posts found</p>
    @endif
</div>
