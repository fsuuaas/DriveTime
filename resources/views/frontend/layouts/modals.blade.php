<div class="modal fade" id="exampleModalToggle" aria-hidden="true"
     tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="content-re-lo">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="title">Register</div>
                <div class="register-form">
                    <div class="respond-register-form">
                        <form method="POST" action="{{ route('register') }}" class="comment-form form-submit" accept-charset="utf-8"
                              novalidate="novalidate">
                            @csrf
                            <fieldset>
                                <label>Name</label>
                                <input type="text" class="tb-my-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </fieldset>
                            <fieldset>
                                <label>Email Address</label>
                                <input type="email" class="tb-my-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </fieldset>
                            <fieldset>
                                <label>Password</label>
                                <input type="password" class="input-form password-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </fieldset>
                            <fieldset>
                                <label>Confirm password</label>
                                <input type="password" class="input-form password-input" placeholder="Confirm password" name="password_confirmation" required autocomplete="new-password">
                            </fieldset>
                            <button class="sc-button" name="submit" type="submit">
                                <span>Register</span>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="text-box text-center mt-30">Allready have an account? <a class="color-popup "
                                                                                     data-bs-target="#exampleModalToggle2" data-bs-toggle="modal"
                                                                                     data-bs-dismiss="modal">Login</a></div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true"
     tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="content-re-lo">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="title">Login</div>
                <div class="register-form">
                    <div class="respond-register-form">
                        <form method="POST" action="{{ route('login') }}" class="comment-form form-submit" accept-charset="utf-8">
                            @csrf
                            <fieldset>
                                <label>Email</label>
                                <input type="email" id="email" class="tb-my-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email or user name">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </fieldset>
                            <fieldset>
                                <label>Password</label>
                                <input type="password" class="input-form password-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Your password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </fieldset>
                            <div class="title-forgot t-al-right mb-20">
                                <a class="t-al-right" data-bs-target="#exampleModalToggle3" data-bs-toggle="modal" data-bs-dismiss="modal">Forgot password</a>
                            </div>
                            <button class="sc-button" name="submit" type="submit">
                                <span>Login</span>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="text-box text-center mt-30">Don’t you have an account? <a class="color-popup"
                                                                                      data-bs-target="#exampleModalToggle" data-bs-toggle="modal"
                                                                                      data-bs-dismiss="modal">Register</a></div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalToggle3" aria-hidden="true"
     tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="content-re-lo">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="title">Forgot your password?</div>
                <div class="register-form">
                    <div class="respond-register-form">
                        <form method="post" class="comment-form form-submit" action="#" accept-charset="utf-8">

                            <fieldset>
                                <label>Password</label>
                                <input type="password" class="input-form password-input"
                                       placeholder="Your password">
                            </fieldset>
                            <button class="sc-button" name="submit" type="submit">
                                <span>Get new password</span>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="text-box text-center mt-30"><a class="color-popup" data-bs-target="#exampleModalToggle2"
                                                           data-bs-toggle="modal" data-bs-dismiss="modal">Back to Login</a></div>
            </div>

        </div>
    </div>
</div>
