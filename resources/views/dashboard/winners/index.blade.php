@extends('dashboard.layouts.app')

@section('style')
    <style>
        .contact-thumbnail {
            width: 100px;
        }

        .fullscreen {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            height: 80%;
            z-index: 9999;
            background-color: rgba(0, 0, 0, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
@endsection

@section('breadcrumb')
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">{{ __('Winners') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span>{{ __('view') }}</span></li>
        </ol>
    </nav>
@endsection


@section('content')
    <div class="card mt-3">
        <div class="card-header ">
            <div class="p-2 row justify-content-between">
                <h4>{{ __('View Winners') }}</h4>
                @if (auth()->user()->can('add winners'))
                    <a href="#" data-toggle="modal" data-target="#createWinnerModal"
                        class="btn btn-primary">{{ __('Add Winner') }}</a>
                @endif

            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="mb-2 py-2 row justify-content-between">
                    <div class="mr-5">
                        @if (auth()->user()->can('search winners'))
                            <input type="text" class="form-control mx-3" placeholder="{{ __('search ...') }}"
                                id="winnerSerach">
                        @endif
                    </div>
                    <div class="">
                        @if (auth()->user()->can('export winners excel'))
                            <a href="{{ route('winners.export_excel') }}" class="btn btn-primary">Excel</a>
                        @endif
                        @if (auth()->user()->can('export winners pdf'))
                            <a href="{{ route('winners.export_pdf') }}" class="btn btn-primary mx-3">PDF</a>
                        @endif
                    </div>
                </div>

                @include('dashboard.winners.table')
                <div class="text-center">
                    {{ $winners->links() }}
                </div>
            </div>


            @include('dashboard.winners.__modals')

        </div>
    </div>
@endsection


@section('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
    <script>
        $(document).on('keyup', '#winnerSerach', function(e) {
            e.preventDefault();
            let value = $(this).val();
            let url = "{{ route('winners.serach') }}"

            $.ajax({
                type: "get",
                url: url,
                data: {
                    value: value
                },
                success: function(response) {

                    $('#winnersTable').html();
                    $('#winnersTable').html(response);

                }
            });
        });


        // delete usre
        $(document).on('click', '.delete-winners-btn', function() {
            let id = $(this).data('id');

            let url = '{{ route('winners.destroy', ':id') }}';
            url = url.replace(':id', id);
            console.log(url);
            $('#deleteWinnerForm').attr('action', url);
        })

        // show user info in the modal
        $(document).on('click', '.edit-winner-btn', function() {

            let id = $(this).data("id");
            let value = $(this).data("value");
            let name = $(this).data("name");

            $('#winnerName').text(name);
            $('#winnerValue').val(value);


            let url = '{{ route('winners.update', ':id') }}'
            url = url.replace(':id', id);
            $('#editWinnerForm').attr('action', url)

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
