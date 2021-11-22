<div class="container-fluid">
    <div class="row no-gutters">
        <header class="blog-header">
            <div class="row nav-scroller py-1 ">
                <nav class="nav d-flex justify-content-start">
                    <a class="p-2 link-secondary" href="{{ route('home') }}">Home</a>
                    <a class="p-2 link-secondary" href="{{ route('subreddit.details', $subreddits->random()) }}">Random</a>
                    <div class="vr"></div>
                    @foreach($subreddits as $subreddit)
                    <a href="{{ route('subreddit.details', $subreddit) }}" class="p-2 link-secondary">
                        {{ $subreddit->name }}
                    </a>
                    @endforeach
                </nav>
            </div>
            <div class="row" style="background-color:#E4EDF9">
                <div class="col-10 text-start">
                    <a class="blog-header-logo text-dark" href="{{ route('home') }}">
                        RedditClone
                    </a>
                </div>
                <div class="col-2 d-flex justify-content-center align-items-center">
                    <a class="link-secondary" href="#" aria-label="Search">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"></circle><path d="M21 21l-5.2-5.2"></path></svg>
                    </a>
                    @auth
                        {{ Auth::user()->name }}
                        <form action="{{ route('auth.logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-sm btn-link" type="submit">
                                {{ __('Sign out') }}
                            </button>
                        </form>
                    @else
                        <a class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#loginModal">
                            {{ __('Sign in') }}
                        </a>
                        <x-modal id="loginModal" title="Sign In"></x-modal>

                        <a type="button" class="btn btn-sm btn-success ms-2" data-bs-toggle="modal" data-bs-target="#registerModal">
                            {{ __('Sign up') }}
                        </a>
                        <x-modal id="registerModal" title="Sign Up"></x-modal>
                    @endauth
                </div>
            </div>
        </header>
    </div>
</div>