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
                <h1>Terms and Conditions</h1>
                <h3>Dear : @auth {{ Auth::user()->name }} @endauth</h3>
                <div class="terms-content">
                    @if($content) {!! $content !!} @else <h2 class="text-center text-muted mt-5">Add Your Text</h2> @endif
                </div>
            </div>
        </section>
        
@endsection