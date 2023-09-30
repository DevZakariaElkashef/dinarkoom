@extends('site.layouts.app')
@section('content')
    
        
        <!-- Contact section-->
        
        <section class="bg-dark text-light py-5" style="min-height: 90vh;">
            <div class="container px-5 my-5 py-5">
                <h2 class="text-center">{{ __("about us") }}</h2>
                @if($content) {!! $content !!} @else <h2 class="text-center text-muted mt-5">Add Your Text</h2> @endif
            </div>
        </section>
            
        
@endsection