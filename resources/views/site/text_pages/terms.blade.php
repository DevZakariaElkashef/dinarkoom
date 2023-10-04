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

        <div class="text-center">
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#showRelativeModal">{{ __("Buy Now") }}</a>
        </div>

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

                            <div class="form-group">
                                <label for="civil_id" class="text-dark">{{ __("Buyer") }}</label>
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
