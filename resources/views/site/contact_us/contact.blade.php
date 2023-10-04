@extends('site.layouts.app')
@section('content')
    
        
        <!-- Contact section-->
        <section class="bg-dark text-light py-2">
            <div class="container px-5 my-5 px-5">
                <div class="text-center mb-5">
                    <h2 class="fw-bolder">{{ __("Get in touch") }}</h2>
                    <p class="lead mb-0">{{ __("We'd love to hear from you") }}</p>
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
                        <form id="contactForm" data-sb-form-api-token="API_TOKEN" class="text-dark" action="{{ route('countact_us.store') }}" method="POST">
                            @csrf

                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" name="name" id="name" type="text" placeholder="{{ __("Enter your name...") }}" data-sb-validations="required" />
                                <label for="name">{{ __("Name") }}</label>
                                @error('name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" name="email" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                <label for="email">{{ __("Email") }}</label>
                                @error('email')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" name="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                                <label for="phone">{{ __("Phone") }}</label>
                                @error('phone')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="message" id="message" type="text" placeholder="{{ __("Enter your message here...") }}" style="height: 10rem" data-sb-validations="required"></textarea>
                                <label for="message">{{ __("Message") }}</label>
                                @error('message')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton" type="submit">{{ __("Submit") }}</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        
@endsection