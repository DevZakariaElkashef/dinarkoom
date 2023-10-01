@extends('site.layouts.app')

@section('style')
    <style>
        .image-to-buy{
            /* position: absolute; */
            /* top: -255px; */
            right: -15px;
        }
    </style>
@endsection

@section('content')
    
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-12">
                    <div class="text-center my-3">
                        <div class="row">
                            <div class="col-md-4 hide-on-mobile">
                                <div class="">
                                    <a href="{{ $leftImage ? $leftImage->url : "" }}">
                                        <img style="height: 481px !important;" class="rounded-4" src="{{ $leftImage ? Storage::url($leftImage->image) : asset('site/assets/img/header-sides.jpg') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            
                            <div class="col-md-4 header-circle-div">
                                <img src="{{ asset('site/assets/img/header.gif') }}" alt="" style="width: 100%;">
                                <div class="header-circle-text">
                                    <p class="header-circle-number">100</p>
                                    <p class="header-circle-currency">KD</p>
                                    <p class="text-light header-circle-sentence">Prize of the month</p>
                                </div>

                                <div class="card  border-0 mb-3 mt-3 text-light image-to-buy" style="max-width: 300px;background: #292929;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img class="rounded-2" src="{{ $image ? Storage::url($image->thumbnail) : asset('site/assets/img/header-sides.jpg') }}" class="img-fluid rounded-start" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">This is a wider card</p>
                                                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="{{ route("terms.index") }}">Buy Now</a>
                                        </div>
                                      </div>
                                    </div>
                                </div>

                            </div>
                            
                            <div class="col-md-4">
                                <div class="">
                                    <a href="{{ $rightImage ? $leftImage->url : "" }}">
                                        <img style="height: 481px !important;" class="rounded-4 w-100" src="{{ $rightImage ? Storage::url($rightImage->image) : asset('site/assets/img/header-sides.jpg') }}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                            
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
        
        
        