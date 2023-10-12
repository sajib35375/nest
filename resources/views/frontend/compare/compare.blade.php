@extends('frontend.front_master')
@section('frontend')

    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Shop <span></span> Compare
                </div>
            </div>
        </div>
        <div class="container mb-80 mt-50">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <h1 class="heading-2 mb-10">Products Compare</h1>
                    <h6 class="text-body mb-40">There are <span class="text-brand">3</span> products to compare</h6>
                    <div class="table-responsive">
                        <table class="table text-center table-compare">
                            <tbody>
                            <tr class="pr_image">

                                <td class="text-muted font-sm fw-600 font-heading mw-200">Preview</td>
                                @foreach($all_compare as $compare)
                                <td class="row_img"><img src="{{ URL::to('') }}/backend/assets/imgs/products/{{ $compare->products->thumbnail }}" alt="compare-img" /></td>
                                @endforeach
                            </tr>
                            <tr class="pr_title">

                                <td class="text-muted font-sm fw-600 font-heading">Name</td>
                                @foreach($all_compare as $compare)
                                <td class="product_name">
                                    <h6><a href="#" class="text-heading">{{ $compare->products->product_name }}</a></h6>
                                </td>
                                @endforeach
                            </tr>
                            <tr class="pr_price">

                                <td class="text-muted font-sm fw-600 font-heading">Price</td>
                                @foreach($all_compare as $compare)
                                <td class="product_price">
                                    <h4 class="price text-brand">{{ $compare->products->sale_price }}৳</h4>
                                </td>
                                @endforeach
                            </tr>
                            <tr class="pr_rating">

                                <td class="text-muted font-sm fw-600 font-heading">Rating</td>
                                @foreach($all_product as $product)

                                <td>
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
                                </td>
                                @endforeach
                            </tr>
                            <tr class="description">

                                <td class="text-muted font-sm fw-600 font-heading">Description</td>
                                @foreach($all_compare as $compare)
                                <td class="row_text font-xs">
                                    <p class="font-sm text-muted">{!! $compare->products->long_des !!}</p>
                                </td>
                                @endforeach
                            </tr>
                            <tr class="pr_stock">

                                <td class="text-muted font-sm fw-600 font-heading">Stock status</td>

                                <td class="row_stock"><span class="stock-status in-stock mb-0">In Stock</span></td>
                                <td class="row_stock"><span class="stock-status out-stock mb-0">Out of stock</span></td>
                                <td class="row_stock"><span class="stock-status in-stock mb-0">In Stock</span></td>
                            </tr>
                            <tr class="pr_weight">

                                <td class="text-muted font-sm fw-600 font-heading">Weight</td>


{{--                                @foreach($productAttr as $attr)--}}

{{--                                <td class="row_weight">{{ $attr->weight }}</td>--}}
{{--                                @endforeach--}}

                            </tr>
                            <tr class="pr_dimensions">

                                <td class="text-muted font-sm fw-600 font-heading">Dimensions</td>

                                <td class="row_dimensions">N/A</td>
                                <td class="row_dimensions">N/A</td>
                                <td class="row_dimensions">N/A</td>
                            </tr>
                            <tr class="pr_add_to_cart">

                                <td class="text-muted font-sm fw-600 font-heading">Buy now</td>

                                <td class="row_btn">
                                    <button class="btn btn-sm"><i class="fi-rs-shopping-bag mr-5"></i>Add to cart</button>
                                </td>
                                <td class="row_btn">
                                    <button class="btn btn-sm btn-secondary"><i class="fi-rs-headset mr-5"></i>Contact Us</button>
                                </td>
                                <td class="row_btn">
                                    <button class="btn btn-sm"><i class="fi-rs-shopping-bag mr-5"></i>Add to cart</button>
                                </td>
                            </tr>
                            <tr class="pr_remove text-muted">

                                <td class="text-muted font-md fw-600"></td>

                                <td class="row_remove">
                                    <a href="#" class="text-muted"><i class="fi-rs-trash mr-5"></i><span>Remove</span> </a>
                                </td>
                                <td class="row_remove">
                                    <a href="#" class="text-muted"><i class="fi-rs-trash mr-5"></i><span>Remove</span> </a>
                                </td>
                                <td class="row_remove">
                                    <a href="#" class="text-muted"><i class="fi-rs-trash mr-5"></i><span>Remove</span> </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>


@endsection
