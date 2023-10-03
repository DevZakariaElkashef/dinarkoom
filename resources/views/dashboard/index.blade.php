@extends('dashboard.layouts.app')

@section('breadcrumb')
<nav class="breadcrumb-one" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route("dashboard.index") }}">{{ __("Dashboard") }}</a></li>
        <li class="breadcrumb-item active" aria-current="page"><span>{{ __("home") }}</span></li>
    </ol>
</nav>
@endsection

@section('style')
<link href="{{ asset("dashboard/". app()->getLocale() ."/plugins/apex/apexcharts.css") }}" rel="stylesheet" type="text/css">
<link href="{{ asset("dashboard/". app()->getLocale() ."/assets/css/dashboard/dash_2.css") }}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
    

<div class="row mt-5">

    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
        <div class="widget widget-card-four">
            <div class="widget-content">
                <div class="w-content">
                    <div class="w-info">
                        <h6 class="value">{{ $users }}</h6>
                        <p class="">Users</p>
                    </div>
                    <div class="">
                        <div class="w-icon">
                            <i class="fa-solid fa-users mt-1"></i>
                        </div>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
        <div class="widget widget-card-four">
            <div class="widget-content">
                <div class="w-content">
                    <div class="w-info">
                        <h6 class="value">{{ $messages }}</h6>
                        <p class="">Messages</p>
                    </div>
                    <div class="">
                        <div class="w-icon">
                            <i class="fa-solid fa-message mt-1"></i>
                        </div>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
        <div class="widget widget-card-four">
            <div class="widget-content">
                <div class="w-content">
                    <div class="w-info">
                        <h6 class="value">{{ $orders }}</h6>
                        <p class="">Orders</p>
                    </div>
                    <div class="">
                        <div class="w-icon">
                            <i class="fa-solid fa-cart-shopping mt-1"></i>
                        </div>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    
</div>


@endsection


@section('script')
    @if(session('message'))
        <script>
            Snackbar.show({
                text: '{{ session("message") }}',
                pos: 'top-right',
                duration: 5000,
            });
        </script>
    @endif
@endsection