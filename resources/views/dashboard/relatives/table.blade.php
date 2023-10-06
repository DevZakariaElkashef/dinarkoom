<table class="table table-bordered mb-4" id="relativesTable">
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