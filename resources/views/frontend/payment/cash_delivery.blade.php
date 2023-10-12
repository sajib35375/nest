<!DOCTYPE html>
<html lang="en">
<head>
    @php
        $seo = \App\Models\Seo::findOrFail(1);
    @endphp
    <meta charset="utf-8" />
    <title>{{ $seo->meta_title }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="{{ $seo->meta_description }}" />
    <meta name="keywords" content="{{ $seo->meta_keyword }}" />
    <meta name="author" content="{{ $seo->meta_author }}" />
    <meta name="brand_name" content="{{ $seo->meta_title }}" />
    <meta name="apple-mobile-web-app-title" content="{{ $seo->meta_title }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Google Analytics -->
    <script>
        {!! $seo->google_analytics !!}
    </script>
    <!-- Google Verification -->
    <noscript>
        {!! $seo->google_verification !!}
    </noscript>
    <!-- Alexa Analytics -->
    <script>
        {!! $seo->alexa_analytics !!}
    </script>
    <meta property="og:title" content="{{ $seo->og_title }}" />
    <meta property="og:type" content="{{ $seo->og_type }}" />
    <meta property="og:url" content="{{ $seo->og_url }}" />
    <meta property="og:image" content="{{ $seo->og_image_link }}" />

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('upload/theme/'.$seo->favicon) }}" />
    <!--leaflet map-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=621cb8f8b846610019d3dc86&product=inline-share-buttons" async="async"></script>



    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/') }}/assets/css/plugins/slider-range.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/plugins/animate.min.css" />
    <link rel="stylesheet" href="{{ asset('font-awesome/css/all.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/main.css?v=5.5" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/custom/custom.css" />
    <script src="{{ asset('frontend/') }}/assets/js/vendor/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body>

@include('frontend.layout.header')

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Cash On Delivery</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->




<div class="body-content">
    <div class="container">
        <div class="checkout-box ">
            <div class="row">





                <div class="col-md-6">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Your Shopping Amount </h4>
                                </div>
                                <div class="">
                                    <ul class="nav nav-checkout-progress list-unstyled">
{{--                                        @dd($ship_charge)--}}

                                        <hr>
                                        <li>
                                            @if(Session::has('coupon'))

                                                <strong>SubTotal: </strong> ৳{{ $cartTotal }} <hr>

                                                <strong>ShipTotal: </strong> ৳{{ request()->cookie('charge') }} <hr>

                                                <strong>Coupon Name : </strong> {{ session()->get('coupon')['coupon_name'] }}
                                                ( {{ session()->get('coupon')['coupon_discount'] }} % )
                                                <hr>

                                                <strong>Coupon Discount : </strong> ৳{{ session()->get('coupon')['discount_amount'] }}
                                                <hr>

                                                <strong>Grand Total : </strong> ৳( {{ session()->get('coupon')['total'] + $ship_charge }} )
                                                <hr>


                                            @else

                                                <strong>SubTotal: </strong> ৳{{ $cartTotal }} <hr>

                                                <strong>ShipTotal: </strong> ৳{{ request()->cookie('charge') }} <hr>

                                                <strong>Grand Total : </strong> ৳( {{ $cartTotal + $ship_charge }}) <hr>


                                            @endif

                                        </li>



                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- checkout-progress-sidebar -->
                </div> <!--  // end col md 6 -->







                <div class="col-md-6">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">


                                <form action="{{ route('cash.delivery') }}" method="POST" id="payment-form">
                                    @csrf
                                    <div class="form-row">

                                        <img src="{{ asset('frontend/assets/imgs/cash.png') }}">

                                        <label for="card-element">

                                            <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
                                            <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
                                            <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
                                            <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
                                            <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
                                            <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
                                            <input type="hidden" name="state_id" value="{{ $data['state_id'] }}">
                                            <input type="hidden" name="additional_information" value="{{ $data['additional_information'] }}">

                                        </label>




                                    </div>
                                    <br>
                                    <button class="btn btn-primary">Submit Payment</button>
                                </form>



                            </div>
                        </div>
                    </div>
                    <!-- checkout-progress-sidebar -->
                </div><!--  // end col md 6 -->







            </div><!-- /.row -->
        </div><!-- /.checkout-box -->
        <!-- === ===== BRANDS CAROUSEL ==== ======== -->








        <!-- ===== == BRANDS CAROUSEL : END === === -->
    </div><!-- /.container -->
</div><!-- /.body-content -->


@include('frontend.layout.footer')



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

<!-- Vendor JS-->
<script src="{{ asset('frontend/') }}/assets/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/vendor/bootstrap.bundle.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/plugins/slick.js"></script>
<script src="{{ asset('frontend') }}/assets/js/plugins/jquery.syotimer.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/plugins/waypoints.js"></script>
<script src="{{ asset('frontend') }}/assets/js/plugins/wow.js"></script>
<script src="{{ asset('frontend/') }}/assets/js/plugins/slider-range.js"></script>
<script src="{{ asset('frontend') }}/assets/js/plugins/perfect-scrollbar.js"></script>
<script src="{{ asset('frontend') }}/assets/js/plugins/magnific-popup.js"></script>
<script src="{{ asset('frontend') }}/assets/js/plugins/select2.min.js"></script>
<script src="{{ asset('frontend/assets/js/plugins/counterup.js') }}"></script>
<script src="{{ asset('frontend') }}/assets/js/plugins/waypoints.js"></script>
<script src="{{ asset('frontend/assets/js/plugins/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('frontend') }}/assets/js/plugins/images-loaded.js"></script>
<script src="{{ asset('frontend/assets/js/plugins/isotope.js') }}"></script>
<script src="{{ asset('frontend') }}/assets/js/plugins/scrollup.js"></script>
<script src="{{ asset('frontend') }}/assets/js/plugins/jquery.vticker-min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/plugins/jquery.theia.sticky.js"></script>
<script src="{{ asset('frontend') }}/assets/js/plugins/jquery.elevatezoom.js"></script>
{{--// SWEET ALERT--}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Template  JS -->
<script src="{{ asset('frontend') }}/assets/js/plugins/leaflet.js"></script>
<script src="{{ asset('frontend/') }}/assets/js/main.js?v=5.5"></script>
<script src="{{ asset('frontend/') }}/assets/js/shop.js?v=5.5"></script>
<script src="{{ asset('frontend') }}/assets/js/custom/custom.js"></script>


<!-- If you want to use the popup integration, -->

</body>
</html>
