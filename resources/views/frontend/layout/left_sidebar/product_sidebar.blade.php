<div class="col-lg-1-5 primary-sidebar sticky-sidebar">
    <div class="sidebar-widget widget-category-2 mb-30">
        <h5 class="section-title style-1 mb-30">Category</h5>
        <ul>
            @foreach($all_cat as $cat)
                @if($cat->products_count > 0 )
                <li>
                    <a href="{{ route('categroy.wise.product', $cat->slug) }}"> <img src="{{ URL::to('') }}/frontend/assets/imgs/icon/{{ $cat->icon }}" alt="" />{{ $cat->name }}</a><span class="count">{{ $cat->products_count }}</span>
                </li>
                @endif
            @endforeach
        </ul>
    </div>
    <!-- Fillter By Price -->
    <div class="sidebar-widget price_range range mb-30">
        <h5 class="section-title style-1 mb-30">Fill by price</h5>
        <form action="{{ route('price.wise.filter') }}" method="POST">
            @csrf
            <div class="price-filter">
                <div class="price-filter-inner">
                    <div id="slider-range" class="mb-20"></div>
                    <div class="d-flex justify-content-between">
                        <div class="caption">From: <strong id="slider-range-value1" class="text-brand"></strong></div>
                        <input type="hidden" name="min_price" id="slider_min_value">
                        <div class="caption">To: <strong id="slider-range-value2" class="text-brand"></strong></div>
                        <input type="hidden" name="max_price" id="slider_max_value">
                    </div>
                    @error('min_price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            @php
                $product_item = \App\Models\Product::where('status', true)->select('rating_status')->groupBy('rating_status')->get();
            @endphp
            <div class="list-group">
                <div class="list-group-item mb-10 mt-10">
                    <label class="fw-900 mt-15">Item Condition</label>
                    <div class="custome-checkbox">
                        @foreach($product_item as $key => $item)
                        <input class="form-check-input" type="checkbox" name="rating_status[]" id="exampleCheckbox{{ $key }}" value="{{ $item->rating_status }}" />
                        <label class="form-check-label" for="exampleCheckbox{{ $key }}"><span>{{ $item->rating_status }}</span></label>
                        <br />
                        @endforeach
                        @error('rating_status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i> Fillter</button>
        </form>
    </div>
    <!-- Product sidebar Widget -->
    @php
        $new_product = \App\Models\Product::latest()->limit(3)->get();
        // dd($new_product);
    @endphp
    <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
        <h5 class="section-title style-1 mb-30">New products</h5>
        @foreach($new_product as $product)
        <div class="single-post clearfix">
            <div class="image">
                <img src="{{ URL::to('') }}/backend/assets/imgs/products/{{ $product->thumbnail }}" alt="#" />
            </div>
            <div class="content pt-10">
                <h5><a href="{{ route('single.product',$product->id) }}">{{ Str::words($product->product_name, 3, '...') }}</a></h5>
                <p class="price mb-0 mt-5">৳ {{ $product->sale_price }}</p>
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
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
