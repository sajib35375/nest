@extends('frontend.front_master')
@section('frontend')

    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Shop
                    <span></span> Checkout
                </div>
            </div>
        </div>
        <div class="container mb-80 mt-50">
            <div class="row">
                <div class="col-lg-8 mb-40">
                    <h1 class="heading-2 mb-10">Checkout</h1>
                    <div class="d-flex justify-content-between">
                        <h6 class="text-body">There are <span class="text-brand">{{ count(Gloudemans\Shoppingcart\Facades\Cart::content()) }}</span> products in your cart</h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7">

                    <div class="row">
                        <h4 class="mb-30">Billing Details</h4>
                        @if(Session::has('success'))
                            <p class="alert alert-success">{{ session()->get('success') }}</p>
                            @endif

                            <form method="POST" id="checkout" action="{{ route('checkout.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <h6>Name</h6>
                                        <input type="text" required="" name="shipping_name" placeholder="Full name *" value="{{ Auth::user()->name }}">
                                        @error('shipping_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <h6>Division</h6>
                                        {{--@dd(session()->get('division'));--}}

                                        <div class="custom_select">
                                            <select name="division_id" class="form-control w-100">

                                                @foreach($divisions as $div)

                                                <option {{ $div->division_name == request()->cookie('division') ? "selected" : " " }} value="{{ $div->id }}">{{ $div->division_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('division')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <h6>Email</h6>
                                        <input type="email" name="shipping_email" required="" placeholder="Email *" value="{{ Auth::user()->email }}">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <h6>District</h6>
                                        {{--@dd(request()->cookie('district'));--}}
                                        <div class="custom_select">
                                            <select name="district_id" class="form-control w-100">

                                                @foreach($districts as $dis)

                                                    <option {{ $dis->district_name == request()->cookie('district') ? "selected" : " " }} value="{{ $dis->id }}">{{ $dis->district_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('district')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <h6>Mobile No:</h6>
                                        <input required="" type="text" name="shipping_phone" placeholder="Mobile *" value="{{ Auth::user()->mobile }}">
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <h6>State</h6>
                                        {{-- @dd(request()->cookie('state'))--}}
                                        <div class="custom_select">
                                            <select id="state_id" name="state_id" class="form-control w-100">
                                                @foreach($states as $state)
                                                    <option {{ $state->state_name == request()->cookie('state') ? "selected" : "" }} value="{{ $state->id }}">{{ $state->state_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('state')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <h6>Post Code</h6>
                                        <input required="" type="text" name="post_code" placeholder="Post Code *">
                                        @error('post_code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-30">
                                    <textarea name="additional_information" rows="5" placeholder="Additional information"></textarea>
                                    @error('additional_information')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                        </div>
                    </div>


                    <div class="col-lg-5">
                        <div class="border p-40 cart-totals ml-30 mb-50">
                            <div class="d-flex align-items-end justify-content-between mb-30">
                                <h4>Your Order</h4>
                                <h5 class="text-muted">Subtotal: <span class="text-brand"> {{ Cart::total() }}৳</span></h5>
                            </div>
                            <div class="divider-2 mb-30"></div>
                            <div class="table-responsive order_table checkout">
                                <table class="table no-border">
                                    <tbody>



                                    @foreach($cart_total as $item)

                                    <tr>
                                        <td class="image product-thumbnail"><img src="{{ URL::to('') }}/backend/assets/imgs/products/{{ $item->options->image }}" alt="#"></td>
                                        <td>
                                            <span><h6 class="w-160 mb-5"><a href="{{ route('single.product',$item->id) }}" class="text-heading">{{ $item->name }}</a></h6></span>

                                        </td>
                                        <td>
                                            <h6 class="text-muted pl-20 pr-20">x {{ $item->qty }}</h6>
                                        </td>
                                        <td>
                                            <h4 class="text-brand">{{ $item->price }}৳</h4>
                                        </td>

                                    </tr>

                                    @endforeach



                                    </tbody>
                                </table>
                                <hr>
                                <h6 id="shipCharge" class="text-muted d-flex justify-content-between">Shipping Charge:<span style="margin-right: -363px;" class="text-brand"> </span><p class="text-brand">৳ </p></h6>
                                <hr>
                                <h6 class="text-muted d-flex justify-content-between">Coupon Name:<span style="margin-right: 35px;" id="coupon_name"></span></h6>
                                <hr>
                                <h6 class="text-muted d-flex justify-content-between">Coupon Discount:<span style="margin-right: -363px;" id="discount" class="text-brand"></span>  %</h6>
                                <hr>
                                <h6 class="text-muted d-flex justify-content-between">Coupon Discount Amount:<span style="margin-right: -271px;" id="amount" class="text-brand">  </span>৳</h6>
                                <hr>
                                <h5 class="d-flex justify-content-between">Grand Total:<span style="margin-right: -318px;" id="grand_total" class="text-brand">  </span>৳</h5>

                            </div>
                        </div>
                        <div class="payment ml-30">
                            <h4 class="mb-30">Payment</h4>
                            <div class="payment_option">
                                <div class="custome-radio">
                                    <input class="form-check-input"  type="radio" name="payment_option" id="exampleRadios5"  value="SSL Ecommeze">
                                    <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">Online Getway</label>
                                </div>
                                <div class="custome-radio">
                                    <input class="form-check-input"  type="radio" name="payment_option" id="exampleRadios6"  value="Cash-on-Delivery">
                                    <label class="form-check-label" for="exampleRadios6" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">Cash on Delivery</label>
                                </div>
                            </div>
                                {{--<a href="#" id="check_submit" class="btn btn-fill-out btn-block mt-30">Place an Order<i class="fi-rs-sign-out ml-15"></i></a>--}}
                            <button id="check_submit" class="btn btn-fill-out btn-block mt-30" type="submit">Place an Order</button>
                        </div>

                    </div>
                </form>
            </div>

        </div>

    </main>


    @include('frontend.layout.subscribers')
    @include('frontend.layout.featured_section')


    <!--End 4 columns-->
    @include('frontend.layout.footer')

@endsection
