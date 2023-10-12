<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function AddProductRate(Request $request){
        $this->validate($request,[
            'product_rating' => 'required',
            'message' => 'required',
            'name' => 'required',
            'email' => 'required',
            'website' => 'required',
        ]);

        Rate::insert([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'message' => $request->message,
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'star_rate' => $request->product_rating,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success','Rate Added Successfully');
    }
}
