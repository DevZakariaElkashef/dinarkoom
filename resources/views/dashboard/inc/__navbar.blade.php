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
                            <a class="" href="user_profile.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> My Profile</a>
                        </div>
                        <div class="dropdown-item">
                            <a class="" href="apps_mailbox.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg> Inbox</a>
                        </div>
                        <div class="dropdown-item">
                            <a class="" href="auth_lockscreen.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg> Lock Screen</a>
                        </div>
                        <div class="dropdown-item">
                            <a class="" href="auth_login.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> Sign Out</a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </header>
</div>