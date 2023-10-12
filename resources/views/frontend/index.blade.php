@extends('frontend.front_master')
@section('frontend')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    @php
        $header = \App\Models\Seo::find(1);
    @endphp
    <style>
        .hero-3 {
            background-image: url("upload/theme/{{ $header->header }}");
            object-fit: cover!important;
        }
    </style>

<main class="main">
    <section class="hero-3 position-relative align-items">
        <h2 class="mb-30 text-center">What are you looking for?</h2>
        @if (session('success'))
            <div class="mb-4 font-medium text-sm bg-green p-1 rounded-sm">
                {{ session('success') }}
            </div>
        @endif
        <form class="form-subcriber d-flex mb-30 text-center" action="{{ route('store.subscriber') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Your emaill address" tabindex="-1" />
            <button class="btn" type="submit" tabindex="-1">Subscribe</button>
        </form>
        @error('email')
        {{--<p class="text-danger">{{ $message }}</p>--}}
        @enderror
        <ul class="list-inline nav nav-tabs links font-xs text-center">
            <li class="list-inline-item nav-item"><a class="nav-link font-xs" href="shop-grid-right.html">Cake</a></li>
            <li class="list-inline-item nav-item"><a class="nav-link font-xs" href="shop-grid-right.html">Coffes</a></li>
            <li class="list-inline-item nav-item"><a class="nav-link font-xs" href="shop-grid-right.html">Pet Foods</a></li>
            <li class="list-inline-item nav-item"><a class="nav-link font-xs" href="shop-grid-right.html">Vegetables</a></li>
        </ul>
    </section>
    <section class="bg-grey-1 section-padding pt-100 pb-80 mb-80">
        <div class="container">
            <h1 class="mb-80 text-center">Trending items</h1>

            <div class="row product-grid">

{{--                @dd($all_data['all_product'])--}}

            @foreach ($all_data['all_product'] as $product)

                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="product-cart-wrap mb-30">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="{{ route('single.product',$product->id) }}">
                                    <img class="default-img" src="{{ URL::to('') }}/backend/assets/imgs/products/{{ $product->thumbnail }}" alt="" />
                                    <img class="hover-img" src="{{ URL::to('') }}/backend/assets/imgs/products/{{ $product->hover_img }}" alt="" />
                                </a>
                            </div>
                            <div class="product-action-1">
                                <a type="button" aria-label="Add To Wishlist" product_id="{{ $product->id }}" id="wish" class="action-btn" href="#"><i class="fi-rs-heart"></i></a>
                                <a aria-label="Compare" class="action-btn" href="#" id="compare" product_id="{{ $product->id }}"><i class="fi-rs-shuffle"></i></a>

                                <a aria-label="add to cart" class="action-btn product_cart" data-bs-toggle="modal" data-bs-target="#cartViewModal" product-id="{{ $product->id }}"><i class="fi-rs-shopping-cart mr-5"></i></a>

                            </div>
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="hot">{{ $product->rating_status }}</span>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <div class="product-category">
                                <a href="shop-grid-right.html">{{ $product->type }}</a>
                            </div>
                            <h2><a href="{{ route('single.product',$product->id) }}">{{  $product->product_name  }}</a></h2>
                            <div class="product-rate-cover">
                                <div class="rating-css">
                                    <div class="star-icon">





                                           @php
                                               $star = \App\Models\Rate::where('product_id',$product->id)->avg('star_rate');
                                               $value = round($star);
                                           @endphp


                                        <style>
                                            .rating-active {
                                                background-color: yellow!important;
                                            }
                                        </style>

                                        @php
                                       for($i=0;$i<5;$i++){
                                            if ($i<round($star)) {
                                                @endphp
                                                <input type="radio"  value="1" name="rating1"  id="rat1">

                                                <label for="rat1" class="fa fa-star rating-active"></label>
                                                @php
                                            }else{
                                                @endphp
                                                <input type="radio" value="1" name="rating1"  id="rat1">
                                                <label for="rat1" class="fa fa-star"></label>
                                                @php
                                            }
                                       }
                                       @endphp

                                    </div>
                                </div>
                                <span class="font-small ml-5 text-muted"><span class="font-small ml-5 text-muted"> ({{ round($star) }})</span> </span>
                            </div>
                            <div>
                                <span class="font-small text-muted">By <a href="vendor-details-1.html">{{  $product->brand_name  }}</a></span>
                            </div>
                            <div class="product-card-bottom">
                                <div class="product-price">
                                    <span>{{ $product->sale_price }} ৳</span>
                                    <span class="old-price">{{ $product->regular_price }} ৳</span>
                                </div>

                                <div class="add-cart">
                                    <a class="add product_cart" data-bs-toggle="modal" data-bs-target="#cartViewModal" product-id="{{ $product->id }}" href=""><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end product card-->

                @endforeach

            </div>
            <!--row-->

            <h1 class="text-center mt-100 mb-80">Deals of the day</h1>
            <div class="row">

                @foreach($all_data['deal_product'] as $deal)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-cart-wrap style-2 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <div class="product-img-action-wrap">
                            <div class="product-img">
                                <a href="{{ route('single.product',$deal->id) }}">
                                    <img src="{{ URL::to('') }}/backend/assets/imgs/products/{{ $deal->thumbnail }}" alt="" />
                                </a>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <div class="deals-countdown-wrap">
                                <div class="deals-countdown" data-countdown="{{ $deal->deals_date }} {{ $deal->deals_time }}"></div>
                            </div>
                            <div class="deals-content">
                                <h2><a href="{{ route('single.product',$deal->id) }}">{{ $deal->product_name }}</a></h2>
                                <div class="product-rate-cover">
                                    <div class="rating-css">
                                        <div class="star-icon">
                                            <style>
                                                .rating-active {
                                                        color: #ffe400!important;
                                                    }
                                            </style>

                                            @php
                                                $star = \App\Models\Rate::where('product_id',$deal->id)->avg('star_rate');
                                                $value = round($star);
                                            @endphp

                                            @php
                                           for($i=0;$i<5;$i++){
                                                if ($i<round($value)) {
                                                    @endphp
                                                    <input type="radio"  value="1" name="rating1"  id="rat1">

                                                    <label for="rat1" class="fa fa-star rating-active"></label>
                                                    @php
                                                }else{
                                                    @endphp
                                                    <input type="radio" value="1" name="rating1"  id="rat1">
                                                    <label for="rat1" class="fa fa-star"></label>
                                                    @php
                                                }
                                           }
                                           @endphp

                                        </div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> ( {{ round($star) }} )</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a href="vendor-details-1.html">{{ $deal->brand_name }}</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>{{ $deal->sale_price }} ৳</span>
                                        <span class="old-price">{{ $deal->regular_price }} ৳</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add product_cart" data-bs-toggle="modal" data-bs-target="#cartViewModal" product-id="{{ $deal->id }}" href="#"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
