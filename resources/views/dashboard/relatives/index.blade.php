@extends('dashboard.layouts.app')

@section('style')
@endsection

@section('breadcrumb')
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin-relatives.index') }}">{{ __('Relatievs') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span>{{ __('view') }}</span></li>
        </ol>
    </nav>
@endsection


@section('content')
    <div class="card mt-3">
        <div class="card-header ">
            <div class="p-2 row justify-content-between">
                <h4>{{ __('View Relatives') }}</h4>
                @if (auth()->user()->can('add relatives'))
                    <a href="{{ route('admin-relatives.create') }}" class="btn btn-primary">{{ __('Add Relative') }}</a>
                @endif
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="mb-2 py-2 row justify-content-end">
                    <a href="{{ route("admin-relatives.export_excel") }}" class="btn btn-primary">Excel</a>
                    <a href="{{ route("admin-relatives.export_pdf") }}" class="btn btn-primary mx-3">PDF</a>
                </div>
                <table class="table table-bordered mb-4">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Civil_id') }}</th>
                            @if (auth()->user()->can('edit relatives ') ||
                                    auth()->user()->can('delete relatives'))
                                <th>{{ __('Action') }}</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($relatives as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->civil_id }}</td>
                                @if (auth()->user()->can('edit relatives ') ||
                                        auth()->user()->can('delete relatives'))
                                    <td class="">
                                        @if (auth()->user()->can('edit relatives'))
                                            <a href="#" class="m-1 edit-relative-btn" data-id="{{ $user->id }}"
                                                data-name="{{ $user->name }}" 
                                                data-civil_id="{{ $user->civil_id }}" data-toggle="modal"
                                                data-target="#editRelativeModal"><i class="fa-solid fa-pen"></i></a>
                                        @endif
                                        @if (auth()->user()->can('delete relatives'))
                                            <a href="#" class="delete-relative-btn m-1" data-id="{{ $user->id }}"
                                                data-toggle="modal" data-target="#deleteRelativeModal"><i
                                                    class="fa-solid fa-trash"></i></a>
                                        @endif
                                    </td>
                                @endif
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                <div class="text-center">
                    {{ $relatives->links() }}
                </div>
            </div>


            @include('dashboard.relatives.__modals')

        </div>
    </div>
@endsection


@section('script')
    <script>
        // delete usre
        $(document).on('click', '.delete-relative-btn', function() {
            let id = $(this).data('id');

            let url = '{{ route('admin-relatives.destroy', ':id') }}';
            url = url.replace(':id', id);
            console.log(url);
            $('#deleteRelativeForm').attr('action', url);
        })

        // show user info in the modal
        $(document).on('click', '.edit-relative-btn', function() {
            $("#editName").val($(this).data("name"));
            $("#email").val($(this).data("email"));
            $("#phone").val($(this).data("phone"));
            $("#additionPhone").val($(this).data("addition_phone"));
            $("#civilId").val($(this).data("civil_id"));

            let url = '{{ route('admin-relatives.update', ':id') }}'
            url = url.replace(':id', $(this).data('id'));

            $('#updateRelativeForm').attr('action', url)
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
