<table class="table table-bordered mb-4" id="usersTable">
    <thead>
        <tr>
            <th>#</th>
            <th>{{ __("Name") }}</th>
            <th>{{ __("Phone") }}</th>
            <th>{{ __("Email") }}</th>
            <th>{{ __("Role") }}</th>
            <th>{{ __("Civil_id") }}</th>
            @if(auth()->user()->can('edit users') || auth()->user()->can('delete users'))
            <th>{{ __("Action") }}</th>
            @endif
            
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->getRoleNames()->first() }}</td>
                <td>{{ $user->civil_id }}</td>
                
                @if(auth()->user()->can('edit users') || auth()->user()->can('delete users'))
                    <td class="">
                            @if(auth()->user()->can('edit users'))
                        <a href="#" 
                            class="m-1 edit-user-btn"
                            data-id="{{ $user->id }}"
                            data-name="{{ $user->name }}"
                            data-phone="{{ $user->phone }}"
                            data-email="{{ $user->email }}"
                            data-role_id="{{ $user->email }}"
                            data-addition_phone="{{ $user->addition_phone }}"
                            data-civil_id="{{ $user->civil_id }}"
                            data-toggle="modal" 
                            data-target="#editUserModal"><i class="fa-solid fa-pen"></i></a>
                            @endif
                            @if(auth()->user()->can('delete users'))
                                <a href="#" class="delete-user-btn m-1" data-id="{{ $user->id }}" data-toggle="modal" data-target="#deleteUserModal"><i class="fa-solid fa-trash"></i></a>
                            @endif
                    </td>
                @endif
            </tr>
        @endforeach
        
    </tbody>
</table>