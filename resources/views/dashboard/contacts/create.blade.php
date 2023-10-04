@extends('dashboard.layouts.app')


@section('breadcrumb')
<nav class="breadcrumb-one" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route("dashboard.index") }}">{{ __("Dashboard") }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route("images.index") }}">{{ __("Messages") }}</a></li>
        <li class="breadcrumb-item active" aria-current="page"><span>{{ __("Add") }}</span></li>
    </ol>
</nav>
@endsection

@section('content')
<div class="card mt-3">
    <div class="card-header ">
        <div class="p-2 row justify-content-between">
            <h4>{{ __("Add Message") }}</h4>
            
            <a href="{{ route('images.index') }}" class="btn btn-secondary">{{ __("Back") }}</a>
        </div>
    </div>
    <form action="{{ route("images.store") }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group mb-3">
              <div class="mb-3" style="max-height: 300px; max-width: 300px; margin:auto; overflow: hidden;">
                <img style="width: 100%;" id="leftPreview" src="{{ asset('site/assets/img/preview.jpg') }}" class="card-img-top" alt="...">
              </div>
              <div class="custom-file">

                <label class="custom-file-label" for="customFile">Choose file</label>
                <input name="thumbnail" type="file" onchange="leftPreviewImage(this)" class="custom-file-input" id="customFile">
                
                @error('thumbnail')
                <div class="text-danger mt-3">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>

            <div class="form-group mb-3">
              <label for="price">{{ __("Price") }}</label>
              <input id="price" class="form-control" type="number" name="price" value="{{ old('price') }}">
              @error('price')
                <div class="text-danger">
                  {{ $message }}
                </div>
                @enderror
            </div>


            <div class="form-group mb-3">
              <label for="offer">{{ __("Offer") }}</label>
              <input id="offer" class="form-control" type="number" name="offer" value="{{ old('offer') ?? 0 }}">
              @error('offer')
                <div class="text-danger">
                  {{ $message }}
                </div>
                @enderror
            </div>



            <div class="form-group mb-3">
              <label for="month">{{ __("Month") }}</label>
              <select name="month" id="month" class="form-control">
                <option selected disabled>{{ __("Choose..") }}</option>
                @foreach ($months as $monthNumber => $monthName)
                    <option value="{{ $monthNumber }}">{{ __($monthName) }}</option>
                @endforeach
              </select>
              @error('month')
                <div class="text-danger">
                  {{ $message }}
                </div>
                @enderror
            </div>

            

            <div class="form-group mb-3">
              <label for="qty">{{ __("Maximum_number_of_purchases") }}</label>
              <input id="qty" class="form-control" type="number" name="qty" value="{{ old('qty') }}">
              @error('qty')
                <div class="text-danger">
                  {{ $message }}
                </div>
                @enderror
            </div>


            <div class="form-group mb-3">
              <label for="active">{{ __("Status") }}</label>
              <select name="active" id="active" class="form-control">
                <option selected disabled>{{ __("Choose..") }}</option>
                <option value="0">{{ __("Not Active") }}</option>
                <option value="1">{{ __("Active") }}</option>
              </select>
              @error('active')
                <div class="text-danger">
                  {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="card-footer d-flex justify-content-end">
            <button class="btn btn-primary" type="submit">{{ __("Save") }}</button>
        </div>
    </form>
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


