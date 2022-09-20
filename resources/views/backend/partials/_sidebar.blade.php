<nav class="iq-sidebar-menu">
    <ul id="iq-sidebar-toggle" class="iq-menu">
        <li class="active">
            <a href="{{ route('dashboard') }}" class="iq-waves-effect"><i
                    class="las la-home iq-arrow-left"></i><span>Dashboard</span></a>
        </li>

        @if (getuser()->hasRole('Super Admin'))
        {{-- ROLES MANAGEMENT ONLY FOR SUPER ADMIN --}}

        <li @if (in_array(request()->route()->getName(),
            ['roles.create', 'roles.edit', 'roles.index', 'roles.show'])) class="active" @endif>
            <a href="#userRoles" class="iq-waves-effect" data-toggle="collapse"
                @if (in_array(request()->route()->getName(),
                    ['roles.create', 'roles.edit', 'roles.index', 'roles.show'])) aria-expanded="true" @else aria-expanded="false" @endif><i
                    class="ri-menu-3-line iq-arrow-left"></i><span>Roles</span><i
                    class="ri-arrow-right-s-line iq-arrow-right"></i></a>
            <ul id="userRoles" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                @can('Create Roles')
                    <li class="{{ request()->route()->getName() == 'roles.create'? 'active': '' }}"><a
                            href="{{ route('roles.create') }}"><i class="las la-plus-circle"></i>Create a Role</a></li>
                @endcan
                @can('Read Roles')
                    <li class="{{ request()->route()->getName() == 'roles.create'? 'active': '' }}"><a
                            href="{{ route('roles.index') }}"><i class="las la-th-list"></i>Roles List</a></li>
                @endcan
            </ul>
        </li>
        {{-- ROLE MANAGEMENT END --}}

        @endif


        @if (getuser()->hasRole('Super Admin'))
        {{-- USER MANAGEMENT ONLY FOR SUPER ADMIN --}}
        <li @if (in_array(request()->route()->getName(),
            ['users.create', 'users.edit', 'users.index', 'users.show'])) class="active" @endif>
            <a href="#userinfo" class="iq-waves-effect" data-toggle="collapse"
                @if (in_array(request()->route()->getName(),
                    ['users.create', 'users.edit', 'users.index', 'users.show'])) aria-expanded="true" @else aria-expanded="false" @endif><span
                    class="ripple rippleEffect"></span><i class="las la-user-tie iq-arrow-left"></i><span>User</span><i
                    class="ri-arrow-right-s-line iq-arrow-right"></i></a>
            <ul id="userinfo" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle" style="">
                @can('Create Users')
                    <li class="{{ request()->route()->getName() == 'users.create'? 'active': '' }}"><a
                            href="{{ route('users.create') }}"><i class="las la-plus-circle"></i>User Add</a></li>
                @endcan
                @can('Read Users')
                    <li class="{{ request()->route()->getName() == 'users.index'? 'active': '' }}"><a
                            href="{{ route('users.index') }}"><i class="las la-th-list"></i>User List</a></li>
                @endcan
            </ul>
        </li>
        {{-- USER MANAGEMENT END --}}
      

        {{-- Designations ONLY FOR SUPER ADMIN --}}
        <li @if (in_array(request()->route()->getName(),
            ['designations.create', 'designations.edit', 'designations.index', 'designations.show'])) class="active" @endif>
            <a href="#designations" class="iq-waves-effect" data-toggle="collapse"
                @if (in_array(request()->route()->getName(),
                    ['designations.create', 'designations.edit', 'designations.index', 'designations.show'])) aria-expanded="true" @else aria-expanded="false" @endif><span
                    class="ripple rippleEffect"></span><i
                    class="las la-user-tie iq-arrow-left"></i><span>Designations</span><i
                    class="ri-arrow-right-s-line iq-arrow-right"></i></a>
            <ul id="designations" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle" style="">
              
                    <li class="{{ request()->route()->getName() == 'designations.create'? 'active': '' }}"><a
                            href="{{ route('designations.create') }}"><i class="las la-plus-circle"></i>Add
                            Designation</a></li>
               
             
                    <li class="{{ request()->route()->getName() == 'designations.index'? 'active': '' }}"><a
                            href="{{ route('designations.index') }}"><i class="las la-th-list"></i>All Designations</a>
                    </li>
            </ul>
        </li>
        {{-- Designations Edn --}}
        @endif

        {{-- SETTINGS ONLY FOR ADMIN AND SUPERADMIN --}}
        @can('Update Settings')
            <li class="{{ request()->route()->getName() == 'site.siteSettings'? 'active': '' }}">
                <a href="{{ route('site.siteSettings') }}" class="iq-waves-effect"><i
                        class="las la-tools iq-arrow-left"></i><span>General Settings</span></a>
            </li>
        @endcan
        {{-- SETTING END --}}
        


        <li @if (in_array(request()->route()->getName(),
            ['patients.create', 'patients.edit', 'patients.index', 'patients.show'])) class="active" @endif>
            <a href="#patients" class="iq-waves-effect" data-toggle="collapse"
                @if (in_array(request()->route()->getName(),
                    ['patients.create', 'patients.edit', 'patients.index', 'patients.show'])) aria-expanded="true" @else aria-expanded="false" @endif><span
                    class="ripple rippleEffect"></span><i class="las la-user-tie iq-arrow-left"></i><span>Patient</span><i
                    class="ri-arrow-right-s-line iq-arrow-right"></i></a>
            <ul id="patients" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle" style="">
                {{-- @can('Create patients') --}}
                    <li class="{{ request()->route()->getName() == 'patients.create'? 'active': '' }}"><a
                            href="{{ route('patients.create') }}"><i class="las la-plus-circle"></i>Add patient</a></li>
                {{-- @endcan --}}
                {{-- @can('Read patients') --}}
                    <li class="{{ request()->route()->getName() == 'patients.index'? 'active': '' }}"><a
                            href="{{ route('patients.index') }}"><i class="las la-th-list"></i>Patients List</a></li>
                {{-- @endcan --}}
            </ul>
        </li>
@if(getuser()->hasRole('Super Admin'))
        <li @if (in_array(request()->route()->getName(),
            ['cities.create', 'cities.edit', 'cities.index', 'cities.show'])) class="active" @endif>
            <a href="#cities" class="iq-waves-effect" data-toggle="collapse"
                @if (in_array(request()->route()->getName(),
                    ['cities.create', 'cities.edit', 'cities.index', 'cities.show'])) aria-expanded="true" @else aria-expanded="false" @endif><span
                    class="ripple rippleEffect"></span><i class="las la-user-tie iq-arrow-left"></i><span>Cities</span><i
                    class="ri-arrow-right-s-line iq-arrow-right"></i></a>
            <ul id="cities" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle" style="">
                {{-- @can('Create patients') --}}
                    <li class="{{ request()->route()->getName() == 'cities.create'? 'active': '' }}"><a
                            href="{{ route('cities.create') }}"><i class="las la-plus-circle"></i>Add City</a></li>
                            <li class="{{ request()->route()->getName() == 'cities.create'? 'active': '' }}"><a
                                href="{{ route('addCities') }}"><i class="las la-plus-circle"></i>Import Cities</a></li>
                {{-- @endcan --}}
                {{-- @can('Read patients') --}}
                    <li class="{{ request()->route()->getName() == 'cities.index'? 'active': '' }}"><a
                            href="{{ route('cities.index') }}"><i class="las la-th-list"></i>Cities List</a></li>
                {{-- @endcan --}}
            </ul>
        </li>
@endif

    </ul>
</nav>
<div class="p-3"></div>
