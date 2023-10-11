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
    
<div class="row justify-content-center my-4">
    <div class="col-md-12">

        <form action="{{ route('auction.update', $auction->id) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="value">{{ __("Sales") }} {{ __("In this Month") }}</label>
                <input id="value" class="form-control" type="number" name="value" value="{{ $auction ? $auction->value : 0 }}">
            </div>
            <div class="form-group" id="myDiv" @if($auction && $auction->site_discount) style="display: block;" @else style="display: none;" @endif>
                <label for="tax_value">{{ __("Discount value") }}</label>
                <input id="tax_value" class="form-control" type="number" disabled>
            </div>

            <!-- Default switch -->
            <div class="custom-control custom-switch">
                <input type="checkbox" name="site_discount" class="custom-control-input" @if($auction && $auction->site_discount) checked @endif id="customSwitches">
                <label class="custom-control-label" for="customSwitches">{{ __("Do you want to discount the site percentage?") }}</label>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">{{ __("Update") }}</button>
            </div>
        </form>
        
    </div>    
</div>

<div class="row mt-1">

    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
        <div class="widget widget-card-four">
            <div class="widget-content">
                <div class="w-content">
                    <div class="w-info">
                        <h6 class="value">{{ $usersMonth }}</h6>
                        <p class="">{{ __("Users") }} {{ __("In this Month") }}</p>
                        
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
                        <h6 class="value">{{ $messagesMonth }}</h6>
                        <p class="">{{ __("Messages") }} {{ __("In this Month") }}</p>
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
                        <h6 class="value">{{ $messagesMonth }}</h6>
                        <p class="">{{ __('Orders') }} {{ __("In this Month") }}</p>
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
    

    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
        <div class="widget widget-card-four">
            <div class="widget-content">
                <div class="w-content">
                    <div class="w-info">
                        <h6 class="value">{{ $users }}</h6>
                        <p class="">{{ __("all") }} {{ __("Users") }}</p>
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
                        <p class="">{{ __("all") }} {{ __("Messages") }}</p>
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
                        <p class="">{{ __("all") }} {{ __('Orders') }}</p>
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



            $(document).ready(function() {

                let auctionInput = $('#value');

                let discountInput = $('#tax_value');

                let auctionValue = "{{ $auction->value ?? 0 }}";
                
                let discount = "{{ $discountValue }}";
                
                let test = parseFloat(auctionValue)  / (1- (discount / 100));
                test = test.toFixed(2);

                discountInput.val(test);

                let newAuction = auctionValue - (auctionValue * (discount / 100));
                
                let discountValue = auctionValue * (discount / 100);


                let canChange = "{{ $auction->site_discount }}";

                

                $('#customSwitches').change(function() {
                    if ($(this).is(':checked')) {

                        if (canChange == 1) {
                            

                        } else {
                            auctionInput.val(newAuction);
                            discountInput.val(discountValue);
                        }

                        $('#myDiv').show();
                    } else {

                        if (canChange == 1) {

                        } else {
                            auctionInput.val(auctionValue);
                        }

                        $('#myDiv').hide();
                    }
                });
            });
        </script>
    @endif
@endsection