<!DOCTYPE html>
<html lang="ar" @if(app()->getLocale() == 'ar' || app()->getLocale() == 'ur') dir="rtl" @else dir="ltr" @endif>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{ $app ? $app->{'name_' . app()->getLocale()} : '' }}</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('site/assets/favicon.ico') }}" />
        <!-- Bootstrap icons-->
        <link href="{{ asset('site/css/bootstrap-icons.css') }}" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="{{ asset('site/css/styles.css') }}" rel="stylesheet" />

        <link href="plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />

        <style>
            .sweet-notify {
                position: absolute;
                top: 120px;
                right: 20px;
                background-color: #007bff; /* Bootstrap primary color */
                color: #fff;
                padding: 10px;
                border-radius: 4px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                max-width: 400px;
                padding-right: 20px
            }
            .sweet-notify .close {
                color: #fff;
                font-size: 20px;
                font-weight: bold;
                cursor: pointer;
                top: 3%;
                right: 3%;
                position: absolute;
                
            }
            html {
                background: #000;
            }
          </style>

          @yield('style')

    </head>
    <body class="bg-dark">

        <div class="sticky-top bg-dark">

            <!-- Top Navbar -->
            <div class="top-navbar text-light ">
                <div class="container px-5">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <!-- Left content -->
                            <div class="date-info">
                                <p class="py-2 m-0">{{ now()->translatedFormat('d F Y - h:i A') }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Right content -->
                            <div class="social-media-icons @if(app()->getLocale() == 'ar' || app()->getLocale() == 'ur') text-start @else text-end @endif">
                                @if($app && $app->facebook)
                                    <a class="text-light py-2 mx-1" style="overflow: hidden;" href="{{ $app->facebook }}">
                                        <img src="{{ Storage::url($app->facebook_icon) }}" style="width: 20px !important;">
                                    </a>
                                @endif
                               
                                @if($app && $app->whatsapp)
                                    <a class="text-light py-2 mx-1" href="{{ $app->whatsapp }}">
                                        <img src="{{ Storage::url($app->whatsapp_icon) }}" style="width: 20px !important;">
                                    </a>
                                @endif
                                
                                @if($app && $app->youtube)
                                    <a class="text-light py-2 mx-1" href="{{ $app->youtube }}">
                                        <img src="{{ Storage::url($app->youtube_icon) }}" style="width: 20px !important;">
                                    </a>
                                @endif
                                
                                @if($app && $app->twitter)
                                    <a class="text-light py-2 mx-1" href="{{ $app->twitter }}">
                                        <img src="{{ Storage::url($app->twitter_icon) }}" style="width: 20px !important;">
                                    </a>
                                @endif
                                
                                @if($app && $app->linkedin)
                                    <a class="text-light py-2 mx-1" href="{{ $app->linkedin }}">
                                        <img src="{{ Storage::url($app->linkedin_icon) }}" style="width: 20px !important;">
                                    </a>
                                @endif
                                
                                @if($app && $app->pinterest)
                                    <a class="text-light py-2 mx-1" href="{{ $app->pinterest }}">
                                        <img src="{{ Storage::url($app->pinterest_icon) }}" style="width: 20px !important;">
                                    </a>
                                @endif
                                
                                @if($app && $app->instagram)
                                    <a class="text-light py-2 mx-1" href="{{ $app->instagram }}">
                                        <img src="{{ Storage::url($app->instagram_icon) }}" style="width: 20px !important;">
                                    </a>
                                @endif
                                
                                @if($app && $app->snapchat)
                                    <a class="text-light py-2 mx-1" href="{{ $app->snapchat }}">
                                        <img src="{{ Storage::url($app->snapchat_icon) }}" style="width: 20px !important;">
                                    </a>
                                @endif
                                
                                @if($app && $app->tiktok)
                                    <a class="text-light py-2 mx-1" href="{{ $app->tiktok }}">
                                        <img src="{{ Storage::url($app->tiktok_icon) }}" style="width: 20px !important;">
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Responsive navbar-->
            <nav class="navbar navbar-expand-lg navbar-dark" style="">
                <div class="container px-5">
                    <a class="navbar-brand " href="{{ route('home') }}">
                        <img style="max-width: 50px;" src="{{ $app && $app->logo ? Storage::url($app->logo) : asset('dashboard/'. app()->getLocale() .'/assets/img/90x90.jpg') }}" class="navbar-logo" alt="logo">
                        {{ $app ? $app->{'name_' . app()->getLocale()} : '' }}
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">{{ __('home') }}</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('countact_us.index') }}">{{ __("contact us") }}</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('about_us.index') }}">{{ __('about us') }}</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route("winner.index") }}">{{ __('Winners') }}</a></li>
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle nav-link" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                        <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path d="M57.7 193l9.4 16.4c8.3 14.5 21.9 25.2 38 29.8L163 255.7c17.2 4.9 29 20.6 29 38.5v39.9c0 11 6.2 21 16 25.9s16 14.9 16 25.9v39c0 15.6 14.9 26.9 29.9 22.6c16.1-4.6 28.6-17.5 32.7-33.8l2.8-11.2c4.2-16.9 15.2-31.4 30.3-40l8.1-4.6c15-8.5 24.2-24.5 24.2-41.7v-8.3c0-12.7-5.1-24.9-14.1-33.9l-3.9-3.9c-9-9-21.2-14.1-33.9-14.1H257c-11.1 0-22.1-2.9-31.8-8.4l-34.5-19.7c-4.3-2.5-7.6-6.5-9.2-11.2c-3.2-9.6 1.1-20 10.2-24.5l5.9-3c6.6-3.3 14.3-3.9 21.3-1.5l23.2 7.7c8.2 2.7 17.2-.4 21.9-7.5c4.7-7 4.2-16.3-1.2-22.8l-13.6-16.3c-10-12-9.9-29.5 .3-41.3l15.7-18.3c8.8-10.3 10.2-25 3.5-36.7l-2.4-4.2c-3.5-.2-6.9-.3-10.4-.3C163.1 48 84.4 108.9 57.7 193zM464 256c0-36.8-9.6-71.4-26.4-101.5L412 164.8c-15.7 6.3-23.8 23.8-18.5 39.8l16.9 50.7c3.5 10.4 12 18.3 22.6 20.9l29.1 7.3c1.2-9 1.8-18.2 1.8-27.5zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z" fill="#FFFFFF" />
                                      </svg>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('en') }}">{{ __("English") }}</a></li>
                                    <li><a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('ar') }}">{{ __("Arabic") }}</a></li>
                                    <li><a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('ur') }}">{{ __("Urdu") }}</a></li>
                                    <li><a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('fil') }}">{{ __("Filipino") }}</a></li>
                                </ul>
                            </div>
                            <li class="nav-item">
                                
                            </li>
                            @auth
                            <div class="dropdown">
                                <span class="badge badge-pill badge-primary text-light bg-primary p-1" style="float:right;margin-bottom:-10px;">{{ $notifications->count() }}</span> <!-- your badge -->
                                <a href="#" class="dropdown-toggle nav-link" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                        <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path d="M224 0c-17.7 0-32 14.3-32 32V51.2C119 66 64 130.6 64 208v18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416H416c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8V208c0-77.4-55-142-128-156.8V32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z" fill="#FFFFFF" />
                                      </svg>
                                </a>
                                    
                                <ul class="dropdown-menu">
                                    @foreach ($notifications as $notification)
                                        <li><a class="dropdown-item show-notify-btn" 
                                                href="#" 
                                                data-id="{{ $notification->id }}"
                                                data-title="{{ $notification->{'title_' . app()->getLocale()} }}"
                                                data-body="{{ $notification->{'body_' . app()->getLocale()} }}"
                                                data-bs-toggle="modal" 
                                                data-bs-target="#showNotification">{{ $notification->{'title_' . app()->getLocale()} }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            @endauth







                        </ul>
                        
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            @guest
                                <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route("login") }}">{{ __('Login') }}</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route("register") }}">{{ __('Register') }}</a></li>
                                @if(auth('guest')->check())
                                    <li class="nav-item"><a class="nav-link" href="#">{{ auth('guest')->user()->name }}</a></li>
                                @endif
                            @else
                            
                                
                                <div class="dropdown">
                                    <a href="#"  class="dropdown-toggle nav-link" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                            <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                            <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" fill="#ffffff"/>
                                        </svg> 
    
                                        <p class="ms-1 d-inline">{{ Auth::user()->name }}</p>
                                    </a>
                                    <ul class="dropdown-menu">
                                        @if(auth()->user()->can('see dashboard')) <li><a class="dropdown-item" href="{{ route('dashboard.index') }}">{{ __("Dashboard") }}</a></li> @endif
                                        <li><a class="dropdown-item" href="{{ route('profile.index') }}">{{ __("Profile") }}</a></li>
                                        <li><a class="dropdown-item" href="{{ route('relatives.index') }}">{{ __("Relatives") }}</a></li>
                                        @if(Auth::check() && Auth::user()->orders)
                                            <li><a class="dropdown-item" href="{{ route('order.index') }}">{{ __("My Orders") }}</a></li>
                                        @endif

                                        <li><a class="dropdown-item" href="{{ route('profile.editPassword') }}">{{ __("Change Password") }}</a></li>
                                        <li>
                                            <a class="dropdown-item" onclick="$('#logoutForm').submit()" href="#">
                                                {{ __("Logout") }}
                                            </a>
                                    
                                            <form id="logoutForm" action="{{ route('logout') }}" method="post">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
    
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        
                            <!-- Modal -->
                            <div class="modal fade" id="showNotification" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow: hidden">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __("Relative Info") }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    
                                        <div class="form-group">
                                            <label for="title">{{ __("Name") }}</label>
                                            <input disabled name="name" type="text" class="form-control" id="title">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="civilId">{{ __("Civil_id") }}</label>
                                            <textarea class="form-control" disabled id="body" cols="30" rows="10"></textarea>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __("Close") }}</button>
                                    </div>
                                </div>
                                </div>
                            </div>

        <div class="mt-5">
            @yield('content')
        </div>

        @if(session('message'))
        <div class="sweet-notify">
            <span>{{ session('message') }}</span>
            <span class="close">&times;</span>
        </div>
        @endif
        

        <!-- Footer-->
        <footer class="py-1 bg-dark">
            <div class="container px-5"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="{{ asset('site/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('site/js/scripts.js') }}"></script>
        <script src="{{ asset('site/js/jquery.min.js') }}"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ asset('site/js/sb-forms-0.4.1.js') }}"></script>

        <script>
            const notifyDiv = document.querySelector('.sweet-notify');
            const closeButton = document.querySelector('.sweet-notify .close');
        
            closeButton.addEventListener('click', () => {
              notifyDiv.style.display = 'none';
            });
        
            setTimeout(() => {
              notifyDiv.style.display = 'none';
            }, 2000);
            
        </script>
        <script>
            $(document).on('click', '.show-notify-btn', function(){
                $('#title').val($(this).data('title'));
                $('#body').val($(this).data('body'));
            })
        </script>

            

        @yield('script')
    </body>
</html>
