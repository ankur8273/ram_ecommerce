@php
    // Get the current route name
    $currentRoute = \Route::currentRouteName();
@endphp
<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="" class="logo logo-light">
        <span class="logo-lg">
            <img src="{{ asset('public/assets/images/logo.png') }}" alt="logo">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('public/assets/images/logo-sm.png') }}" alt="small logo">
        </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="" class="logo logo-dark">
        <span class="logo-lg">
            <img src="{{ asset('public/assets/images/logo-dark.png') }}" alt="dark logo">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('public/assets/images/logo-dark-sm.png') }}" alt="small logo">
        </span>
    </a>

    <!-- Sidebar Hover Menu Toggle Button -->
    <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
        <i class="ri-checkbox-blank-circle-line align-middle"></i>
    </div>

    <!-- Full Sidebar Menu Close Button -->
    <div class="button-close-fullsidebar">
        <i class="ri-close-fill align-middle"></i>
    </div>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!-- Leftbar User -->
        <div class="leftbar-user">
            <a href="pages-profile.html">
                <img src="{{ asset('public/assets/images/users/avatar-1.jpg') }}" alt="user-image" height="42"
                    class="rounded-circle shadow-sm">
                <span class="leftbar-user-name mt-2">{{ Auth::user()->name }}</span>
            </a>
        </div>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title">Navigation</li>
            <li class="side-nav-item">
                <a href="{{ route('home') }}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-title">Apps</li>

            <li
                class="side-nav-item {{ in_array($currentRoute, ['category-index', 'category-create', 'category-edit']) ? ' menuitem-active' : '' }}">
                <a href="{{ route('category-index') }}" class="side-nav-link">
                    <i class="uil-clipboard-alt"></i>
                    <span> Category </span>
                </a>
            </li>


            <li
                class="side-nav-item {{ in_array($currentRoute, ['product-index', 'product-create', 'product-edit', 'product-details']) ? ' menuitem-active' : '' }}">
                <a href="{{ route('product-index') }}" class="side-nav-link">
                    <i class="uil-clipboard-alt"></i>
                    <span> Product </span>
                </a>
            </li>

            <li
                class="side-nav-item {{ in_array($currentRoute, ['order-index', 'order-details']) ? ' menuitem-active' : '' }}">
                <a href="{{ route('order-index') }}" class="side-nav-link">
                    <i class="uil-clipboard-alt"></i>
                    <span> Order </span>
                </a>
            </li>

        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>
