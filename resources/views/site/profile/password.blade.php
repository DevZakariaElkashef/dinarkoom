@extends('site.layouts.app')
@section('content')
    
        
    <!-- Contact section-->
    <section class="bg-dark text-light py-5">
        <div class="container px-5 my-5 px-5 py-5">
            <div class="text-center mb-5">
                <h2 class="fw-bolder">{{ __("Update Password") }}</h2>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <form id="contactForm" data-sb-form-api-token="API_TOKEN" class="text-dark" action="{{ route('profile.updatePassword') }}" method="POST">
                        @csrf
                        <!-- Old Password input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" name="old_password" id="oldPassword" type="password" placeholder="Enter Old Password" data-sb-validations="required" />
                            <label for="oldPassword">{{ __("Old Password") }}</label>
                            @error('old_password')
                                <div class="text-danger" >{{ $message }}</div>
                            @enderror

                        </div>
                        
                        <!-- New Password input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" name="new_password" id="newPassword" type="password" placeholder="Enter New Password" data-sb-validations="required" />
                            <label for="newPassword">{{ __("New Password") }}</label>
                            @error('new_password')
                                <div class="text-danger" >{{ $message }}</div>
                            @enderror

                        </div>
                        <!-- an error submitting the form-->
                        <div class="d-none" id="submitErrorMessage"><div class="text-center text-primary mb-3">Error sending message!</div></div>
                        <!-- Submit Button-->
                        <div class="d-grid"><button type="submit" class="btn btn-primary btn-lg" id="submitButton" type="submit">{{ __('Update') }}</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
        
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if($('#show_hide_password input').attr("type") == "text"){
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass( "fa-eye-slash" );
                    $('#show_hide_password i').removeClass( "fa-eye" );
                }else if($('#show_hide_password input').attr("type") == "password"){
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass( "fa-eye-slash" );
                    $('#show_hide_password i').addClass( "fa-eye" );
                }
            });
        });
    </script>
@endsection