</main>

    <footer class="main">
        <section class="section-padding mb-30">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <h4 class="section-title style-1 mb-30 animated animated">Top Selling</h4>
                        <div class="product-list-small animated animated">




                            @foreach($all_data['top_selling'] as $selling)


                                <article class="row align-items-center hover-up">
                                    <figure class="col-md-4 mb-0">
                                        <a href="{{ route('single.product',$selling->id) }}"><img src="{{ URL::to('') }}/backend/assets/imgs/products/{{ $selling->thumbnail }}" alt="" /></a>
                                    </figure>
                                    <div class="col-md-8 mb-0">
                                        <h6>
                                            <a href="{{ route('single.product',$selling->id) }}">{{ $selling->product_name }}</a>
                                        </h6>
                                        <div class="product-rate-cover">

                                            <div class="rating-css">
                                                <div class="star-icon">

                                                    @php
                                                        $star = \App\Models\Rate::where('product_id',$product->id)->avg('star_rate');
                                                        $value = round($star);
                                                    @endphp

                                                    <style>
                                                        .rating-active {
                                                            color: #ffe400!important;
                                                        }
                                                    </style>

                                                    @php
                                                        for($i=0;$i<5;$i++){
                                                             if ($i<round($value)) {
                                                    @endphp
                                                    <input type="radio"  value="1" name="rating1"  id="rat1">

                                                    <label for="rat1" class="fa fa-star rating-active"></label>
                                                    @php
                                                        }else{
                                                    @endphp
                                                    <input type="radio" value="1" name="rating1"  id="rat1">
                                                    <label for="rat1" class="fa fa-star"></label>
                                                    @php
                                                        }
                                                   }
                                                    @endphp

                                                </div>
                                            </div>

                                            <span class="font-small ml-5 text-muted"> ({{ $value }})</span>
                                        </div>
                                        <div class="product-price">
                                            <span>{{ $selling->sale_price }}৳</span>
                                            <span class="old-price">{{ $selling->regular_price }}৳</span>
                                        </div>
                                    </div>
                                </article>



                            @endforeach





                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                        <h4 class="section-title style-1 mb-30 animated animated">Trending Products</h4>
                        <div class="product-list-small animated animated">


                            @foreach($all_data['trending_product'] as $product)

                                <article class="row align-items-center hover-up">
                                    <figure class="col-md-4 mb-0">
                                        <a href="{{ route('single.product',$product->id) }}"><img src="{{ URL::to('') }}/backend/assets/imgs/products/{{ $product->thumbnail }}" alt="" /></a>
                                    </figure>
                                    <div class="col-md-8 mb-0">
                                        <h6>
                                            <a href="{{ route('single.product',$product->id) }}">{{ $product->product_name }}</a>
                                        </h6>
                                        <div class="product-rate-cover">
                                            <div class="rating-css">
                                                <div class="star-icon">

                                                    @php
                                                        $star = \App\Models\Rate::where('product_id',$product->id)->avg('star_rate');
                                                        $value = round($star);
                                                    @endphp


                                                    <style>
                                                        .rating-active {
                                                            color: #ffe400!important;
                                                        }
                                                    </style>

                                                    @php
                                                        for($i=0;$i<5;$i++){
                                                             if ($i<round($value)) {
                                                    @endphp
                                                    <input type="radio"  value="1" name="rating1"  id="rat1">

                                                    <label for="rat1" class="fa fa-star rating-active"></label>
                                                    @php
                                                        }else{
                                                    @endphp
                                                    <input type="radio" value="1" name="rating1"  id="rat1">
                                                    <label for="rat1" class="fa fa-star"></label>
                                                    @php
                                                        }
                                                   }
                                                    @endphp

                                                </div>
                                            </div>

                                            <span class="font-small ml-5 text-muted"> ({{ round($star) }})</span>
                                        </div>
                                        <div class="product-price">
                                            <span>৳{{ $product->sale_price }}</span>
                                            <span class="old-price">৳{{ $product->regular_price }}</span>
                                        </div>
                                    </div>
                                </article>

                            @endforeach





                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <h4 class="section-title style-1 mb-30 animated animated">Recently added</h4>
                        <div class="product-list-small animated animated">



                            @foreach($all_data['recent_product'] as $product)


                                <article class="row align-items-center hover-up">
                                    <figure class="col-md-4 mb-0">
                                        <a href="{{ route('single.product',$product->id) }}"><img src="{{ URL::to('') }}/backend/assets/imgs/products/{{ $product->thumbnail }}" alt="" /></a>
                                    </figure>
                                    <div class="col-md-8 mb-0">
                                        <h6>
                                            <a href="{{ route('single.product',$product->id) }}">{{ $product->product_name }}</a>
                                        </h6>
                                        <div class="product-rate-cover">
                                            <div class="rating-css">
                                                <div class="star-icon">


                                                    @php
                                                        $star = \App\Models\Rate::where('product_id',$product->id)->avg('star_rate');
                                                        $value = round($star);
                                                    @endphp


                                                    <style>
                                                        .rating-active {
                                                            color: #ffe400!important;
                                                        }
                                                    </style>

                                                    @php
                                                        for($i=0;$i<5;$i++){
                                                             if ($i<round($value)) {
                                                    @endphp
                                                    <input type="radio"  value="1" name="rating1"  id="rat1">

                                                    <label for="rat1" class="fa fa-star rating-active"></label>
                                                    @php
                                                        }else{
                                                    @endphp
                                                    <input type="radio" value="1" name="rating1"  id="rat1">
                                                    <label for="rat1" class="fa fa-star"></label>
                                                    @php
                                                        }
                                                   }
                                                    @endphp

                                                </div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> ({{ round($star) }})</span>
                                        </div>
                                        <div class="product-price">
                                            <span>৳{{ $product->sale_price }}</span>
                                            <span class="old-price">৳{{ $product->regular_price }}</span>
                                        </div>
                                    </div>
                                </article>

                            @endforeach





                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                        <h4 class="section-title style-1 mb-30 animated animated">Top Rated</h4>
                        <div class="product-list-small animated animated">




                            @foreach($all_data['top_rateded'] as $product)

                                <article class="row align-items-center hover-up">
                                    <figure class="col-md-4 mb-0">
                                        <a href="{{ route('single.product',$product->id) }}"><img src="{{ URL::to('') }}/backend/assets/imgs/products/{{ $product->thumbnail }}" alt="" /></a>
                                    </figure>
                                    <div class="col-md-8 mb-0">
                                        <h6>
                                            <a href="{{ route('single.product',$product->id) }}">{{ $product->product_name }}</a>
                                        </h6>
                                        <div class="product-rate-cover">
                                            <div class="rating-css">
                                                <div class="star-icon">


                                                    @php
                                                        $star = \App\Models\Rate::where('product_id',$product->id)->avg('star_rate');
                                                        $value = round($star);
                                                    @endphp


                                                    <style>
                                                        .rating-active {
                                                            color: #ffe400!important;
                                                        }
                                                    </style>

                                                    @php
                                                        for($i=0;$i<5;$i++){
                                                             if ($i<round($value)) {
                                                    @endphp
                                                    <input type="radio"  value="1" name="rating1"  id="rat1">

                                                    <label for="rat1" class="fa fa-star rating-active"></label>
                                                    @php
                                                        }else{
                                                    @endphp
                                                    <input type="radio" value="1" name="rating1"  id="rat1">
                                                    <label for="rat1" class="fa fa-star"></label>
                                                    @php
                                                        }
                                                   }
                                                    @endphp

                                                </div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> ({{ round($star) }})</span>
                                        </div>
                                        <div class="product-price">
                                            <span>৳{{ $product->sale_price }}</span>
                                            <span class="old-price">৳{{ $product->regular_price }}</span>
                                        </div>
                                    </div>
                                </article>


                            @endforeach



                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!--End 4 columns-->
        @include('frontend.layout.footer')
    </footer>







@endsection
