@extends('layouts.main')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="display-4">{{ __('Submit') }}</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('post.create') }}" method="POST">
            @csrf
            <div class="mb-3">
                <x-form.input name="title" label="{{ __('Title') }}" />
            </div>
            <div class="mb-3">
                <label for="subreddit_id">{{ __('Subreddit') }}</label>
                <select name="subreddit_id" class="form-control">
                    <option>{{ __('Please choose a subreddit') }}</option>
                    @foreach($subreddits as $subreddit)
                        <option value="{{ $subreddit->id }}">
                            {{ $subreddit->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="content">{{ __('Content') }}</label>
                <textarea name="content" class="form-control" rows="3"></textarea>
            </div>
            <div>
                <button class="btn btn-primary btn-lg">{{ __('Submit') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection