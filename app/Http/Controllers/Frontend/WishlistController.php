<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function WishlistPage(){
        return view('frontend.wishlist.wishlist');
    }

    public function wishViewProduct(){
       return Wishlist::with('product')->where('user_id',Auth::id())->get();

    }

    public function wishProductDelete($id){
        $delete_product = Wishlist::where('user_id',Auth::id())->where('product_id',$id)->first();
        $delete_product->delete();
        return response()->json(['success'=>'Successfully Delete Product from Wishlist']);
    }
}
