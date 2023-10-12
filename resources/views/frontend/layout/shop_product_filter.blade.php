<div class="shop-product-fillter">
    <div class="totall-product">
        <p>We found <strong class="text-brand">{{ count($products) }}</strong> items for you!</p>
    </div>
    <div class="sort-by-product-area">
        <div class="sort-by-cover mr-10">
            <div class="sort-by-product-wrap">
                <div class="sort-by">
                    <span><i class="fi-rs-apps"></i>Show:</span>
                </div>
                <div class="sort-by-dropdown-wrap">
                    <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                </div>
            </div>
            <div class="sort-by-dropdown">
                <ul>
                    <li><a class="active" href="{{ route('sorting.product.sort', 50) }}">50</a></li>
                    <li><a href="{{ route('sorting.product.sort', 100) }}">100</a></li>
                    <li><a href="{{ route('sorting.product.sort', 150) }}">150</a></li>
                    <li><a href="{{ route('sorting.product.sort', 200) }}">200</a></li>
                    <li><a href="{{ route('sorting.product.sort', $sort='All') }}">All</a></li>
                </ul>
            </div>
        </div>
        <div class="sort-by-cover">
            <div class="sort-by-product-wrap">
                <div class="sort-by">
                    <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                </div>
                <div class="sort-by-dropdown-wrap">
                    <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                </div>
            </div>
            <div class="sort-by-dropdown">
                <ul>
                    <li><a class="" href="{{ route('sorting.product.sort', $sort='latest_product') }}" >Latest Product</a></li>
                    <li><a href="{{ route('sorting.product.sort', $sort='low_to_high') }}">Price: Low to High</a></li>
                    <li><a href="{{ route('sorting.product.sort', $sort='high_to_low') }}">Price: High to Low</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
