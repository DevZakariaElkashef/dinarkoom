@extends('site.layouts.app')
@section('content')
    
        
    <!-- Contact section-->
    <section class="bg-dark text-light py-2">
        <div class="container px-5 my-5 px-5">
            <div class="text-center mb-5">
                <h2 class="fw-bolder">{{ __("Profile") }}</h2>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <form id="contactForm" data-sb-form-api-token="API_TOKEN" class="text-dark" action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" value="{{ Auth::user()->name ?? '' }}" name="name" id="userName" type="text" placeholder="{{ __("User name") }}" data-sb-validations="required" />
                            <label for="userName">{{ __('Name as in Civil ID') }}</label>
                            @error('name')
                                <div class="text-danger" >{{ $message }}</div>
                            @enderror

                        </div>
                        <!-- Civil no input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" value="{{ Auth::user()->civil_id ?? '' }}" name="civil_id" id="IdNubmer" type="text" placeholder="{{ __("Civil ID number") }} " data-sb-validations="required" />
                            <label for="IdNubmer">{{ __("Civil ID number") }} </label>
                            @error('civil_id')
                                <div class="text-danger" >{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- MObile no input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" value="{{ Auth::user()->phone ?? '' }}" name="phone" id="mobile1" type="text" placeholder="{{ __("Phone") }} " data-sb-validations="required" />
                            <label for="mobile1">{{ __("Phone") }} </label>
                            @error('phone')
                                <div class="text-danger" >{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- MObile no input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" value="{{ Auth::user()->addition_phone }}" name="addition_phone" id="mobile2" type="text" placeholder="{{ __("Addition_Phone") }} " data-sb-validations="required" />
                            <label for="mobile2">{{ __("Addition_Phone") }} </label>
                            @error('addition_phone')
                                <div class="text-danger" >{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" value="{{ Auth::user()->email }}" name="email" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                            <label for="email">{{ __("Email") }}</label>
                            @error('email')
                                <div class="text-danger" >{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Submit error message-->
                        <!---->
                        <!-- Submit Button-->
                        <div class="d-grid"><button type="submit" class="btn btn-primary btn-lg" id="submitButton" type="submit">{{ __('Update') }}</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
        
@endsection