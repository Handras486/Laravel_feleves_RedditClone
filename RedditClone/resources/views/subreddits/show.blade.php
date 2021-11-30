@extends('layouts.main')

@section('content')
<img class="" src="{{ $subreddit->bg_image }}" width="1000" height="100" alt="{{ $subreddit->name }}">
<h1 class="text-center mb-5">{{ $subreddit->name }}</h1>
<div class="row">
    <div class="col-10">
        @foreach($posts as $post)
            @include('posts._item')
        @endforeach
        {{ $posts->links() }}
    </div>
    <div class="col-2 d-flex justify-content-center align-items-baseline">
        @auth
        @csrf
            <a class="btn btn-sm btn-secondary" href="{{ route('post.create') }}">
                {{ __('Submit a new post') }}
            </a>
        @else
            <a class="btn btn-sm btn-secondary disabled" href="{{ route('post.create') }}">
                {{ __('Submit a new post') }}
            </a>
        @endauth
        <div>
            {!! $subreddit->sidebar !!}
            asdASD
        </div>
    </div>
</div>
@endsection