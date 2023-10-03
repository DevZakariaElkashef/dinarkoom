@extends('site.layouts.app')

@section('content')
    <div class="my-3 text-light">
        <h1 class="text-center">My Orders</h1>

        <div class="container">
            
            @foreach ($orders as $order)
                <div class="order row align-items-center mb-5">
                    <div class="col-md-3">
                        <img src="{{ Storage::url($order->image->thumbnail) }}" alt="">
                    </div>
                    <div class="col-md-6">
                        <h3 class="mb-4">Order: #{{ $order->id }}</h3>
                        <p class="mb-4">Date: {{ $order->created_at->format('y-m-d h:i:s') }}</p>
                        @if($order->relative)
                        <p class="mb-4">Purchased For: {{ $order->relative->type->name }}</p>
                        <p class="mb-4">Relative: {{ $order->relative->name }}</p>
                        @else 
                        <p class="mb-4">Purchased For: Myself</p>
                        @endif
                        <p class="mb-4">Address: 20 fake street</p>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end align-items-center">
                        <a href="#" class="btn btn-primary">Extract Invoice</a>
                    </div>
                </div>
            @endforeach
            
        </div>
    </div>
@endsection