{{-- delete user modal --}}
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Delete User') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="deleteUserForm" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body text-center fs-1">
                    <p class="text-bold">{{ __('Are_You_sure!') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- View user modal --}}
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Update_User') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="updateUserForm" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body ">

                    <div class="form-group">
                        <label for="editName">{{ __('Name') }}</label>
                        <input name="name" type="text" class="form-control" id="editName">
                        @error('name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">{{ __('Email') }}</label>
                        <input name="email" type="email" class="form-control" id="email">
                        @error('email')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <!-- MObile no input-->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">+965</span>
                        <input id="phone" type="text" value="{{ old('phone') }}" name="phone"
                            class="form-control" placeholder="{{ __('Phone') }}" aria-label="{{ __('Phone') }}"
                            aria-describedby="basic-addon1">
                    </div>
                    @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <!-- MObile no input-->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">+965</span>
                        <input id="additionPhone" type="text" value="{{ old('addition_phone') }}"
                            name="addition_phone" class="form-control" placeholder="{{ __('Addition_Phone') }}"
                            aria-label="{{ __('Addition_Phone') }}" aria-describedby="basic-addon1">
                    </div>
                    @error('addition_phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror




                    <div class="form-group">
                        <label for="civilId">{{ __('Civil_id') }}</label>
                        <input name="civil_id" type="text" class="form-control" id="civilId">
                        @error('civil_id')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>
                        <input name="password" type="password" class="form-control" id="password">
                        @error('password')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
