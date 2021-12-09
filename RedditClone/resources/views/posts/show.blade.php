@extends('layouts.main')

@section('content')
<div class="flex-container">
    <div class="d-flex flex-row align-items-center"> 
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
            <a href="{{ route('post.details', $post) }}"><h1>{{ $post->title }}</h1></a>
            <div class="">
                <a>submitted {{ $post->created_at->diffForHumans() }} by</a>
                <a href="#">{{ $post->author->name }}</a>
                <a>to</a>
                <a href="{{ route('subreddit.details', $post->subreddit) }}">{{ $post->subreddit->name }}</a>
            </div>
            <div class="bg-light">
                {!! $post->content !!}
            </div>
            <div class="d-flex flex-row">
                <div class="px-2">
                    <a href="{{ route('post.details', $post) }}">{{ $post->comments()->count()}}+ comments</a>
                    <a href="{{ route('post.edit', $post) }}">edit</a>
                </div>
                <div class="">
                    <form action="{{ route('post.delete', $post) }}" method="POST">
                        @csrf
                        <input type="submit" value="delete"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
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