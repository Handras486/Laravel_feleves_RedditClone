<div class="flex-container">
    <div class="d-flex flex-row align-items-center"> 
        <div class="m-3 ">
            <a>{{ $loop->index + 1 }}</a>
        </div>
        <div class="d-flex flex-column m-3 align-items-center">
            <form action="{{ route('post.vote', $post) }}" method="POST">
                @csrf
                <input type="submit" name="type" value="True" />     
            </form>
            <a>{{ $post->score}}</a>
            <form action="{{ route('post.vote', $post) }}" method="POST">
                @csrf
                <input type="submit" name="type" value="False" />     
            </form>
        </div>
        <div class="m-3">
            <img class="" src="{{ $post->cover_image }}" width="100" height="100" alt="{{ $post->title }}">
        </div>
        <div class="d-flex flex-column m-3 small">
            <a href="{{ route('post.details', $post) }}"><h4>{{ $post->title }}</h4></a>
            <div class="">
                <a>submitted {{ $post->created_at->diffForHumans() }} by</a>
                <a href="#">{{ $post->author->name }}</a>
                <a>to</a>
                <a href="{{ route('subreddit.details', $post->subreddit) }}">{{ $post->subreddit->name }}</a>
            </div>
            <a href="{{ route('post.details', $post) }}">{{ $post->comments()->count()}} comments</a>
        </div>
    </div>
</div>

