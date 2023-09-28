@extends('dashboard.layouts.app')


@section('breadcrumb')
<nav class="breadcrumb-one" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route("dashboard.index") }}">{{ __("Dashboard") }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route("users.index") }}">{{ __("Users") }}</a></li>
        <li class="breadcrumb-item active" aria-current="page"><span>{{ __("Add") }}</span></li>
    </ol>
</nav>
@endsection

@section('content')
<div class="card mt-3">
    <div class="card-header ">
        <div class="p-2 row justify-content-between">
            <h4>{{ __("Add_Users") }}</h4>
            
            <a href="{{ route('users.index') }}" class="btn btn-secondary">{{ __("Back") }}</a>
        </div>
    </div>
    <form action="{{ route("users.store") }}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="editName">{{ __("Name") }}</label>
                <input name="name" type="text" class="form-control" id="editName">
                @error('name')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="email">{{ __("Email") }}</label>
                <input name="email" type="email" class="form-control" id="email">
                @error('email')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="phone">{{ __("Phone") }}</label>
                <input name="phone" type="text" class="form-control" id="phone">
                @error('phone')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="additionPhone">{{ __("Addition_Phone") }}</label>
                <input name="addition_phone" type="text" class="form-control" id="additionPhone">
                @error('addition_phone')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="civilId">{{ __("Civil_id") }}</label>
                <input name="civil_id" type="text" class="form-control" id="civilId">
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