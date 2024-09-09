@extends('layouts.app')
@section('title', 'Webhuts - Main Dashboard')
@section('css')
    <style>

    </style>
@endsection
@section('content')
    <!-- cart main wrapper start -->
    <main class="pt-50">
        <div class="cart-main-wrapper pt-100 pb-100 pt-sm-58 pb-sm-58">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Cart Table Area -->
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="pro-thumbnail">Image</th>
                                        <th class="pro-title">Product</th>
                                        <th class="pro-price">Price</th>
                                        <th class="pro-quantity">Quantity</th>
                                        <th class="pro-subtotal">Total</th>
                                        <th class="pro-remove">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $totalAmt = 0;
                                        $shippingAmt = 100;
                                    @endphp
                                    @if (!empty($items))

                                        @foreach ($items as $key => $item)
                                            @php
                                                $productPrice = $item->product ? $item->product->price : 0;
                                                $quantity = $item->quantity;
                                                $subTotal = $productPrice * $quantity;
                                                $totalAmt = $totalAmt + $subTotal;
                                            @endphp
                                            <tr>
                                                <td class="pro-thumbnail">
                                                    <img src="{{ $item->product && $item->product->banner ? asset('public/uploads/product/' . $item->product->banner) : asset('public/images/placeholder.png') }}"
                                                        alt="{{ $item->product ?? $item->product->name }}"
                                                        class="img-fluid" />


                                                </td>
                                                <td class="pro-title"><a
                                                        href="#">{{ $item->product ? $item->product->name : '' }}</a>
                                                </td>
                                                <td class="pro-price">
                                                    <span>{{ '₹' . $productPrice }}</span>
                                                </td>
                                                <td class="pro-quantity">
                                                    <div class="pro-qty" data-slug={{ $item->slug }}>
                                                        <input type="text" value="{{ $quantity }}" readonly>
                                                    </div>
                                                </td>

                                                <td class="pro-subtotal"><span>{{ '₹' . $subTotal }}</span></td>
                                                <td class="pro-remove"><a
                                                        href="{{ route('front-remove-from-cart', $item->slug) }}"><i
                                                            class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- Cart Update Option -->
                        {{-- <div class="cart-update-option d-block d-md-flex justify-content-between">
                            <div class="apply-coupon-wrapper">
                                <form action="#" method="post" class=" d-block d-md-flex">
                                    <input type="text" placeholder="Enter Your Coupon Code" required />
                                    <button class="sqr-btn">Apply Coupon</button>
                                </form>
                            </div>
                            <div class="cart-update mt-sm-16">
                                <a href="#" class="sqr-btn">Update Cart</a>
                            </div>
                        </div> --}}
                    </div>
                </div>
                @if ($items->isNotEmpty())
                    <div class="row">
                        <div class="col-lg-5 ms-auto">
                            <!-- Cart Calculation Area -->
                            <div class="cart-calculator-wrapper">
                                <div class="cart-calculate-items">
                                    <h3>Cart Totals</h3>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <td>Sub Total</td>
                                                <td>{{ '₹' . $totalAmt }}</td>
                                            </tr>
                                            <tr>
                                                <td>Shipping</td>
                                                <td>{{ '₹' . $shippingAmt }}</td>
                                            </tr>
                                            <tr class="total">
                                                <td>Total</td>
                                                <td class="total-amount">{{ '₹' . $totalAmt + $shippingAmt }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <a href="{{ route('front-checkout') }}" class="sqr-btn d-block">Proceed To Checkout</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </main>
    <!-- cart main wrapper end -->
@endsection
@section('js')
    <script>
        $(document).ready(function() {

        });
    </script>
@endsection
