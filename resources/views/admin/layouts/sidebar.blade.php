@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
    // dd($route);
    $logo = $data = App\Models\Seo::findOrFail(1);
@endphp
<aside class="navbar-aside" id="offcanvas_aside">
    <div class="aside-top">
        <a href="{{ route('dashboard') }}" class="brand-wrap">
            <img src="{{ URL::to('') }}/upload/theme/{{ $logo->logo }}" class="logo" alt="Nest Dashboard" />
            <h2 style="font-weight: bold;font-size: 40px;">E-Aroth</h2>
        </a>
        <div>
            <button class="btn btn-icon btn-aside-minimize"><i class="text-muted material-icons md-menu_open"></i></button>
        </div>
    </div>
    <nav>
        <ul class="menu-aside">
            <li class="menu-item {{ $route == 'dashboard' ? 'active' : '' }}">
                <a class="menu-link" href="{{ route('dashboard') }}">
                    <i class="icon material-icons md-home"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="menu-item has-submenu {{ $route == 'product.category' ? 'active' : '' }} {{ $route == 'add.new.product' ? 'active' : '' }} {{ $route == 'product.tag' ? 'active' : '' }} {{ $route == 'all.product' ? 'active' : '' }}">
                <a class="menu-link" href="page-products-list.html">
                    <i class="icon material-icons md-shopping_bag"></i>
                    <span class="text">Products</span>
                </a>
                <div class="submenu">
                    <a class="{{ $route == 'product.category' ? 'active' : '' }}" href="{{ route('product.category') }}">Product Category</a>
                    <a class="{{ $route == 'product.tag' ? 'active' : '' }}" href="{{ route('product.tag') }}">Product Tags</a>
                    <a class="{{ $route == 'add.new.product' ? 'active' : '' }}" href="{{ route('add.new.product') }}">Add new Product</a>
                    <a class="{{ $route == 'all.product' ? 'active' : '' }}" href="{{ route('all.product') }}">All Product</a>
                </div>
            </li>
            <li class="menu-item has-submenu {{ $route == 'post.category' ? 'active' : '' }} {{ $route == 'post.tag' ? 'active' : '' }} {{ $route == 'add.new.post' ? 'active' : '' }} {{ $route == 'all.post' ? 'active' : '' }}">
                <a class="menu-link" href="page-form-product-1.html">
                    <i class="icon material-icons md-add_box"></i>
                    <span class="text">Blog</span>
                </a>
                <div class="submenu">
                    <a class="{{ $route == 'post.category' ? 'active' : '' }}" href="{{ route('post.category') }}">Post Category</a>
                    <a class="{{ $route == 'post.tag' ? 'active' : '' }}" href="{{ route('post.tag') }}">Post Tags</a>
                    <a class="{{ $route == 'add.new.post' ? 'active' : '' }}" href="{{ route('add.new.post') }}">Add new Post</a>
                    <a class="{{ $route == 'all.post' ? 'active' : '' }}" href="{{ route('all.post') }}">All Post</a>
                </div>
            </li>
            <li class="menu-item has-submenu {{ $route == 'edit.seo' ? 'active' : '' }} {{ $route == 'edit.about-us' ? 'active' : '' }} {{ $route == 'edit.contact-page-info' ? 'active' : '' }} {{ $route == 'edit.privacy-policy' ? 'active' : '' }} {{ $route == 'edit.terms-conditions' ? 'active' : '' }} {{ $route == 'edit.delivery-information' ? 'active' : '' }} {{ $route == 'edit.purchase-guide' ? 'active' : '' }}">
                <a class="menu-link" href="#">
                    <i class="icon material-icons md-settings"></i>
                    <span class="text">Settings</span>
                </a>
                <div class="submenu">
                    <a class="{{ $route == 'edit.seo' ? 'active' : '' }}" href="{{ route('edit.seo') }}">Site Settings & SEO</a>
                    <a class="{{ $route == 'edit.about-us' ? 'active' : '' }}" href="{{ route('edit.about-us') }}">About Us</a>
                    <a class="{{ $route == 'edit.contact-page-info' ? 'active' : '' }}" href="{{ route('edit.contact-page-info') }}">Contact Page Information</a>
                    <a class="{{ $route == 'edit.privacy-policy' ? 'active' : '' }}" href="{{ route('edit.privacy-policy') }}">Privacy Policy</a>
                    <a class="{{ $route == 'edit.terms-conditions' ? 'active' : '' }}" href="{{ route('edit.terms-conditions') }}">Terms & Conditions</a>
                    <a class="{{ $route == 'edit.delivery-information' ? 'active' : '' }}" href="{{ route('edit.delivery-information') }}">Delivery Information</a>
                    <a class="{{ $route == 'edit.purchase-guide' ? 'active' : '' }}" href="{{ route('edit.purchase-guide') }}">Purchase Guide</a>
                </div>
            </li>
            <li class="menu-item has-submenu {{ $route == 'contact-message' ? 'active' : '' }}">
                <a class="menu-link" href="page-transactions-1.html">
                    <i class="icon material-icons md-mail"></i>
                    <span class="text">Contact</span>
                </a>
                <div class="submenu">
                    <a class="{{ $route == 'contact-message' ? 'active' : '' }}" href="{{ route('contact-message') }}">All Contact Message</a>
                </div>
            </li>
            <li class="menu-item has-submenu {{ $route == 'all.subscriber' ? 'active' : '' }}">
                <a class="menu-link" href="page-transactions-1.html">
                    <i class="icon material-icons md-subscriptions"></i>
                    <span class="text">Subscribers</span>
                </a>
                <div class="submenu">
                    <a class="{{ $route == 'all.subscriber' ? 'active' : '' }}" href="{{ route('all.subscriber') }}">All Subscriber</a>
                </div>
            </li>
            <li class="menu-item has-submenu {{ $route == 'coupon.view' ? 'active' : '' }}">
                <a class="menu-link" href="page-sellers-cards.html">
                    <i class="icon material-icons md-store"></i>
                    <span class="text">Coupon</span>
                </a>
                <div class="submenu">
                    <a class="{{ $route == 'coupon.view' ? 'active' : '' }}" href="{{ route('coupon.view') }}">Coupon System</a>

                </div>
            </li>
            <li class="menu-item has-submenu {{ $route == 'division.view' ? 'active' : '' }} {{ $route == 'district.view' ? 'active' : '' }} {{ $route == 'state.view' ? 'active' : '' }}">
                <a class="menu-link" href="#">
                    <i class="icon material-icons md-person"></i>
                    <span class="text">Shipping</span>
                </a>
                <div class="submenu">
                    <a class="{{ $route == 'division.view' ? 'active' : '' }}" href="{{ route('division.view') }}">Division</a>
                    <a class="{{ $route == 'district.view' ? 'active' : '' }}" href="{{ route('district.view') }}">District</a>
                    <a class="{{ $route == 'state.view' ? 'active' : '' }}" href="{{ route('state.view') }}">State</a>
                </div>
            </li>
            <li class="menu-item has-submenu {{ $route == 'order.pending' ? 'active' : '' }} {{ $route == 'order.confirmed' ? 'active' : '' }} {{ $route == 'order.processing' ? 'active' : '' }} {{ $route == 'order.picked' ? 'active' : '' }} {{ $route == 'order.shipped' ? 'active' : '' }} {{ $route == 'order.delivered' ? 'active' : '' }} {{ $route == 'order.cancel' ? 'active' : '' }}">
                <a class="menu-link" href="#">
                    <i class="icon material-icons md-shopping_cart"></i>
                    <span class="text">Orders</span>
                </a>
                <div class="submenu">
                    <a class="{{ $route == 'order.pending' ? 'active' : '' }}" href="{{ route('order.pending') }}">Pending</a>
                    <a class="{ $route == 'order.confirmed' ? 'active' : '' }}" href="{{ route('order.confirmed') }}">Confirmed</a>
                    <a class="{{ $route == 'order.processing' ? 'active' : '' }}" href="{{ route('order.processing') }}">Processing</a>
                    <a class="{{ $route == 'order.picked' ? 'active' : '' }}" href="{{ route('order.picked') }}">Picked</a>
                    <a class="{{ $route == 'order.shipped' ? 'active' : '' }}" href="{{ route('order.shipped') }}">Shipped</a>
                    <a class="{{ $route == 'order.delivered' ? 'active' : '' }}" href="{{ route('order.delivered') }}">Delivered</a>
                    <a class="{{ $route == 'order.cancel' ? 'active' : '' }}" href="{{ route('order.cancel') }}">Cancel</a>
                </div>
            </li>
            <li class="menu-item has-submenu {{ $route == 'order.request' ? 'active' : '' }} {{ $route == 'all.return.order' ? 'active' : '' }}">
                <a class="menu-link" href="#">
                    <i class="icon material-icons md-stars"></i>
                    <span class="text">Return Orders</span>
                </a>
                <div class="submenu">
                    <a class="{{ $route == 'order.request' ? 'active' : '' }}" href="{{ route('order.request') }}">Return Request</a>
                    <a class="{{ $route == 'all.return.order' ? 'active' : '' }}" href="{{ route('all.return.order') }}">All Return</a>
                </div>
            </li>
            <li class="menu-item has-submenu {{ $route == 'all.reports' ? 'active' : '' }}">
                <a class="menu-link" href="#">
                    <i class="icon material-icons md-pie_chart"></i>
                    <span class="text">All Reports</span>
                </a>
                <div class="submenu">
                    <a class="{{ $route == 'all.reports' ? 'active' : '' }}" href="{{ route('all.reports') }}">All Reports</a>
                </div>
            </li>
            <li class="menu-item has-submenu {{ $route == 'all.user' ? 'active' : '' }}">
                <a class="menu-link" href="#">
                    <i class="material-icons md-perm_identity"></i>
                    <span class="text">All User</span>
                </a>
                <div class="submenu">
                    <a class="{{ $route == 'all.user' ? 'active' : '' }}" href="{{ route('all.user') }}">All User</a>
                </div>
            </li>
        </ul>
        <br />
        <br />
    </nav>
</aside>
