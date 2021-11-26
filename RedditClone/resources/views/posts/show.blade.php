@extends('layouts.main')

@section('content')
<form action="{{ route('post.vote', $post) }}" method="POST">
    @csrf
    <input type="submit" name="type" value="True" />     
</form>
<a>{{ $post->score()}}</a>
<form action="{{ route('post.vote', $post) }}" method="POST">
    @csrf
    <input type="submit" name="type" value="False" />     
</form>
<h1 class="display-1">{{ $post->title }}</h1>
<p> {{ $post->score() }}|{{ $post->author->name }} | {{ $post->subreddit->name }} | {{ $post->updated_at->diffForHumans() }}</p>
<div>
    {!! $post->content !!}
</div>
<div class="row">
    <div class="col-md-8 col-lg-6 mx-auto">
        <p>
            {{ __('Responses') }}
        </p>
        @auth
            <form class="mb-5" action="{{ route('post.comment', $post) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <textarea class="form-control" name="comment" placeholder="{{ __('Comment text...') }}"></textarea>
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary btn-lg" type="submit">
                        {{ __('Comment') }}
                    </button>
                </div>
            </form>
        @endauth
        @foreach ($post->comments as $comment)
            @include('comments._item')
        @endforeach
    </div>
</div>
@endsection