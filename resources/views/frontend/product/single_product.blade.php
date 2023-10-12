@extends('frontend.front_master')
@section('frontend')

    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> <a href="shop-grid-right.html">Vegetables & tubers</a> <span></span> Seeds of Change Organic
                </div>
            </div>
        </div>
        <div class="container mb-30">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <div class="product-detail accordion-detail">
                        <div class="row mb-50 mt-30">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                <div class="detail-gallery">
                                    <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                    <!-- MAIN SLIDES -->
                                    <div class="product-image-slider">
                                        @foreach ($multi as $img)
                                        <figure class="border-radius-10">
                                            <img src="{{ URL::to('') }}/backend/assets/imgs/products/{{ $img->product_image }}" alt="product image" />
                                        </figure>
                                        @endforeach
                                    </div>
                                    <!-- THUMBNAILS -->
                                    <div class="slider-nav-thumbnails">
                                        @foreach ($multi as $img)
                                        <div><img src="{{ URL::to('') }}/backend/assets/imgs/products/{{ $img->product_image }}" alt="product image" /></div>
                                        @endforeach


                                    </div>
                                </div>
                                <!-- End Gallery -->
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-info pr-30 pl-30">
                                    <span class="stock-status out-stock"> {{ $single_pro->rating_status }} </span>
                                    <h2 class="title-detail">{{ $single_pro->product_name }}</h2>
                                    <div class="product-detail-rating">
                                        <div class="product-rate-cover text-end">
                                            <div class="rating-css">
                                                <div class="star-icon">
                                                    <style>
                                                        .rating-active {
                                                                color: #ffe400!important;
                                                            }
                                                    </style>

                                                    @php
                                                   for($i=0;$i<5;$i++){
                                                        if ($i<round($single_pro->reviews_avg)) {
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
                                            <span class="font-small ml-5 text-muted"> ( {{ round($single_pro->reviews_avg) }} )</span>
                                        </div>
                                    </div>
                                    <div class="clearfix product-price-cover">
                                        <div class="product-price primary-color float-left">
                                            <span id="single_sale_price" class="current-price text-brand">{{ $single_pro->sale_price }}</span>
                                            <span>
                                                <span class="save-price font-md color3 ml-15"></span>
                                                <span id="single_regular_price" class="old-price font-md ml-15">{{ $single_pro->regular_price }}</span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="short-desc mb-30">
                                        <p class="font-lg">{{ $single_pro->short_des  }}</p>
                                    </div>
                                    <div class="attr-detail attr-size mb-30">
                                        <strong class="mr-10">Size / Weight: </strong>
                                        <ul class="list-filter size-filter font-small">
                                            @foreach($pro_attribute as $item)
                                            <li class="parent"><a class="weight_id" price_id="{{ $item->id }}" href="#">{{ $item->weight }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="detail-extralink mb-50">
                                        <div class="detail-qty border radius">
                                            <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                            <input type="text" name="quantity"  class="qty-val" value="1" min="1">
                                            <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                        </div>
                                        <input id="single_product_id" value="{{ $single_pro->id }}" type="hidden">
                                        <div class="product-extra-link2">
                                            <button  id="singleAddToCart" class="button button-add-to-cart"><i class="fi-rs-shopping-cart"></i>Add to cart</button>
                                            <a aria-label="Add To Wishlist" product_id="{{ $single_pro->id }}" id="wish" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                        </div>
                                    </div>
                                    <div class="font-xs">
                                        <ul class="mr-50 float-start">
                                            <li class="mb-5">Type: <span class="text-brand">{{ $single_pro->type }}</span></li>
                                            <li class="mb-5">MFG:<span class="text-brand">{{ date('d M,Y',strtotime($single_pro->MFG)) }}</span></li>
                                            <li>LIFE: <span class="text-brand">70 days</span></li>
                                        </ul>
                                        <ul class="float-start">
                                            <li class="mb-5">SKU: <a id="sku" href="#">{{ $single_pro->SKU }}</a></li>
                                            <li class="mb-5">Tags:
                                                @foreach($single_pro->tags as $pro)
                                                <a href="#" rel="tag">{{ $pro->name }}</a>,
                                                @endforeach
                                            @foreach ($pro_attribute as $stock)
                                            <li>Weight: {{ $stock->weight }} for<span class="in-stock text-brand ml-5">{{ $stock->stock }} Items In Stock</span></li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                                <!-- Detail Info -->
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="tab-style3">
                                <ul class="nav nav-tabs text-uppercase">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews (3)</a>
                                    </li>
                                </ul>
                                <div class="tab-content shop_info_tab entry-main-content">
                                    <div class="tab-pane fade show active" id="Description">
                                        <div class="">
                                            <p>{!! $single_pro->long_des !!}</p>
                                        </div>
                                    </div>




                                    <div class="tab-pane fade" id="Vendor-info">
                                        <div class="vendor-logo d-flex mb-30">
                                            <img src="assets/imgs/vendor/vendor-18.svg" alt="" />
                                            <div class="vendor-name ml-15">
                                                <h6>
                                                    <a href="vendor-details-2.html">Noodles Co.</a>
                                                </h6>
                                                <div class="product-rate-cover text-end">
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width: 90%"></div>
                                                    </div>
                                                    <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="contact-infor mb-50">
                                            <li><img src="assets/imgs/theme/icons/icon-location.svg" alt="" /><strong>Address: </strong> <span>5171 W Campbell Ave undefined Kent, Utah 53127 United States</span></li>
                                            <li><img src="assets/imgs/theme/icons/icon-contact.svg" alt="" /><strong>Contact Seller:</strong><span>(+91) - 540-025-553</span></li>
                                        </ul>
                                        <div class="d-flex mb-55">
                                            <div class="mr-30">
                                                <p class="text-brand font-xs">Rating</p>
                                                <h4 class="mb-0">92%</h4>
                                            </div>
                                            <div class="mr-30">
                                                <p class="text-brand font-xs">Ship on time</p>
                                                <h4 class="mb-0">100%</h4>
                                            </div>
                                            <div>
                                                <p class="text-brand font-xs">Chat response</p>
                                                <h4 class="mb-0">89%</h4>
                                            </div>
                                        </div>
                                        <p>Noodles & Company is an American fast-casual restaurant that offers international and American noodle dishes and pasta in addition to soups and salads. Noodles & Company was founded in 1995 by Aaron Kennedy and is headquartered in Broomfield, Colorado. The company went public in 2013 and recorded a $457 million revenue in 2017.In late 2018, there were 460 Noodles & Company locations across 29 states and Washington, D.C.</p>
                                    </div>
                                    <div class="tab-pane fade" id="Reviews">
                                        <!--Comments-->
                                        <div class="comments-area">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <h4 class="mb-30">Customer questions & answers</h4>
                                                    <div class="comment-list">


                                                        @foreach($review as $data)
                                                        <div class="single-comment justify-content-between d-flex mb-30">
                                                            <div class="user justify-content-between d-flex">
                                                                <div class="thumb text-center">
                                                                    <img src="assets/imgs/blog/author-2.png" alt="" />
                                                                    <a href="#" class="font-heading text-brand">{{ $data->users->name }}</a>
                                                                </div>
                                                                <div class="desc">
                                                                    <div class="d-flex justify-content-between mb-10">
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="font-xs text-muted">{{ date('D M,Y',strtotime($data->created_at)) }}</span>
                                                                        </div>
                                                                         <div style="margin-right: -500px;" class="product-rate d-inline-block">
                                                                             @if($data->star_rate==1)
                                                                            <div class="product-rating" style="width: 20%"></div>
                                                                                 @elseif($data->star_rate==2)
                                                                                 <div class="product-rating" style="width: 40%"></div>
                                                                                 @elseif($data->star_rate==3)
                                                                                 <div class="product-rating" style="width: 60%"></div>
                                                                             @elseif($data->star_rate==4)
                                                                                 <div class="product-rating" style="width: 80%"></div>
                                                                             @elseif($data->star_rate==5)
                                                                                 <div class="product-rating" style="width: 100%"></div>
                                                                             @else
                                                                                 <div class="product-rating" style="width: 0%"></div>
                                                                                 @endif
                                                                        </div>
                                                                    </div>
                                                                    <p class="mb-10">{{ $data->message }} <br> <a href="#" class="reply">Reply</a></p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        @endforeach


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--comment form-->

                                        <style>
                                            .rating-css_r div.star-icon-related {
                                                color: #ffe400!important;
                                                font-size: 20px;
                                                font-family: sans-serif;
                                                font-weight: 400;
                                                text-align: left;
                                                text-transform: uppercase;
                                                padding: 20px 0;
                                            }
                                            .rating-css_r div.star-icon .rating-active {
                                                color: #ffe400!important;
                                            }
                                        </style>




                                        <div class="comment-form">



                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    @if (Session::has('success'))
                                                        <p class="alert alert-success">{{ Session::get('success') }}</p>
                                                    @endif

                                                    <form class="form-contact comment_form" action="{{ route('product.rate') }}" id="commentForm" method="POST">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h4 class="mb-15">Add a review</h4>
                                                                <div class="rating-css_r">
                                                                    <div class="star-icon-related">
                                                                        <input type="radio" value="1"  name="product_rating"  id="rating1">
                                                                        <label for="rating1" class="fa fa-star rating-active"></label>
                                                                        <input type="radio" value="2" name="product_rating" id="rating2">
                                                                        <label for="rating2" class="fa fa-star"></label>
                                                                        <input type="radio" value="3" name="product_rating" id="rating3">
                                                                        <label for="rating3" class="fa fa-star"></label>
                                                                        <input type="radio" value="4" name="product_rating" id="rating4">
                                                                        <label for="rating4" class="fa fa-star"></label>
                                                                        <input type="radio" value="5" name="product_rating" id="rating5">
                                                                        <label for="rating5" class="fa fa-star"></label>
                                                                    </div>
                                                                </div>
                                                                <input name="product_id" value="{{ $single_pro->id }}" type="hidden">
                                                                <div class="form-group">
                                                                    <textarea class="form-control w-100" name="message" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <input class="form-control" name="name" id="name" type="text" placeholder="Name" />
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <input class="form-control" name="email" id="email" type="email" placeholder="Email" />
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <input class="form-control" name="website" id="website" type="text" placeholder="Website" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="button button-contactForm">Submit Review</button>
                                                        </div>
                                                    </form>




                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-60">
                            <div class="col-12">
                                <h2 class="section-title style-1 mb-30">Related products</h2>
                            </div>
                            <div class="col-12">
                                <div class="row related-products">





                                    @foreach ($related_pro as $related)



                                    <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                        <div class="product-cart-wrap hover-up">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="{{ route('single.product',$related->id) }}" tabindex="0">
                                                        <img class="default-img" src="{{ URL::to('') }}/backend/assets/imgs/products/{{ $related->thumbnail }}" alt="" />
                                                        <img class="hover-img" src="{{ URL::to('') }}/backend/assets/imgs/products/{{ $related->hover_img }}" alt="" />
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-search"></i></a>
                                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html" tabindex="0"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot">{{ $related->rating_status }}</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <h2><a href="shop-product-right.html" tabindex="0">{{ $related->product_name }}</a></h2>

                                                <div class="product-rate-cover">
                                                    <div class="rating-css">
                                                        <div class="star-icon">


                                                            @php
                                                           for($i=0;$i<5;$i++){
                                                                if ($i<round($related->reviews_avg)) {
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

                                                {{-- <div class="rating-result" title="90%">
                                                    <span> </span>
                                                </div> --}}
                                                <div class="product-price">
                                                    <span>৳{{ $related->sale_price }}</span>
                                                    <span class="old-price">৳{{ $related->regular_price }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
