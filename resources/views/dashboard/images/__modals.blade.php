{{-- delete user modal --}}
<div class="modal fade" id="deleteImageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ __("Delete Image") }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="deleteImageForm" method="post">
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
<div class="modal fade" id="editImageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ __("Update_Image") }}</h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
        <form id="updateImageForm" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="modal-body ">
            <div class="form-group mb-3">
              <div class="mb-3" style="max-height: 300px; max-width: 300px; margin:auto; overflow: hidden;">
                <img style="width: 100%;" id="leftPreview" src="" class="card-img-top" alt="...">
              </div>
              <div class="custom-file">

                <label class="custom-file-label" for="customFile">{{ __("Choose file") }}</label>
                <input name="thumbnail" type="file" onchange="leftPreviewImage(this)" class="custom-file-input" id="customFile">
                
                @error('thumbnail')
                <div class="text-danger mt-3">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>

            <div class="form-group mb-3">
              <label for="editPrice">{{ __("Price") }}</label>
              <input id="editPrice" class="form-control" type="number" name="price" value="{{ old('price') }}">
              @error('price')
                <div class="text-danger">
                  {{ $message }}
                </div>
                @enderror
            </div>


            <div class="form-group mb-3">
              <label for="editOffer">{{ __("Offer") }}</label>
              <input id="editOffer" class="form-control" type="number" name="offer" value="{{ old('offer') ?? 0 }}">
              @error('offer')
                <div class="text-danger">
                  {{ $message }}
                </div>
                @enderror
            </div>



            <div class="form-group mb-3">
              <label for="month">{{ __("Month") }} : <span class="text-muted" id="editMonth"></span> </label>

              <select id="month" name="month" id="month" class="form-control">
                <option selected disabled>{{ __("Choose..") }}</option>
                @foreach ($months as $monthNumber => $monthName)
                    <option value="{{ $monthNumber }}">{{ __($monthName) }}</option>
                @endforeach
              </select>
              @error('month')
                <div class="text-danger">
                  {{ $message }}
                </div>
              @enderror
            </div>

            

            <div class="form-group mb-3">
              <label for="Qty">{{ __("Maximum_number_of_purchases") }}</label>
              <input id="Qty" class="form-control" type="number" name="qty" value="{{ old('qty') }}">
              @error('qty')
                <div class="text-danger">
                  {{ $message }}
                </div>
                @enderror
            </div>


            <div class="form-group mb-3">
              <label for="active">{{ __("Status") }}: <span id="status"></span></label>
              <select name="active" id="active" class="form-control">
                <option selected disabled>{{ __("Choose..") }}</option>
                <option value="0">{{ __("Not Active") }}</option>
                <option value="1">{{ __("Active") }}</option>
              </select>
              @error('active')
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