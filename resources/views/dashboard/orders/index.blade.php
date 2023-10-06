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
            <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">{{ __('Orders') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span>{{ __('view') }}</span></li>
        </ol>
    </nav>
@endsection


@section('content')
    <div class="card mt-3">
        <div class="card-header ">
            <div class="p-2 row justify-content-between">
                <h4>{{ __('View Orders') }}</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="mb-2 py-2 row justify-content-between">
                    <div class="">
                        @if (auth()->user()->can('search orders'))
                            <input type="text" class="form-control mx-3" placeholder="{{ __('search ...') }}"
                                id="orderSerach">
                        @endif
                    </div>
                    <div class="">
                        @if (auth()->user()->can('export orders excel'))
                            <a href="{{ route('orders.export_excel') }}" class="btn btn-primary">Excel</a>
                        @endif
                        @if (auth()->user()->can('export orders pdf'))
                            <a href="{{ route('orders.export_pdf') }}" class="btn btn-primary mx-3">PDF</a>
                        @endif
                    </div>
                </div>

                @include('dashboard.orders.table')

                <div class="text-center">
                    {{ $orders->links() }}
                </div>
            </div>


            @include('dashboard.orders.__modals')

        </div>
    </div>
@endsection


@section('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
    <script>
        $(document).on('keyup', '#orderSerach', function(e) {
            e.preventDefault();
            let value = $(this).val();
            let url = "{{ route('orders.serach') }}"

            $.ajax({
                type: "get",
                url: url,
                data: {
                    value: value
                },
                success: function(response) {

                    $('#ordersTable').html();
                    $('#ordersTable').html(response);

                }
            });
        });


        // delete usre
        $(document).on('click', '.delete-orders-btn', function() {
            let id = $(this).data('id');

            let url = '{{ route('orders.destroy', ':id') }}';
            url = url.replace(':id', id);
            console.log(url);
            $('#deleteOrderForm').attr('action', url);
        })

        // show user info in the modal
        $(document).on('click', '.edit-order-btn', function() {
            let id = $(this).data("id");
            let date = $(this).data("date");
            let status = $(this).data("status");
            let user_name = $(this).data("user_name");
            let user_email = $(this).data("user_email");
            let user_phone = $(this).data("user_phone");
            let user_addition_phone = $(this).data("user_addition_phone");
            let user_civil_id = $(this).data("user_civil_id");

            $('#orderId').text(id);
            $('#OrderUserName').text(user_name);
            $('#OrderUserEmail').text(user_email);
            $('#OrderUserPhone').text(user_phone);
            $('#OrderUserAdditionPhone').text(user_addition_phone);
            $('#OrderUserCivilId').text(user_civil_id);
            $('#OrderStatus').text(status);
            $('#OrderDate').text(date);

            let url = '{{ route('orders.update', ':id') }}'
            url = url.replace(':id', id);
            $('#updateOrderForm').attr('action', url)

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
