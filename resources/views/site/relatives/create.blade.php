@extends('site.layouts.app')
@section('content')
    
<div class="container">
    <div class="row text-light">
        <div class="col-md-6"><h3>{{ __("Relatives") }}</h3></div>
        <div class="col-md-6 @if(app()->getLocale() == 'ar' || app()->getLocale() == 'ur') text-start @else text-end @endif">
            <a href="{{ route('relatives.index') }}" class="btn btn-secondary px-4">
                {{ __("Back") }}
            </a>
        </div>
    </div>
</div>
        
    <!-- Contact section-->
    <section class="bg-dark text-light py-2">
        <div class="container px-5 my-5 px-5">
            <div class="text-center mb-5">
                <h2 class="fw-bolder">{{ __("Add Relative") }}</h2>
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
                    <form id="contactForm" data-sb-form-api-token="API_TOKEN" class="text-dark" action="{{ route('relatives.store') }}" method="POST">
                        @csrf
                        <!-- Name input-->
                        <div class="form-group mb-3">
                            {{-- <label for="relative_type_id">Relative Type</label> --}}
                            <select class="form-control py-3" value="{{ old('relative_type_id') }}" name="relative_type_id" id="relative_type_id" data-sb-validations="required">
                                <option selected disabled>{{ __("Choose Relation type") }}</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->{'name_' . app()->getLocale()} }}</option>
                                @endforeach
                            </select>
                            @error('relative_type_id')
                                <div class="text-danger" >{{ $message }}</div>
                            @enderror

                        </div>
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
                            <input class="form-control" value="{{ old('phone') }}" name="phone" id="mobile1" type="text" placeholder="{{ __("Phone") }}" data-sb-validations="required" />
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
                            <label for="email">{{ __("Email") }}</label>
                            @error('email')
                                <div class="text-danger" >{{ $message }}</div>
                            @enderror
                        </div>
                        <!---->
                        <div class="d-grid"><button type="submit" class="btn btn-primary btn-lg" id="submitButton" type="submit">{{ __('Submit') }}</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
        
@endsection