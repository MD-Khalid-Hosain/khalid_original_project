<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="index.html"><img src="{{ asset('backend/assets/images/logo.svg') }}" width="25" alt="Aero"><span class="m-l-10">Aero</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a class="image" href="">@if ( Auth::guard('admin')->user()->image !=null ) <img src="{{ asset('backend/uploads/admin') }}/{{ Auth::guard('admin')->user()->image }}" alt="{{ Auth::guard('admin')->user()->name }}"> @else <img src="{{ asset('backend/uploads/admin/default_photo.jpg') }}" alt="Default Image"> @endif</a>
                    <div class="detail">
                        <h4>{{ ucwords(auth('admin')->user()->name) }}</h4>
                        <small>{{ ucwords(auth('admin')->user()->type) }}</small>
                    </div>
                </div>
            <li class="@yield('dashboard_active')"><a class="@yield('dashboard_toggled')"href="{{ route('dashboard.index') }}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li class="@yield('role_management_active')"><a href="javascript:void(0);" class="menu-toggle @yield('role_create_toggled')"><i class="zmdi zmdi-account-circle"></i><span>Role Management</span></a>
                <ul class="ml-menu">
                    <li class="@yield('role_create_active')"><a class="@yield('role_create_toggled')" href="{{ route('management.index') }}">Create Role</a></li>
                    <li class="@yield('assign_role_active')"><a class="@yield('assign_role_toggled')" href="{{ route('management.user') }}">Assign Role to User</a></li>

                </ul>
            </li>
            <li class="@yield('admin_settings_active')"><a href="javascript:void(0);" class="menu-toggle @yield('update_details_toggled')"><i class="zmdi zmdi-account"></i><span>Admin Profile</span></a>
                <ul class="ml-menu">
                    <li class="@yield('update_details_active')"><a class="@yield('update_details_toggled')" href="{{ url('/admin/update-details') }}">Update Details</a></li>
                    <li class="@yield('change_pwd_active')"><a class="@yield('change_pwd_toggled')" href="{{ url('/admin/settings') }}">Change Password</a></li>
                </ul>
            </li>
            <li class="@yield('section_settings_active')"><a href="javascript:void(0);" class="menu-toggle @yield('section_toggled')"><i class="zmdi zmdi-account"></i><span>Catalogue</span></a>
                <ul class="ml-menu">
                    <li class="@yield('section_active')"><a class="@yield('section_toggled')" href="{{ url('/admin/section') }}">Section</a></li>
                    <li class="@yield('brand_active')"><a class="@yield('brand_toggled')" href="{{ url('/admin/brands') }}">Brand</a></li>
                    <li class="@yield('category_active')"><a class="@yield('category_toggled')" href="{{ url('/admin/categories') }}">Category</a></li>
                </ul>
            </li>
            <li class="@yield('product_settings_active')"><a href="javascript:void(0);" class="menu-toggle @yield('product_toggled')"><i class="zmdi zmdi-account"></i><span>Product</span></a>
                <ul class="ml-menu">
                    <li class="@yield('product_active')"><a class="@yield('product_toggled')" href="{{ url('/admin/products') }}">Product Manage</a></li>

                </ul>
            </li>
        </ul>
    </div>
</aside>
