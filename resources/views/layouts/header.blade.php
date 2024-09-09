@php
    $categories = DB::table('categories')->whereNull('deleted_at')->get();
@endphp

<!-- header area start -->
<header>
    <!-- main menu area start -->
    <div class="header-main transparent-menu sticky">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 col-md-6 col-6">
                    <div class="logo">
                        <a href="index.html">
                            <img src="{{ asset('public/web/img/logo/logo.jpg') }}" alt="Brand logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 d-none d-lg-block">
                    <div class="main-header-inner">
                        <div class="main-menu">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class="{{ Request::routeIs('front-home') ? 'active' : '' }}"><a
                                            href="{{ route('front-home') }}">Home</a></li>

                                    <li class="">
                                        <a href="{{ route('front-products') }}">Our Products</a>
                                    </li>

                                    @if (Auth::guard('visitor')->user())
                                        <li><a href="#"> Hi, {{ Auth::guard('visitor')->user()->name }} <i
                                                    class="fa fa-angle-down"></i></a>
                                            <ul class="dropdown">
                                                <li {{ Request::routeIs('front-visitor-home') ? 'active' : '' }}><a
                                                        href="{{ route('front-visitor-home') }}">Dashboard</a></li>

                                                <li {{ Request::routeIs('front-visitor-profile') ? 'active' : '' }}><a
                                                        href="{{ route('front-visitor-profile') }}">Profile</a></li>

                                                <li class="{{ Request::routeIs('front-cart') ? 'active' : '' }}">
                                                    <a href="{{ route('front-cart') }}">Cart</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('front-logout') }}"
                                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        <i class="feather-log-out"></i>
                                                        <span>Logout</span>
                                                    </a>
                                                    <form method="post" action="{{ route('front-logout') }}"
                                                        id="logout-form">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                    @endguest

                                    @foreach ($categories as $category)
                                        <li class="">
                                            <a
                                                href="{{ route('front-products', $category->slug) }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach


                                    @guest('visitor')
                                        <li class="{{ Request::routeIs('front-login') ? 'active' : '' }}">
                                            <a href="{{ route('front-login') }}">Login</a>
                                        </li>
                                        <li class="{{ Request::routeIs('front-register') ? 'active' : '' }}">
                                            <a href="{{ route('front-register') }}">Register</a>
                                        </li>
                                    @endguest

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-2 col-md-6 col-6 ms-auto">
                <div class="header-setting-option">
                    <div class="search-wrap">
                        <button type="submit" class="search-trigger"><i class="ion-ios-search-strong"></i></button>
                    </div>
                    <div class="header-mini-cart">
                        <div class="mini-cart-btn">
                            <i class="ion-bag"></i>
                            <span class="cart-notification">2</span>
                        </div>
                        <ul class="cart-list">
                            <li>
                                <div class="cart-img">
                                    <a href="product-details.html"><img
                                            src="{{ asset('public/web/img/cart/cart-1.jpg') }}" alt=""></a>
                                </div>
                                <div class="cart-info">
                                    <h4><a href="product-details.html">simple product 09</a></h4>
                                    <span>$60.00</span>
                                </div>
                                <div class="del-icon">
                                    <i class="fa fa-times"></i>
                                </div>
                            </li>
                            <li>
                                <div class="cart-img">
                                    <a href="product-details.html"><img
                                            src="{{ asset('public/web/img/cart/cart-2.jpg') }}" alt=""></a>
                                </div>
                                <div class="cart-info">
                                    <h4><a href="product-details.html">virtual product 10</a></h4>
                                    <span>$50.00</span>
                                </div>
                                <div class="del-icon">
                                    <i class="fa fa-times"></i>
                                </div>
                            </li>
                            <li class="mini-cart-price">
                                <span class="subtotal">subtotal : </span>
                                <span class="subtotal-price ms-auto">$110.00</span>
                            </li>
                            <li class="checkout-btn">
                                <a href="#">checkout</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div> --}}
            <div class="col-12 d-block d-lg-none">
                <div class="mobile-menu"></div>
            </div>
        </div>
    </div>
</div>
<!-- main menu area end -->

<!-- Start Search Popup -->
<div class="box-search-content search_active block-bg close__top">
    <form class="minisearch" action="#">
        <div class="field__search">
            <input type="text" placeholder="Search Our Catalog">
            <div class="action">
                <a href="#"><i class="fa fa-search"></i></a>
            </div>
        </div>
    </form>
    <div class="close__wrap">
        <span>close</span>
    </div>
</div>
<!-- End Search Popup -->

</header>
<!-- header area end -->
