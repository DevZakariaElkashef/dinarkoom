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
                                <td>{{ App\Models\User::role($role->name)->count() }}</td>
                                <td class="">
                                    <a href="{{ route("roles.edit", $role->id) }}"><i class="fa-solid fa-pen"></i></a>
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
        $(document).on('click', '.delete-role-btn', function(){
            let id = $(this).data('id');

            let url = '{{ route("roles.destroy", ":id") }}';
            url = url.replace(':id', id);
            console.log(url);
            $('#deleteRoleForm').attr('action', url);
        })

        // show user info in the modal
        $(document).on('click', '.edit-role-brn', function(){
            
            $("#editName").val($(this).data("name"));

            let url = '{{ route("roles.update", ":id") }}'
            url = url.replace(':id', $(this).data('id'));
            
            $('#updateRoleForm').attr('action', url)
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