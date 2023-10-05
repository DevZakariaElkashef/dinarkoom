@extends('site.layouts.app')
@section('content')
    
        
    <!-- Contact section-->
    <section class="bg-dark text-light py-2">
        <div class="container px-5 my-5 px-5">
            <div class="text-center mb-5">
                <h2 class="fw-bolder">{{ __("Continue As Guest") }}</h2>
                <p class="lead mb-0">{{ __("Already have an account?") }} <a class="text-primary" href="{{ route('login') }}">{{ __("Login Now!") }}</a></p>
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
                    <form id="contactForm" data-sb-form-api-token="API_TOKEN" class="text-dark" action="{{ route('guest.store') }}" method="POST">
                        @csrf
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" value="{{ old('name') }}" name="name" id="userName" type="text" placeholder="{{ __("User name") }}" data-sb-validations="required" />
                            <label for="userName">{{ __("Name as in Civil ID") }}</label>
                            @error('name')
                                <div class="text-danger" >{{ $message }}</div>
                            @enderror

                        </div>
                        <!-- Civil no input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" value="{{ old('civil_id') }}" name="civil_id" id="IdNubmer" type="text" placeholder="{{ __("Civil ID number") }} " data-sb-validations="required" />
                            <label for="IdNubmer">{{ __("Civil ID number") }} </label>
                            @error('civil_id')
                                <div class="text-danger" >{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- MObile no input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" value="{{ old('phone') }}" name="phone" id="mobile1" type="text" placeholder="{{ __("Phone") }} " data-sb-validations="required" />
                            <label for="mobile1">{{ __("Phone") }} </label>
                            @error('phone')
                                <div class="text-danger" >{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- MObile no input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" value="{{ old("addition_phone") }}" name="addition_phone" id="mobile2" type="text" placeholder="{{ __("Addition_Phone") }} " data-sb-validations="required" />
                            <label for="mobile2">{{ __("Addition_Phone") }} </label>
                            @error('addition_phone')
                                <div class="text-danger" >{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" value="email" name="email" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                            <label for="email">{{ __("Email Address") }}</label>
                            @error('email')
                                <div class="text-danger" >{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <!---->
                        <!-- Submit Button-->
                        <div class="d-grid"><button type="submit" class="btn btn-primary btn-lg" id="submitButton" type="submit">{{ __('Submit') }}</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
        
@endsection