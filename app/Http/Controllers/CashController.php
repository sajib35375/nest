<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Auth;

class CashController extends Controller
{

    public function CashOrder(Request $request){


        if (Session::has('coupon')) {
            $total_amount = Session::get('coupon')['total'] + request()->cookie('charge');
        }else{
            $total_amount = round(Cart::total() + request()->cookie('charge'));
        }

        // dd($charge);

        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_id' => $request->state_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'post_code' => $request->post_code,
            'additional_information' => $request->additional_information,
            'transaction_id' => 'E-Aroth'.hexdec(uniqid()),

            'payment_type' => 'Cash On Delivery',
            'payment_method' => 'Cash On Delivery',

            'currency' =>  'BDT',
            'amount' => $total_amount,
            'order_number' => hexdec(uniqid()),

            'invoice_no' => 'E-AROTH'.mt_rand(10000000,99999999),
            'order_date' => Carbon::now(),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'Pending',
            'created_at' => Carbon::now(),

        ]);

        // Start Send Email
        $invoice = Order::findOrFail($order_id);
        $data = [
            'invoice_no' => $invoice->invoice_no,
            'amount' => $total_amount,
            'name' => $invoice->name,
            'email' => $invoice->email,
        ];

//        Mail::to($request->email)->send(new OrderMail($data));

        // End Send Email


        $carts = Cart::content();
        foreach ($carts as $cart) {
            $product_id = explode('-',$cart->id)[0];

            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $product_id,
                'weight' => $cart->weight,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' => Carbon::now()

            ]);
        }


        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        if (Session::has('state')) {
            Session::forget('state');
        }

        if (request()->cookie('division')) {
            Cookie::queue(Cookie::forget('division'));
        }

        if (request()->cookie('district')) {
            Cookie::queue(Cookie::forget('district'));
        }

        if (request()->cookie('charge')){
            Cookie::queue(Cookie::forget('charge'));
        }

        Cart::destroy();

        $notification = array(
            'message' => 'Your Order Place Successfully',
            'type' => 'success'
        );

        return redirect()->route('frontend.index')->with($notification);


    }










}
