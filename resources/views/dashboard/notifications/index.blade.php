@extends('dashboard.layouts.app')

@section('style')
@endsection

@section('breadcrumb')
<nav class="breadcrumb-one" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route("dashboard.index") }}">{{ __("Dashboard") }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route("users.index") }}">{{ __("Notification") }}</a></li>
        <li class="breadcrumb-item active" aria-current="page"><span>{{ __("view") }}</span></li>
    </ol>
</nav>
@endsection


@section('content')
    <div class="card mt-3">
        <div class="card-header ">
            <div class="p-2 row justify-content-between">
                <h4>{{ __("View Users") }}</h4>
                @if(auth()->user()->can('add users'))
                <a href="{{ route('notification.create') }}" class="btn btn-primary">{{ __("Send Notification") }}</a>
                @endif
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mb-4">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __("Title") }}</th>
                            <th>{{ __("Content") }}</th>
                            {{-- @if(auth()->user()->can('edit users') || auth()->user()->can('delete users')) --}}
                            <th>{{ __("Action") }}</th>
                            {{-- @endif --}}
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notifications as $notify)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $notify->title }}</td>
                                <td>{{ $notify->body }}</td>
                                {{-- @if(auth()->user()->can('edit users') || auth()->user()->can('delete users')) --}}
                                    <td class="">
                                            {{-- @if(auth()->user()->can('edit users')) --}}
                                        <a href="#" 
                                            class="m-1 edit-user-btn"
                                            data-id="{{ $user->id }}"
                                            data-toggle="modal" 
                                            data-target="#editUserModal"><i class="fa-solid fa-pen"></i></a>
                                            {{-- @endif --}}
                                            {{-- @if(auth()->user()->can('delete users')) --}}
                                                <a href="#" class="delete-user-btn m-1" data-id="{{ $user->id }}" data-toggle="modal" data-target="#deleteUserModal"><i class="fa-solid fa-trash"></i></a>
                                            {{-- @endif --}}
                                    </td>
                                {{-- @endif --}}
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>

                <div class="text-center">
                    {{ $notifications->links() }}
                </div>
            </div>


            @include('dashboard.users.__modals')
            
        </div>
    </div>
@endsection


@section('script')
    <script>

        // delete usre
        $(document).on('click', '.delete-user-btn', function(){
            let id = $(this).data('id');

            let url = '{{ route("users.destroy", ":id") }}';
            url = url.replace(':id', id);
            console.log(url);
            $('#deleteUserForm').attr('action', url);
        })

        // show user info in the modal
        $(document).on('click', '.edit-user-btn', function(){
            $("#editName").val($(this).data("name"));
            $("#email").val($(this).data("email"));
            $("#phone").val($(this).data("phone"));
            $("#additionPhone").val($(this).data("addition_phone"));
            $("#civilId").val($(this).data("civil_id"));

            let url = '{{ route("users.update", ":id") }}'
            url = url.replace(':id', $(this).data('id'));
            
            $('#updateUserForm').attr('action', url)
        })

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