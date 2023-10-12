<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\District;
use App\Models\Division;
use App\Models\State;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function checkoutView(){

        if(Auth::check()){
            if(Cart::total() > 0){
                $cart_total = Cart::content();
                $CartsTotal = Cart::priceTotal();
                $CartsQTY = Cart::count();


                $divisions = Division::orderBy('id','ASC')->get();
                $districts = District::orderBy('id','ASC')->get();
                $states = State::orderBy('id','ASC')->get();

                return view('frontend.checkout.checkout',compact('cart_total','CartsTotal','CartsQTY', 'divisions', 'districts', 'states'));
            }else {
                return redirect()->to('/')->with('warn', 'Please Shopping First!');
            }
        }else {
            return redirect()->to('/login')->with('warn', 'Please Login First!');
        }

    }

    /**
     * Checkout Store
     */
    public function checkoutStore(Request $request){
        $this->validate($request, [
            'shipping_name' => 'required',
            'shipping_email' => 'required',
            'shipping_phone' => 'required',
            'post_code' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
            'state_id' => 'required',
            'additional_information' => 'required',
        ],[
            'shipping_name.required' => "Enter your full name",
            'shipping_email.required' => "Enter your email",
            'shipping_phone.required' => "Enter your mobile number",
            'post_code.required' => "Enter your post code",
            'division_id.required' => "Enter your division name",
            'district_id.required' => "Enter your district name",
            'state_id.required' => "Enter your state name",
            'additional_information.required' => "Enter your additional information",
        ]);


        $data = [];
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['post_code'] = $request->post_code;
        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['state_id'] = $request->state_id;
        $data['additional_information'] = $request->additional_information;

        $divisions = Division::orderBy('division_name', 'ASC')->get();
        $districts = District::orderBy('district_name', 'ASC')->get();
        $states = State::orderBy('state_name', 'ASC')->get();

        $cart_total = Cart::content();
        $cartTotal = Cart::priceTotal();
        $CartsQTY = Cart::count();
        $ship_charge = request()->cookie('charge');

        if($request->payment_option == "SSL Ecommeze"){
            return view('frontend.payment.ssl_ecommeze', compact('data', 'cart_total','ship_charge', 'cartTotal', 'CartsQTY', 'divisions', 'districts', 'states'));
        }else if($request->payment_option == "Cash-on-Delivery"){
            return view('frontend.payment.cash_delivery',compact('data', 'cart_total','ship_charge', 'cartTotal', 'CartsQTY', 'divisions', 'districts', 'states'));
        }else {
            return redirect()->back()->with('warn', 'Please select payment method');
        }
    }
    //shipCharge
    public function checkoutCal($charge){

        if (Session::has('coupon')){
            $coupon_name = session()->get('coupon')['coupon_name'];
            $discount = session()->get('coupon')['coupon_discount'];
            $discount_amount = session()->get('coupon')['discount_amount'];
            $cart_total = Cart::priceTotal();
            $total = $cart_total + $charge - $discount_amount;
            return response()->json(array(
                'coupon_name' => $coupon_name,
                'discount' => $discount,
                'discount_amount' => $discount_amount,
                'coupon_total' => $total
            ));
        }else{
            $cart_total = Cart::priceTotal();
            $total = $cart_total + $charge;
            return response()->json(array(
                'cart_total' => $total
            ));
        }
    }


}
