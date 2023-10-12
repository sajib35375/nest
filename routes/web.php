<?php

use App\Models\ProductAttribute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\Backend\SeoController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\ReturnController;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Backend\AboutUsController;
use App\Http\Controllers\Backend\ProductAttributes;
use App\Http\Controllers\Backend\ProductController;

use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\SocialController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\AttributeController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\Backend\ContactFormController;
use App\Http\Controllers\Backend\PrivacyPolicyController;
use App\Http\Controllers\Backend\PurchaseGuideController;
use App\Http\Controllers\Backend\ContactPageInfoController;
use App\Http\Controllers\Backend\TermsAndConditionsController;
use App\Http\Controllers\Backend\DeliveryInformationController;
use App\Http\Controllers\Backend\AdminController as BackendAdminController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;

// Admin Login
Route::group(['prefix'=>'admin', 'middleware'=>['admin:admin']], function(){
    Route::get('/login', [AdminController::class, 'loginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'store']);
});
// Admin Logout
Route::get('/admin-logout', [AdminController::class, 'destroy'])->name('admin.logout');
// Admin Dashboard
Route::middleware(['auth:sanctum,admin',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
     // Admin Profile
    Route::get('/admin/profile', [BackendAdminController::class, 'adminProfile'])->name('admin.profile');
    Route::get('/admin/profile/edit', [BackendAdminController::class, 'adminProfileEdit'])->name('admin.profile.edit');
    Route::post('/admin/profile/update', [BackendAdminController::class, 'adminProfileUpdate'])->name('admin.profile.update');
    Route::get('/admin/change/password', [BackendAdminController::class, 'adminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [BackendAdminController::class, 'adminUpdatePassword'])->name('admin.password.update');
    // product category
    Route::get('product/category',[ProductController::class,'productCategory'])->name('product.category');
    Route::post('product/category/store',[ProductController::class,'productCategoryStore'])->name('product.category.store');
    Route::get('product/category/active/{id}',[ProductController::class,'productCategoryActive'])->name('product.category.active');
    Route::get('product/category/inactive/{id}',[ProductController::class,'productCategoryInactive'])->name('product.category.inactive');
    Route::get('product/category/edit/{id}',[ProductController::class,'productCategoryEdit'])->name('product.category.edit');
    Route::post('product/category/update/{id}',[ProductController::class,'productCategoryUpdate'])->name('product.category.update');
    Route::get('product/category/delete/{id}',[ProductController::class,'productCategoryDelete'])->name('product.category.delete');
    // product tag
    Route::get('product/tag',[ProductController::class, 'productTags'])->name('product.tag');
    Route::post('product/tag/store',[ProductController::class, 'productTagsStore'])->name('product.tag.store');
    Route::get('product/tag/active/{id}',[ProductController::class,'productTagActive'])->name('product.tag.active');
    Route::get('product/tag/inactive/{id}',[ProductController::class,'productTagInactive'])->name('product.tag.inactive');
    Route::get('product/tag/edit/{id}',[ProductController::class,'productTagEdit'])->name('product.tag.edit');
    Route::post('product/tag/update/{id}',[ProductController::class,'productTagUpdate'])->name('product.tag.update');
    Route::get('product/tag/delete/{id}',[ProductController::class,'productTagDelete'])->name('product.tag.delete');
    // product
    Route::get('add/new/product',[ProductController::class, 'addNewProduct'])->name('add.new.product');
    Route::post('product/store',[ProductController::class, 'ProductStore'])->name('product.store');
    Route::get('all/product',[ProductController::class, 'allProduct'])->name('all.product');
    Route::get('edit/product/{id}',[ProductController::class, 'editProduct'])->name('edit.product');
    Route::post('update/product/{id}',[ProductController::class, 'updateProduct'])->name('update.product');
    Route::get('product/delete/{id}',[ProductController::class, 'deleteProduct'])->name('delete.products');
    Route::get('multi/img/delete/{id}',[ProductController::class, 'deleteMultiProduct'])->name('delete.product');
    Route::post('multi/img/update',[ProductController::class, 'updateMultiImg'])->name('update.multiImg');
    // Attributes
    Route::any('/add-attribute/{id?}', [ProductAttributes::class, 'addAttribute']);
    Route::post('/edit-attribute', [ProductAttributes::class, 'editAttribute']);
    Route::post('/update-attributes-status', [ProductAttributes::class, 'updateAttributeStatus']);
    Route::get('/delete-attribute/{id}', [ProductAttributes::class, 'deleteAttribute']);


    // Post Category
    Route::get('post/category',[CategoryController::class,'postCategory'])->name('post.category');
    Route::post('post/category/store',[CategoryController::class,'postCategoryStore'])->name('post.category.store');
    Route::get('post/category/active/{id}',[CategoryController::class,'postCategoryActive'])->name('post.category.active');
    Route::get('post/category/inactive/{id}',[CategoryController::class,'postCategoryInactive'])->name('post.category.inactive');
    Route::get('post/category/edit/{id}',[CategoryController::class,'postCategoryEdit'])->name('post.category.edit');
    Route::post('post/category/update/{id}',[CategoryController::class,'postCategoryUpdate'])->name('post.category.update');
    Route::get('post/category/delete/{id}',[CategoryController::class,'postCategoryDelete'])->name('post.category.delete');

    // port tag
    Route::get('post/tag',[TagController::class, 'postTags'])->name('post.tag');
    Route::post('post/tag/store',[TagController::class, 'postTagsStore'])->name('post.tag.store');
    Route::get('post/tag/active/{id}',[TagController::class,'postTagActive'])->name('post.tag.active');
    Route::get('post/tag/inactive/{id}',[TagController::class,'postTagInactive'])->name('post.tag.inactive');
    Route::get('post/tag/edit/{id}',[TagController::class,'postTagEdit'])->name('post.tag.edit');
    Route::post('post/tag/update/{id}',[TagController::class,'postTagUpdate'])->name('post.tag.update');
    Route::get('post/tag/delete/{id}',[TagController::class,'postTagDelete'])->name('post.tag.delete');

    // post
    Route::get('all/post',[PostController::class, 'allPost'])->name('all.post');
    Route::get('add/new/post',[PostController::class, 'addNewPost'])->name('add.new.post');
    Route::post('post/store',[PostController::class, 'postStore'])->name('post.store');
    Route::get('edit/post/{id}',[PostController::class, 'editPost'])->name('edit.post');
    Route::post('update/post/{id}',[PostController::class, 'updatePost'])->name('update.post');
    Route::get('post/delete/{id}',[PostController::class, 'deletePost'])->name('delete.posts');
    Route::get('post/view/{id}',[PostController::class, 'postView'])->name('view.post');
    Route::get('post/active/{id}',[PostController::class,'postActive'])->name('post.active');
    Route::get('post/inactive/{id}',[PostController::class,'postInactive'])->name('post.inactive');

    //show attributes
    Route::get('show/product/attributes/{id}',[AttributeController::class,'showAttr'])->name('show.attributes');


    // Privacy Policy
    Route::get('edit/privacy-policy', [PrivacyPolicyController::class, 'editPrivacyPolicy'])->name('edit.privacy-policy');
    Route::put('update/privacy-policy/{id}', [PrivacyPolicyController::class, 'updatePrivacyPolicy'])->name('update.privacy-policy');

    // Terms and Conditions
    Route::get('edit/terms-conditions', [TermsAndConditionsController::class, 'editTermsConditions'])->name('edit.terms-conditions');
    Route::put('update/terms-conditions/{id}', [TermsAndConditionsController::class, 'updateTermsConditions'])->name('update.terms-conditions');

    // Delivery Information
    Route::get('edit/delivery-information', [DeliveryInformationController::class, 'editDeliveryInformation'])->name('edit.delivery-information');
    Route::put('update/delivery-information/{id}', [DeliveryInformationController::class, 'updateDeliveryInformation'])->name('update.delivery-information');

    // Purchase Guide
    Route::get('edit/purchase-guide', [PurchaseGuideController::class, 'editPurchaseGuide'])->name('edit.purchase-guide');
    Route::put('update/purchase-guide/{id}', [PurchaseGuideController::class, 'updatePurchaseGuide'])->name('update.purchase-guide');

    // Contact Page Information
    Route::get('edit/contact-page-info', [ContactPageInfoController::class, 'editContactPageInfo'])->name('edit.contact-page-info');
    Route::put('update/contact-page-info/{id}', [ContactPageInfoController::class, 'updateContactPageInfo'])->name('update.contact-page-info');

    // Contact Message From Client
    Route::get('contact-message', [ContactFormController::class, 'contactMessage'])->name('contact-message');
    Route::get('view/contact-message/{id}', [ContactFormController::class, 'viewContactMessage'])->name('view.contact-message');
    Route::get('delete/contact-message/{id}', [ContactFormController::class, 'deleteContactMessage'])->name('delete.contact-message');

    // About Us
    Route::get('edit/about-us', [AboutUsController::class, 'editAboutUs'])->name('edit.about-us');
    Route::put('update/about-us/{id}', [AboutUsController::class, 'updateAboutUs'])->name('update.about-us');

    // Site Settings and SEO
    Route::get('edit/seo', [SeoController::class, 'editSeo'])->name('edit.seo');
    Route::put('update/seo/{id}', [SeoController::class, 'updateSeo'])->name('update.seo');




    // subscribers
    Route::get('/all-subscriber', [SubscriberController::class, 'allSubscriber'])->name('all.subscriber');
    Route::get('/delete/subscriber/{id}', [SubscriberController::class, 'deleteSubscriber'])->name('delete.subscriber');

    //coupon system
    Route::get('coupon/view',[App\Http\Controllers\Backend\CouponController::class,'couponView'])->name('coupon.view');
    Route::post('coupon/store',[App\Http\Controllers\Backend\CouponController::class,'couponStore'])->name('coupon.store');
    Route::get('coupon/inactive/{id}',[App\Http\Controllers\Backend\CouponController::class,'couponInactive'])->name('coupon.inactive');
    Route::get('coupon/active/{id}',[App\Http\Controllers\Backend\CouponController::class,'couponActive'])->name('coupon.active');
    Route::get('coupon/edit/{id}',[App\Http\Controllers\Backend\CouponController::class,'couponEdit'])->name('coupon.edit');
    Route::post('coupon/update/{id}',[App\Http\Controllers\Backend\CouponController::class,'couponUpdate'])->name('coupon.update');
    Route::get('coupon/delete/{id}',[App\Http\Controllers\Backend\CouponController::class,'couponDelete'])->name('coupon.delete');
    //shipping area division
    Route::get('division/view',[App\Http\Controllers\Backend\ShippingController::class,'divisionView'])->name('division.view');
    Route::post('division/store',[App\Http\Controllers\Backend\ShippingController::class,'divisionStore'])->name('division.store');
    Route::get('division/edit/{id}',[App\Http\Controllers\Backend\ShippingController::class,'divisionEdit'])->name('division.edit');
    Route::post('division/update/{id}',[App\Http\Controllers\Backend\ShippingController::class,'divisionUpdate'])->name('division.update');
    Route::get('division/delete/{id}',[App\Http\Controllers\Backend\ShippingController::class,'divisionDelete'])->name('division.delete');
    //district
    Route::get('district/view',[App\Http\Controllers\Backend\ShippingController::class,'districtView'])->name('district.view');
    Route::post('district/store',[App\Http\Controllers\Backend\ShippingController::class,'districtStore'])->name('district.store');
    Route::get('district/edit/{id}',[App\Http\Controllers\Backend\ShippingController::class,'districtEdit'])->name('district.edit');
    Route::post('district/update/{id}',[App\Http\Controllers\Backend\ShippingController::class,'districtUpdate'])->name('district.update');
    Route::get('district/delete/{id}',[App\Http\Controllers\Backend\ShippingController::class,'districtDelete'])->name('district.delete');
    //state
    Route::get('state/view',[App\Http\Controllers\Backend\ShippingController::class,'stateView'])->name('state.view');
    Route::get('district/load/{id}',[App\Http\Controllers\Backend\ShippingController::class,'districtLoad'])->name('district.load');
    Route::post('state/store',[App\Http\Controllers\Backend\ShippingController::class,'stateStore'])->name('state.store');
    Route::get('state/edit/{id}',[App\Http\Controllers\Backend\ShippingController::class,'stateEdit'])->name('state.edit');
    Route::get('state/edit/district/load/{id}',[App\Http\Controllers\Backend\ShippingController::class,'stateEditDistrictLoad'])->name('state.edit.dis.load');
    Route::post('state/update/{id}',[App\Http\Controllers\Backend\ShippingController::class,'stateUpdate'])->name('state.update');
    Route::get('state/delete/{id}',[App\Http\Controllers\Backend\ShippingController::class,'stateDelete'])->name('state.delete');

    // pending order
    Route::get('/order/pending', [OrderController::class, 'pendingOrder'])->name('order.pending');
    Route::get('/order/pending/details/{id}', [OrderController::class, 'pendingOrderDetails'])->name('order.pending.details');
    Route::get('/order/confirmed', [OrderController::class, 'confirmedOrder'])->name('order.confirmed');
    Route::get('/order/processing', [OrderController::class, 'processingOrder'])->name('order.processing');
    Route::get('/order/picked', [OrderController::class, 'pickedOrder'])->name('order.picked');
    Route::get('/order/shipped', [OrderController::class, 'shippedOrder'])->name('order.shipped');
    Route::get('/order/delivered', [OrderController::class, 'deliveredOrder'])->name('order.delivered');
    Route::get('/order/cancel', [OrderController::class, 'cancelOrder'])->name('order.cancel');
    // status update
    Route::get('/order/pending-to-confirm/{id}', [OrderController::class, 'pendingToConfirm'])->name('pending-to-confirm');
    Route::get('/order/confirm-to-processing/{id}', [OrderController::class, 'confirmToProcessing'])->name('confirm-to-processing');
    Route::get('/order/processing-to-picked/{id}', [OrderController::class, 'processingToPicked'])->name('processing-to-picked');
    Route::get('/order/picked-to-shipped/{id}', [OrderController::class, 'pickedToShipped'])->name('picked-to-shipped');
    Route::get('/order/shipped-to-delivered/{id}', [OrderController::class, 'shippedToDelivered'])->name('shipped-to-delivered');
    Route::get('/order/delivered-to-cancel/{id}', [OrderController::class, 'deliveredToCancel'])->name('delivered-to-cancel');
    // admin invoice download
    Route::get('/order/invoice-download/{id}', [OrderController::class, 'adminInvoiceDownload'])->name('admin.invoice.download');

    // all reports
    Route::get('/all-reports', [ReportController::class, 'allReports'])->name('all.reports');
    Route::post('/search-by-date', [ReportController::class, 'searchByDate'])->name('search.by.date');
    Route::post('/search-by-month', [ReportController::class, 'searchByMonth'])->name('search.by.month');
    Route::post('/search-by-year', [ReportController::class, 'searchByYear'])->name('search.by.year');

    // all user
    Route::get('/all-user', [BackendAdminController::class, 'allUser'])->name('all.user');

    // Return Order Request
    Route::get('/return-order', [ReturnController::class, 'returnOrderRequest'])->name('order.request');
    Route::get('/return-order-approve/{id}', [ReturnController::class, 'returnOrderRequestApprove'])->name('return.order.approve');
    Route::get('/all-return-order', [ReturnController::class, 'allReturnOrder'])->name('all.return.order');

});

// User Dashboard
Route::middleware(['auth:sanctum,web',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('user.index');
    })->name('user.dashboard')->middleware('cache_res:10');
    //rating and review
    Route::post('add/new/rate',[RatingController::class, 'AddProductRate'])->name('product.rate');

});

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

// frontend product route
Route::get('/',[FrontendProductController::class,'index'])->name('frontend.index')->middleware('cache_res');;
Route::get('/single/product/{id}',[FrontendProductController::class,'singleProduct'])->name('single.product')->middleware('cache_res');;
Route::get('single/product/price/change/{id}',[FrontendProductController::class,'singleProductPriceChange']);

// Privacy Policy Page
Route::get('/privacy-policy', [PagesController::class, 'privacyPolicy'])->name('privacy-policy')->middleware('cache_res');

// Terms & Conditions Page
Route::get('/terms-and-conditions', [PagesController::class, 'termsConditions'])->name('terms-conditions')->middleware('cache_res');

// Delivery Information Page
Route::get('/delivery-information', [PagesController::class, 'deliveryInformation'])->name('delivery-information')->middleware('cache_res');

// Purchase Guide Page
Route::get('/purchase-guide', [PagesController::class, 'purchaseGuide'])->name('purchase-guide')->middleware('cache_res');

// Contact Us Page
Route::get('/contact-us', [PagesController::class, 'contactUsPage'])->name('contact-us')->middleware('cache_res');
// Contact Form Store
Route::post('/store/contact-form', [PagesController::class, 'contactFormStore'])->name('store.contact-form');

// About Us Page
Route::get('/about-us', [PagesController::class, 'aboutUsPage'])->name('about-us')->middleware('cache_res');

// Blog Page
Route::get('/blog', [PagesController::class, 'blogPage'])->name('blog.page')->middleware('cache_res');
Route::get('/blog/{slug}', [PagesController::class, 'singleBlogPage'])->name('single.blog')->middleware('cache_res');
// Category Wise Blog
Route::get('/category-wise-blog/{slug}', [PagesController::class, 'categoryWiseBlog'])->name('categroy.wise.blog')->middleware('cache_res');
// Tag Wise Blog
Route::get('/tag-wise-blog/{slug}', [PagesController::class, 'tagWiseBlog'])->name('tag.wise.blog')->middleware('cache_res');
// Post Search By Search Form
Route::get('/search', [PagesController::class, 'searchFormBlog'])->name('blog-search-form')->middleware('cache_res');

// Subscriber email store
Route::post('/subscriber', [SubscriberController::class, 'storeSubscriber'])->name('store.subscriber');


// Product Search By Search Box
Route::post('/product-search', [PagesController::class, 'searchFormProduct'])->name('product.search');
// Product Advance Search By Search Box
Route::post('/search-product', [PagesController::class, 'advanceProductSearch']);
// Category Wise Product
Route::get('/category-wise-product/{slug}', [PagesController::class, 'categoryWiseProduct'])->name('categroy.wise.product')->middleware('cache_res');
// shop page
Route::get('/shop', [PagesController::class, 'shopPage'])->name('shop.page')->middleware('cache_res');
// Category Wise Product
Route::get('/brand-wise-product/{id}', [PagesController::class, 'brandWiseProduct'])->name('brand.wise.product')->middleware('cache_res');
// price and rating status wise product search
Route::post('/filter', [PagesController::class, 'filterWiseProduct'])->name('price.wise.filter');
Route::get('/sorting-prodcut/{sort}', [PagesController::class, 'sortingProduct'])->name('sorting.product.sort')->middleware('cache_res');

//quick view
Route::get('/quick-view/{id}',[App\Http\Controllers\Frontend\ProductController::class,'quickView'])->name('quick.view');
Route::get('/multi-view/{id}',[App\Http\Controllers\Frontend\ProductController::class,'multiQuickView'])->name('pro.quick.view');
//add to cart change value
Route::get('modal/change/value/{id}',[App\Http\Controllers\Frontend\ProductController::class,'changeValue'])->name('change.value');


// User Logout
Route::get('/user-logout', [UserController::class, 'logout'])->name('user.logout');

// Facebook Login Route
Route::get('/login/facebook', [SocialController::class, 'facebookRedirect']);
Route::get('/login/facebook/callback', [SocialController::class, 'loginWithFacebook']);

// Google Login Route
Route::get('/login/google', [SocialController::class, 'googleRedirect']);
Route::get('/login/google/callback', [SocialController::class, 'loginWithGoogle']);

// GitHub Login Route
Route::get('/login/github', [SocialController::class, 'githubRedirect']);
Route::get('/login/github/callback', [SocialController::class, 'loginWithGithub']);

// User Dashboard
Route::middleware(['auth:sanctum,web',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('dashboard', function () {
        $user = \App\Models\User::findOrFail(Auth::user()->id);
        return view('frontend.user.profile.view_profile', compact('user'));
    })->name('user.dashboard');

    Route::get('/user/order-details/{id}', [UserController::class, 'orderDetails']);
    Route::get('/user/invoice-download/{id}', [UserController::class, 'invoiceDownload']);
    Route::post('/user/return-order/{id}', [UserController::class, 'returnOrder'])->name('return.order');

    // order traking
    Route::post('/order-traking', [UserController::class, 'orderTraking'])->name('order.traking');

    // User Profile Routes
    Route::get('/user/profile', [UserController::class, 'userProfile'])->name('user.profile');
    Route::get('/user/profile/edit', [UserController::class, 'userProfileEdit'])->name('profile.edit');
    Route::post('/user/profile/update', [UserController::class, 'userProfileUpdate'])->name('profile.update');
    Route::get('/user/change/password', [UserController::class, 'userChangePassword'])->name('change.password');
    Route::post('/user/update/password', [UserController::class, 'userUpdatePassword'])->name('user.password.update');
    //wishlist
    Route::get('wishlistPage',[App\Http\Controllers\Frontend\WishlistController::class,'WishlistPage'])->name('wishlist.page');
    Route::get('wish/view/product',[App\Http\Controllers\Frontend\WishlistController::class,'wishViewProduct'])->name('wishlist.product');
    Route::get('wish/product/delete/{id}',[App\Http\Controllers\Frontend\WishlistController::class,'wishProductDelete'])->name('wishlist.product.delete');
    //cart page
    Route::get('cart/page/view',[App\Http\Controllers\Frontend\CartPageController::class,'cartPageView'])->name('cart.page.view');
    Route::get('cart/page/load',[App\Http\Controllers\Frontend\CartPageController::class,'cartPageLoad'])->name('cart.page.load');
    Route::get('cart/product/remove/{rowId}',[App\Http\Controllers\Frontend\CartPageController::class,'cartProductRemove'])->name('cart.product.remove');
    Route::get('cart/qnty/increase/{rowId}',[App\Http\Controllers\Frontend\CartPageController::class,'cartQntyIncrease'])->name('cart.qty.incs');
    Route::get('cart/qnty/decrease/{rowId}',[App\Http\Controllers\Frontend\CartPageController::class,'cartQntyDecrease'])->name('cart.qty.decrease');
    //coupon apply
    Route::post('coupon/apply',[App\Http\Controllers\Frontend\CartController::class,'couponGet'])->name('coupon.apply');
    Route::get('coupon/calculation',[App\Http\Controllers\Frontend\CartController::class,'couponCalculation'])->name('coupon.calculation');
    Route::get('/remove/coupon',[App\Http\Controllers\Frontend\CartController::class,'couponRemove'])->name('coupon.remove');
    //shipping charge
    Route::get('/select-district/{division_id}',[App\Http\Controllers\Frontend\CartController::class,'selectDistrict'])->name('select.district');
    Route::get('/select-state/{district_id}',[App\Http\Controllers\Frontend\CartController::class,'selectState'])->name('select.state');
    Route::get('/select-charge/{state_id}',[App\Http\Controllers\Frontend\CartController::class,'selectCharge'])->name('select.charge');
    Route::get('/get-division/{id}',[App\Http\Controllers\Frontend\CartController::class,'getDivision'])->name('get.division');
    Route::get('/get-district/{id}',[App\Http\Controllers\Frontend\CartController::class,'getDistrict'])->name('get.district');
    Route::get('/get-state/{id}',[App\Http\Controllers\Frontend\CartController::class,'getState'])->name('get.state');
    Route::get('/get-charge/{id}',[App\Http\Controllers\Frontend\CartController::class,'getCharge'])->name('get.charge');
    //frontend
    Route::get('checkout/view/',[App\Http\Controllers\Frontend\CheckoutController::class,'checkoutView'])->name('checkout.view');
    Route::post('checkout/store',[App\Http\Controllers\Frontend\CheckoutController::class,'checkoutStore'])->name('checkout.store');
    Route::get('checkout/cal/{charge}',[App\Http\Controllers\Frontend\CheckoutController::class,'checkoutCal'])->name('checkout.cal');
    //user delete
    Route::get('user/delete/{id}',[App\Http\Controllers\Backend\ProductController::class, 'userDelete'])->name('user.delete');
    //cash on delivery
    Route::post('cash/on/delivery',[App\Http\Controllers\CashController::class,'CashOrder'])->name('cash.delivery');
});

//add to mini cart
Route::post('add-to-cart-store/{id}',[App\Http\Controllers\Frontend\CartController::class,'addToCart'])->name('add.cart');
Route::post('single-add-to-cart-store/{id}',[App\Http\Controllers\Frontend\CartController::class,'singleAddToCart'])->name('single.add.cart');
Route::get('add-to-mini-cart/',[App\Http\Controllers\Frontend\CartController::class,'AddToMiniCart'])->name('add.to.cart');
Route::get('remove-mini-cart/{rowID}',[App\Http\Controllers\Frontend\CartController::class,'RemoveMiniCart'])->name('remove.mini.cart');
//add to Wishlist
Route::post('/add-to-wishlist/{product_id}',[App\Http\Controllers\Frontend\CartController::class,'AddToWishlist'])->name('add.to.wishlist');
Route::get('/count-wishlist',[App\Http\Controllers\Frontend\CartController::class,'countWish'])->name('wishlist.count');
