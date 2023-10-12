@extends('frontend.front_master')

@section('frontend')
<main class="main">
    <div class="page-header mt-30 mb-50">
        <div class="container">
            <div class="archive-header">
                <div class="row align-items-center">
                    <div class="col-xl-3">
                        <h1 class="mb-15">Brand</h1>
                        <div class="breadcrumb">
                            <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                            <span></span> Shop
                        </div>
                    </div>
                    <div class="col-xl-9 text-end d-none d-xl-block">
                        <ul class="tags-list">
                            @foreach($all_cat as $cat)
                            <li class="hover-up">
                                <a href="{{ route('categroy.wise.product', $cat->slug) }}"><i class="fi-rs-cross mr-10"></i>{{ $cat->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-30">
        <div class="row flex-row-reverse">
            <div class="col-lg-4-5">
                @include('frontend.layout.shop_product_filter')
                <div class="row product-grid">
                    @foreach($products as $product)
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{ route('single.product',$product->id) }}">
                                        <img class="default-img" src="{{ URL::to('backend/assets/imgs/products/'.$product->thumbnail) }}" alt="" />
                                        <img class="hover-img" src="{{ URL::to('backend/assets/imgs/products/'.$product->hover_img) }}" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn quickViewProduct" product-id="{{ $product->id }}"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">{{ $product->rating_status }}</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">{{ $product->type }}</a>
                                </div>
                                <h2><a href="{{ route('single.product',$product->id) }}">{{ Str::words($product->product_name, 6, '...') }}</a></h2>
                                <div class="product-rate-cover">
                                    <div class="rating-css">
                                        <div class="star-icon">
                                            <style>
                                                .rating-active {
                                                        color: #ffe400!important;
                                                    }
                                            </style>

                                            @php
                                           for($i=0;$i<5;$i++){
                                                if ($i<round($product->reviews_avg)) {
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
                                    <span class="font-small ml-5 text-muted"> </span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a href="{{ route('brand.wise.product', $product->brand_name) }}">{{  $product->brand_name  }}</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>৳ {{ $product->sale_price }}</span>
                                        <span class="old-price">৳ {{ $product->regular_price }}</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!--product grid-->
                <div class="pagination-area mt-20 mb-20">
                    {{ $products->links('vendor.pagination.default') }}
                </div>
            </div>

            @include('frontend.layout.left_sidebar.product_sidebar')
        </div>
    </div>
</main>

<footer class="main">
    @include('frontend.layout.subscribers')
    @include('frontend.layout.featured_section')
    <!--End 4 columns-->
    @include('frontend.layout.footer')
</footer>
@endsection
