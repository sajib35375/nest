<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Tag;
use App\Models\Post;
use App\Models\AboutUs;
use App\Models\Product;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;
use App\Models\PurchaseGuide;
use App\Models\ContactPageInfo;
use App\Models\ProductCategory;
use App\Models\ProductAttribute;
use App\Models\TermsAndConditions;
use Illuminate\Support\Facades\DB;
use App\Models\DeliveryInformation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    /**
     * @access public
     * @routes /privacy-policy
     * @method GET
     */
    public function privacyPolicy() {
        $data = PrivacyPolicy::findOrFail(1);
        return view('frontend.pages.privacy_policy', compact('data'));
    }

    /**
     * @access public
     * @routes /terms-and-conditions
     * @method GET
     */
    public function termsConditions() {
        $data = TermsAndConditions::findOrFail(1);
        return view('frontend.pages.terms_conditions', compact('data'));
    }

    /**
     * @access public
     * @routes /delivery-information
     * @method GET
     */
    public function deliveryInformation() {
        $data = DeliveryInformation::findOrFail(1);
        return view('frontend.pages.delivery_information', compact('data'));
    }

    /**
     * @access public
     * @routes /purchase-guide
     * @method GET
     */
    public function purchaseGuide() {
        $data = PurchaseGuide::findOrFail(1);
        return view('frontend.pages.purchase_guide', compact('data'));
    }

    /**
     * @access public
     * @routes /contact-us
     * @method GET
     */
    public function contactUsPage() {
        $data = ContactPageInfo::findOrFail(1);
        return view('frontend.pages.contact_us', compact('data'));
    }

    /**
     * @access public
     * @routes /store/contact-form
     * @method POST
     */
    public function contactFormStore(Request $request) {
        $this->validate($request, [
            "name" => 'required',
            "email" => "required",
            "phone" => "required",
            "subject" => "required",
            "message" => "required"
        ],[
            "name.required" => "Name field is required",
            "email.required" => "Email field is required",
            "phone.required" => "Phone field is required",
            "subject.required" => "Subject field is required",
            "message.required" => "message field is required",
        ]);

        // Send Mail for Admin
        $email = "earoth.ecommerce@gmail.com";
        $subject = $request->subject;
        $messageData = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'text' => $request->message
        ];

        Mail::send('emails.enquery',$messageData,function($message) use($email, $subject){
            $message->to($email)->subject($subject);
        });

        ContactForm::create([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "subject" => $request->subject,
            "message" => $request->message
        ]);

        return redirect()->back()->with('success', 'Your contact message send successfull');
    }

    /**
     * @access public
     * @routes /about-us
     * @method GET
     */
    public function aboutUsPage() {
        $data = AboutUs::findOrFail(1);
        return view('frontend.pages.about_us', compact('data'));
    }

    /**
     * @access public
     * @routes /blog
     * @method GET
     */
    public function blogPage() {
        $all_post = Post::with(['categories', 'tags'])->latest()->paginate(15);
        $all_cat = Category::latest()->get();
        $all_tag = Tag::latest()->get();
        return view('frontend.pages.blog', compact('all_post', 'all_cat', 'all_tag'));
    }

    /**
     * Signle post count method
     */
    private function viewCount($post_id){
        $data = Post::find($post_id);
        $old_view = $data->views;
        $data->views = $old_view + 1;
        $data->update();
    }

    /**
     * @access public
     * @routes /blog/{slug}
     * @method GET
     */
    public function singleBlogPage($slug) {
        $post = Post::where('slug', $slug)->first();
        // single post views count method
        $this->viewCount($post->id);
        $post->update();
        return view('frontend.pages.single_blog', compact('post'));
    }

    /**
     * @access public
     * @routes /category-wise-blog/{slug}
     * @method GET
     */
    public function categoryWiseBlog($slug) {
        $categories = Category::with('posts')->where('slug', $slug)->first();
        $all_cat = Category::latest()->get();
        $posts = $categories->posts()->paginate(15);
        return view('frontend.pages.category_wise_blog', compact('categories', 'all_cat', 'posts'));
    }

    /**
     * @access public
     * @routes /tag-wise-blog/{slug}
     * @method GET
     */
    public function tagWiseBlog($slug) {
        $tags = Tag::with('posts')->where('slug', $slug)->first();
        $all_tag = Tag::latest()->get();
        $posts = $tags->posts()->paginate(15);
        return view('frontend.pages.tag_wise_blog', compact('tags', 'all_tag', 'posts'));
    }

    /**
     * @access public
     * @routes /search
     * @method GET
     */
    public function searchFormBlog(Request $request){
        $search = $request->search;
        $posts = Post::where('title', 'LIKE', '%'.$search.'%')->orWhere('description', 'LIKE', '%'.$search.'%')->paginate(15);
       return view('frontend.pages.search_blog', [
           'posts' => $posts,
           'search' => $search,
       ]);
    }

    /**
     * @access public
     * @routes /product-search
     * @method POST
     */
    public function searchFormProduct(Request $request){
        $request->validate(['search' => 'required']);
        $search = $request->search;
        $search_category = $request->search_category;
        $products = Product::where('product_name', 'LIKE', '%'.$search.'%')->orWhere('category_id', 'LIKE', '%'.$search_category.'%')->orderBy('product_name','ASC')->get();
        $all_cat = ProductCategory::orderBy('product_name','ASC')->get();
       return view('frontend.pages.search_product', [
           'products' => $products,
           'search' => $search,
           'all_cat' => $all_cat,
       ]);
    }

    /**
     * @access public
     * @routes /search-product
     * @method POST
     */
    public function advanceProductSearch(Request $request){
        $request->validate(['search' => 'required']);
        $search = $request->search;
        $products = Product::where('product_name', 'LIKE', '%'.$search.'%')->select('product_name', 'thumbnail', 'sale_price', 'id')->limit(5)->get();
        // return $products; die;
       return view('frontend.layout.advance_search_product', [
           'products' => $products
       ]);
    }

    /**
     * @access public
     * @routes /category-wise-product/{slug}
     * @method GET
     */
    public function categoryWiseProduct($slug) {
        $categories = ProductCategory::with('products')->where('slug', $slug)->first();
        $all_cat = ProductCategory::withCount('products')->latest()->get();
        $products = $categories->products()->withCount(['rates as reviews_avg' => function($query) {
            $query->select(DB::raw('avg(star_rate)'));
        }])->paginate(15);
        return view('frontend.pages.category_wise_product', compact('categories', 'all_cat', 'products'));
    }

    /**
     * @access public
     * @routes /shop
     * @method GET
     */
    public function shopPage() {
        $all_cat = ProductCategory::withCount('products')->latest()->get();
        $products = Product::where('status', true)->withCount(['rates as reviews_avg' => function($query) {
            $query->select(DB::raw('avg(star_rate)'));
        }])->latest()->paginate(20);
        $deal_product = Product::where('deals_day',1)->withCount(['rates as reviews_avg' => function($query) {
            $query->select(DB::raw('avg(star_rate)'));
        }])->get();
        return view('frontend.pages.shop_page', compact('all_cat', 'products', 'deal_product'));
    }

    /**
     * @access public
     * @routes /brand-wise-product/{name}
     * @method GET
     */
    public function brandWiseProduct($id) {
        $all_cat = ProductCategory::withCount('products')->latest()->get();
        $products = Product::where('brand_name', $id)->withCount(['rates as reviews_avg' => function($query) {
            $query->select(DB::raw('avg(star_rate)'));
        }])->paginate(15);
        return view('frontend.pages.brand_wise_product', compact('all_cat', 'products'));
    }


    /**
     * @access public
     * @routes /filter
     * @method GET
     */
    public function filterWiseProduct(Request $request){
        $request->validate(['min_price' => 'required', 'max_price' => 'required', 'rating_status' => 'required']);
        $min_price = intval($request->min_price);
        $max_price = intval($request->max_price);
        $rating_status = $request->rating_status;
        $products = Product::where('sale_price', '>', $min_price)->where('sale_price', '<', $max_price);
        $products->whereIn('rating_status', $rating_status);
        $products = $products->paginate(20);
        // dd($products);
        // return $products;
        $all_cat = ProductCategory::withCount('products')->latest()->get();

       return view('frontend.pages.filter_product', [
           'products' => $products,
           'all_cat' => $all_cat,
       ]);
    }


    /**
     * @access public
     * @routes /sorting-prodcut/{sort}
     * @method GET
     */
    public function sortingProduct($sort) {
        $all_cat = ProductCategory::withCount('products')->latest()->get();

        $products = Product::where('status', true)->withCount(['rates as reviews_avg' => function($query) {
            $query->select(DB::raw('avg(star_rate)'));
        }]);

        if($sort == 'latest_product'){
            $products->orderBy('id', 'DESC');
        }
        if($sort == 'low_to_high'){
            $products->orderBy('sale_price', 'DESC');
        }
        if($sort == 'high_to_low'){
            $products->orderBy('sale_price', 'ASC');
        }

        $pgn = 20;
        if($sort == 50){
            $pgn = 50;
        }

        if($sort == 100){
            $pgn = 100;
        }

        if($sort == 150){
            $pgn = 150;
        }

        if($sort == 200){
            $pgn = 200;
        }

        if($sort == "All"){
            $pgn = 1000;
        }

        $products = $products->paginate($pgn);

        $deal_product = Product::where('deals_day',1)->withCount(['rates as reviews_avg' => function($query) {
            $query->select(DB::raw('avg(star_rate)'));
        }])->get();
        return view('frontend.pages.shop_page', compact('all_cat', 'products', 'deal_product'));
    }

    /**
     * @access public
     * @routes /quick-view-product/{id}
     * @method GET
     */


}
