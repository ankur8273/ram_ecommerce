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
                    <!-- Checkout Billing Details -->
                    <div class="col-lg-6">
                        <div class="checkout-billing-details-wrap">
                            <h2>Billing Details</h2>
                            <div class="billing-form-wrap">
                                <form action="{{ route('front-place-order') }}" method="POST" id="checkoutForm">
                                    @csrf
                                    <div class="single-input-item">
                                        <label for="name" class="required">Full Name</label>
                                        <input type="text" id="name" name="name" placeholder="Full Name"
                                            value="{{ Auth::guard('visitor')->user()->name }}" />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="email" class="required">Email Address</label>
                                        <input type="email" id="email" name="email" placeholder="Email Address"
                                            value="{{ Auth::guard('visitor')->user()->email }}" />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="phone">Phone</label>
                                        <input type="text" id="phone" placeholder="Phone" name="phone"
                                            value="{{ Auth::guard('visitor')->user()->phone }}" />
                                    </div>


                                    <div class="single-input-item">
                                        <label for="address" class="required mt-20">Street address</label>
                                        <input type="text" id="address" name="address1"
                                            placeholder="Street address Line 1" />
                                    </div>

                                    <div class="single-input-item">
                                        <input type="text" name="address2"
                                            placeholder="Street address Line 2 (Optional)" />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="town" class="required">Town / City</label>
                                        <input type="text" id="town" name="city" placeholder="Town / City" />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="state">State / Divition</label>
                                        <input type="text" id="state" name="state"
                                            placeholder="State / Divition" />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="pincode" class="required">Pincode / ZIP</label>
                                        <input type="text" id="pincode" name="pincode" placeholder="Pincode / ZIP" />
                                    </div>



                                    <div class="single-input-item">
                                        <label for="ordernote">Order Note</label>
                                        <textarea name="ordernote" id="ordernote" cols="30" rows="3"
                                            placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary Details -->
                    <div class="col-lg-6">
                        <div class="order-summary-details mt-md-26 mt-sm-26">
                            <h2>Your Order Summary</h2>
                            <div class="order-summary-content mb-sm-4">
                                <!-- Order Summary Table -->
                                <div class="order-summary-table table-responsive text-center">
                                    @php
                                        $totalAmt = 0;
                                        $shippingAmt = 100;
                                    @endphp
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Products</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if (!empty($items))
                                                @foreach ($items as $key => $item)
                                                    @php
                                                        $productPrice = $item->product ? $item->product->price : 0;
                                                        $quantity = $item->quantity;
                                                        $subTotal = $productPrice * $quantity;
                                                        $totalAmt = $totalAmt + $subTotal;
                                                    @endphp
                                                    <tr>
                                                        <td><a href="">{{ $item->product ? $item->product->name : '' }}
                                                                <strong> x {{ $item->quantity }}</strong></a></td>
                                                        <td>{{ '₹' . $subTotal }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>Sub Total</td>
                                                <td><strong>{{ '₹' . $totalAmt }}</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Shipping</td>
                                                <td class="d-flex justify-content-center">
                                                    {{ '₹' . $shippingAmt }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Total Amount</td>
                                                <td><strong>{{ '₹' . $totalAmt + $shippingAmt }}</strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- Order Payment Method -->
                                <div class="order-payment-method">
                                    <div class="single-payment-method show">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="cashon" name="paymentmethod" value="cash"
                                                    class="custom-control-input" checked />
                                                <label class="custom-control-label" for="cashon">Cash On
                                                    Delivery</label>
                                            </div>
                                        </div>
                                        <div class="payment-method-details" data-method="cash">
                                            <p>Pay with cash upon delivery.</p>
                                        </div>
                                    </div>

                                    <div class="summary-footer-area">
                                        <div class="custom-control custom-checkbox mb-14">
                                            <input type="checkbox" class="custom-control-input" id="terms" required />
                                            <label class="custom-control-label" for="terms">I have read and agree to
                                                the website <a href="index.html">terms and conditions.</a></label>
                                        </div>
                                        <button type="button" id="checkoutButton" class="check-btn sqr-btn">Place
                                            Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- cart main wrapper end -->
@endsection
@section('js')
    <script>
        $(document).ready(function() {

            $('#checkoutButton').click(function() {
                $('#checkoutForm').submit();
            });

        });
    </script>
@endsection
