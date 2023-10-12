<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function couponView(){
        $coupons = Coupon::latest()->get();
        return view('admin.coupon.coupon_system',compact('coupons'));
    }

    public function couponStore(Request $request){
        $this->validate($request,[
           'coupon_name' => 'required',
           'coupon_discount' => 'required',
           'coupon_validity' => 'required',
        ]);

        Coupon::insert([
            'coupon_name' => $request->coupon_name,
            'coupon_discount' => $request->coupon_discount,
            'discount_date' => $request->coupon_validity,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Coupon Inserted Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function couponInactive($id){
        $active = Coupon::find($id);
        $active->status = false;
        $active->update();

        $notification = array(
            'message' => 'Coupon Inactive Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function couponActive($id){
        $active = Coupon::find($id);
        $active->status = true;
        $active->update();

        $notification = array(
            'message' => 'Coupon Active Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function couponEdit($id){
        $edit = Coupon::find($id);
        return view('admin.coupon.coupon_edit',compact('edit'));
    }

    public function couponUpdate(Request $request,$id){
        $update = Coupon::find($id);
        $update->coupon_name = $request->coupon_name;
        $update->coupon_discount = $request->coupon_discount;
        $update->discount_date = $request->coupon_validity;
        $update->updated_at = Carbon::now();
        $update->update();

        $notification = array(
            'message' => 'Coupon Updated Successfully',
            'type' => 'success'
        );
        return redirect()->route('coupon.view')->with($notification);
    }

    public function couponDelete($id){
        $delete = Coupon::find($id);
        $delete->delete();

        $notification = array(
            'message' => 'Coupon Deleted Successfully',
            'type' => 'success'
        );
        return redirect()->route('coupon.view')->with($notification);
    }
}
