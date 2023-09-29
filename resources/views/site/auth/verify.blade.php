@extends('site.layouts.app')
@section('content')

<!-- Contact section-->
    <section class="bg-dark text-light py-5">
        <div class="container px-5 my-5 px-5 py-5">
            <div class="text-center mb-5">
                <h2 class="fw-bolder">{{ __('Confirm Your Account') }}</h2>
                <p class="lead mb-0">Don't have an account yet? <a class="text-primary" href="{{ route("register") }}">Register Now!</a></p>
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
                        <div class="form-floating mb-3 py-4">
                            <input class="form-control" name="code" id="code" type="text" data-sb-validations="required" value="{{ old('code') }}" />
                            <label for="code">Your Code</label>
                            @error('code')
                                <div class="text-danger" >{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Submit error message-->
                        <!---->
                        <!-- This is what your users will see when there is-->
                        <!-- an error submitting the form-->
                        <div class="d-none" id="submitErrorMessage"><div class="text-center text-primary mb-3">Error sending message!</div></div>
                        <!-- Submit Button-->
                        <div class="d-grid"><button type="submit" class="btn btn-primary btn-lg" id="submitButton" type="submit">Submit</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
        
@endsection