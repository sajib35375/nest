<header class="header-area header-style-1 header-style-5 header-height-2">
    <div class="mobile-promotion">
        <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>
    </div>
    @php
        $seo = \App\Models\Seo::findOrFail(1);
    @endphp
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info">
                        <ul>
                            <li><a href="{{ route('about-us') }}">About Us</a></li>
                            <li><a href="page-account.html">My Account</a></li>
                            <li><a href="shop-wishlist.html">Wishlist</a></li>
                            <li><a href="shop-order.html">Order Tracking</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4">

                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>
                            <li>Need help? Call Us: <strong class="text-brand"> + {{ $seo->support_teliphone }}</strong></li>
                            <li>
                                <a class="language-dropdown-active" href="#">English <i class="fi-rs-angle-small-down"></i></a>
                                <ul class="language-dropdown">
                                    <div id='google_translate_element'></div>
                                </ul>
                            </li>
                            <li>
                                <a class="language-dropdown-active" href="#">USD <i class="fi-rs-angle-small-down"></i></a>
                                <ul class="language-dropdown">
                                    <li>
                                        <a href="#"><img src="{{ asset('frontend') }}/assets/imgs/theme/flag-fr.png" alt="" />INR</a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ asset('frontend') }}/assets/imgs/theme/flag-dt.png" alt="" />MBP</a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ asset('frontend') }}/assets/imgs/theme/flag-ru.png" alt="" />EU</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php
        $all_cat = \App\Models\ProductCategory::all();
    @endphp
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="{{ route('frontend.index') }}"><img src="{{ URL::to('upload/theme/'.$seo->logo) }}" alt="logo" /></a>
                </div>
                <div class="header-right">
                    <div class="search-style-2">
                        <form action="{{ route('product.search') }}" method="POST">
                            @csrf
                            <select class="select-active" name="search_category">
                                <option>All Categories</option>
                                @foreach($all_cat as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                            <input type="text" name="search" id="search" placeholder="Search for items..." autocomplete="off" />
                        </form>
                        <div id="advanceProductSearch"></div>
                    </div>
                    <div class="header-action-right">
                        <div class="header-action-2">
                            <div class="search-location">

                            </div>

                            @php

                            $count_wish = \App\Models\Wishlist::where('user_id',\Illuminate\Support\Facades\Auth::id())->count();

                            @endphp

                            <div class="header-action-icon-2">
                                <a href="{{ route('wishlist.page') }}">
                                    <img class="svgInject" alt="Nest" src="{{ asset('frontend') }}/assets/imgs/theme/icons/icon-heart.svg" />
                                    <span id="wish_count" class="pro-count blue"></span>
                                </a>
                                <a href="{{ route('wishlist.page') }}"><span class="lable">Wishlist</span></a>
                            </div>





                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="{{ route('cart.page.view') }}">
                                    <img alt="Nest" src="{{ asset('frontend') }}/assets/imgs/theme/icons/icon-cart.svg" />
                                    <span id="CartQty" class="pro-count blue"></span>
                                </a>
                                <a href="{{ route('cart.page.view') }}" ><span class="lable">Cart</span></a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <ul>
                                        <div id="miniCart"></div>
                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Total <span id="total"></span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="{{ route('cart.page.view') }}" class="outline">View cart</a>
                                            <a href="{{ route('checkout.view') }}">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>





                            <div class="header-action-icon-2">
                                <a href="page-account.html">
                                    <img class="svgInject" alt="Nest" src="{{ URL::to('frontend/assets/imgs/theme/icons/icon-user.svg') }}" />
                                </a>
                                <a href="javascript:void(0)"><span class="lable ml-0">Account</span></a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                    <ul>
                                        @if(!Auth::user())
                                        <li>
                                            <a href="{{ route('login') }}"><i class="fi fi-rs-key mr-10"></i>Login</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('register') }}"><i class="fi fi-rs-lock mr-10"></i>Register</a>
                                        </li>
                                        @else
                                        <li>
                                            <a href="{{ route('user.profile') }}"><i class="fi fi-rs-user mr-10"></i>My Account</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.logout') }}"><i class="fi fi-rs-sign-out mr-10"></i>Sign out</a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="index.html"><img src="{{ asset('frontend') }}/assets/imgs/theme/logo.svg" alt="logo" /></a>
                </div>
                <div class="header-nav d-none d-lg-flex">

                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                            <ul>
                                <li>
                                    <a class="active" href="{{ url('/') }}">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('about-us') }}">About</a>
                                </li>
                                <li>
                                    <a href="{{ route('shop.page') }}">Shop</a>
                                </li>
                                <li>
                                    <a href="{{ route('blog.page') }}">Blog</a>
                                </li>
                                <li>
                                    <a href="#">Pages <i class="fi-rs-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('about-us') }}">About Us</a></li>
                                        <li><a href="{{ route('contact-us') }}">Contact</a></li>
                                        <li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                                        <li><a href="{{ route('terms-conditions') }}">Terms of Service</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('contact-us') }}">Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="hotline d-none d-lg-flex">
                    <img src="{{ asset('frontend') }}/assets/imgs/theme/icons/icon-headphone-white.svg" alt="hotline" />
                    <p>{{ $seo->support_teliphone }}<span>24/7 Support Center</span></p>
                </div>
                <div class="header-action-icon-2 d-block d-lg-none">
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            <a href="shop-wishlist.html">
                                <img alt="Nest" src="{{ asset('frontend') }}/assets/imgs/theme/icons/icon-heart.svg" />
                                <span class="pro-count white">4</span>
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="#">
                                <img alt="Nest" src="{{ asset('frontend') }}/assets/imgs/theme/icons/icon-cart.svg" />
                                <span class="pro-count white">2</span>
                            </a>
                            <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                <ul>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="shop-product-right.html"><img alt="Nest" src="{{ asset('frontend') }}/assets/imgs/shop/thumbnail-3.jpg" /></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="shop-product-right.html">Plain Striola Shirts</a></h4>
                                            <h3><span>1 × </span>$800.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="shop-product-right.html"><img alt="Nest" src="{{ asset('frontend') }}/assets/imgs/shop/thumbnail-4.jpg" /></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="shop-product-right.html">Macbook Pro 2022</a></h4>
                                            <h3><span>1 × </span>$3500.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="shopping-cart-footer">
                                    <div class="shopping-cart-total">
                                        <h4>Total <span>$383.00</span></h4>
                                    </div>
                                    <div class="shopping-cart-button">
                                        <a href="shop-cart.html">View cart</a>
                                        <a href="shop-checkout.html">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="index.html"><img src="{{ URL::to('upload/theme/'.$seo->logo) }}" alt="logo" /></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="#">
                    <input type="text" placeholder="Search for items…" />
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu font-heading">
                        <li class="menu-item-has-children">
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="shop-grid-right.html">shop</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{ route('blog.page') }}">Blog</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="{{ route('about-us') }}">About Us</a></li>
                                <li><a href="{{ route('contact-us') }}">Contact</a></li>
                                <li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                                <li><a href="{{ route('terms-conditions') }}">Terms of Service</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Language</a>
                            <br/>
                            <div id='google_translate_element'></div>
                        </li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap">
                <div class="single-mobile-header-info">
                    <a href="{{ route('login') }}"><i class="fi-rs-key"></i>Log In</a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="{{ route('register') }}"><i class="fi-rs-user"></i>Sign Up</a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="#"><i class="fi-rs-headphones"></i>{{ $seo->footer_phone_no }} </a>
                </div>
            </div>
            <div class="mobile-social-icon mb-50">
                <h6 class="mb-15">Follow Us</h6>
                <a href="{{ $seo->facebook_link }}"><img src="{{ asset('frontend') }}/assets/imgs/theme/icons/icon-facebook-white.svg" alt="" /></a>
                <a href="{{ $seo->twitter_link }}"><img src="{{ asset('frontend') }}/assets/imgs/theme/icons/icon-twitter-white.svg" alt="" /></a>
                <a href="{{ $seo->instagram_link }}"><img src="{{ asset('frontend') }}/assets/imgs/theme/icons/icon-instagram-white.svg" alt="" /></a>
                <a href="{{ $seo->pinterest_link }}"><img src="{{ asset('frontend') }}/assets/imgs/theme/icons/icon-pinterest-white.svg" alt="" /></a>
                <a href="{{ $seo->youtube_link }}"><img src="{{ asset('frontend') }}/assets/imgs/theme/icons/icon-youtube-white.svg" alt="" /></a>
            </div>
            <div class="site-copyright">{{ $seo->footer_copyright_text }}</div>
        </div>
    </div>
</div>
<!--End header-->
