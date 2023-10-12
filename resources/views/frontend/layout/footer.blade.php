@php
    $seo = \App\Models\Seo::findOrFail(1);
@endphp
<section class="section-padding footer-mid">
    <div class="container-fluid pt-15 pb-20">
        <div class="row">
            <div class="col">
                <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                    <div class="logo mb-30">
                        <a href="{{ url('/') }}"><img src="{{ URL::to('upload/theme/'.$seo->logo) }}" alt="logo" /></a>
                        <p class="font-lg text-heading">{{ $seo->footer_title }}</p>
                    </div>
                    <ul class="contact-infor">
                        <li><img src="{{ asset('frontend') }}/assets/imgs/theme/icons/icon-location.svg" alt="" /><strong>Address: </strong> <span>{{ $seo->footer_address }}</span></li>
                        <li><img src="{{ asset('frontend') }}/assets/imgs/theme/icons/icon-contact.svg" alt="" /><strong>Call Us:</strong><span>{{ $seo->footer_phone_no }}</span></li>
                        <li><img src="{{ asset('frontend') }}/assets/imgs/theme/icons/icon-email-2.svg" alt="" /><strong>Email:</strong><span>{{ $seo->footer_email }}</span></li>
                        <li><img src="{{ asset('frontend') }}/assets/imgs/theme/icons/icon-clock.svg" alt="" /><strong>Hours:</strong><span>{{ $seo->office_hours }}</span></li>
                    </ul>
                </div>
            </div>
            <div class="footer-link-widget col wow animate__animated animate__fadeInUp mx-auto" data-wow-delay=".1s">
                <h4 class="widget-title">Company</h4>
                <ul class="footer-list mb-sm-5 mb-md-0">
                    <li><a href="{{ route('blog.page') }}">Blog</a></li>
                    <li><a href="{{ route('about-us') }}">About Us</a></li>
                    <li><a href="{{ route('contact-us') }}">Contact Us</a></li>
                    <li><a href="{{ route('delivery-information') }}">Delivery Information</a></li>
                    <li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                    <li><a href="{{ route('terms-conditions') }}">Terms &amp; Conditions</a></li>
                    <li><a href="{{ route('purchase-guide') }}">Purchase Guide</a></li>
                </ul>
            </div>
            <div class="footer-link-widget col wow animate__animated animate__fadeInUp mx-auto" data-wow-delay=".2s">
                <h4 class="widget-title">Account</h4>
                <ul class="footer-list mb-sm-5 mb-md-0">
                    <li><a href="{{ route('login') }}">Sign In</a></li>
                    <li><a href="#">View Cart</a></li>
                    <li><a href="#">My Wishlist</a></li>
                    <li><a href="#">Track My Order</a></li>
                    <li><a href="#">Help Ticket</a></li>
                    <li><a href="#">Shipping Details</a></li>
                    <li><a href="#">Compare products</a></li>
                </ul>
            </div>
            <div class="footer-link-widget col wow animate__animated animate__fadeInUp mx-auto" data-wow-delay=".4s">
                <h4 class="widget-title">Popular</h4>
                <ul class="footer-list mb-sm-5 mb-md-0">
                    <li><a href="#">Milk & Flavoured Milk</a></li>
                    <li><a href="#">Butter and Margarine</a></li>
                    <li><a href="#">Eggs Substitutes</a></li>
                    <li><a href="#">Marmalades</a></li>
                    <li><a href="#">Sour Cream and Dips</a></li>
                    <li><a href="#">Tea & Kombucha</a></li>
                    <li><a href="#">Cheese</a></li>
                </ul>
            </div>
            <div class="footer-link-widget widget-install-app col wow animate__animated animate__fadeInUp mx-auto" data-wow-delay=".5s">
                <h4 class="widget-title">Install App</h4>
                <p class="">From App Store or Google Play</p>
                <div class="download-app">
                    <a href="#" class="hover-up mb-sm-2 mb-lg-0"><img class="active" src="{{ asset('frontend') }}/assets/imgs/theme/app-store.jpg" alt="" /></a>
                    <a href="#" class="hover-up mb-sm-2"><img src="{{ asset('frontend') }}/assets/imgs/theme/google-play.jpg" alt="" /></a>
                </div>
                <p class="mb-20">Secured Payment Gateways</p>
                <img class="" src="{{ asset('frontend') }}/assets/imgs/theme/payment-method.png" alt="" />
            </div>
        </div>
    </div>
</section>
<div class="container pb-30 wow animate__animated animate__fadeInUp" data-wow-delay="0">
    <div class="row align-items-center">
        <div class="col-12 mb-30">
            <div class="footer-bottom"></div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6">
            <p class="font-sm mb-0">&copy; {{ $seo->footer_copyright_text }}</p>
        </div>
        <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">
            <div class="hotline d-lg-inline-flex mr-30">
                <img src="{{ asset('frontend') }}/assets/imgs/theme/icons/phone-call.svg" alt="hotline" />
                <p>{{ $seo->working_teliphone }}<span>Working {{ $seo->office_hours }}</span></p>
            </div>
            <div class="hotline d-lg-inline-flex">
                <img src="{{ asset('frontend') }}/assets/imgs/theme/icons/phone-call.svg" alt="hotline" />
                <p>{{ $seo->support_teliphone }}<span>24/7 Support Center</span></p>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
            <div class="mobile-social-icon">
                <h6>Follow Us</h6>
                <a href="{{ $seo->facebook_link }}"><img src="{{ asset('frontend') }}/assets/imgs/theme/icons/icon-facebook-white.svg" alt="" /></a>
                <a href="{{ $seo->twitter_link }}"><img src="{{ asset('frontend') }}/assets/imgs/theme/icons/icon-twitter-white.svg" alt="" /></a>
                <a href="{{ $seo->instagram_link }}"><img src="{{ asset('frontend') }}/assets/imgs/theme/icons/icon-instagram-white.svg" alt="" /></a>
                <a href="{{ $seo->pinterest_link }}"><img src="{{ asset('frontend') }}/assets/imgs/theme/icons/icon-pinterest-white.svg" alt="" /></a>
                <a href="{{ $seo->youtube_link }}"><img src="{{ asset('frontend') }}/assets/imgs/theme/icons/icon-youtube-white.svg" alt="" /></a>
            </div>
            <p class="font-sm">{{ $seo->follow_us_title }}</p>
        </div>
    </div>
</div>
