@extends('site.layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3 text-light">
        <div class="col-md-6"><h3>{{ __("Relatives") }}</h3></div>
        <div class="col-md-6 text-end">
            <a href="{{ route('relatives.create') }}" class="btn btn-primary">
                {{ __("Add Relative") }}
            </a>
        </div>
    </div>
</div>

    <div class="row justify-content-center text-center">
    @forelse (Auth::user()->relatives as $relative)
        <div class="col-md-4 mb-4 d-flex justify-content-center">
            <a  id="showRelativeModalBtn"
                href="#" 
                class="text-dark text-decoration-none" 
                data-name="{{ $relative->name }}"
                data-email="{{ $relative->email }}"
                data-phone="{{ $relative->phone }}"
                data-addition_phone="{{ $relative->addition_phone }}"
                data-civil_id="{{ $relative->civil_id }}"
                data-bs-toggle="modal" 
                data-bs-target="#showRelativeModal">

                <div class="card" style="max-width: 18rem;">
                    <img style="width: 100%;" class="card-img-top" src="{{ asset('site/assets/img/Default-avatar.jpg') }}" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{ $relative->type->{'name_' . app()->getLocale()} ?? '' }}</h5>
                        <p class="card-text">{{ $relative->name ?? '' }}</p>
                    </div>
                    <img class="card-img-bottom" src="" alt="">
                </div>

            </a>
        </div>
        @empty
        <h1 class="my-5 text-muted">{{ __("You Dont Have Relative Yet") }}</h1>
        @endforelse
    </div>

  
  <!-- Modal -->
  <div class="modal fade" id="showRelativeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
            <div class="form-group">
                <label for="editName">{{ __("Name") }}</label>
                <input disabled name="name" type="text" class="form-control" id="editName">
            </div>
            <div class="form-group">
                <label for="email">{{ __("Email") }}</label>
                <input disabled name="email" type="email" class="form-control" id="email">
            </div>

            <div class="form-group">
                <label for="phone">{{ __("Phone") }}</label>
                <input disabled name="phone" type="text" class="form-control" id="phone">
            </div>

            <div class="form-group">
                <label for="additionPhone">{{ __("Addition_Phone") }}</label>
                <input disabled name="addition_phone" type="text" class="form-control" id="additionPhone">
            </div>

            <div class="form-group">
                <label for="civilId">{{ __("Civil_id") }}</label>
                <input disabled name="civil_id" type="text" class="form-control" id="civilId">
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

    
    
@endsection

@section('script')
    <script>
        $(document).on('click', '#showRelativeModalBtn', function() {
            $('#editName').val($(this).data('name'));
            $('#email').val($(this).data('email'));
            $('#phone').val($(this).data('phone'));
            $('#additionPhone').val($(this).data('addition_phone'));
            $('#civilId').val($(this).data('civil_id'));
        });
    </script>
@endsection