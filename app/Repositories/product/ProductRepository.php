<?php

namespace  App\Repositories\product;

use App\Models\Product;

class ProductRepository implements ProductInterface{

    public function index(){

        $data['all_product'] = Product::latest()->get();
        $data['allDataRv'] = Product::latest()->get();
        $data['deal_product'] = Product::where('deals_day',1)->latest()->get();
        $data['top_selling'] = Product::where('top_selling',1)->orderBy('id','DESC')->take(4)->get();;
        $data['trending_product'] = Product::where('trending_product',1)->orderBy('id','DESC')->take(4)->get();
        $data['recent_product'] = Product::where('Recently_added',1)->orderBy('id','DESC')->take(4)->get();
        $data['top_rateded'] = Product::where('top_rateded',1)->orderBy('id','DESC')->take(4)->get();

        return $data;
    }
}
