            <!-- Register/Login Modal -->
            <div class="modal fade" id="{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered"  role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="{{ $title }}">{{__( $title )}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </div>
                        @if ($id == "registerModal")
                        <form action="{{ route('auth.register') }}" method="POST">
                            <div class="modal-body">
                                @csrf
                                <div class="mb-3">
                                    <x-form.input name="name" label="{{ __('Full name') }}" />
                                </div>
                                <div class="mb-3">
                                    <x-form.input name="email" label="{{ __('Email address') }}" />
                                </div>
                                <div class="mb-3">
                                    <x-form.input name="password" type="password" label="{{ __('Password') }}" />
                                </div>
                                <div class="mb-3">
                                    <x-form.input name="password" type="password_confirmation" label="{{ __('Password confirmation') }}" />
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
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                                <button type="submit" class="btn btn-primary">{{ __('Sign Up') }}</button>
                            </div>
                        </form>
                        @elseif ($id == "loginModal")
                        <form action="{{ route('auth.login') }}" method="POST">
                            <div class="modal-body">
                                @csrf
                                <div class="mb-3">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input type="text" class="form-control" name="email">
                                </div>
                                <div class="mb-3">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="remember_me" id="remember_me">
                                        <label class="form-check-label" for="remember_me">{{ __('Remember me') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                                <button type="submit" class="btn btn-primary">{{ __('Sign in') }}</button>
                            </div>
                        </form>
                        @endif
                        </div>
                    </div>
            </div>