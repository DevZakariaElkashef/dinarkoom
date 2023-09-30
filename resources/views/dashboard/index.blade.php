@extends('dashboard.layouts.app')

@section('breadcrumb')
<nav class="breadcrumb-one" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route("dashboard.index") }}">{{ __("Dashboard") }}</a></li>
        <li class="breadcrumb-item active" aria-current="page"><span>{{ __("home") }}</span></li>
    </ol>
</nav>
@endsection


@section('content')
    

<div class="row mt-5">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                <h3>{{ $users }}</h3>
                <p class="card-text">Users</p>
            </div>
            
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                <h3>{{ $messages }}</h3>
                <p class="card-text">Messages</p>
            </div>
            
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                <h3>100</h3>
                <p class="card-text">Winners</p>
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