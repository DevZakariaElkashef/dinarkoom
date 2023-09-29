@extends('site.layouts.app')
@section('content')
    
        
        <!-- Contact section-->
        
        <section class="bg-dark text-light py-5" style="min-height: 90vh;">
            <div class="container px-5 my-5 py-5">
                {!! $content !!}
            </div>
        </section>
            
        
@endsection