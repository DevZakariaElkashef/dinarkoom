@extends('site.layouts.app')

@section('content')
    <div class="row justify-content-center bg-dark mt-5 py-5">
        <div class="col-md-8">
            <div class="card bg-dark text-light">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body text-center">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-flex justify-content-center" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary p-2 mt-2  ">{{ __('click here to request another') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
