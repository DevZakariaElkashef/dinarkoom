@extends('dashboard.layouts.app')
@section('content')
    <div class="mt-3">
        <div class="card">
            <div class="card-header">
                {{ __("Profile") }}
            </div>
            <form action="{{ route('users.update', Auth()->user()->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="editName">{{ __("Name") }}</label>
                        <input name="name" value="{{ Auth::user()->name ?? '' }}" type="text" class="form-control" id="editName">
                        @error('name')
                          <div class="text-danger">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
        
                      <div class="form-group">
                        <label for="email">{{ __("Email") }}</label>
                        <input name="email" value="{{ Auth::user()->email ?? '' }}" type="email" class="form-control" id="email">
                        @error('email')
                          <div class="text-danger">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
        
                      <div class="form-group">
                        <label for="phone">{{ __("Phone") }}</label>
                        <input name="phone" value="{{ Auth::user()->phone ?? '' }}" type="text" class="form-control" id="phone">
                        @error('phone')
                          <div class="text-danger">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
        
                      <div class="form-group">
                        <label for="additionPhone">{{ __("Addition_Phone") }}</label>
                        <input name="addition_phone" value="{{ Auth::user()->addition_phone ?? '' }}" type="text" class="form-control" id="additionPhone">
                        @error('addition_phone')
                          <div class="text-danger">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
        
                      <div class="form-group">
                        <label for="civilId">{{ __("Civil_id") }}</label>
                        <input name="civil_id" value="{{ Auth::user()->civil_id ?? '' }}" type="text" class="form-control" id="civilId">
                        @error('civil_id')
                          <div class="text-danger">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
        
                      <div class="form-group">
                        <label for="password">{{ __("Password") }}</label>
                        <input name="password" type="password" class="form-control" id="password">
                        @error('password')
                          <div class="text-danger">
                            {{ $message }}
                          </div>
                        @enderror
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <button class="btn btn-primary" type="submit">{{ __("Save") }}</button>
                </div>
                </form>
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