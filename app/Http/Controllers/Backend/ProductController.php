<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductTag;
use App\Models\Subscriber;
use App\Models\User;
use App\Notifications\NewProductNotifiy;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Image;


class ProductController extends Controller
{
    public function productCategory(){
        $all_pro_cat = ProductCategory::latest()->get();
        return view('admin.product.category',compact('all_pro_cat'));
    }

    public function productCategoryStore(Request $request){
        $this->validate($request,[
            'name' => 'required'
        ]);

        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $unique_name = hexdec(uniqid()).'.'.$icon->getClientOriginalExtension();
            Image::make($icon)->resize(80,80)->save('frontend/assets/imgs/icon/'.$unique_name);
        }

        ProductCategory::insert([
            'name' => $request->name,
            'icon' => $unique_name,
            'slug' => Str::slug($request->name),
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Product Category Added Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function productCategoryActive($id){
        $active = ProductCategory::find($id);
        $active->status = true;
        $active -> update();

        $notification = array(
            'message' => 'Product Category Active Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function productCategoryInactive($id){
        $active = ProductCategory::find($id);
        $active->status = false;
        $active -> update();

        $notification = array(
            'message' => 'Product Category Inactive Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function productCategoryEdit($id){
         $edit_pro_cat = ProductCategory::find($id);
         return view('admin.product.category_edit',compact('edit_pro_cat'));
    }

    public function productCategoryUpdate(Request $request,$id){
        $update_pro_cat = ProductCategory::find($id);
        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $unique_name = hexdec(uniqid()).'.'.$icon->getClientOriginalExtension();
            Image::make($icon)->resize(80,80)->save('frontend/assets/imgs/icon/'.$unique_name);
            if(file_exists('frontend/assets/imgs/icon/'.$request->old_icon) && !empty($request->old_icon)){
                unlink('frontend/assets/imgs/icon/'.$request->old_icon);
            }
        }else{
            $unique_name = $request->old_icon;
        }
        $update_pro_cat->name = $request->name;
        $update_pro_cat->icon = $unique_name;
        $update_pro_cat->updated_at = Carbon::now();
        $update_pro_cat->update();

        $notification = array(
            'message' => 'Product Category Updated Successfully',
            'type' => 'success'
        );
        return redirect()->route('product.category')->with($notification);
    }

    public function productCategoryDelete($id){
        $delete_pro_cat = ProductCategory::find($id);
        $delete_pro_cat->delete();

        $notification = array(
            'message' => 'Product Category Deleted Successfully',
            'type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }

    public function productTags(){
        $all_pro_tags = ProductTag::latest()->get();
        return view('admin.product.tags',compact('all_pro_tags'));
    }

    public function productTagsStore(Request $request){
        $this->validate($request,[
            'name' => 'required'
        ]);

        ProductTag::insert([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Product Tag Added Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function productTagActive($id){
        $active = ProductTag::find($id);
        $active->status = true;
        $active -> update();

        $notification = array(
            'message' => 'Product Tag Active Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function productTagInactive($id){
        $active = ProductTag::find($id);
        $active->status = false;
        $active -> update();

        $notification = array(
            'message' => 'Product Tag Inactive Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function productTagEdit($id){
        $edit_tag = ProductTag::find($id);
        return view('admin.product.tag_edit',compact('edit_tag'));
    }

    public function productTagUpdate(Request $request,$id){
        $update_tag = ProductTag::find($id);

        $update_tag->name = $request->name;
        $update_tag->updated_at = Carbon::now();
        $update_tag->update();

        $notification = array(
            'message' => 'Product Tag Updated Successfully',
            'type' => 'success'
        );
        return redirect()->route('product.tag')->with($notification);
    }

    public function productTagDelete($id){
        $delete_tag = ProductTag::find($id);
        $delete_tag->delete();

        $notification = array(
            'message' => 'Product Tag Deleted Successfully',
            'type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }

    public function addNewProduct(){
        $all_tags = ProductTag::where('status',true)->get();
        $all_cat = ProductCategory::where('status',true)->get();
        return view('admin.product.add_product',compact('all_tags','all_cat'));
    }

    public function ProductStore(Request $request){
        $this->validate($request,[
            'category_id' => 'required',
            'product_name' => 'required',
            'sale_price' => 'required',
            'regular_price' => 'required',
            'type' => 'required',
            'short_des' => 'required',
            'long_des' => 'required',
            'thumbnail' => 'required',
            'multiple_img' => 'required',
        ]);

        if ($request->hasFile('thumbnail')) {
            $img = $request->file('thumbnail');
            $unique_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(1100,1100)->save('backend/assets/imgs/products/'.$unique_name);
        }

        if ($request->hasFile('hover_img')) {
            $img = $request->file('hover_img');
            $unique_hover = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(1100,1100)->save('backend/assets/imgs/products/'.$unique_hover);
        }

        $product = Product::create([
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'brand_name' => $request->brand_name,
            'sale_price' => $request->sale_price,
            'regular_price' => $request->regular_price,
            'type' => $request->type,
            'MFG' => $request->MFG,
            'LIFE' => $request->LIFE,
            'SKU' => $request->SKU,
            'short_des' => $request->short_des,
            'long_des' => $request->long_des,
            'thumbnail' => $unique_name,
            'hover_img' => $unique_hover,
            'top_selling' => $request->top_selling,
            'trending_product' => $request->trending_product,
            'Recently_added' => $request->Recently_added,
            'top_rateded' => $request->top_rateded,
            'deals_day' => $request->deals_day,
            'deals_date' => $request->deals_date,
            'deals_time' => $request->deals_time,
            'rating_status' => $request->rating_status,

        ]);

        $product->tags()->attach($request->tag_id);

        $multi_product = $request->file('multiple_img');
        foreach ($multi_product as $multi) {
            $unique_multi = hexdec(uniqid()).'.'.$multi->getClientOriginalExtension();
            Image::make($multi)->resize(1100,1100)->save('backend/assets/imgs/products/'.$unique_multi);

            MultiImg::insert([
                'product_id' => $product->id,
                'product_image' =>$unique_multi,
                'created_at' => Carbon::now(),
            ]);
        }

        // subscriber user send new product notification
        $subscribers = Subscriber::all();
        $messageData = [
            'product_name' => $request->product_name,
            'slug' => Str::slug( $request->product_name ),
        ];

        foreach ( $subscribers as $subscriber ) {
            $email = $subscriber->email;
            Mail::send( 'emails.product_email', $messageData, function ( $message ) use ( $email ) {
                $message->to( $email )->subject( 'New Post Added' );
            });
        }

        $notification = array(
            'message' => 'Product Added Successfully',
            'type' => 'success'
        );
        return redirect()->route('all.product')->with($notification);
    }

    public function allProduct(){
        $all_product = Product::with('categories')->orderBy('id','DESC')->get();
        return view('admin.product.all_product',compact('all_product'));
    }

    public function editProduct($id){
        $edit_product = Product::with('categories')->find($id);
        $all_tags = ProductTag::where('status',true)->get();
        $all_cat = ProductCategory::where('status',true)->get();
        $multi_img = MultiImg::where('product_id',$id)->get();
        return view('admin.product.product_edit',compact('edit_product','all_tags','all_cat','multi_img'));
    }

    public function updateProduct(Request $request,$id){
        $update_product = Product::with('categories')->find($id);

        if ($request->hasFile('thumbnail')) {
            $img = $request->file('thumbnail');
            $unique_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(1100,1100)->save('backend/assets/imgs/products/'.$unique_name);
            @unlink('backend/assets/imgs/products/'.$request->old_photo);
        }else{
            $unique_name = $request->old_photo;
        }


        if ($request->hasFile('hover_img')) {
            $img = $request->file('hover_img');
            $unique_hover = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(1100,1100)->save('backend/assets/imgs/products/'.$unique_hover);
            @unlink('backend/assets/imgs/products/'.$request->old_hover);
        }else{
            $unique_hover = $request->old_hover;
        }


        $update_product->category_id = $request->category_id;
        // $update_product->tags->id = $request->tag_id;
        $tags = $request['tag_id'];
        if (isset($tags)) {
            $update_product->tags()->sync($tags);  //If one or more tags is selected associate blog to tagblog
            }
        else {
            $update_product->tags()->detach(); //If no tags is selected remove exisiting role associated to a blogs
            }

        $update_product->product_name = $request->product_name;
        $update_product->brand_name = $request->brand_name;
        $update_product->sale_price = $request->sale_price;
        $update_product->regular_price = $request->regular_price;
        $update_product->type = $request->type;
        $update_product->MFG = $request->MFG;
        $update_product->LIFE = $request->LIFE;
        $update_product->SKU = $request->SKU;
        $update_product->short_des = $request->short_des;
        $update_product->long_des = $request->long_des;
        $update_product->thumbnail = $unique_name;
        $update_product->hover_img = $unique_hover;
        $update_product->top_selling = $request->top_selling;
        $update_product->trending_product = $request->trending_product;
        $update_product->Recently_added = $request->Recently_added;
        $update_product->top_rateded = $request->top_rateded;
        $update_product->deals_day = $request->deals_day;
        $update_product->deals_date = $request->deals_date;
        $update_product->deals_date = $request->deals_date;
        $update_product->deals_time = $request->deals_time;
        $update_product->rating_status = $request->rating_status;
        $update_product->updated_at = Carbon::now();
        $update_product->update();

        $notification = array(
            'message' => 'Product Updated Successfully',
            'type' => 'success'
        );
        return redirect()->route('all.product')->with($notification);
    }

    public function deleteProduct($id){
        $deleteProduct = Product::find($id);
        $deleteProduct->delete();

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }

    public function updateMultiImg(Request $request){
        $imgs = $request->multi_img;

        foreach ($imgs as $id => $img) {
            $multi = MultiImg::find($id);
            unlink('backend/assets/imgs/products/'.$multi->product_image);
            $unique_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(1100, 1100)->save('backend/assets/imgs/products/'.$unique_name);


            $multi->product_image = $unique_name;
            $multi->updated_at = Carbon::now();
            $multi->update();
        }


        $notification = array(
            'message' => 'Product multiple image updated Successfully',
            'type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }

    public function deleteMultiProduct($id){
        $delete = MultiImg::find($id);
        $delete->delete();

        $notification = array(
            'message' => 'Product multiple image deleted Successfully',
            'type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }
    // delete user
    public function userDelete($id){
        $delete_user = User::find($id);
        $delete_user->delete();
        $notification = array(
            'message' => 'User deleted Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
