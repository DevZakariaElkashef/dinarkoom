<table class="table table-bordered mb-4" id="winnersTable">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-center">{{ __('User') }}</th>
            <th class="text-center">{{ __('Added by') }}</th>
            <th class="text-center">{{ __('Value') }}</th>
            <th class="text-center">{{ __('Status') }}</th>
            <th class="text-center">{{ __('Date') }}</th>
            @if (auth()->user()->can('edit winners') ||
                    auth()->user()->can('delete winners'))
                <th class="">{{ __('Action') }}</th>
            @endif
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
                        <button
                            class="btn @if ($winner->status) btn-success @else btn-light @endif dropdown-toggle"
                            type="button" data-toggle="dropdown" aria-expanded="false">
                            @if ($winner->status)
                                {{ __('Active') }}
                            @else
                                {{ __('Not_Active') }}
                            @endif
                        </button>
                        @if (auth()->user()->can('active winners'))
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('winners.active', $winner->id) }}">
                                    @if (!$winner->status)
                                        {{ __('Active') }}
                                    @else
                                        {{ __('Not_Active') }}
                                    @endif
                                </a>
                            </div>
                        @endif
                    </div>
                </td>

                <td class="text-center">
                    {{ \Carbon\Carbon::createFromFormat('m', $winner->month)->locale(app()->getLocale())->format('F') }}
                </td>
                @if (auth()->user()->can('edit winners') ||
                        auth()->user()->can('delete winners'))
                    <td class="">
                        @if (auth()->user()->can('edit winners'))
                            <a href="#" class="m-1 edit-winner-btn" data-id="{{ $winner->id }}"
                                data-id="{{ $winner->id }}" data-name="{{ $winner->user->name }}"
                                data-value="{{ $winner->value }}" data-toggle="modal" data-target="#editWinnerModal">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                        @endif
                        @if (auth()->user()->can('delete winners'))
                            <a href="#" class="delete-winners-btn m-1" data-id="{{ $winner->id }}"
                                data-toggle="modal" data-target="#deleteWinnerModal"><i
                                    class="fa-solid fa-trash"></i></a>
                        @endif
                    </td>
                @endif
            </tr>
        @endforeach

    </tbody>
</table>
