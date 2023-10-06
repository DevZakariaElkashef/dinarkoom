{{-- delete user modal --}}
<div class="modal fade" id="deleteOrderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ __("Delete Order") }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="deleteOrderForm" method="post">
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
<div class="modal fade" id="editOrderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ __("Order Details") }}</h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
        
          <div class="modal-body ">
            
            <h4 class="mb-3">{{ __("Order") }}: {{ __("#") }} <span id="orderId"></span></h4>
            <p class="mb-3">{{ __("Name") }}: <span id="OrderUserName"></span></p>
            <p class="mb-3">{{ __("Email") }}: <span id="OrderUserEmail"></span></p>
            <p class="mb-3">{{ __("Phone") }}: <span id="OrderUserPhone"></span></p>
            <p class="mb-3">{{ __("Addition_Phone") }}: <span id="OrderUserAdditionPhone"></span></p>
            <p class="mb-3">{{ __("Civil_id") }}: <span id="OrderUserCivilId"></span></p>
            <p class="mb-3">{{ __("Relative") }}: <span id="OrderUserEmail"></span></p>
            <p class="mb-3">{{ __("Status") }}: <span id="OrderStatus"></span></p>
            <p class="mb-3">{{ __("Date") }}: <span id="OrderDate"></span></p>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __("Close") }}</button>
          </div>
    </div>
  </div>
</div>


