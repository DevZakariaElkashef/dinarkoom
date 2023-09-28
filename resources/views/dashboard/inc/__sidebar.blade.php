<div class="sidebar-wrapper sidebar-theme">
            
    <nav id="sidebar">
        <div class="shadow-bottom"></div>

        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu">
                <a href="#starter-kit" data-active="true" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-terminal"><polyline points="4 17 10 11 4 5"></polyline><line x1="12" y1="19" x2="20" y2="19"></line></svg>
                        <span>{{ __("Dashboard") }}</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="submenu list-unstyled collapse show" id="starter-kit" data-parent="#accordionExample" style="">
                    <li class="active">
                        <a href="#"> Sales </a>
                    </li>
                </ul>
            </li>
            
            <li class="menu">
                <a href="#users-dropdown" data-toggle="collapse" class="dropdown-toggle">
                    <div class="">
                        <i class="fa-solid fa-users"></i>
                        <span>{{ __("Users") }}</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="submenu list-unstyled collapse" id="users-dropdown" data-parent="#accordionExample" style="">
                    <li class="">
                        <a href="{{ route('users.create') }}"> {{ __("Add User") }} </a>
                    </li>
                    <li class="">
                        <a href="{{ route('users.index') }}"> {{ __("View User") }} </a>
                    </li>
                </ul>
            </li>

            

            <li class="menu">
                <a href="#images-dropdown" data-toggle="collapse" class="dropdown-toggle">
                    <div class="">
                        <i class="fa-solid fa-image"></i>
                        <span>{{ __("Images") }}</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="submenu list-unstyled collapse" id="images-dropdown" data-parent="#accordionExample" style="">
                    <li class="">
                        <a href="{{ route('images.create') }}"> {{ __("Add Image") }} </a>
                    </li>
                    <li class="">
                        <a href="{{ route('images.index') }}"> {{ __("View Image") }} </a>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a href="{{ route('banners.index') }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="fa-solid fa-images"></i>
                        <span>{{ __("Sliders") }}</span>
                    </div>
                </a>
            </li>

            
        </ul>
        
    </nav>

</div>