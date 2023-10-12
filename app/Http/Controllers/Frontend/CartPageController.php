<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Models\State;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartPageController extends Controller
{
    public function cartPageView(){
        $division = Division::latest()->get();
        $district = District::latest()->get();
        $states = State::latest()->get();
        //dd($states);
        return view('frontend.cartPage.cartPage',compact('division','district','states'));
    }

    public function cartPageLoad(){
        $Carts = Cart::content();
        $CartsTotal = Cart::priceTotal();
        $CartsQTY = Cart::count();

        return response()->json(array(
            'Carts' => $Carts,
            'CartsTotal' => $CartsTotal,
            'CartsQTY' => $CartsQTY,

        ));
    }

    public function cartProductRemove($rowId){
        Cart::remove($rowId);
        return response()->json(['success'=>'Successfully Product Remove From Your Cart']);
    }

    public function cartQntyIncrease($rowId){
        $item = Cart::get($rowId);
        Cart::update($rowId, $item->qty + 1);
        return response()->json(['success'=>'Cart Quantity Increases Successfully']);
    }

    public function cartQntyDecrease($rowId){
        $item = Cart::get($rowId);
        Cart::update($rowId, $item->qty - 1);
        return response()->json(['success'=>'Cart Quantity Decreases Successfully']);
    }
}
