@extends('site.layouts.app')
@section('content')

<!-- Contact section-->
    <section class="bg-dark text-light py-1">
        <div class="container px-5 my-1 px-5 py-3">
            <div class="text-center mb-5">
                <h2 class="fw-bolder">{{ __('Login') }}</h2>
                <p class="lead mb-0">{{ __("Don't have an account yet?") }} <a class="text-primary" href="{{ route("register") }}">{{ __("Register Now!") }}</a></p>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- * * SB Forms Contact Form * *-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- This form is pre-integrated with SB Forms.-->
                    <!-- To make this form functional, sign up at-->
                    <!-- https://startbootstrap.com/solution/contact-forms-->
                    <!-- to get an API token!-->
                    <form id="contactForm" data-sb-form-api-token="API_TOKEN" class="text-dark" action="{{ route('login') }}" method="POST">
                        @csrf
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" name="email" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" value="{{ old('email') }}" />
                            <label for="email">{{ __("Email Address") }}</label>
                            @error('email')
                                <div class="text-danger" >{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Password input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" name="password" id="password" type="password" placeholder="{{ __("Enter your password") }}" data-sb-validations="required" />
                            <label for="password">{{ __("Password") }}</label>
                            @error('password')
                                <div class="text-danger" >{{ $message }}</div>
                            @enderror
                        </div>
                        <label  class="text-light mb-1 d-flex justify-content-between">
                            <div class="">
                                <input type="checkbox" checked="checked" name="remember"> {{ __("Remember Me") }}
                            </div>
                            <div class="">
                                <a class="text-light" href="{{ route('password.request') }}">{{ __("Forgot Your Password?") }}</a>
                            </div>
                        </label>
                        <!-- Submit error message-->
                        <!-- Submit Button-->
                        <div class="d-grid mt-2"><button type="submit" class="btn btn-primary btn-lg" id="submitButton" type="submit">{{ __("Submit") }}</button></div>
                        <div class="d-grid mt-2"><a href="{{ route("guest.register") }}" class="btn btn-secondary btn-lg">{{ __("Continue As Guest") }}</a></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
        
@endsection