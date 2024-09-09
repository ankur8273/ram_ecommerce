@extends('layouts.app')
@section('title', 'Webhuts - Main Dashboard')
@section('css')
    <style>

    </style>
@endsection
@section('content')

    <main class="pt-100">
        <!-- page main wrapper start -->
        <div class="shop-main-wrapper pt-100 pb-100 pt-sm-58 pb-sm-58">
            <div class="container">
                <div class="row">
                    <!-- product view wrapper area start -->

                    @if (!empty($products))
                        @foreach ($products as $product)
                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                <!-- product grid item start -->
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
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view">
                                                <span data-bs-toggle="tooltip" data-bs-placement="left"
                                                    title="Quick view"><i class="ion-ios-eye-outline"></i></span>
                                            </a>
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
                                                <span
                                                    class="old-price"><del>{{ ' ₹' . $product->discount_price }}</del></span>
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
                    <!-- start pagination area -->
                    {{-- <div class="paginatoin-area text-center mt-18">
                            <ul class="pagination-box">
                                <li><a class="Previous" href="#">Previous</a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a class="Next" href="#"> Next </a></li>
                            </ul>
                        </div> --}}
                    <!-- end pagination area -->

                </div>
            </div>
        </div>
        <!-- page main wrapper end -->
    </main>

@endsection
@section('js')
    <script>
        $(document).ready(function() {

        });
    </script>
@endsection
