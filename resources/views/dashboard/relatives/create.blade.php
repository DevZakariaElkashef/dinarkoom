@extends('dashboard.layouts.app')


@section('breadcrumb')
<nav class="breadcrumb-one" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route("dashboard.index") }}">{{ __("Dashboard") }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route("users.index") }}">{{ __("Relatives") }}</a></li>
        <li class="breadcrumb-item active" aria-current="page"><span>{{ __("Add") }}</span></li>
    </ol>
</nav>
@endsection

@section('content')
<div class="card mt-3">
    <div class="card-header ">
        <div class="p-2 row justify-content-between">
            <h4>{{ __("Add Relative") }}</h4>
            
            <a href="{{ route('admin-relatives.index') }}" class="btn btn-secondary">{{ __("Back") }}</a>
        </div>
    </div>
    <form action="{{ route("admin-relatives.store") }}" method="post">
        @csrf
        <div class="card-body">
            <!-- Name input-->
            <div class="form-group mb-3">
                <label for="user_id">{{ __("Relative User") }}</label>
                <select class="form-control" value="{{ old('user_id') }}" name="user_id" id="user_id" data-sb-validations="required">
                    <option selected disabled>{{ __("Choose Relation User") }}</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="text-danger" >{{ $message }}</div>
                @enderror

            </div>
            <div class="form-group mb-3">
                <label for="relative_type_id">{{ __("Relative Type") }}</label>
                <select class="form-control" value="{{ old('relative_type_id') }}" name="relative_type_id" id="relative_type_id" data-sb-validations="required">
                    <option selected disabled>{{ __("Choose Relation type") }}</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->{'name_' . app()->getLocale()} }}</option>
                    @endforeach
                </select>
                @error('relative_type_id')
                    <div class="text-danger" >{{ $message }}</div>
                @enderror

              </div>
              <div class="form-group">
                <label for="editName">{{ __("Name") }}</label>
                <input name="name" type="text" class="form-control" id="editName" value="{{ old('name') }}">
                @error('name')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="civilId">{{ __("Civil_id") }}</label>
                <input name="civil_id" type="text" class="form-control" id="civilId" value="{{ old('civil_id') }}">
                @error('civil_id')
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