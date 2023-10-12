<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReturnController extends Controller
{
    /**
     * @access private
     * @routes /return-order
     * @method GET
     */
    public function returnOrderRequest(){
        $orders = Order::where('return_order', 1)->latest()->get();
        return view('admin.return_order.return_request', compact('orders'));
    }


    /**
     * @access private
     * @routes /return-order-approve/{id}
     * @method GET
     */
    public function returnOrderRequestApprove($id){
        Order::where('id', $id)->update(['return_order' => 2]);
        $notification = array(
            'message' => 'Order return request approve successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * @access private
     * @routes /all-return-order
     * @method GET
     */
    public function allReturnOrder(){
        $orders = Order::where('return_order', 2)->latest()->get();
        return view('admin.return_order.all_return_order', compact('orders'));
    }

}
