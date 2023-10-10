@extends('dashboard.layouts.app')


@section('breadcrumb')
<nav class="breadcrumb-one" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route("dashboard.index") }}">{{ __("Dashboard") }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route("roles.index") }}">{{ __("Roles") }}</a></li>
        <li class="breadcrumb-item active" aria-current="page"><span>{{ __("Add") }}</span></li>
    </ol>
</nav>
@endsection

@section('content')
<div class="card mt-3">
    <div class="card-header ">
        <div class="p-2 row justify-content-between">
            <h4>{{ __("Add Roles") }}</h4>
            
            <a href="{{ route('roles.index') }}" class="btn btn-secondary">{{ __("Back") }}</a>
        </div>
    </div>
    <form action="{{ route("roles.store") }}" method="post">
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
                <label>{{ __("Permissions") }}</label>
                <div class="form-check mb-3">
                  <input  class="form-check-input" type="checkbox" id="selectAllCheckbox">
                  <label class="form-check-label" for="selectAllCheckbox">
                    {{ __("Select All") }}
                  </label>
                </div>
                <div class="row">
                  

                  @foreach ($permissions as $permission)
                  <div class="col-md-3 mb-3">
                    <div class="form-check">
                      <input class="form-check-input" name="options[]" type="checkbox" value="{{ $permission->id }}" id="permission{{ $permission->id }}">
                      <label class="form-check-label" for="permission{{ $permission->id }}">
                        {{ $permission->name }}
                      </label>
                    </div>

                  </div>

                  @endforeach
                    
                    

                </div>
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

$(document).ready(function() {
  // Event listener for the "Select All" checkbox
  $('#selectAllCheckbox').change(function() {
    // Get the checked state of the "Select All" checkbox
    var isChecked = $(this).prop('checked');
    
    // Set the checked state of all other checkboxes
    $('input[type=checkbox]').prop('checked', isChecked);
  });
  
  // Event listener for individual checkboxes
  $('input[type=checkbox]').change(function() {
    // Check if all other checkboxes are checked
    var allChecked = $('input[type=checkbox]:checked').length === $('input[type=checkbox]').length;
    
    // Update the "Select All" checkbox accordingly
    $('#selectAllCheckbox').prop('checked', allChecked);
  });
});
  


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