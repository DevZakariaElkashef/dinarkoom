@extends('dashboard.layouts.app')

@section('style')
@endsection

@section('breadcrumb')
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin-relatives.index') }}">{{ __('Relatievs Type') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span>{{ __('view') }}</span></li>
        </ol>
    </nav>
@endsection


@section('content')
    <div class="card mt-3">
        <div class="card-header ">
            <div class="p-2 row justify-content-between">
                <h4>{{ __('View Relatives Types') }}</h4>
                @if (auth()->user()->can('add relation type'))
                    <a href="#" data-toggle="modal" data-target="#createTypeModal"
                        class="btn btn-primary">{{ __('Add Relative Type') }}</a>
                @endif
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mb-4">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('Name') }}</th>
                            @if (auth()->user()->can('edit relation type') ||
                                    auth()->user()->can('delete relation type'))
                                <th>{{ __('Action') }}</th>
                            @endif

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $type)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $type->{'name_' . app()->getLocale()} }}</td>
                                @if (auth()->user()->can('edit relation type') ||
                                        auth()->user()->can('delete relation type'))
                                    <td class="">
                                        @if (auth()->user()->can('edit relation type'))
                                            <a href="#" class="m-1 edit-type-btn" data-id="{{ $type->id }}"
                                                data-name_ar="{{ $type->name_ar }}" data-name_en="{{ $type->name_en }}"
                                                data-name_ur="{{ $type->name_ur }}" data-name_fil="{{ $type->name_fil }}"
                                                data-toggle="modal" data-target="#updateTypeModal"><i
                                                    class="fa-solid fa-pen"></i></a>
                                        @endif
                                        @if (auth()->user()->can('delete relation type'))
                                            <a href="#" class="delete-type-btn m-1" data-id="{{ $type->id }}"
                                                data-toggle="modal" data-target="#deleteTypeModal"><i
                                                    class="fa-solid fa-trash"></i></a>
                                        @endif
                                    </td>
                                @endif
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                <div class="text-center">
                    {{ $types->links() }}
                </div>
            </div>


            @include('dashboard.relatives.__modals')

        </div>
    </div>
@endsection


@section('script')
    <script>
        // delete usre
        $(document).on('click', '.delete-type-btn', function() {
            let id = $(this).data('id');

            let url = '{{ route('relative-types.destroy', ':id') }}';
            url = url.replace(':id', id);
            console.log(url);
            $('#deleteTypeForm').attr('action', url);
        })

        // show user info in the modal
        $(document).on('click', '.edit-type-btn', function() {

            $("#editTypename_ar").val($(this).data("name_ar"));
            $("#editTypename_en").val($(this).data("name_en"));
            $("#editTypename_ur").val($(this).data("name_ur"));
            $("#editTypename_fil").val($(this).data("name_fil"));

            let url = '{{ route('relative-types.update', ':id') }}'
            url = url.replace(':id', $(this).data('id'));

            $('#updateTypeForm').attr('action', url)
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
