@extends('dashboard.layouts.app')

@section('style')
@endsection

@section('breadcrumb')
<nav class="breadcrumb-one" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route("dashboard.index") }}">{{ __("Dashboard") }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route("roles.create") }}">{{ __("Roles") }}</a></li>
        <li class="breadcrumb-item active" aria-current="page"><span>{{ __("view") }}</span></li>
    </ol>
</nav>
@endsection


@section('content')
    <div class="card mt-3">
        <div class="card-header ">
            <div class="p-2 row justify-content-between">
                <h4>{{ __("View Roles") }}</h4>
                
                <a href="{{ route('roles.create') }}" class="btn btn-primary">{{ __("Add Role") }}</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mb-4">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __("Name") }}</th>
                            <th>{{ __("Count") }}</th>
                            <th>{{ __("Action") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->name }}</td>
                                <td class="">
                                    <a href="#"><i class="fa-solid fa-pen"></i></a>
                                    <a href="#" class="delete-role-btn m-1" data-id="{{ $role->id }}" data-toggle="modal" data-target="#deleteRoleModal"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>

                <div class="text-center">
                    {{ $roles->links() }}
                </div>
            </div>


            @include('dashboard.roles.__modals')
            
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