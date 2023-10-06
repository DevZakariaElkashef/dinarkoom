@extends('site.layouts.app')
@section('content')
    
        
        <!-- Header-->
        <section class="bg-dark text-light py-5">
            <h1 class="text-center">{{__("Winners")}}</h1>
            <div class="text-center" style="width: 60%; margin: auto;">

                <p>{{__("winner of this month")}}</p>
                <a href="#" class="text-light" style="text-decoration: none;">
                    <div class="user d-flex align-items-center justify-content-between">
                        <div class="avatar d-flex align-items-center" style="width: 100px;">
                            <img src="{{ asset('site/assets/img/avatar.png') }}" alt="">
                            <p class="mx-2">{{ $winners->where('status', 1)->first()->user->name }}</p>
                        </div>
                        <div class="">
                            <p class="text-start">{{ $winners->where('status', 1)->first()->value }} KD</p>
                            <p class="text-start">{{ \Carbon\Carbon::createFromFormat('m', $winners->where('status', 1)->first()->month)->locale(app()->getLocale())->format('F') }}</p>
                        </div>
                    </div>
                </a>

                <hr>
                <p></p>
                @foreach ($winners->where('status', '!=', 1) as $winner)
                <a href="#" class="text-light m-2" style="text-decoration: none;">
                    <div class="user d-flex align-items-center justify-content-between">
                        <div class="avatar d-flex align-items-center" style="width: 100px;">
                            <img class="" src="{{ asset('site/assets/img/avatar.png') }}" alt="">
                            <p class="mx-2">{{ $winner->user->name }}</p>
                        </div>
                        <div class="">
                            <p class="text-start">{{ $winner->value != '' ? $winner->value : 0 }} KD</p>
                            <p class="text-start">{{ \Carbon\Carbon::createFromFormat('m', $winner->month)->locale(app()->getLocale())->format('F') }}</p>
                        </div>
                    </div>
                </a>
                @endforeach
                
            </div>
        </section>
        
        
@endsection