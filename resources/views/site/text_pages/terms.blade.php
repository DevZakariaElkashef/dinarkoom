@extends('site.layouts.app')
@section('style')
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        .terms-content {
            margin-top: 20px;
        }
    </style>
@endsection
@section('content')
    <!-- Contact section-->
    <section class="bg-dark text-light py-5" style="min-height: 90vh;">
        <div class="container px-5 my-5 px-5">
            <h1>{{ __("Terms and Conditions") }}</h1>
            <h3>{{ __("Dear") }} : @auth {{ Auth::user()->name }} @endauth @if (auth('guest')->check())
                    {{ auth('guest')->user()->name }}
                @endif
            </h3>
            <div class="terms-content">
                @if ($content)
                    {!! $content !!}
                @else
                    <h2 class="text-center text-muted mt-5">{{ __("Add Your Text") }}</h2>
                @endif
            </div>
        </div>

        @if(!$orderedThisMonth)
        <div class="text-center">
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#showRelativeModal">{{ __("Buy Now") }}</a>
        </div>
        @endif
        
        @if($canDownload)
        <div class="text-center">
            <a download href="{{ $image ? Storage::url($image->thumbnail) : asset('site/assets/img/header-sides.jpg') }}" class="btn btn-primary" >{{ __("Download") }}</a>
        </div>
        @endif

        <!-- Modal -->
        <div class="modal fade" id="showRelativeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __("Order Now") }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('order.store') }}" method="post">
                        @csrf
                        <div class="modal-body">


                            

                            @auth('guest')
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" value="{{ old('name') }}" name="name" id="userName" type="text" placeholder="{{ __("User name") }}" data-sb-validations="required" />
                                <label class="text-dark" for="userName">{{ __("Name as in Civil ID") }}</label>
                                @error('name')
                                    <div class="text-danger" >{{ $message }}</div>
                                @enderror

                            </div>
                            <!-- Civil no input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" value="{{ old('civil_id') }}" name="civil_id" id="IdNubmer" type="text" placeholder="{{ __("Already have an account?") }} " data-sb-validations="required" />
                                <label class="text-dark" for="IdNubmer">{{ __("Already have an account?") }} </label>
                                @error('civil_id')
                                    <div class="text-danger" >{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- MObile no input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" value="{{ old('phone') }}" name="phone" id="mobile1" type="text" placeholder="{{ __("Phone") }} " data-sb-validations="required" />
                                <label class="text-dark" for="mobile1">{{ __("Phone") }} </label>
                                @error('phone')
                                    <div class="text-danger" >{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- MObile no input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" value="{{ old("addition_phone") }}" name="addition_phone" id="mobile2" type="text" placeholder="{{ __("Addition_Phone") }} " data-sb-validations="required" />
                                <label class="text-dark" for="mobile2">{{ __("Addition_Phone") }} </label>
                                @error('addition_phone')
                                    <div class="text-danger" >{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" value="email" name="email" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                <label class="text-dark" for="email">{{ __("Email Address") }}</label>
                                @error('email')
                                    <div class="text-danger" >{{ $message }}</div>
                                @enderror
                            </div>
                            @else
                            <div class="form-group">
                                <label class="text-dark" for="civil_id" class="text-dark">{{ __("Buyer") }}</label>
                                <select name="civil_id" class="form-control">
                                    <option selected disabled>{{ __("Choose buyer") }}</option>
                                    <option value="@if(auth()->check()) {{ auth()->user()->civil_id }} @endif  @if(auth('guest')->check()) {{ auth('guest')->user()->civil_id }} @endif">{{ __("For myself") }}</option>
                                    @if (auth()->check() && auth()->user()->relatives)
                                        <option disabled>{{ __("Relatives") }}</option>
                                        @foreach (auth()->user()->relatives as $relative)
                                            <option value="{{ $relative->civil_id }}">{{ $relative->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            @endauth

                            <div class="mt-3" >
                                <label class="text-dark">
                                    <input name="terms" value="0" type="checkbox"> I agree to the terms and conditions
                                    @error('terms')
                                        <div class="text-danger" >{{ $message }}</div>
                                    @enderror
                                </label>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" class="btn btn-primary" >{{ __("Order") }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
@endsection
