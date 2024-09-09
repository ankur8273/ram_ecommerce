@extends('layouts.app')
@section('title', 'Webhuts - Main Dashboard')
@section('css')
    <style>

    </style>
@endsection
@section('content')

    <!-- slider area start -->
    <div class="hero-area">
        <div class="hero-slider-active slider-arrow-style slick-dot-style hero-dot">
            <div class="hero-single-slide hero-1 d-flex align-items-center"
                style="background-image: url({{ asset('public/web/img/slider/slide-1.jpg') }});">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="slider-content">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-single-slide hero-1 d-flex align-items-center"
                style="background-image: url({{ asset('public/web/img/slider/slide-2.jpg') }});">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="slider-content">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-single-slide hero-1 d-flex align-items-center"
                style="background-image: url({{ asset('public/web/img/slider/slide-11.jpg') }});">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="slider-content">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider area end -->

    <!-- banner statistics 01 start -->
    <div class="banner-statistic-one bg-gray pt-100 pb-100 pt-sm-58 pb-sm-58">
        <div class="container">
            <div class="row">
                <div class="col1 col-sm-6">
                    <div class="img-container img-full fix">
                        <a href="#">
                            <img src="{{ asset('public/web/img/banner/banner-1.jpg') }}" alt="banner image">
                        </a>
                    </div>
                </div>
                <div class="col2 col-sm-6">
                    <div class="img-container img-full fix">
                        <a href="#">
                            <img src="{{ asset('public/web/img/banner/banner-2.jpg') }}" alt="banner image">
                        </a>
                    </div>
                </div>
                <div class="col3 col">
                    <div class="img-container img-full fix mb-30">
                        <a href="#">
                            <img src="{{ asset('public/web/img/banner/banner-3.jpg') }}" alt="banner image">
                        </a>
                    </div>
                    <div class="img-container img-full fix">
                        <a href="#">
                            <img src="{{ asset('public/web/img/banner/banner-4.jpg') }}" alt="banner image">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner statistics 01 end -->

    <!-- featured product area start -->
    <div class="page-section pt-100 pb-14 pt-sm-60 pb-sm-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center pb-44">
                        <p>The latest featured products</p>
                        <h2>Featured products</h2>
                    </div>
                </div>
            </div>
            <div class="product-carousel-one spt slick-arrow-style slick-padding" data-row="1">
                @if (!empty($products))
                    @foreach ($products as $product)
                        <div class="col">
                            <div class="product-item mb-20">
                                <div class="product-thumb">
                                    <a href="#">
                                        <img src="{{ asset('public/uploads/product/' . $product->banner) }}"
                                            alt="{{ $product->name }}">
                                    </a>
                                    <div class="box-label">
                                        <div class="product-label new">
                                            <span>new</span>
                                        </div>
                                        {{-- <div class="product-label discount">
                                            <span>-5%</span>
                                        </div> --}}
                                    </div>
                                    <div class="product-action-link">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"> <span
                                                data-bs-toggle="tooltip" data-bs-placement="left" title="Quick view"><i
                                                    class="ion-ios-eye-outline"></i></span> </a>
                                        {{-- <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                            title="Compare"><i class="ion-ios-loop"></i></a>
                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                            title="Wishlist"><i class="ion-ios-shuffle"></i></a> --}}
                                    </div>
                                </div>
                                <div class="product-description text-center">
                                    <div class="manufacturer">
                                        {{-- <p><a href="#">Fashion Manufacturer</a></p> --}}
                                    </div>
                                    <div class="product-name">
                                        <h3><a href="#">{{ $product->name }}</a></h3>
                                    </div>
                                    <div class="price-box">
                                        <span class="regular-price">{{ '₹' . $product->price }}</span>
                                        @if ($product->discount_price > 0)
                                            <span class="old-price"><del>{{ ' ₹' . $product->discount_price }}</del></span>
                                        @endif
                                    </div>
                                    <div class="product-btn">
                                        <a href="javascript:void(0)" class="addToCartBtn"
                                            data-slug="{{ $product->slug }}"><i class="ion-bag"></i>Add to
                                            cart</a>
                                    </div>
                                    <div class="hover-box text-center">
                                        <div class="ratings">
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- featured product area end -->

    <!-- block container start -->
    <div class="page-section bg-gray-light">
        <div class="container-fluid p-0">
            <div class="row g-0 align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="block-container-banner img-full fix">
                        <a href="#">
                            <img src="{{ asset('public/web/img/banner/block-container.jpg') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="bloc-container-inner text-center pt-sm-54 pb-sm-60">
                        <h2>New Fragrances</h2>
                        <p>Diverse variety of perfumes from top brands at the discount prices</p>
                        <a href="shop-grid-left-sidebar.html">SHOP PERFUMES</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- block container end -->

    <!-- banner feature start -->
    <div class="banner-feature-area bg-navy-blue pt-62 pb-60 pt-sm-56 pb-sm-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="banner-single-feature text-center mb-sm-30">
                        <i class="ion-paper-airplane"></i>
                        <h4>FREE SHIPPING & DELIVERY</h4>
                        <p>We’re one of the furniture online retailers, who offer free of charge delivery</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="banner-single-feature text-center mb-sm-30">
                        <i class="ion-ios-time-outline"></i>
                        <h4>365-DAY HOME TRIAL</h4>
                        <p>Our unique return policy will allow you to return furniture for almost a year</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="banner-single-feature text-center mb-sm-30">
                        <i class="ion-trophy"></i>
                        <h4>LIFETIME WARRANTY</h4>
                        <p>Purchasing furniture with us comes with warranty, than anyone else offers!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner feature end -->

    <!-- feature category area start -->
    <div class="feature-category-area pt-96 pb-14 pt-md-114 pt-sm-54 pb-sm-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tab-menu-one mb-58">
                        <ul class="nav justify-content-center">
                            <li>
                                <a class="active" data-bs-toggle="tab" href="#tab_one">onsale</a>
                            </li>
                            <li>
                                <a data-bs-toggle="tab" href="#tab_two">bestseller</a>
                            </li>
                            <li>
                                <a data-bs-toggle="tab" href="#tab_three">featured</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content text-center">
                        <div class="tab-pane fade show active" id="tab_one">
                            <div class="feature-category-carousel slick-arrow-style spt slick-padding">
                                <div class="col">
                                    <div class="product-item mb-20">
                                        <div class="product-thumb">
                                            <a href="#">
                                                <img src="{{ asset('public/web/img/product/product-1.png') }}"
                                                    alt="product image">
                                            </a>
                                            <div class="box-label">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                                <div class="product-label discount">
                                                    <span>-5%</span>
                                                </div>
                                            </div>
                                            <div class="product-action-link">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view">
                                                    <span data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Quick view"><i class="ion-ios-eye-outline"></i></span> </a>
                                                <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                    title="Compare"><i class="ion-ios-loop"></i></a>
                                                <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                    title="Wishlist"><i class="ion-ios-shuffle"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-description text-center">
                                            <div class="manufacturer">
                                                <p><a href="#">Fashion Manufacturer</a></p>
                                            </div>
                                            <div class="product-name">
                                                <h3><a href="#">Endeavor Daytrip</a></h3>
                                            </div>
                                            <div class="price-box">
                                                <span class="regular-price">$100.00</span>
                                                <span class="old-price"><del>$120.00</del></span>
                                            </div>
                                            <div class="product-btn">
                                                <a href="#"><i class="ion-bag"></i>Add to cart</a>
                                            </div>
                                            <div class="hover-box text-center">
                                                <div class="ratings">
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="product-item mb-20">
                                        <div class="product-thumb">
                                            <a href="#">
                                                <img src="{{ asset('public/web/img/product/product-2.png') }}"
                                                    alt="product image">
                                            </a>
                                            <div class="box-label">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                            </div>
                                            <div class="product-action-link">
                                                <div class="product-action-link">
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick_view"> <span data-bs-toggle="tooltip"
                                                            data-bs-placement="left" title="Quick view"><i
                                                                class="ion-ios-eye-outline"></i></span> </a>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Compare"><i class="ion-ios-loop"></i></a>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Wishlist"><i class="ion-ios-shuffle"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-description text-center">
                                            <div class="manufacturer">
                                                <p><a href="#">Fashion Manufacturer</a></p>
                                            </div>
                                            <div class="product-name">
                                                <h3><a href="#">Crown Backpacks</a></h3>
                                            </div>
                                            <div class="price-box">
                                                <span class="regular-price">$60.00</span>
                                                <span class="old-price"><del>$80.00</del></span>
                                            </div>
                                            <div class="product-btn">
                                                <a href="#"><i class="ion-bag"></i>Add to cart</a>
                                            </div>
                                            <div class="hover-box text-center">
                                                <div class="ratings">
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="product-item mb-20">
                                        <div class="product-thumb">
                                            <a href="#">
                                                <img src="{{ asset('public/web/img/product/product-3.png') }}"
                                                    alt="product image">
                                            </a>
                                            <div class="box-label">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                                <div class="product-label discount">
                                                    <span>-15%</span>
                                                </div>
                                            </div>
                                            <div class="product-action-link">
                                                <div class="product-action-link">
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick_view"> <span data-bs-toggle="tooltip"
                                                            data-bs-placement="left" title="Quick view"><i
                                                                class="ion-ios-eye-outline"></i></span> </a>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Compare"><i class="ion-ios-loop"></i></a>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Wishlist"><i class="ion-ios-shuffle"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-description text-center">
                                            <div class="manufacturer">
                                                <p><a href="#">Fashion Manufacturer</a></p>
                                            </div>
                                            <div class="product-name">
                                                <h3><a href="#">Joust Duffle Bags</a></h3>
                                            </div>
                                            <div class="price-box">
                                                <span class="regular-price">$100.00</span>
                                                <span class="old-price"><del></del></span>
                                            </div>
                                            <div class="product-btn">
                                                <a href="#"><i class="ion-bag"></i>Add to cart</a>
                                            </div>
                                            <div class="hover-box text-center">
                                                <div class="ratings">
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="product-item mb-20">
                                        <div class="product-thumb">
                                            <a href="#">
                                                <img src="{{ asset('public/web/img/product/product-4.png') }}"
                                                    alt="product image">
                                            </a>
                                            <div class="box-label">
                                                <div class="product-label discount">
                                                    <span>-5%</span>
                                                </div>
                                            </div>
                                            <div class="product-action-link">
                                                <div class="product-action-link">
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick_view"> <span data-bs-toggle="tooltip"
                                                            data-bs-placement="left" title="Quick view"><i
                                                                class="ion-ios-eye-outline"></i></span> </a>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Compare"><i class="ion-ios-loop"></i></a>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Wishlist"><i class="ion-ios-shuffle"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-description text-center">
                                            <div class="manufacturer">
                                                <p><a href="#">Fashion Manufacturer</a></p>
                                            </div>
                                            <div class="product-name">
                                                <h3><a href="#">Chaz Kangeroo Hoodies</a></h3>
                                            </div>
                                            <div class="price-box">
                                                <span class="regular-price">$90.00</span>
                                                <span class="old-price"><del>$140.00</del></span>
                                            </div>
                                            <div class="product-btn">
                                                <a href="#"><i class="ion-bag"></i>Add to cart</a>
                                            </div>
                                            <div class="hover-box text-center">
                                                <div class="ratings">
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="product-item mb-20">
                                        <div class="product-thumb">
                                            <a href="#">
                                                <img src="{{ asset('public/web/img/product/product-5.png') }}"
                                                    alt="product image">
                                            </a>
                                            <div class="box-label">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                            </div>
                                            <div class="product-action-link">
                                                <div class="product-action-link">
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick_view"> <span data-bs-toggle="tooltip"
                                                            data-bs-placement="left" title="Quick view"><i
                                                                class="ion-ios-eye-outline"></i></span> </a>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Compare"><i class="ion-ios-loop"></i></a>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Wishlist"><i class="ion-ios-shuffle"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-description text-center">
                                            <div class="manufacturer">
                                                <p><a href="#">Fashion Manufacturer</a></p>
                                            </div>
                                            <div class="product-name">
                                                <h3><a href="#">Compete Track Totes</a></h3>
                                            </div>
                                            <div class="price-box">
                                                <span class="regular-price">$100.00</span>
                                                <span class="old-price"><del></del></span>
                                            </div>
                                            <div class="product-btn">
                                                <a href="#"><i class="ion-bag"></i>Add to cart</a>
                                            </div>
                                            <div class="hover-box text-center">
                                                <div class="ratings">
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="product-item mb-20">
                                        <div class="product-thumb">
                                            <a href="#">
                                                <img src="{{ asset('public/web/img/product/product-6.png') }}"
                                                    alt="product image">
                                            </a>
                                            <div class="box-label">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                                <div class="product-label discount">
                                                    <span>-15%</span>
                                                </div>
                                            </div>
                                            <div class="product-action-link">
                                                <div class="product-action-link">
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick_view"> <span data-bs-toggle="tooltip"
                                                            data-bs-placement="left" title="Quick view"><i
                                                                class="ion-ios-eye-outline"></i></span> </a>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Compare"><i class="ion-ios-loop"></i></a>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Wishlist"><i class="ion-ios-shuffle"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-description text-center">
                                            <div class="manufacturer">
                                                <p><a href="#">Fashion Manufacturer</a></p>
                                            </div>
                                            <div class="product-name">
                                                <h3><a href="#">Driven Backpacks</a></h3>
                                            </div>
                                            <div class="price-box">
                                                <span class="regular-price">$90.00</span>
                                                <span class="old-price"><del>$70.00</del></span>
                                            </div>
                                            <div class="product-btn">
                                                <a href="#"><i class="ion-bag"></i>Add to cart</a>
                                            </div>
                                            <div class="hover-box text-center">
                                                <div class="ratings">
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab_two">
                            <div class="feature-category-carousel slick-arrow-style spt slick-padding">
                                <div class="col">
                                    <div class="product-item mb-20">
                                        <div class="product-thumb">
                                            <a href="#">
                                                <img src="{{ asset('public/web/img/product/product-5.png') }}"
                                                    alt="product image">
                                            </a>
                                            <div class="box-label">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                            </div>
                                            <div class="product-action-link">
                                                <div class="product-action-link">
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick_view"> <span data-bs-toggle="tooltip"
                                                            data-bs-placement="left" title="Quick view"><i
                                                                class="ion-ios-eye-outline"></i></span> </a>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Compare"><i class="ion-ios-loop"></i></a>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Wishlist"><i class="ion-ios-shuffle"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-description text-center">
                                            <div class="manufacturer">
                                                <p><a href="#">Fashion Manufacturer</a></p>
                                            </div>
                                            <div class="product-name">
                                                <h3><a href="#">Compete Track Totes</a></h3>
                                            </div>
                                            <div class="price-box">
                                                <span class="regular-price">$100.00</span>
                                                <span class="old-price"><del></del></span>
                                            </div>
                                            <div class="product-btn">
                                                <a href="#"><i class="ion-bag"></i>Add to cart</a>
                                            </div>
                                            <div class="hover-box text-center">
                                                <div class="ratings">
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="product-item mb-20">
                                        <div class="product-thumb">
                                            <a href="#">
                                                <img src="{{ asset('public/web/img/product/product-6.png') }}"
                                                    alt="product image">
                                            </a>
                                            <div class="box-label">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                                <div class="product-label discount">
                                                    <span>-15%</span>
                                                </div>
                                            </div>
                                            <div class="product-action-link">
                                                <div class="product-action-link">
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick_view"> <span data-bs-toggle="tooltip"
                                                            data-bs-placement="left" title="Quick view"><i
                                                                class="ion-ios-eye-outline"></i></span> </a>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Compare"><i class="ion-ios-loop"></i></a>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Wishlist"><i class="ion-ios-shuffle"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-description text-center">
                                            <div class="manufacturer">
                                                <p><a href="#">Fashion Manufacturer</a></p>
                                            </div>
                                            <div class="product-name">
                                                <h3><a href="#">Driven Backpacks</a></h3>
                                            </div>
                                            <div class="price-box">
                                                <span class="regular-price">$90.00</span>
                                                <span class="old-price"><del>$70.00</del></span>
                                            </div>
                                            <div class="product-btn">
                                                <a href="#"><i class="ion-bag"></i>Add to cart</a>
                                            </div>
                                            <div class="hover-box text-center">
                                                <div class="ratings">
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="product-item mb-20">
                                        <div class="product-thumb">
                                            <a href="#">
                                                <img src="{{ asset('public/web/img/product/product-7.png') }}"
                                                    alt="product image">
                                            </a>
                                            <div class="box-label">
                                                <div class="product-label discount">
                                                    <span>-15%</span>
                                                </div>
                                            </div>
                                            <div class="product-action-link">
                                                <div class="product-action-link">
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick_view"> <span data-bs-toggle="tooltip"
                                                            data-bs-placement="left" title="Quick view"><i
                                                                class="ion-ios-eye-outline"></i></span> </a>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Compare"><i class="ion-ios-loop"></i></a>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Wishlist"><i class="ion-ios-shuffle"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-description text-center">
                                            <div class="manufacturer">
                                                <p><a href="#">Fashion Manufacturer</a></p>
                                            </div>
                                            <div class="product-name">
                                                <h3><a href="#">Bess Yoga Shorts</a></h3>
                                            </div>
                                            <div class="price-box">
                                                <span class="regular-price">$26.00</span>
                                                <span class="old-price"><del>28.60</del></span>
                                            </div>
                                            <div class="product-btn">
                                                <a href="#"><i class="ion-bag"></i>Add to cart</a>
                                            </div>
                                            <div class="hover-box text-center">
                                                <div class="ratings">
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="product-item mb-20">
                                        <div class="product-thumb">
                                            <a href="#">
                                                <img src="{{ asset('public/web/img/product/product-8.png') }}"
                                                    alt="product image">
                                            </a>
                                            <div class="box-label">
                                                <div class="product-label discount">
                                                    <span>-25%</span>
                                                </div>
                                            </div>
                                            <div class="product-action-link">
                                                <div class="product-action-link">
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick_view"> <span data-bs-toggle="tooltip"
                                                            data-bs-placement="left" title="Quick view"><i
                                                                class="ion-ios-eye-outline"></i></span> </a>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Compare"><i class="ion-ios-loop"></i></a>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Wishlist"><i class="ion-ios-shuffle"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-description text-center">
                                            <div class="manufacturer">
                                                <p><a href="#">Fashion Manufacturer</a></p>
                                            </div>
                                            <div class="product-name">
                                                <h3><a href="#">Fusion Backpacks</a></h3>
                                            </div>
                                            <div class="price-box">
                                                <span class="regular-price">$110.00</span>
                                                <span class="old-price"><del>$140.00</del></span>
                                            </div>
                                            <div class="product-btn">
                                                <a href="#"><i class="ion-bag"></i>Add to cart</a>
                                            </div>
                                            <div class="hover-box text-center">
                                                <div class="ratings">
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="product-item mb-20">
                                        <div class="product-thumb">
                                            <a href="#">
                                                <img src="{{ asset('public/web/img/product/product-9.png') }}"
                                                    alt="product image">
                                            </a>
                                            <div class="box-label">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                            </div>
                                            <div class="product-action-link">
                                                <div class="product-action-link">
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick_view"> <span data-bs-toggle="tooltip"
                                                            data-bs-placement="left" title="Quick view"><i
                                                                class="ion-ios-eye-outline"></i></span> </a>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Compare"><i class="ion-ios-loop"></i></a>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Wishlist"><i class="ion-ios-shuffle"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-description text-center">
                                            <div class="manufacturer">
                                                <p><a href="#">Fashion Manufacturer</a></p>
                                            </div>
                                            <div class="product-name">
                                                <h3><a href="#">Crown Backpacks</a></h3>
                                            </div>
                                            <div class="price-box">
                                                <span class="regular-price">$60.00</span>
                                                <span class="old-price"><del>$80.00</del></span>
                                            </div>
                                            <div class="product-btn">
                                                <a href="#"><i class="ion-bag"></i>Add to cart</a>
                                            </div>
                                            <div class="hover-box text-center">
                                                <div class="ratings">
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="product-item mb-20">
                                        <div class="product-thumb">
                                            <a href="#">
                                                <img src="{{ asset('public/web/img/product/product-10.png') }}"
                                                    alt="product image">
                                            </a>
                                            <div class="box-label">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                                <div class="product-label discount">
                                                    <span>-15%</span>
                                                </div>
                                            </div>
                                            <div class="product-action-link">
                                                <div class="product-action-link">
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick_view"> <span data-bs-toggle="tooltip"
                                                            data-bs-placement="left" title="Quick view"><i
                                                                class="ion-ios-eye-outline"></i></span> </a>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Compare"><i class="ion-ios-loop"></i></a>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Wishlist"><i class="ion-ios-shuffle"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-description text-center">
                                            <div class="manufacturer">
                                                <p><a href="#">Fashion Manufacturer</a></p>
                                            </div>
                                            <div class="product-name">
                                                <h3><a href="#">Joust Duffle Bags</a></h3>
                                            </div>
                                            <div class="price-box">
                                                <span class="regular-price">$100.00</span>
                                                <span class="old-price"><del></del></span>
                                            </div>
                                            <div class="product-btn">
                                                <a href="#"><i class="ion-bag"></i>Add to cart</a>
                                            </div>
                                            <div class="hover-box text-center">
                                                <div class="ratings">
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab_three">
                            <div class="feature-category-carousel slick-arrow-style spt slick-padding">
                                <div class="col">
                                    <div class="product-item mb-20">
                                        <div class="product-thumb">
                                            <a href="#">
                                                <img src="{{ asset('public/web/img/product/product-12.jpg') }}"
                                                    alt="product image">
                                            </a>
                                            <div class="box-label">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                                <div class="product-label discount">
                                                    <span>-5%</span>
                                                </div>
                                            </div>
                                            <div class="product-action-link">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view">
                                                    <span data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Quick view"><i class="ion-ios-eye-outline"></i></span>
                                                </a>
                                                <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                    title="Compare"><i class="ion-ios-loop"></i></a>
                                                <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                    title="Wishlist"><i class="ion-ios-shuffle"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-description text-center">
                                            <div class="manufacturer">
                                                <p><a href="#">Fashion Manufacturer</a></p>
                                            </div>
                                            <div class="product-name">
                                                <h3><a href="#">Endeavor Daytrip</a></h3>
                                            </div>
                                            <div class="price-box">
                                                <span class="regular-price">$100.00</span>
                                                <span class="old-price"><del>$120.00</del></span>
                                            </div>
                                            <div class="product-btn">
                                                <a href="#"><i class="ion-bag"></i>Add to cart</a>
                                            </div>
                                            <div class="hover-box text-center">
                                                <div class="ratings">
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="product-item mb-20">
                                        <div class="product-thumb">
                                            <a href="#">
                                                <img src="{{ asset('public/web/img/product/product-13.png') }}"
                                                    alt="product image">
                                            </a>
                                            <div class="box-label">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                            </div>
                                            <div class="product-action-link">
                                                <div class="product-action-link">
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick_view"> <span data-bs-toggle="tooltip"
                                                            data-bs-placement="left" title="Quick view"><i
                                                                class="ion-ios-eye-outline"></i></span> </a>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Compare"><i class="ion-ios-loop"></i></a>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Wishlist"><i class="ion-ios-shuffle"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-description text-center">
                                            <div class="manufacturer">
                                                <p><a href="#">Fashion Manufacturer</a></p>
                                            </div>
                                            <div class="product-name">
                                                <h3><a href="#">Summit Backpacks</a></h3>
                                            </div>
                                            <div class="price-box">
                                                <span class="regular-price">$60.00</span>
                                                <span class="old-price"><del>$80.00</del></span>
                                            </div>
                                            <div class="product-btn">
                                                <a href="#"><i class="ion-bag"></i>Add to cart</a>
                                            </div>
                                            <div class="hover-box text-center">
                                                <div class="ratings">
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="product-item mb-20">
                                        <div class="product-thumb">
                                            <a href="#">
                                                <img src="{{ asset('public/web/img/product/product-1.png') }}"
                                                    alt="product image">
                                            </a>
                                            <div class="box-label">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                                <div class="product-label discount">
                                                    <span>-15%</span>
                                                </div>
                                            </div>
                                            <div class="product-action-link">
                                                <div class="product-action-link">
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick_view"> <span data-bs-toggle="tooltip"
                                                            data-bs-placement="left" title="Quick view"><i
                                                                class="ion-ios-eye-outline"></i></span> </a>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Compare"><i class="ion-ios-loop"></i></a>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Wishlist"><i class="ion-ios-shuffle"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-description text-center">
                                            <div class="manufacturer">
                                                <p><a href="#">Fashion Manufacturer</a></p>
                                            </div>
                                            <div class="product-name">
                                                <h3><a href="#">Joust Duffle Bags</a></h3>
                                            </div>
                                            <div class="price-box">
                                                <span class="regular-price">$100.00</span>
                                                <span class="old-price"><del></del></span>
                                            </div>
                                            <div class="product-btn">
                                                <a href="#"><i class="ion-bag"></i>Add to cart</a>
                                            </div>
                                            <div class="hover-box text-center">
                                                <div class="ratings">
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="product-item mb-20">
                                        <div class="product-thumb">
                                            <a href="#">
                                                <img src="{{ asset('public/web/img/product/product-2.png') }}"
                                                    alt="product image">
                                            </a>
                                            <div class="box-label">
                                                <div class="product-label discount">
                                                    <span>-5%</span>
                                                </div>
                                            </div>
                                            <div class="product-action-link">
                                                <div class="product-action-link">
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick_view"> <span data-bs-toggle="tooltip"
                                                            data-bs-placement="left" title="Quick view"><i
                                                                class="ion-ios-eye-outline"></i></span> </a>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Compare"><i class="ion-ios-loop"></i></a>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Wishlist"><i class="ion-ios-shuffle"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-description text-center">
                                            <div class="manufacturer">
                                                <p><a href="#">Fashion Manufacturer</a></p>
                                            </div>
                                            <div class="product-name">
                                                <h3><a href="#">Chaz Kangeroo Hoodies</a></h3>
                                            </div>
                                            <div class="price-box">
                                                <span class="regular-price">$90.00</span>
                                                <span class="old-price"><del>$140.00</del></span>
                                            </div>
                                            <div class="product-btn">
                                                <a href="#"><i class="ion-bag"></i>Add to cart</a>
                                            </div>
                                            <div class="hover-box text-center">
                                                <div class="ratings">
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="product-item mb-20">
                                        <div class="product-thumb">
                                            <a href="#">
                                                <img src="{{ asset('public/web/img/product/product-3.png') }}"
                                                    alt="product image">
                                            </a>
                                            <div class="box-label">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                            </div>
                                            <div class="product-action-link">
                                                <div class="product-action-link">
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick_view"> <span data-bs-toggle="tooltip"
                                                            data-bs-placement="left" title="Quick view"><i
                                                                class="ion-ios-eye-outline"></i></span> </a>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Compare"><i class="ion-ios-loop"></i></a>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Wishlist"><i class="ion-ios-shuffle"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-description text-center">
                                            <div class="manufacturer">
                                                <p><a href="#">Fashion Manufacturer</a></p>
                                            </div>
                                            <div class="product-name">
                                                <h3><a href="#">Compete Track Totes</a></h3>
                                            </div>
                                            <div class="price-box">
                                                <span class="regular-price">$100.00</span>
                                                <span class="old-price"><del></del></span>
                                            </div>
                                            <div class="product-btn">
                                                <a href="#"><i class="ion-bag"></i>Add to cart</a>
                                            </div>
                                            <div class="hover-box text-center">
                                                <div class="ratings">
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="product-item mb-20">
                                        <div class="product-thumb">
                                            <a href="#">
                                                <img src="{{ asset('public/web/img/product/product-4.png') }}"
                                                    alt="product image">
                                            </a>
                                            <div class="box-label">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                                <div class="product-label discount">
                                                    <span>-15%</span>
                                                </div>
                                            </div>
                                            <div class="product-action-link">
                                                <div class="product-action-link">
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick_view"> <span data-bs-toggle="tooltip"
                                                            data-bs-placement="left" title="Quick view"><i
                                                                class="ion-ios-eye-outline"></i></span> </a>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Compare"><i class="ion-ios-loop"></i></a>
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Wishlist"><i class="ion-ios-shuffle"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-description text-center">
                                            <div class="manufacturer">
                                                <p><a href="#">Fashion Manufacturer</a></p>
                                            </div>
                                            <div class="product-name">
                                                <h3><a href="#">Driven Backpacks</a></h3>
                                            </div>
                                            <div class="price-box">
                                                <span class="regular-price">$90.00</span>
                                                <span class="old-price"><del>$70.00</del></span>
                                            </div>
                                            <div class="product-btn">
                                                <a href="#"><i class="ion-bag"></i>Add to cart</a>
                                            </div>
                                            <div class="hover-box text-center">
                                                <div class="ratings">
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- feature category area end -->

    <!-- hot deals section start -->
    <div class="hot-deals-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-7 col-md-6 ms-auto">
                    <div class="countdown-area">
                        <div class="deals-title pb-30">
                            <h3>Daily Deals</h3>
                            <h5>Deals <span>30%</span> for all Jackets Products</h5>
                        </div>
                        <div class="deals-slider-active slider-arrow-style spt slick-padding">
                            <div class="col">
                                <div class="product-item mb-20">
                                    <div class="product-countdown" data-countdown="2021/12/20"></div>
                                    <div class="product-thumb">
                                        <a href="#">
                                            <img src="{{ asset('public/web/img/product/product-1.png') }}"
                                                alt="product image">
                                        </a>
                                        <div class="box-label">
                                            <div class="product-label new">
                                                <span>new</span>
                                            </div>
                                            <div class="product-label discount">
                                                <span>-5%</span>
                                            </div>
                                        </div>
                                        <div class="product-action-link">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view">
                                                <span data-bs-toggle="tooltip" data-bs-placement="left"
                                                    title="Quick view"><i class="ion-ios-eye-outline"></i></span>
                                            </a>
                                            <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                title="Compare"><i class="ion-ios-loop"></i></a>
                                            <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                title="Wishlist"><i class="ion-ios-shuffle"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-description white-bg text-center">
                                        <div class="manufacturer">
                                            <p><a href="#">Fashion Manufacturer</a></p>
                                        </div>
                                        <div class="product-name">
                                            <h3><a href="#">Endeavor Daytrip</a></h3>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price">$100.00</span>
                                            <span class="old-price"><del>$120.00</del></span>
                                        </div>
                                        <div class="product-btn">
                                            <a href="#"><i class="ion-bag"></i>Add to cart</a>
                                        </div>
                                        <div class="hover-box text-center">
                                            <div class="ratings">
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product-item mb-20">
                                    <div class="product-countdown" data-countdown="2021/11/29"></div>
                                    <div class="product-thumb">
                                        <a href="#">
                                            <img src="{{ asset('public/web/img/product/product-2.png') }}"
                                                alt="product image">
                                        </a>
                                        <div class="box-label">
                                            <div class="product-label new">
                                                <span>new</span>
                                            </div>
                                            <div class="product-label discount">
                                                <span>-5%</span>
                                            </div>
                                        </div>
                                        <div class="product-action-link">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view">
                                                <span data-bs-toggle="tooltip" data-bs-placement="left"
                                                    title="Quick view"><i class="ion-ios-eye-outline"></i></span>
                                            </a>
                                            <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                title="Compare"><i class="ion-ios-loop"></i></a>
                                            <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                title="Wishlist"><i class="ion-ios-shuffle"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-description white-bg text-center">
                                        <div class="manufacturer">
                                            <p><a href="#">Fashion Manufacturer</a></p>
                                        </div>
                                        <div class="product-name">
                                            <h3><a href="#">Endeavor Daytrip</a></h3>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price">$100.00</span>
                                            <span class="old-price"><del>$120.00</del></span>
                                        </div>
                                        <div class="product-btn">
                                            <a href="#"><i class="ion-bag"></i>Add to cart</a>
                                        </div>
                                        <div class="hover-box text-center">
                                            <div class="ratings">
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product-item mb-20">
                                    <div class="product-countdown" data-countdown="2021/12/18"></div>
                                    <div class="product-thumb">
                                        <a href="#">
                                            <img src="{{ asset('public/web/img/product/product-3.png') }}"
                                                alt="product image">
                                        </a>
                                        <div class="box-label">
                                            <div class="product-label new">
                                                <span>new</span>
                                            </div>
                                            <div class="product-label discount">
                                                <span>-5%</span>
                                            </div>
                                        </div>
                                        <div class="product-action-link">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view">
                                                <span data-bs-toggle="tooltip" data-bs-placement="left"
                                                    title="Quick view"><i class="ion-ios-eye-outline"></i></span>
                                            </a>
                                            <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                title="Compare"><i class="ion-ios-loop"></i></a>
                                            <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                                                title="Wishlist"><i class="ion-ios-shuffle"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-description white-bg text-center">
                                        <div class="manufacturer">
                                            <p><a href="#">Fashion Manufacturer</a></p>
                                        </div>
                                        <div class="product-name">
                                            <h3><a href="#">Endeavor Daytrip</a></h3>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price">$100.00</span>
                                            <span class="old-price"><del>$120.00</del></span>
                                        </div>
                                        <div class="product-btn">
                                            <a href="#"><i class="ion-bag"></i>Add to cart</a>
                                        </div>
                                        <div class="hover-box text-center">
                                            <div class="ratings">
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- hot deals section end -->

    <!-- banner statistics 02 start -->

    <!-- banner statistics 02 end -->

    <!-- latest blog area start -->
    <div class="latest-blog-area pt-100 pb-90 pt-sm-58 pb-sm-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center pb-44">
                        <p>New our blogs</p>
                        <h2>From the blog</h2>
                    </div>
                </div>
            </div>
            <div class="blog-carousel-active slick-arrow-style slick-padding">
                <div class="col">
                    <div class="blog-item">
                        <article class="blog-post">
                            <div class="blog-post-content">
                                <div class="blog-top">
                                    <div class="post-date-time">
                                        <span>10 DECEMBER,22 </span>
                                    </div>
                                    <div class="post-blog-meta">
                                        <p>post by HasTech</p>
                                    </div>
                                </div>
                                <div class="blog-thumb img-full">
                                    <a href="blog-details.html">
                                        <img src="{{ asset('public/web/img/blog/blog-1.png') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="blog-content">
                                <h4><a href="blog-details.html">This is Secound Post For XipBlog</a></h4>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industrys standard ever since the ...
                                </p>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col">
                    <div class="blog-item">
                        <article class="blog-post">
                            <div class="blog-post-content">
                                <div class="blog-top">
                                    <div class="post-date-time">
                                        <span>10 DECEMBER,22 </span>
                                    </div>
                                    <div class="post-blog-meta">
                                        <p>post by HasTech</p>
                                    </div>
                                </div>
                                <div class="blog-thumb img-full">
                                    <a href="blog-details.html">
                                        <img src="{{ asset('public/web/img/blog/blog-2.png') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="blog-content">
                                <h4><a href="blog-details.html">This is Secound Post For XipBlog</a></h4>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industrys standard ever since the ...
                                </p>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col">
                    <div class="blog-item">
                        <article class="blog-post">
                            <div class="blog-post-content">
                                <div class="blog-top">
                                    <div class="post-date-time">
                                        <span>10 DECEMBER,22 </span>
                                    </div>
                                    <div class="post-blog-meta">
                                        <p>post by HasTech</p>
                                    </div>
                                </div>
                                <div class="blog-thumb img-full">
                                    <a href="blog-details.html">
                                        <img src="{{ asset('public/web/img/blog/blog-3.png') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="blog-content">
                                <h4><a href="blog-details.html">This is Secound Post For XipBlog</a></h4>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industrys standard ever since the ...
                                </p>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col">
                    <div class="blog-item">
                        <article class="blog-post">
                            <div class="blog-post-content">
                                <div class="blog-top">
                                    <div class="post-date-time">
                                        <span>10 DECEMBER,22 </span>
                                    </div>
                                    <div class="post-blog-meta">
                                        <p>post by HasTech</p>
                                    </div>
                                </div>
                                <div class="blog-thumb img-full">
                                    <a href="blog-details.html">
                                        <img src="{{ asset('public/web/img/blog/blog-4.png') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="blog-content">
                                <h4><a href="blog-details.html">This is Secound Post For XipBlog</a></h4>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industrys standard ever since the ...
                                </p>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col">
                    <div class="blog-item">
                        <article class="blog-post">
                            <div class="blog-post-content">
                                <div class="blog-top">
                                    <div class="post-date-time">
                                        <span>10 DECEMBER,22 </span>
                                    </div>
                                    <div class="post-blog-meta">
                                        <p>post by HasTech</p>
                                    </div>
                                </div>
                                <div class="blog-thumb img-full">
                                    <a href="blog-details.html">
                                        <img src="{{ asset('public/web/img/blog/blog-2.jpg') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="blog-content">
                                <h4><a href="blog-details.html">This is Secound Post For XipBlog</a></h4>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industrys standard ever since the ...
                                </p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- latest blog area end -->
@endsection
@section('js')
    <script>
        $(document).ready(function() {

        });
    </script>
@endsection
