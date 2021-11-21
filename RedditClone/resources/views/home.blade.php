@extends('layouts.main')

@section('content')
<div class="row no-gutters">
    <div class="row flex-nowrap">
        <div class="col-11 d-flex justify-content-start">
            Postok itt
        </div>
        <div class="col-1 d-flex justify-content-end">
            @auth
                <a class="btn btn-sm btn-secondary" href="{{ route('post.create') }}">
                    {{ __('Submit a new post') }}
                </a>
            @else
                <a class="btn btn-sm btn-secondary disabled" href="{{ route('post.create') }}">
                    {{ __('Submit a new post') }}
                </a>
            @endauth
        </div>
    </div> 
</div>
@endsection

