<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Pdf;
use Image;

class UserController extends Controller
{
    /**
     * @access private
     * @routes /user-logout
     * @method GET
     */
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    /**
     * @access private
     * @routes /user/profile
     * @method GET
     */
    public function userProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.user.profile.view_profile', compact('user'));
    }

    /**
     * @access private
     * @routes /user/profile/edit
     * @method GET
     */
    public function userProfileEdit(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('user.profile.edit_profile', compact('user'));
    }

    /**
     * @access private
     * @routes /user/profile/update
     * @method POST
     */
    public function userProfileUpdate(Request $request){
        if($request->isMethod('post')){
            $data = User::find(Auth::user()->id);
            $data->name = $request->name;
            $data->email = $request->email;

            $fileName = '';
            if($request->hasFile('profile_photo_path')){
                $file = $request->file('profile_photo_path');
                $fileName = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
                Image::make($file)->resize(120,120)->save('upload/userImages/'.$fileName);
                if(file_exists($data->profile_photo_path) && !empty($data->profile_photo_path)){
                    unlink('upload/userImages/'.$data->profile_photo_path);
                }
            }else {
                $fileName = $data->profile_photo_path;
            }

            $data->profile_photo_path = $fileName;
            $data->save();

            $notification = [
                'message' => "User profile updated successfully",
                'alert-type' => 'success'
            ];

            return redirect()->route('user.profile')->with($notification);
        }
    }

    /**
     * @access private
     * @routes /user/change/password
     * @method GET
     */
    public function userChangePassword(){
        return view('user.password.edit_password');
    }

    /**
     * @access private
     * @routes /user/update/password
     * @method POST
     */
    public function userUpdatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $this->validate($request, [
                'current_password' => 'required',
                'password' => 'required|confirmed'
            ],[
                'current_password.required' => 'Current Password is required'
            ]);

            $password = Auth::user()->password;
            if(Hash::check($data['current_password'], $password)){

                $user = User::find(Auth::user()->id);
                $user->password = Hash::make($data['password']);
                $user->save();
                Auth::guard('web')->logout();
                return redirect()->route('login');

            }else {
                $notification = [
                    "message" => "Current Password Doesn't Match!",
                    "alert-type" => "error"
                ];
                return redirect()->back()->with($notification);
            }
        }
    }

    /**
     * @access private
     * @routes /user/order-details/{id}
     * @method GET
     */
    public function orderDetails($id){
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $id)->where('user_id', Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id', $id)->latest()->get();
        return view('frontend.user.order.order_details', compact('order', 'orderItem'));
    }

    /**
     * @access private
     * @routes /user/invoice-download/{id}
     * @method GET
     */
    public function invoiceDownload($id){
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $id)->where('user_id', Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id', $id)->latest()->get();
        // return view('frontend.user.order.order_invoice', compact('order', 'orderItem'));
        $pdf = Pdf::loadView('frontend.user.order.order_invoice', compact('order', 'orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }


    /**
     * @access private
     * @routes /user/invoice-download/{id}
     * @method GET
     */
    public function returnOrder(Request $request, $id){
        if($request->isMethod('post')){

            Order::where('id', $id)->update([
                'return_date' => Carbon::now()->format('d F Y'),
                'return_reason' => $request->return_reason,
                'return_order' => 1
            ]);

            $notification = [
                'message' => "Order return successfully",
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);
        }
    }


    /**
     * @access private
     * @routes /user/order-traking
     * @method POST
     */
    public function orderTraking(Request $request){
        if($request->isMethod('post')){

            $track = Order::where('invoice_no', $request->code)->first();

            if($track){
                return view('frontend.traking.track_order', compact('track'));
            }else {
                return redirect()->back()->with('error', 'Invalid Invoice Number.');
            }
        }
    }

}
