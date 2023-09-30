<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm">

        <ul class="navbar-item theme-brand flex-row  text-center">
            <li class="nav-item theme-logo">
                <a href="{{ route('dashboard.index') }}">
                    <img src="{{ asset('dashboard/'. app()->getLocale() .'/assets/img/90x90.jpg') }}" class="navbar-logo" alt="logo">
                </a>
            </li>
            <li class="nav-item theme-text">
                <a href="{{ route('dashboard.index') }}" class="nav-link"> CORK </a>
            </li>
        </ul>

        <ul class="navbar-item flex-row ml-md-auto">


            <li class="nav-item dropdown language-dropdown">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="language-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="@if(app()->getLocale() == 'en') {{ asset('dashboard/'. app()->getLocale() .'/assets/img/ca.png') }} @elseif(app()->getLocale() == 'ar') {{ asset('dashboard/'. app()->getLocale() .'/assets/img/ar.png') }} @elseif (app()->getLocale() == 'ur') {{ asset('dashboard/'. app()->getLocale() .'/assets/img/ur.png') }} @else {{ asset('dashboard/'. app()->getLocale() .'/assets/img/fil.jpg') }} @endif" class="flag-width" alt="flag">
                </a>
                <div class="dropdown-menu position-absolute" aria-labelledby="language-dropdown">
                    <a class="dropdown-item d-flex" href="{{ LaravelLocalization::getLocalizedURL('ar') }}"><img src="{{ asset('dashboard/'. app()->getLocale() .'/assets/img/ar.png') }}" class="flag-width" alt="flag"> <span class="align-self-center">&nbsp;{{ __("Arabic") }}</span></a>
                    <a class="dropdown-item d-flex" href="{{ LaravelLocalization::getLocalizedURL('ur') }}"><img src="{{ asset('dashboard/'. app()->getLocale() .'/assets/img/ur.png') }}" class="flag-width" alt="flag"> <span class="align-self-center">&nbsp;{{ __("Urdu") }}</span></a>
                    <a class="dropdown-item d-flex" href="{{ LaravelLocalization::getLocalizedURL('fil') }}"><img src="{{ asset('dashboard/'. app()->getLocale() .'/assets/img/fil.jpg') }}" class="flag-width" alt="flag"> <span class="align-self-center">&nbsp;{{ __("Filipino") }}</span></a>
                    <a class="dropdown-item d-flex" href="{{ LaravelLocalization::getLocalizedURL('en') }}"><img src="{{ asset('dashboard/'. app()->getLocale() .'/assets/img/ca.png') }}" class="flag-width" alt="flag"> <span class="align-self-center">&nbsp;{{ __("English") }}</span></a>
                </div>
            </li>

            <li class="nav-item dropdown user-profile-dropdown">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <img src="{{ asset("dashboard/". app()->getLocale() ."/assets/img/90x90.jpg") }}" alt="avatar">
                </a>
                <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                    <div class="">
                        <div class="dropdown-item">
                            <a class="" href="{{ route("admin-profile.index") }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> My Profile</a>
                        </div>
                        
                        <div class="dropdown-item">
                            <a class="" onclick="$('#logoutForm').submit()" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> Sign Out</a>
                            <form id="logoutForm" style="display: hidden;" action="{{ route("logout") }}" method="post">
                            @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </header>
</div>