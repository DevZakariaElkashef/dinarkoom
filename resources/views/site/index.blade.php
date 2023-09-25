@extends('site.layouts.app')
@section('content')
    
    <!-- Header-->
    <header class="bg-dark py-4">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-12">
                    <div class="text-center my-3">
                        <div class="row">
                            <div class="col-md-4 hide-on-mobile"><img src="{{ asset('site/assets/img/header-sides.jpg') }}" alt=""></div>
                            <div class="col-md-4 header-circle-div">
                                <img src="{{ asset('site/assets/img/header.gif') }}" alt="" style="width: 100%;">
                                <div class="header-circle-text">
                                    <h4 class="text-light">Prize of the month</h4>
                                    <h1>100</h1>
                                    <h4>KD</h4>
                                </div>
                            </div>
                            <div class="col-md-4"><img src="{{ asset('site/assets/img/header-sides.jpg') }}" alt=""></div>
                        </div>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                            <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
        
        
        