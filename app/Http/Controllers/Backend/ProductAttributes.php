<?php

namespace App\Http\Controllers\backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductAttribute;
use App\Http\Controllers\Controller;

class ProductAttributes extends Controller
{
    public function addAttribute(Request $request,$id){


        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            foreach($data['sku'] as $key => $value){
                if(!empty($value)){


                    // Check whethe the SKU already has or not
                    $attCountSku = ProductAttribute::where('sku', $value)->count();
                    if($attCountSku>0){
                        $notification = array(
                            'message' => 'SKU already exists, Please add another SKU',
                            'type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    }

                    // Check whethe the weight already has or not
                    $attCountWeight = ProductAttribute::where(['product_id'=>$id, 'weight'=>$data['weight'][$key]])->count();
                    if($attCountWeight>0){

                        $notification = array(
                            'message' => 'Weight already exists, Please add another weight',
                            'type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    }

                    $attribute = new ProductAttribute;
                    $attribute->product_id = $id;
                    $attribute->sku = $value;
                    $attribute->weight = $data['weight'][$key];
                    $attribute->sale_price = $data['sale_price'][$key];
                    $attribute->regular_price = $data['regular_price'][$key];
                    $attribute->color = $data['color'][$key];
                    $attribute->stock = $data['stock'][$key];
                    $attribute->save();

                }
            }

            $notification = array(
                'message' => 'Product attribute has been added successfully',
                'type' => 'success'
            );
            return redirect()->back()->with($notification);
        }

        $product_data = Product::select(['id','product_name','SKU','thumbnail','regular_price', 'sale_price'])->with('attributes')->find($id);

        return view('admin.product.add_attributes', compact('product_data'));
    }

    /**
     * Edit Attribute
     */
    public function editAttribute(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            if(!empty($data)){

                foreach($data['attrId'] as $key => $value){

                    ProductAttribute::where('id',$value)->update([
                        'sale_price' => $data['sale_price'][$key],
                        'regular_price' => $data['regular_price'][$key],
                        'stock' => $data['stock'][$key],
                    ]);

                }

                $notification = array(
                    'message' => 'Product attribute has been updated successfully',
                    'type' => 'success'
                );
                return redirect()->back()->with($notification);

            }
        }
    }


    /**
     * Update Attribute Status
     */
    public function updateAttributeStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            if($data['status'] == 'Active'){
                $status = 0;
            }else {
                $status = 1;
            }
            ProductAttribute::where('id', $data['attribute_id'])->update(['status' => $status]);
            return response()->json([
                'status' => $status,
                'attribute_id' => $data['attribute_id']
            ]);
        }
    }


    /**
     * Delete Attribute
     */
    public function deleteAttribute($id){
        $attribute_data = ProductAttribute::findOrFail($id);

        $attribute_data->delete();


        $notification = array(
            'message' => 'Product Attribute Deleted Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);

    }



}
