@extends('dashboard.layouts.app')


@section('breadcrumb')
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">{{ __('Users') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span>{{ __('Add') }}</span></li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card mt-3">
        <div class="card-header ">
            <div class="p-2 row justify-content-between">
                <h4>{{ __('Add User') }}</h4>

                <a href="{{ route('notification.index') }}" class="btn btn-secondary">{{ __('Back') }}</a>
            </div>
        </div>
        <form action="{{ route('notification.store') }}" method="post">
            @csrf
            <div class="card-body">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="english-tab" data-toggle="tab" data-target="#english" type="button" role="tab" aria-controls="english" aria-selected="true">{{ __("English") }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="arabic-tab" data-toggle="tab" data-target="#arabic" type="button" role="tab" aria-controls="arabic" aria-selected="false">{{ __('Arabic') }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="urdu-tab" data-toggle="tab" data-target="#urdu" type="button" role="tab" aria-controls="urdu" aria-selected="false">{{ __('Urdu') }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="filibino-tab" data-toggle="tab" data-target="#filibino" type="button" role="tab" aria-controls="filibino" aria-selected="false">{{ __("Filipino") }}</button>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="english" role="tabpanel" aria-labelledby="english-tab">
                       
                       
                        <div class="form-group">
                            <label for="title_en">{{ __('Title') }} {{ __('In english') }}</label>
                            <input name="title_en" type="text" class="form-control" id="title_en">
                            @error('title_en')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
        
                        <div class="form-group">
                            <label for="body_en">{{ __('Content') }} {{ __("In english") }}</label>
                            <input name="body_en" type="text" class="form-control" id="body_en">
                            @error('body_en')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                    </div>
                    <div class="tab-pane fade" id="arabic" role="tabpanel" aria-labelledby="arabic-tab">

                        <div class="form-group">
                            <label for="title_ar">{{ __('Title') }} {{ __('In arabic') }}</label>
                            <input name="title_ar" type="text" class="form-control" id="title_ar">
                            @error('title_ar')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
        
                        <div class="form-group">
                            <label for="body_ar">{{ __('Content') }} {{ __("In arabic") }}</label>
                            <input name="body_ar" type="text" class="form-control" id="body_ar">
                            @error('body_ar')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>
                    <div class="tab-pane fade" id="urdu" role="tabpanel" aria-labelledby="urdu-tab">

                        <div class="form-group">
                            <label for="title_ur">{{ __('Title') }} {{ __("In Urdu") }}</label>
                            <input name="title_ur" type="text" class="form-control" id="title_ur">
                            @error('title_ur')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
        
                        <div class="form-group">
                            <label for="body_ur">{{ __('Content') }} {{ __("In Urdu") }}</label>
                            <input name="body_ur" type="text" class="form-control" id="body_ur">
                            @error('body_ur')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>
                    <div class="tab-pane fade" id="filibino" role="tabpanel" aria-labelledby="filibino-tab">

                        <div class="form-group">
                            <label for="title_fil">{{ __('Title') }} {{ __("In Filibino") }}</label>
                            <input name="title_fil" type="text" class="form-control" id="title_fil">
                            @error('title_fil')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
        
                        <div class="form-group">
                            <label for="body_fil">{{ __('Content') }} {{ __("In Filibino") }}</label>
                            <input name="body_fil" type="text" class="form-control" id="body_fil">
                            @error('body_fil')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>
                  </div>





                <a href="#" class="btn btn-outline-primary" data-toggle="modal"
                    data-target="#SendNotifyModal">{{ __('Selct Users') }}</a>


                {{-- Send Notify modal --}}
                <div class="modal fade" id="SendNotifyModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{ __('Send Notification') }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row justify-content-between">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="selectAllCheckbox">
                                            <label class="form-check-label" for="selectAllCheckbox">
                                                select all
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="selectAdminsCheckbox">
                                            <label class="form-check-label" for="selectAdminsCheckbox">
                                                select admins
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="selectUsersCheckbox">
                                            <label class="form-check-label" for="selectUsersCheckbox">
                                                select users
                                            </label>
                                        </div>
                                    </div>
                                    <hr>
                                    <p>Users</p>
                                    <div class="row mb-3">
                                        @foreach ($users as $user)
                                            <div class="col-md-4 mb-3">
                                                <div class="form-check">
                                                    <input name="users[]" class="form-check-input {{ $user->getRoleNames()->first() }}"
                                                        type="checkbox" value="{{ $user->id }}"
                                                        id="user{{ $user->id }}checkbox">
                                                    <label class="form-check-label" for="user{{ $user->id }}checkbox">
                                                        {{ $user->name }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ __('Close') }}</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="card-footer d-flex justify-content-end">
                <button class="btn btn-primary" type="submit">{{ __('Send') }}</button>
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
                var allChecked = $('input[type=checkbox]:checked').length === $('input[type=checkbox]')
                    .length;

                // Update the "Select All" checkbox accordingly
                $('#selectAllCheckbox').prop('checked', allChecked);
            });
        });


        $(document).ready(function() {
            // Event listener for the "Select All" checkbox
            $('#selectAdminsCheckbox').change(function() {
                // Get the checked state of the "Select All" checkbox
                var isChecked = $(this).prop('checked');

                // Set the checked state of all other checkboxes
                $('.admin').prop('checked', isChecked);
            });

            // Event listener for individual checkboxes
            $('.admin').change(function() {
                // Check if all other checkboxes are checked
                var allChecked = $('.admin:checked').length === $('.admin')
                    .length;

                // Update the "Select All" checkbox accordingly
                $('#selectAdminsCheckbox').prop('checked', allChecked);
            });
        });


        $(document).ready(function() {
            // Event listener for the "Select All" checkbox
            $('#selectUsersCheckbox').change(function() {
                // Get the checked state of the "Select All" checkbox
                var isChecked = $(this).prop('checked');

                // Set the checked state of all other checkboxes
                $('.client').prop('checked', isChecked);
            });

            // Event listener for individual checkboxes
            $('.client').change(function() {
                // Check if all other checkboxes are checked
                var allChecked = $('.client:checked').length === $('.client')
                    .length;

                // Update the "Select All" checkbox accordingly
                $('#selectUsersCheckbox').prop('checked', allChecked);
            });
        });
    </script>

    @if (session('message'))
        <script>
            Snackbar.show({
                text: '{{ session('message') }}',
                pos: 'top-right',
                duration: 5000,
            });
        </script>
    @endif
@endsection
