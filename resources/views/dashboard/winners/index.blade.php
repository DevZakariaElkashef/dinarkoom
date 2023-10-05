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
                <a href="#" data-toggle="modal" data-target="#createWinnerModal" class="btn btn-primary">{{ __("Add Winner") }}</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="mb-2 py-2 row justify-content-end">
                    <a href="{{ route("orders.export_excel") }}" class="btn btn-primary">Excel</a>
                    <a href="{{ route("orders.export_excel") }}" class="btn btn-primary mx-3">PDF</a>
                </div>
                <table class="table table-bordered mb-4">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-center">{{ __('User') }}</th>
                            <th class="text-center">{{ __('Added by') }}</th>
                            <th class="text-center">{{ __('Status') }}</th>
                            <th class="text-center">{{ __('Value') }}</th>
                            <th class="text-center">{{ __('Date') }}</th>
                            <th class="">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($winners as $winner)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>

                                <td class="text-center">{{ $winner->user->name }}</td>
                                <td class="text-center">{{ $winner->admin->name }}</td>
                                <td class="text-center">{{ $winner->value != '' ? $winner->value : 0 }}</td>

                                <td class="text-center">


                                    <div class="dropdown">
                                        <button class="btn @if ($winner->status) btn-success @else btn-light @endif dropdown-toggle"
                                            type="button" data-toggle="dropdown" aria-expanded="false">
                                            @if ($winner->status)
                                                {{ __('Active') }}
                                            @else
                                                {{ __('Not_Active') }}
                                            @endif
                                        </button>
                                        {{-- @if (auth()->user()->can('active winners')) --}}
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('winners.active', $winner->id) }}">
                                                    @if (!$winner->status)
                                                        {{ __('Active') }}
                                                    @else
                                                        {{ __('Not_Active') }}
                                                    @endif
                                                </a>
                                            </div>
                                        {{-- @endif --}}
                                    </div>
                                </td>
                                
                                <td class="text-center">
                                    {{ \Carbon\Carbon::createFromFormat('m', $winner->month)->locale(app()->getLocale())->format('F') }}
                                </td>
                                <td class="">
                                    <a href="#" class="m-1 edit-winner-btn" data-id="{{ $winner->id }}"
                                        data-date="{{ $winner->date }}"
                                        data-status="{{ $winner->status ? 'success' : 'faild' }}"
                                        data-user_name="{{ $winner->user->name }}"
                                        data-user_email="{{ $winner->user->email }}"
                                        data-user_phone="{{ $winner->user->phone }}"
                                        data-user_addition_phone="{{ $winner->user->addition_phone }}"
                                        data-user_civil_id="{{ $winner->user->civil_id }}" data-toggle="modal"
                                        data-target="#editWinnerModal">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    {{-- @if (auth()->user()->can('delete winners')) --}}
                                        <a href="#" class="delete-winners-btn m-1" data-id="{{ $winner->id }}"
                                            data-toggle="modal" data-target="#deleteWinnerModal"><i
                                                class="fa-solid fa-trash"></i></a>
                                    {{-- @endif --}}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

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
        // delete usre
        $(document).on('click', '.delete-winners-btn', function() {
            let id = $(this).data('id');

            let url = '{{ route('winners.destroy', ':id') }}';
            url = url.replace(':id', id);
            console.log(url);
            $('#deleteWinnerForm').attr('action', url);
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
