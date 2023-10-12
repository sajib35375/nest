@extends('frontend.front_master')
@section('frontend')

    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Shop
                    <span></span> Cart
                </div>
            </div>
        </div>
        <div class="container mb-80 mt-50">
            <div class="row">
                <div class="col-lg-8 mb-40">
                    <h1 class="heading-2 mb-10">Your Cart</h1>
                    <div class="d-flex justify-content-between">
                        <h6 class="text-body">There are <span class="text-brand">{{ count(Gloudemans\Shoppingcart\Facades\Cart::content()) }}</span> products in your cart</h6>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive shopping-summery">



                        <table class="table table-wishlist">
                            <thead>
                            <tr class="main-heading">
                                <th class="custome-checkbox start pl-30">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="">
                                    <label class="form-check-label" for="exampleCheckbox11"></label>
                                </th>
                                <th scope="col" >Product</th>
                                <th scope="col" >Product Name</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col" class="end">Remove</th>
                            </tr>
                            </thead>
                            <tbody id="viewCart">


                            </tbody>
                        </table>
                    </div>
                    <div class="divider-2 mb-30"></div>


                    <div class="row mt-50">
                        <div class="col-lg-4">
                            <div class="calculate-shiping p-40 border-radius-15 border">
                                <h4 class="mb-10">Calculate Shipping</h4><span id="shipping"></span>
                                @if(Session::has('success'))
                                    <p class="alert alert-success">{{ Session::get('success') }}</p>
                                    @endif
                                <form class="field_form shipping_calculator">

                                    <div class="form-row">
                                        <div class="form-group col-lg-12">
                                            <div class="custom_select">
                                                <label for="">Division</label>
                                                <select name="division_id" class="form-control select-active w-100">
                                                    <option value="">Select</option>
                                                    @foreach($division as $div)
                                                    <option value="{{ $div->id }}">{{ $div->division_name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <div class="custom_select">
                                                <label for="">District</label>
                                                <select name="district_id" class="form-control  w-100">
                                                    <option value="">Select</option>
                                                    @foreach($district as $div)
                                                        <option value="{{ $div->id }}">{{ $div->district_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <div class="custom_select">
                                                <label for="">State</label>
                                                <select id="state" name="state_id" class="form-control w-100">
                                                    <option value="">Select</option>
                                                    @foreach($states as $div)
                                                        <option value="{{ $div->id }}">{{ $div->state_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row row">
                                        <div class="form-group col-lg-12">
                                            <div class="custom_select">
                                                <label for="">Delivery Charge</label>
                                                <select name="delivery_charge" id="charge" class="form-control select-active w-100">
                                                    <option value="">Select</option>
                                                    @foreach($states as $div)
                                                        <option value="{{ $div->id }}">{{ $div->delivery_charge }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>

                        <div class="col-lg-4" id="couponArea">
                            <div class="p-40">
                                <h4 class="mb-10">Apply Coupon</h4>
                                <p class="mb-30"><span class="font-lg text-muted">Using A Promo Code?</span></p>

                                <form action="#" method="POST">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="d-flex justify-content-between">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <input style="width: 220px;height: 60px;" class="font-medium mr-15 coupon" id="Coupon_name" name="Coupon_name" placeholder="Enter Your Coupon">

                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="submit" id="couponApply" class="btn btn-sm btn-primary">Apply</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="cart-action d-flex justify-content-between">

                                                <a id="updateCart" class=" mr-10 mb-sm-15"></a>
                                                <button type="submit" id="removeCoupon" class="btn btn-sm btn-danger">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="border p-md-4 cart-totals ml-30">
                                <div class="table-responsive">
                                    <table class="table no-border">
                                        <tbody id="calculate_data">

                                        </tbody>
                                    </table>
                                </div>

                                <a href="{{ route('checkout.view') }}" class="btn mb-20 w-100">Proceed To CheckOut<i class="fi-rs-sign-out ml-15"></i></a>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </main>







    @include('frontend.layout.subscribers')
    @include('frontend.layout.featured_section')
    <!--End 4 columns-->
    @include('frontend.layout.footer')

@endsection
