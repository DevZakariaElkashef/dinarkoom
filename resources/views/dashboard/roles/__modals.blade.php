{{-- delete user modal --}}
<div class="modal fade" id="deleteRoleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ __("Delete Role") }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="deleteRoleForm" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-body text-center fs-1">
                <p class="text-bold">{{ __("Are_You_sure!") }}</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __("Close") }}</button>
              <button type="submit" class="btn btn-danger">{{ __("Delete") }}</button>
            </div>
        </form>
      </div>
    </div>
</div>


{{-- View user modal --}}
<div class="modal fade" id="editRolesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ __("Update_Role") }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form id="updateRoleForm" method="post">
          @csrf
          @method('PUT')
          <div class="modal-body ">

              <div class="form-group">
                <label for="editName">{{ __("Name") }}</label>
                <input name="name" type="text" class="form-control" id="editName">
                @error('name')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="row">

                @foreach ($permissions as $permission)
                <div class="col-md-3 mb-3">
                  <div class="form-check">
                    <input class="form-check-input" name="options[]" type="checkbox" value="{{ $permission->id }}" id="permission{{ $permission->id }}">
                    <label class="form-check-label" for="permission{{ $permission->id }}">
                      {{ $permission->name }}
                    </label>
                  </div>
  
                </div>
  
                @endforeach
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __("Close") }}</button>
              <button type="submit" class="btn btn-primary">{{ __("Update") }}</button>
            </div>
          </form>
    </div>
  </div>
</div>