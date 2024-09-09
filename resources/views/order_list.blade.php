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
                    <h2 class="text-center">Order List</h2>
                </div>
                    <div class="col-lg-12">
                        <!-- Cart Table Area -->
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="pro-thumbnail">Order ID</th>
                                        <th class="pro-title">Product</th>
                                        <th class="pro-price">Price</th>
                                        <th class="pro-quantity">Quantity</th>
                                        <th class="pro-subtotal">Total</th>
                                        <!-- <th class="pro-remove">Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>

                                  
                                         @if($orders)
                                        @foreach ($orders as $key => $item)
                                            
                                            <tr>
                                                <td class="pro-thumbnail">
                                                    {{$item->slug}}
                                                </td>
                                                <td class="pro-title"><a
                                                        href="#">{{$item->product_name}}</a>
                                                </td>
                                                <td class="pro-price">
                                                    <span>{{ '₹' . $item->product_price }}</span>
                                                </td>
                                                <td class="pro-quantity">
                                                    {{ $item->quantity}}
                                                    
                                                </td>

                                                <td class="pro-subtotal"><span>{{ '₹' . $item->product_price }}</span></td>
                                                <!-- <td class="pro-remove">
                                                </td> -->
                                            </tr>
                                        @endforeach
                                        @else
                                        <h4 class="text-center">No order Found!</h4>
                                        @endif
                                </tbody>
                            </table>
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

        });
    </script>
@endsection
