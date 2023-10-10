{{-- delete reelative modal --}}
<div class="modal fade" id="deleteRelativeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ __("Delete Relative") }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="deleteRelativeForm" method="post">
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


{{-- delete type modal --}}
<div class="modal fade" id="deleteTypeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ __("Delete Type") }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="deleteTypeForm" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-body text-center fs-1">
                <p class="text-bold">{{ __("Are_You_sure!") }}</p>
                <p class="text-bold">{{ __("You Will delete all relative with that relation!") }}</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __("Close") }}</button>
              <button type="submit" class="btn btn-danger">{{ __("Delete") }}</button>
            </div>
        </form>
      </div>
    </div>
</div>


{{-- Crate Type modal --}}
<div class="modal fade" id="createTypeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ __("Create_type") }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="{{ route("relative-types.store") }}" method="post">
          @csrf
          
          <div class="modal-body ">

              <div class="form-group">
                <label for="name_ar">{{ __("Name") }} {{ __("In arabic") }}</label>
                <input name="name_ar" type="text" class="form-control" id="name_ar" value="{{ old('name_ar') }}">
                @error('name')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              
              <div class="form-group">
                <label for="name_en">{{ __("Name") }} {{ __("In english") }}</label>
                <input name="name_en" type="text" class="form-control" id="name_en" value="{{ old('name_en') }}">
                @error('name')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              
              <div class="form-group">
                <label for="name_ur">{{ __("Name") }} {{ __("In Urdu") }}</label>
                <input name="name_ur" type="text" class="form-control" id="name_ur" value="{{ old('name_ur') }}">
                @error('name')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              
              <div class="form-group">
                <label for="name_fil">{{ __("Name") }} {{ __("In Filibino") }}</label>
                <input name="name_fil" type="text" class="form-control" id="name_fil" value="{{ old('name_fil') }}">
                @error('name')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __("Close") }}</button>
              <button type="submit" class="btn btn-primary">{{ __("Save") }}</button>
            </div>
          </form>
    </div>
  </div>
</div>

{{-- Update Type modal --}}
<div class="modal fade" id="updateTypeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ __("Update_type") }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form id="updateTypeForm" method="post">
          @csrf
          @method('PUT')
          <div class="modal-body ">

              <div class="form-group">
                <label for="editTypename_ar">{{ __("Name") }} {{ __("In arabic") }}</label>
                <input name="name_ar" type="text" class="form-control" id="editTypename_ar" >
                @error('name')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              
              <div class="form-group">
                <label for="editTypename_en">{{ __("Name") }} {{ __("In english") }}</label>
                <input name="name_en" type="text" class="form-control" id="editTypename_en" >
                @error('name')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              
              <div class="form-group">
                <label for="editTypename_ur">{{ __("Name") }} {{ __("In Urdu") }}</label>
                <input name="name_ur" type="text" class="form-control" id="editTypename_ur" >
                @error('name')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              
              <div class="form-group">
                <label for="editTypename_fil">{{ __("Name") }} {{ __("In Filibino") }}</label>
                <input name="name_fil" type="text" class="form-control" id="editTypename_fil" >
                @error('name')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __("Close") }}</button>
              <button type="submit" class="btn btn-primary">{{ __("Save") }}</button>
            </div>
          </form>
    </div>
  </div>
</div>

{{-- View user modal --}}
<div class="modal fade" id="editRelativeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ __("Update_Relative") }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form id="updateRelativeForm" method="post">
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

              <div class="form-group">
                <label for="civilId">{{ __("Civil_id") }}</label>
                <input name="civil_id" type="text" class="form-control" id="civilId">
                @error('civil_id')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
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