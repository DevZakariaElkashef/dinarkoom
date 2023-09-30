<div class="sidebar-wrapper sidebar-theme">
            
    <nav id="sidebar">
        <div class="shadow-bottom"></div>

        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu">
                <a href="#starter-kit" data-active="{{ isActiveRoute('dashboard.index') ? 'true' : 'false' }}" aria-expanded="{{ isActiveRoute(['dashboard.index']) ? 'true' : 'false' }}" data-toggle="collapse" class="dropdown-toggle">
                    <div class="">
                        <i class="fa-solid fa-chart-line"></i>
                        <span>{{ __("Dashboard") }}</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="submenu list-unstyled collapse {{ isActiveRoute(['dashboard.index']) ? 'show' : '' }}" id="starter-kit" data-parent="#accordionExample" style="">
                    <li class="{{ isActiveRoute('dashboard.index') }}">
                        <a href="{{ route('dashboard.index') }}"> Sales </a>
                    </li>
                </ul>
            </li>
            
            <li class="menu">
                <a href="#users-dropdown" data-active="{{ isActiveRoute(['users.create', 'users.index']) ? 'true' : 'false' }}" aria-expanded="{{ isActiveRoute(['users.create', 'users.index']) ? 'true' : 'false' }}" data-toggle="collapse" class="dropdown-toggle">
                    <div class="">
                        <i class="fa-solid fa-users"></i>
                        <span>{{ __("Users") }}</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="submenu list-unstyled collapse {{ isActiveRoute(['users.create', 'users.index']) ? 'show' : '' }}" id="users-dropdown" data-parent="#accordionExample" style="">
                    <li class="{{ isActiveRoute('users.create') }}">
                        <a href="{{ route('users.create') }}"> {{ __("Add User") }} </a>
                    </li>
                    <li class="{{ isActiveRoute('users.index') }}">
                        <a href="{{ route('users.index') }}"> {{ __("View User") }} </a>
                    </li>
                </ul>
            </li>
            
            <li class="menu">
                <a href="#relatives-dropdown" data-active="{{ isActiveRoute(['admin-relatives.create', 'admin-relatives.index, relative-types.index']) ? 'true' : 'false' }}" aria-expanded="{{ isActiveRoute(['admin-relatives.create', 'admin-relatives.index, relative-types.index']) ? 'true' : 'false' }}" data-toggle="collapse" class="dropdown-toggle">
                    <div class="">
                        <i class="fa-solid fa-people-roof"></i>
                        <span>{{ __("Relatives") }}</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="submenu list-unstyled collapse {{ isActiveRoute(['admin-relatives.create', 'admin-relatives.index', 'relative-types.index']) ? 'show' : '' }}" id="relatives-dropdown" data-parent="#accordionExample" style="">
                    <li class="{{ isActiveRoute('admin-relatives.create') }}">
                        <a href="{{ route('admin-relatives.create') }}"> {{ __("Add Relative") }} </a>
                    </li>
                    <li class="{{ isActiveRoute('admin-relatives.index') }}">
                        <a href="{{ route('admin-relatives.index') }}"> {{ __("View Retiaves") }} </a>
                    </li>
                    <li class="{{ isActiveRoute('relative-types.index') }}">
                        <a href="{{ route('relative-types.index') }}"> {{ __("Retiaves Types") }} </a>
                    </li>
                </ul>
            </li>

            

            <li class="menu">
                <a href="#images-dropdown" data-active="{{ isActiveRoute(['images.create', 'images.index']) ? 'true' : 'false' }}" aria-expanded="{{ isActiveRoute(['images.create', 'images.index']) ? 'true' : 'false' }}" data-toggle="collapse" class="dropdown-toggle">
                    <div class="">
                        <i class="fa-solid fa-image"></i>
                        <span>{{ __("Images") }}</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="submenu list-unstyled collapse {{ isActiveRoute(['images.create', 'images.index']) ? 'show' : '' }}" id="images-dropdown" data-parent="#accordionExample" style="">
                    <li class="{{ isActiveRoute('images.create') }}">
                        <a href="{{ route('images.create') }}"> {{ __("Add Image") }} </a>
                    </li>
                    <li class="{{ isActiveRoute('images.index') }}">
                        <a href="{{ route('images.index') }}"> {{ __("View Image") }} </a>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a href="{{ route('banners.index') }}" data-active="{{ isActiveRoute(['banners.index']) ? 'true' : 'false' }}" aria-expanded="{{ isActiveRoute(['banners.index']) ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <i class="fa-solid fa-images"></i>
                        <span>{{ __("Sliders") }}</span>
                    </div>
                </a>
            </li>


            <li class="menu">
                <a href="#pages-dropdown" data-active="{{ isActiveRoute(['page.terms.index', 'about-us.index']) ? 'true' : 'false' }}" aria-expanded="{{ isActiveRoute(['page.terms.index', 'about-us.index']) ? 'true' : 'false' }}" data-toggle="collapse" class="dropdown-toggle">
                    <div class="">
                        <i class="fa-solid fa-file"></i>
                        <span>{{ __("Pages") }}</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="submenu list-unstyled collapse {{ isActiveRoute(['page.terms.index', 'about-us.index']) ? 'show' : '' }}" id="pages-dropdown" data-parent="#accordionExample" style="">
                    <li class="{{ isActiveRoute('about-us.index') }}">
                        <a href="{{ route('about-us.index') }}"> {{ __("AboutUs") }} </a>
                    </li>
                    <li class="{{ isActiveRoute('page.terms.index') }}">
                        <a href="{{ route('page.terms.index') }}"> {{ __("Terms") }} </a>
                    </li>
                    
                </ul>
            </li>

            <li class="menu">
                <a href="{{ route('contacts.index') }}" data-active="{{ isActiveRoute(['contacts.index']) ? 'true' : 'false' }}" aria-expanded="{{ isActiveRoute(['contacts.index']) ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <i class="fa-solid fa-message"></i>
                        <span>{{ __("Contact") }}</span>
                    </div>
                </a>
            </li>


            <li class="menu">
                <a href="{{ route('settings.index') }}" data-active="{{ isActiveRoute(['settings.index']) ? 'true' : 'false' }}" aria-expanded="{{ isActiveRoute(['settings.index']) ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <i class="fa-solid fa-gear"></i>
                        <span>{{ __("Setting") }}</span>
                    </div>
                </a>
            </li>

            
        </ul>
        
    </nav>

</div>






