<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Compare;
use App\Models\Product;
use App\Models\ProductAttribute;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompareController extends Controller
{
    public function compareView(){
        $all_compare = Compare::with('products')->where('user_id',Auth::id())->get();
        $arr = [];
        foreach($all_compare as $item){
            if (!in_array($item->product_id,$arr)){
                array_push($arr,$item->product_id);
            }
        }
        $all_product = Product::whereIn('id',$arr)->withCount(['rates as reviews_avg' => function($query) {
            $query->select(DB::raw('avg(star_rate)'));
        }])->get();

        $productAttr = ProductAttribute::whereIn('product_id',$arr)->get();

        return view('frontend.compare.compare',compact('all_compare','all_product','productAttr'));
    }

    public function compareAdd(Request $request){
        if (Auth::check()){
            $exists = Compare::where('product_id',$request->id)->where('user_id',Auth::id())->first();

            if (!$exists){

                Compare::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $request->id,
                    'created_at' => Carbon::now()
                ]);

                return response()->json(['success'=>'Successfully Added in your Compare list']);


            }else{
                return response()->json(['error'=>'At list one Product need to compare']);
            }



        }else{

            return response()->json(['error'=>'At First Login into Your Account']);
        }
    }
}
