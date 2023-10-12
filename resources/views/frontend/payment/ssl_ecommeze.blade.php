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
    <main class="main my-5">
        <div class="container">
            <div class="py-5 text-center">
                <h2>E-Auth - SSLCommerz</h2>
            </div>

            <div class="row">
                <div class="col-md-6 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your cart</span>
                        <span class="badge badge-secondary badge-pill">{{ count(Gloudemans\Shoppingcart\Facades\Cart::content()) }}</span>
                    </h4>
                    <ul class="list-group mb-3">

                        @foreach($cart_total as $item)
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">{{ $item->name }}</h6>
                                <small class="text-muted">Quantity: {{ $item->qty }}</small>
                            </div>
                            <span class="text-brand">{{ $item->price }}৳ </span>
                        </li>
                        @endforeach
                        <li class="list-group-item lh-condensed">
                        <hr>
                        <h6 class="text-muted d-flex justify-content-between">Shipping Charge:<span id="pay_ship_charge" class="text-brand"> {{ $ship_charge }}</span>৳</h6>
                        <hr>
                        <h6 class="text-muted d-flex justify-content-between">Coupon Name:<span>( {{ \Illuminate\Support\Facades\Session::has('coupon') ? session()->get('coupon')['coupon_name']:'' }} )</span></h6>
                        <hr>
                        <h6 class="text-muted d-flex justify-content-between">Coupon Discount:<span class="text-brand"> {{ \Illuminate\Support\Facades\Session::has('coupon') ? session()->get('coupon')['coupon_discount']:'' }} %</span></h6>
                        <hr>
                        <h6 class="text-muted d-flex justify-content-between">Coupon Discount Amount:<span class="text-brand"> {{ \Illuminate\Support\Facades\Session::has('coupon')? session()->get('coupon')['discount_amount']:'' }}৳ </span></h6>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (BDT)</span>
                            <strong>{{ \Illuminate\Support\Facades\Session::has('coupon')? $cartTotal + $ship_charge - session()->get('coupon')['discount_amount'] : $cartTotal + $ship_charge}}৳ </strong>
                        </li>
                    </ul>
                </div>

                <div class="col-md-6 order-md-1">
                    <h4 class="mb-3">Billing address</h4>
                    <form method="POST" class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="firstName">Full name</label>
                                <input type="text" name="customer_name" class="form-control" id="customer_name" placeholder=""
                                    value="{{ $data['shipping_name'] }}" disabled required>
                                <div class="invalid-feedback">
                                    Valid customer name is required.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="mobile">Mobile</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">+88</span>
                                </div>
                                <input type="text" name="customer_mobile" class="form-control" id="mobile" placeholder="Mobile"
                                    value="{{ $data['shipping_phone'] }}" disabled required>
                                <div class="invalid-feedback" style="width: 100%;">
                                    Your Mobile number is required.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="customer_email" class="form-control" id="email"
                                placeholder="you@example.com" value="{{ $data['shipping_email'] }}" disabled required>
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address">Post Code</label>
                            <input type="number" class="form-control" id="post_code" placeholder="1234"
                                value="{{ $data['post_code'] }}" disabled required>
                            <div class="invalid-feedback">
                                Please enter your post code.
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="division_id">Division</label>
                                <div class="custom_select">
                                    <select name="division_id" id="division_id" disabled class="form-control w-100">
                                        <option value="">--Division--</option>
                                        @foreach($divisions as $div)
                                        <option {{ $div->division_name == request()->cookie('division') ? 'selected' : '' }} value="{{ $div->id }}">{{ $div->division_name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please enter your division.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="district_id">District</label>
                                <div class="custom_select">
                                    <select name="district_id" id="district_id" disabled class="form-control w-100">
                                        <option value="">--District--</option>
                                        @foreach($districts as $div)
                                            <option {{ $div->district_name == request()->cookie('district') ? 'selected' : '' }} value="{{ $div->id }}">{{ $div->district_name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please enter your district.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="state_id">State</label>
                                {{--@dd(request()->cookie('state'))--}}
                                <div class="custom_select">
                                    <select id="state_id" name="state_id" disabled class="form-control w-100">
                                        <option value="">--State--</option>
                                        @foreach($states as $div)
                                            <option {{ $div->state_name == request()->cookie('state') ? 'selected' : '' }} value="{{ $div->id }}">{{ $div->state_name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please enter your state.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="additional_information">Additional Information</label>
                            <textarea name="additional_information" id="additional_information" rows="3" placeholder="Additional information" disabled>{{ $data['additional_information'] }}</textarea>
                        </div>
                        <hr class="mb-4">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="same-address">
                            <input type="hidden" value="{{ \Illuminate\Support\Facades\Session::has('coupon')? $cartTotal + $ship_charge - session()->get('coupon')['discount_amount'] : $cartTotal + $ship_charge}}" name="amount" id="total_amount" required/>
                            <label class="custom-control-label" for="same-address">Shipping address is the same as my billing
                                address</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="save-info">
                            <label class="custom-control-label" for="save-info">Save this information for next time</label>
                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                                token="if you have any token validation"
                                postdata="your javascript arrays or objects which requires in backend"
                                order="If you already have the transaction generated for current order"
                                endpoint="{{ url('/pay-via-ajax') }}"> Pay Now
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    @include('frontend.layout.subscribers')
    @include('frontend.layout.featured_section')
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
    <script>
        var obj = {};
        obj.cus_name = $('#customer_name').val();
        obj.cus_phone = $('#mobile').val();
        obj.cus_email = $('#email').val();
        obj.post_code = $('#post_code').val();
        obj.division_id = $('#division_id').val();
        obj.district_id = $('#district_id').val();
        obj.state_id = $('#state_id').val();
        obj.additional_information = $('#additional_information').val();
        obj.amount = $('#total_amount').val();

        $('#sslczPayBtn').prop('postdata', obj);

        (function (window, document) {
            var loader = function () {
                var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
                // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
        })(window, document);
    </script>
</body>
</html>
