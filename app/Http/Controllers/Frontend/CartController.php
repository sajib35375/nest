<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\District;
use App\Models\Division;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\State;
use App\Models\Wishlist;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request,$id){
        if(Session::has('coupon')){
            Session::forget('coupon');
        }
        $product_data = Product::find($id);
        $stock = ProductAttribute::where('product_id',$id)->sum('stock');

        if ($request->weight == 'All'){
            return response()->json(['error'=>'At first Select Product weight']);
        } else {
                if ($request->quantity < $stock) {
                    Cart::add([
                        'id' => $id,
                        'name' => $request->product_name,
                        'qty' => $request->quantity,
                        'price' => $request->sale_price,
                        'weight' => $request->weight,
                        'options' => [
                            'image' => $product_data->thumbnail,
                            'brand' => $product_data->brand_name,
                        ],
                    ]);
                    return response()->json(['success' => 'Product Added Successfully in Your Cart']);
                } else {
                    return response()->json(['error' => 'Product Out of Stock']);
                }
            }
        }
    public function singleAddToCart(Request $request,$id){

        $product_data = Product::find($id);
        $stock = ProductAttribute::where('product_id',$id)->sum('stock');
        if ($request->weight == null){
            return response()->json(['error'=>'At first Select Product weight']);
        }else{
            if ($request->quantity < $stock){
                Cart::add([
                    'id' => $id,
                    'name' => $product_data->product_name,
                    'qty' => $request->quantity,
                    'price' => $request->single_sale,
                    'weight' => $request->weight,
                    'options' => [
                        'image' => $product_data->thumbnail,
                        'brand' => $product_data->brand_name,
                    ],
                ]);
                return response()->json(['success'=>'Product Added Successfully in Your Cart']);
            }else{
                return response()->json(['error'=>'Product Out of Stock']);
            }
        }

    }

    public function AddToMiniCart(){

        $Carts = Cart::content();
        $CartsTotal = Cart::priceTotal();
        $CartsQTY = Cart::count();

        return response()->json(array(
            'Carts' => $Carts,
            'CartsTotal' => $CartsTotal,
            'CartsQTY' => $CartsQTY,

        ));
    }


    public function RemoveMiniCart($rowID){
       Cart::remove($rowID);
       return response()->json(['success'=>'Product Remove Successfully from MiniCart']);
    }


    public function AddToWishlist(Request $request,$product_id){
        if (Auth::check()){
            $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();

            if (!$exists){

                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now()
                ]);
                return response()->json(['success' => 'Product Successfully Added to your Wishlist']);
            }else{
                return response()->json(['error' => 'This product is already in your wishlist']);
            }

        }else{
            return response()->json(['error' => 'At First Login Your Account']);
        }
    }

    public function couponGet(Request $request){
        $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('discount_date','>=',Carbon::now())->first();

        if (!empty($coupon)){

            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'subtotal' => Cart::total(),
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100),
                'total' => round(Cart::total() - Cart::total()*$coupon->coupon_discount/100),
            ]);
            return response()->json(array(
                'validity' => true,
                'success' => 'Coupon Matches Successfully'
            ));
        }else{

            return response()->json(['error' => 'Invalid Coupon']);
        }
    }


    public function couponCalculation(){

        if (Session::has('coupon')){
            return response()->json(array(
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'subtotal' => Cart::total(),
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total' => session()->get('coupon')['total'],
            ));

        }else{
            if(Session::has('coupon')){
                Session::forget('coupon');
            }
            return response()->json(array(
                'subtotal' => Cart::total(),
            ));
        }

    }

    public function couponRemove(){
        Session::forget('coupon');
        return response()->json(['success' => 'successfully coupon remove']);
    }

    public function selectDistrict($division_id){

        $district = District::where('division_id',$division_id)->get();
        return response()->json($district);
    }

    public function selectState($district_id){

        $state = State::where('district_id',$district_id)->get();
        return response()->json($state);
    }

    public function selectCharge($state_id){

        $charge = State::where('id',$state_id)->first();
       return response()->json($charge);
    }

    public function countWish(){
        $count_wish = \App\Models\Wishlist::where('user_id',\Illuminate\Support\Facades\Auth::id())->count();
        return response()->json($count_wish);
    }

    public function getDivision($id){
        if (request()->cookie('division')) {
            Cookie::queue(Cookie::forget('division'));
        }
        //}Cookie::queue(cookie('division', $division, 30));
        $get_div = Division::find($id);
        $division = $get_div->division_name;
        Cookie::queue(cookie('division', $division, 30));


        return response()->json(['success'=>'division confirmed successfully']);
    }

    public function getDistrict($id){
        if (request()->cookie('district')) {
            Cookie::queue(Cookie::forget('district'));
        }
        $get_dis = District::find($id);
        $district = $get_dis->district_name;
        Cookie::queue(cookie('district', $district, 30));
        return response()->json(['success'=>'district confirmed successfully']);
    }

    public function getState($id){

          if (request()->cookie('state')){
              Cookie::queue(Cookie::forget('state'));
          }
        $get_state = State::find($id);
        $state = $get_state->state_name;

        Cookie::queue(cookie('state', $state, 30));

        return response()->json(['success'=>'state confirmed successfully']);
    }

    public function getCharge($id){
        if (request()->cookie('charge')){
            Cookie::queue(Cookie::forget('charge'));
        }
        $charge = State::find($id);
        $amount = $charge->delivery_charge;
        Cookie::queue(cookie('charge', $amount, 30));

        return response()->json(['success'=>'charge confirmed successfully']);
    }
}
