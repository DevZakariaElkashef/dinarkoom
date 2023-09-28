
@extends('dashboard.layouts.app')

@section('style')
@endsection

@section('breadcrumb')
<nav class="breadcrumb-one" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route("dashboard.index") }}">{{ __("Dashboard") }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route("users.index") }}">{{ __("Banner") }}</a></li>
        <li class="breadcrumb-item active" aria-current="page"><span>{{ __("view") }}</span></li>
    </ol>
</nav>
@endsection


@section('content')
    <div class="card mt-3">
        <div class="card-header ">
            <div class="p-2 row justify-content-between">
                <h4>{{ __("Banners") }}</h4>
            </div>
        </div>
        <div class="card-body">


            <div class="row">
                <div class="col-md-6 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img style="max-height: 300px; width: 100%" id="rightPreview" src="{{ $rightImage ? Storage::url($rightImage->image) : asset('site/assets/img/header-sides.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title text-center">{{ __("Right_Image") }}</h5>
                            
                            <form action="@if($rightImage) {{ route('banners.update', $rightImage) }} @else {{ route('banners.update', 0) }} @endif" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="dir" value="0">
                                <input onchange="RightPreviewImage(this)" type="file" name="right_image">
                                <input type="text" class="form-control mt-2" name="url" placeholder="{{ __("URL") }}" value="{{ $rightImage ? $rightImage->url : '' }}">
                                @error('right_image')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <button class="btn btn-primary mt-3" type="submit">@if($leftImage) {{ __("Update") }} @else {{ __("Add") }} @endif</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img style="max-height: 300px; width: 100%" id="leftPreview" src="{{ $leftImage ? Storage::url($leftImage->image) : asset('site/assets/img/header-sides.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title text-center">{{ __("Left_Image") }}</h5>
                            
                            <form action="@if($leftImage) {{ route('banners.update', $leftImage) }} @else {{ route('banners.update', 0) }} @endif" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="dir" value="1">
                                <input type="file" onchange="leftPreviewImage(this)" name="left_image">
                                <input type="text" class="form-control mt-2" name="url" placeholder="{{ __("URL") }}" value="{{ $leftImage ? $leftImage->url : '' }}">
                                @error('left_image')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <button class="btn btn-primary mt-3" type="submit">@if($leftImage) {{ __("Update") }} @else {{ __("Add") }} @endif</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection


@section('script')
    <script>

    function leftPreviewImage(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
          document.getElementById('leftPreview').setAttribute('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
      }
    }
    
    function RightPreviewImage(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
          document.getElementById('rightPreview').setAttribute('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
      }
    }

    </script>

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