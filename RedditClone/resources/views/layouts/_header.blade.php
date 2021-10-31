<div class="container-fluid">
    <div class="row no-gutters">
        <header class="blog-header">
            <div class="row nav-scroller py-1 ">
                <nav class="nav d-flex justify-content-start">
                    <a class="p-2 link-secondary" href="#">Home</a>
                    <a class="p-2 link-secondary" href="#">Random</a>
                    <div class="vr"></div>
                    <a class="p-2 link-secondary" href="#">Design</a>
                    <a class="p-2 link-secondary" href="#">Culture</a>
                    <a class="p-2 link-secondary" href="#">Business</a>
                    <a class="p-2 link-secondary" href="#">Politics</a>
                    <a class="p-2 link-secondary" href="#">Opinion</a>
                    <a class="p-2 link-secondary" href="#">Science</a>
                    <a class="p-2 link-secondary" href="#">Health</a>
                    <a class="p-2 link-secondary" href="#">Style</a>
                    <a class="p-2 link-secondary" href="#">Travel</a>
                </nav>
            </div>
            <div class="row flex-nowrap justify-content-between align-items-center" style="background-color:#E4EDF9">
                <div class="col-10 text-start">
                    <a class="blog-header-logo text-dark" href="{{ route('home') }}">
                        RedditClone
                    </a>
                </div>
                <div class="col-2 d-flex justify-content-center align-items-center">
                    <a class="link-secondary" href="#" aria-label="Search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"></circle><path d="M21 21l-5.2-5.2"></path></svg>
                    <!-- Button trigger modal -->
                    <a type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#registerModal" data-bs-backdrop="static">
                        Sign up
                    </a>
                </div>
            </div>
            <!-- RegisterModal -->
            <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered"  role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="registerModalLabel">{{__('Sign Up')}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </div>
                        <form action="{{ route('auth.register') }}" method="POST">
                            <div class="modal-body">
                                @csrf
                                <div class="mb-3">
                                    <label for="name">{{ __('Full name') }}</label>
                                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="email">{{ __('Email address') }}</label>
                                    <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                                    @if ($errors->has('password'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation">{{ __('Password confirmation') }}</label>
                                    <input type="password" class="form-control" name="password_confirmation">
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input
                                            class="form-check-input{{ $errors->has('terms') ? ' is-invalid' : '' }}"
                                            type="checkbox"
                                            value="1"
                                            name="terms"
                                            id="terms"
                                            {{ old('terms') ? 'checked' : '' }}
                                        >
                                        <label class="form-check-label" for="terms">
                                            Agree to terms and conditions
                                        </label>
                                        @if ($errors->has('terms'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('terms') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Sign up</button>
                            </div>
                        </form>
                        </div>
                    </div>
            </div>
        </header>
    </div>
</div>