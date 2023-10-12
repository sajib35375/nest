<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Pdf;

class OrderController extends Controller
{
    /**
     * @access private
     * @routes /order/pending
     * @method GET
     */
    public function pendingOrder(){
        $orders = Order::where('status', 'Pending')->latest()->get();
        return view('admin.order.pending_order', compact('orders'));
    }

    /**
     * @access private
     * @routes /order-pending-details/{id}
     * @method GET
     */
    public function pendingOrderDetails($id){
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $id)->first();
        $orderItem = OrderItem::with('product')->where('order_id', $id)->latest()->get();
        return view('admin.order.pending_order_details', compact('order', 'orderItem'));
    }

    /**
     * @access private
     * @routes /order/confirmed
     * @method GET
     */
    public function confirmedOrder(){
        $orders = Order::where('status', 'Confirmed')->latest()->get();
        return view('admin.order.confirmed_order', compact('orders'));
    }

    /**
     * @access private
     * @routes /order/processing
     * @method GET
     */
    public function processingOrder(){
        $orders = Order::where('status', 'Processing')->latest()->get();
        return view('admin.order.processing_order', compact('orders'));
    }

    /**
     * @access private
     * @routes /order/picked
     * @method GET
     */
    public function pickedOrder(){
        $orders = Order::where('status', 'Picked')->latest()->get();
        return view('admin.order.picked_order', compact('orders'));
    }

    /**
     * @access private
     * @routes /order/shipped
     * @method GET
     */
    public function shippedOrder(){
        $orders = Order::where('status', 'Shipped')->latest()->get();
        return view('admin.order.shipped_order', compact('orders'));
    }

    /**
     * @access private
     * @routes /order/delivered
     * @method GET
     */
    public function deliveredOrder(){
        $orders = Order::where('status', 'Delivered')->latest()->get();
        return view('admin.order.delivered_order', compact('orders'));
    }

    /**
     * @access private
     * @routes /order/cancel
     * @method GET
     */
    public function cancelOrder(){
        $orders = Order::where('status', 'Cancel')->latest()->get();
        return view('admin.order.cancel_order', compact('orders'));
    }

    /**
     * @access private
     * @routes /order/pending-to-confirm/{id}
     * @method GET
     */
    public function pendingToConfirm($id){
        $orders = Order::where('id', $id)->update([
            'status' => "Confirmed"
        ]);
        $notification = array(
            'message' => 'Order Confirmed Successfully',
            'type' => 'success'
        );
        return redirect()->route('order.pending')->with($notification);
    }

    /**
     * @access private
     * @routes /order/confirm-to-processing/{id}
     * @method GET
     */
    public function confirmToProcessing($id){
        $orders = Order::where('id', $id)->update([
            'status' => "Processing"
        ]);
        $notification = array(
            'message' => 'Order Processing Successfully',
            'type' => 'success'
        );
        return redirect()->route('order.confirmed')->with($notification);
    }

    /**
     * @access private
     * @routes /order/processing-to-picked/{id}
     * @method GET
     */
    public function processingToPicked($id){
        $orders = Order::where('id', $id)->update([
            'status' => "Picked"
        ]);
        $notification = array(
            'message' => 'Order Picked Successfully',
            'type' => 'success'
        );
        return redirect()->route('order.processing')->with($notification);
    }

    /**
     * @access private
     * @routes /order/picked-to-shipped/{id}
     * @method GET
     */
    public function pickedToShipped($id){
        $orders = Order::where('id', $id)->update([
            'status' => "Shipped"
        ]);
        $notification = array(
            'message' => 'Order Shipped Successfully',
            'type' => 'success'
        );
        return redirect()->route('order.picked')->with($notification);
    }

    /**
     * @access private
     * @routes /order/shipped-to-delivered/{id}
     * @method GET
     */
    public function shippedToDelivered($id){
        $orders = Order::where('id', $id)->update([
            'status' => "Delivered"
        ]);
        $notification = array(
            'message' => 'Order Delivered Successfully',
            'type' => 'success'
        );
        return redirect()->route('order.shipped')->with($notification);
    }

    /**
     * @access private
     * @routes /order/delivered-to-cancel/{id}
     * @method GET
     */
    public function deliveredToCancel($id){
        $orders = Order::where('id', $id)->update([
            'status' => "Cancel"
        ]);
        $notification = array(
            'message' => 'Order Cancel Successfully',
            'type' => 'success'
        );
        return redirect()->route('order.delivered')->with($notification);
    }

    /**
     * @access private
     * @routes /order/invoice-download/{id}
     * @method GET
     */
    public function adminInvoiceDownload($id){
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $id)->first();
        $orderItem = OrderItem::with('product')->where('order_id', $id)->latest()->get();

        $pdf = Pdf::loadView('admin.order.order_invoice', compact('order', 'orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }
}
