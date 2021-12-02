<div class="container-fluid">
    <div class="row no-gutters">
        <header class="blog-header">
            <div class="row nav-scroller py-1 ">
                <nav class=" d-flex blog-header-list justify-content-start">
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
            <div class="row">
                <div class="col-10 text-start">
                    <a class="blog-header-logo text-dark" href="{{ route('home') }}">
                        RedditClone
                    </a>
                </div>
                <div class="col-2 d-flex justify-content-center align-items-center">
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