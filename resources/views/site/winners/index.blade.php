@extends('site.layouts.app')
@section('content')
    
        
        <!-- Header-->
        <section class="bg-dark text-light py-5">
            <h1 class="text-center">Winners</h1>
            <div class="text-center" style="width: 60%; margin: auto;">

                <p>winner of this month</p>
                <a href="#" class="text-light" style="text-decoration: none;">
                    <div class="user d-flex align-items-center justify-content-between">
                        <div class="avatar d-flex align-items-center" style="width: 100px;">
                            <img src="{{ asset('site/assets/img/avatar.png') }}" alt="">
                            <p class="ms-5">{{ $winners->where('status', 1)->first()->user->name }}</p>
                        </div>
                        <p class="text-start">#1</p>
                    </div>
                </a>

                <hr>
                <p>previous winners</p>
                @foreach ($winners as $winner)
                <a href="#" class="text-light" style="text-decoration: none;">
                    <div class="user d-flex align-items-center justify-content-between">
                        <div class="avatar d-flex align-items-center" style="width: 100px;">
                            <img src="{{ asset('site/assets/img/avatar.png') }}" alt="">
                            <p class="ms-5">{{ $winner->user->name }}</p>
                        </div>
                        <p class="text-start">#{{ $loop->iteration }}</p>
                    </div>
                </a>
                @endforeach
                
            </div>
        </section>
        
        
@endsection