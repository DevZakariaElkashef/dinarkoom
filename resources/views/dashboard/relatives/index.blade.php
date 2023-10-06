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
                <div class="mb-2 py-2 row justify-content-between">
                    <div class="mr-5">
                        <input type="text" class="form-control mx-3" placeholder="{{ __("search ...") }}" id="relativeSerach">
                    </div>
                    <div class="">
                        <a href="{{ route("admin-relatives.export_excel") }}" class="btn btn-primary">Excel</a>
                        <a href="{{ route("admin-relatives.export_pdf") }}" class="btn btn-primary mx-3">PDF</a>
                    </div>
                </div>
                
                @include('dashboard.relatives.table')

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
        
        $(document).on('keyup', '#relativeSerach', function(e){
            e.preventDefault();
            let value = $(this).val();
            let url = "{{ route('admin-relatives.serach') }}"

            $.ajax({
                type: "get",
                url: url,
                data: {value: value},
                success: function (response) {
                    
                    $('#relativesTable').html();
                    $('#relativesTable').html(response);

                }
            });
        });

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
