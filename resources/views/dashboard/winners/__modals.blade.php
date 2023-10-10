{{-- delete user modal --}}
<div class="modal fade" id="deleteWinnerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ __("Delete Winner") }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="deleteWinnerForm" method="post">
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
<div class="modal fade" id="createWinnerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ __("Add Winner") }}</h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
        
      <form action="{{ route('winners.store') }}" method="POST">
      @csrf


        <div class="modal-body ">
          
        <div class="form-group">
          <label for="user_id">{{ __("User name") }}</label>
          <select id="user_id" class="form-control" name="user_id">
            <option selected disabled>{{ __("Choose..") }}</option>
            @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
            
          </select>
        </div>

        <div class="form-group">
          <label for="value">{{ __("value") }}</label>
          <input id="value" class="form-control" type="number" name="value">
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
<div class="modal fade" id="editWinnerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ __("Edit Winner") }}</h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
        
      <form id="editWinnerForm" method="POST">
      @csrf
      @method('PUT')


        <div class="modal-body ">
          
        <div class="form-group">
          <label for="user_id">{{ __("User name") }} <span id="winnerName"></span></label>
          <select id="user_id" class="form-control" name="user_id">
            <option selected disabled>{{ __("Choose..") }}</option>
            @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
            
          </select>
        </div>

        <div class="form-group">
          <label for="winnerValue">{{ __("value") }}</label>
          <input id="winnerValue" class="form-control" type="number" name="value">
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


