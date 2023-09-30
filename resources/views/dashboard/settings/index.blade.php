@extends('dashboard.layouts.app')

@section('content')
    <div class="mt-3">
        <div class="card">
            <div class="card-header">
                Setting
            </div>
            <form action="{{ route('settings.update', $setts->id ?? 0) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="main-tab" data-toggle="tab" data-target="#main" type="button" role="tab" aria-controls="main" aria-selected="true">main</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="social-tab" data-toggle="tab" data-target="#social" type="button" role="tab" aria-controls="social" aria-selected="false">social</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="main" role="tabpanel" aria-labelledby="main-tab">
                
                        <div class="row mt-3">

                            <div class="col-md-12">
                                <div class="mb-3" style="max-height: 300px; max-width: 300px; margin:auto; overflow: hidden;">
                                    <img style="width: 100%;"  src="{{ $setts && $setts->logo ?  Storage::url($setts->logo) : asset('site/assets/img/preview.jpg') }}" id="leftPreview" class="card-img-top" alt="...">
                                </div>
                                <div class="custom-file">

                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                    <input name="logo" type="file" onchange="leftPreviewImage(this)" class="custom-file-input" id="customFile">
                                    
                                    @error('logo')
                                    <div class="text-danger mt-3">
                                      {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mt-5">
                                <div class="form-group">
                                    <label for="name">{{ __("Name") }} {{ __("In_english") }}</label>
                                    <input id="name" class="form-control" type="text" name="name_en" value="{{ $setts->name_en ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6 mt-5">
                                <div class="form-group">
                                    <label for="name">{{ __("Name") }} {{ __("In_arabic") }}</label>
                                    <input id="name" class="form-control" type="text" name="name_ar" value="{{ $setts->name_ar ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <label for="name">{{ __("Name") }} {{ __("In_urdo") }}</label>
                                    <input id="name" class="form-control" type="text" name="name_ur" value="{{ $setts->name_ur ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <label for="name">{{ __("Name") }} {{ __("In_filbino") }}</label>
                                    <input id="name" class="form-control" type="text" name="name_fil" value="{{ $setts->name_fil ?? '' }}">
                                </div>
                            </div>
                            
                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <label for="name">{{ __("Description") }} {{ __("In_english") }}</label>
                                    <textarea id="name" class="form-control" type="text" name="description_en">{{ $setts->description_en ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <label for="name">{{ __("Description") }} {{ __("In_arabic") }}</label>
                                    <textarea id="name" class="form-control" type="text" name="description_ar">{{ $setts->description_ar ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <label for="name">{{ __("Description") }} {{ __("In_urdo") }}</label>
                                    <textarea id="name" class="form-control" type="text" name="description_ur">{{ $setts->description_ur ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <label for="name">{{ __("Description") }} {{ __("In_filbino") }}</label>
                                    <textarea id="name" class="form-control" type="text" name="description_fil">{{ $setts->description_fil ?? '' }}</textarea>
                                </div>
                            </div>


                            
                        </div>

                        

                    </div>
                    <div class="tab-pane fade" id="social" role="tabpanel" aria-labelledby="social-tab">

                        <div class="row mt-3">
                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <input id="facebook" class="form-control" type="text" name="facebook" value="{{ $setts->facebook ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                    <label for="whatsapp">whatsapp</label>
                                    <input id="whatsapp" class="form-control" type="text" name="whatsapp" value="{{ $setts->whatsapp ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                    <label for="youtube">youtube</label>
                                    <input id="youtube" class="form-control" type="text" name="youtube" value="{{ $setts->youtube ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                    <label for="linkedin">linkedin</label>
                                    <input id="linkedin" class="form-control" type="text" name="linkedin" value="{{ $setts->linkedin ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                    <label for="twitter">twitter</label>
                                    <input id="twitter" class="form-control" type="text" name="twitter" value="{{ $setts->twitter ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                    <label for="pinterest">pinterest</label>
                                    <input id="pinterest" class="form-control" type="text" name="pinterest" value="{{ $setts->pinterest ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                    <label for="instagram">instagram</label>
                                    <input id="instagram" class="form-control" type="text" name="instagram" value="{{ $setts->instagram ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                    <label for="snapchat">snapchat</label>
                                    <input id="snapchat" class="form-control" type="text" name="snapchat" value="{{ $setts->snapchat ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                    <label for="tiktok">tiktok</label>
                                    <input id="tiktok" class="form-control" type="text" name="tiktok" value="{{ $setts->tiktok ?? '' }}">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                        <div class="row mt-3">
                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input id="phone" class="form-control" type="text" name="phone" value="{{ $setts->phone ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                    <label for="email">email</label>
                                    <input id="email" class="form-control" type="text" name="email" value="{{ $setts->email ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                    <label for="address">address</label>
                                    <input id="address" class="form-control" type="text" name="address" value="{{ $setts->address ?? '' }}">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
       
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
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