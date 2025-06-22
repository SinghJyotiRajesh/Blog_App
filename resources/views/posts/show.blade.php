<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    @if($post->featured_image)
                        <img src="{{ asset('images/posts/' . $post->featured_image) }}" class="card-img-top" alt="{{ $post->title }}">
                    @endif
                    <div class="card-body">
                        <h1 class="card-title">{{ $post->title }}</h1>
                        <div class="text-muted mb-3">
                            By {{ $post->author_name }} | Published {{ $post->created_at->format('M d, Y') }}
                        </div>
                        
                        <div class="card-text mb-4">
                            <h5>{{ $post->short_description }}</h5>
                        </div>

                        <div class="card-text mb-4">
                            {!! nl2br(e($post->content)) !!}
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
                            <div>
                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Edit Post</a>
                                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete Post</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>