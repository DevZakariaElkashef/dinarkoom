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
            <h4>{{ __("Add User") }}</h4>
            
            <a href="{{ route('users.index') }}" class="btn btn-secondary">{{ __("Back") }}</a>
        </div>
    </div>
    <form action="{{ route("notification.store") }}" method="post">
        @csrf
        <div class="card-body">

              <div class="form-group">
                <label for="title">{{ __("Title") }}</label>
                <input name="title" type="text" class="form-control" id="title">
                @error('name')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="body">{{ __("Content") }}</label>
                <input name="body" type="text" class="form-control" id="body">
                @error('name')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#SendNotifyModal">{{ __('Selct Users') }}</a>

              
              {{-- Send Notify modal --}}
              <div class="modal fade" id="SendNotifyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">{{ __("Send Notification") }}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                        <div class="modal-body">
                          <div class="container">
                              <div class="row justify-content-between">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    select all
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    select admins
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    select users
                                  </label>
                                </div>
                              </div>
                              <hr>
                              <p>Users</p>
                              <div class="row mb-3">
                                @foreach ($users as $user)
                                <div class="col-md-4 ">
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                      Default checkbox
                                    </label>
                                  </div>
                                </div>
                                  @endforeach
                              </div>
                             
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __("Close") }}</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>

            
        </div>

        <div class="card-footer d-flex justify-content-end">
            <button class="btn btn-primary" type="submit">{{ __("Send") }}</button>
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