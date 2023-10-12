<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function showAttr($id){
        $pro_attribute = ProductAttribute::with('products')->where('product_id',$id)->get();
        return view('admin.product.show_attributes',compact('pro_attribute'));
    }
}
