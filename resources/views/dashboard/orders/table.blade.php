<table class="table table-bordered mb-4" id="ordersTable">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-center">{{ __('User name') }}</th>
            <th class="text-center">{{ __('purchased for') }}</th>
            <th class="text-center">{{ __('Status') }}</th>
            <th class="text-center">{{ __('Date') }}</th>
            <th class="">{{ __('Action') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>

                <td class="text-center">{{ $order->user->name }}</td>
                <td class="text-center">
                    @if ($order->relative_id)
                        {{ $order->relative->type->{'name_' . app()->getLocale()} }}
                    @else
                        {{ __('hemself') }}
                    @endif
                </td>
                <td class="text-center">
                    @if ($order->status)
                        <span class="badge badge-success">{{ __('success') }}</span>
                    @else
                        <span class="badge badge-danger">{{ __('failed') }}</span>
                    @endif
                </td>
                <td class="text-center">{{ $order->created_at->format('y/m/d -- h-i-s a') }}</td>
                <td class="">
                    <a href="#" class="m-1 edit-order-btn" data-id="{{ $order->code }}"
                        data-date="{{ $order->date }}"
                        data-status="{{ $order->status ? 'success' : 'faild' }}"
                        data-user_name="{{ $order->user->name }}"
                        data-user_email="{{ $order->user->email }}"
                        data-user_phone="{{ $order->user->phone }}"
                        data-user_addition_phone="{{ $order->user->addition_phone }}"
                        data-user_civil_id="{{ $order->user->civil_id }}" data-toggle="modal"
                        data-target="#editOrderModal">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                    <a href="{{ route('invoice.pdf', $order->id) }}"><i class="fa-solid fa-share"></i></a>
                    @if (auth()->user()->can('delete orders'))
                        <a href="#" class="delete-orders-btn m-1" data-id="{{ $order->id }}"
                            data-toggle="modal" data-target="#deleteOrderModal"><i
                                class="fa-solid fa-trash"></i></a>
                    @endif
                </td>
            </tr>
        @endforeach

    </tbody>
</table>