@extends('dashboard.layouts.app')

@section('style')
@endsection

@section('breadcrumb')
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">{{ __('User') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span>{{ __('view') }}</span></li>
        </ol>
    </nav>
@endsection


@section('content')
    <div class="card mt-3">
        <div class="card-header ">
            <div class="p-2 row justify-content-between">
                <h4>{{ __('View Users') }}</h4>
                @if (auth()->user()->can('add users'))
                    <a href="{{ route('users.create') }}" class="btn btn-primary">{{ __('Add User') }}</a>
                @endif
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="mb-2 py-2 row justify-content-between">
                    <div class="mr-5">
                        @if (auth()->user()->can('search users'))
                        <input type="text" class="form-control mx-3" placeholder="{{ __('search ...') }}"
                            id="userSerach">
                        @endif
                    </div>
                    <div class="">
                        @if (auth()->user()->can('export users excel'))
                        <a href="{{ route('users.export_excel') }}" class="btn btn-primary">Excel</a>
                        @endif

                        @if (auth()->user()->can('export users pdf'))
                        <a href="{{ route('users.export_pdf') }}" class="btn btn-primary mx-3">PDF</a>
                        @endif
                    </div>
                </div>

                @include('dashboard.users.table')

                <div class="text-center">
                    {{ $users->links() }}
                </div>
            </div>


            @include('dashboard.users.__modals')

        </div>
    </div>
@endsection


@section('script')
    <script>
        $(document).on('keyup', '#userSerach', function(e) {
            e.preventDefault();
            let value = $(this).val();
            let url = "{{ route('users.serach') }}"

            $.ajax({
                type: "get",
                url: url,
                data: {
                    value: value
                },
                success: function(response) {

                    $('#usersTable').html();
                    $('#usersTable').html(response);

                }
            });
        });

        // delete usre
        $(document).on('click', '.delete-user-btn', function() {
            let id = $(this).data('id');

            let url = '{{ route('users.destroy', ':id') }}';
            url = url.replace(':id', id);
            console.log(url);
            $('#deleteUserForm').attr('action', url);
        })

        // show user info in the modal
        $(document).on('click', '.edit-user-btn', function() {
            $("#editName").val($(this).data("name"));
            $("#email").val($(this).data("email"));
            $("#phone").val($(this).data("phone"));
            $("#additionPhone").val($(this).data("addition_phone"));
            $("#civilId").val($(this).data("civil_id"));

            let url = '{{ route('users.update', ':id') }}'
            url = url.replace(':id', $(this).data('id'));

            $('#updateUserForm').attr('action', url)
        })
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
