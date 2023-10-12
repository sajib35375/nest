<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Product;
use App\Models\MultiImg;
use App\Repositories\product\ProductRepository;
use Illuminate\Http\Request;
use App\Models\ProductAttribute;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\Rate;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{


    protected $data;
    public function __construct(ProductRepository $data){
        $this->data = $data;
    }


    public function index(){

        $all_data = $this->data->index();

        $all_data['all_product'];
        $all_data['allDataRv'];
        $all_data['deal_product'];
        $all_data['top_selling'];
        $all_data['trending_product'];
        $all_data['recent_product'];
        $all_data['top_rateded'];


        return view('frontend.index',compact('all_data'));
    }

    public function singleProduct($id){

           $single_pro = Product::with('tags')->withCount(['rates as reviews_avg' => function($query) {
           $query->select(DB::raw('avg(star_rate)'));
           }])->find($id);

        $multi = MultiImg::where('product_id',$id)->get();
        $pro_attribute = ProductAttribute::where('product_id',$id)->get();
        $single_attribute = ProductAttribute::where('product_id',$id)->first();

        $related_pro =  Product::where('category_id',$single_pro->category_id)->withCount(['rates as reviews_avg' => function($query) {
            $query->select(DB::raw('avg(star_rate)'));
        }])->get();


        $review = Rate::with('users')->where('user_id',Auth::id())->where('product_id',$id)->get();
        return view('frontend.product.single_product',compact('single_pro','related_pro','review','pro_attribute','single_attribute','multi'));
    }

    public function singleProductPriceChange($id){
        $product_price = ProductAttribute::find($id);
        return json_encode($product_price);
    }

    public function quickView($id){
       $products = Product::with('categories')->find($id);
        $product_attribute = ProductAttribute::where('product_id',$id)->get();
        return response()->json(array(
            'product' => $products,
            'product_attribute'=>$product_attribute
        ));
    }

    public function multiQuickView($id){
        $product_attribute = ProductAttribute::where('product_id',$id)->get();
        return view('frontend.layout.QuickView',compact('product_attribute'));
    }

    public function changeValue($id){
        $product_attribute = ProductAttribute::find($id);
        return $product_attribute;
    }


}
