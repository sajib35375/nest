<?php

namespace App\Http\Controllers\Backend;

use Image;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function postCategory(){
        $all_data = Category::latest()->get();
        return view('admin.post.category',compact('all_data'));
    }

    public function postCategoryStore(Request $request){
        $this->validate($request,[
            'name' => 'required'
        ]);

        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $unique_name = hexdec(uniqid()).'.'.$icon->getClientOriginalExtension();
            Image::make($icon)->resize(80,80)->save('upload/posts/category/'.$unique_name);
        }

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'icon' => $unique_name
        ]);

        $notification = array(
            'message' => 'Post Category Added Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function postCategoryActive($id){
        $active = Category::find($id);
        $active->status = true;
        $active -> update();

        $notification = array(
            'message' => 'Post Category Active Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function postCategoryInactive($id){
        $active = Category::find($id);
        $active->status = false;
        $active -> update();

        $notification = array(
            'message' => 'Post Category Inactive Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function postCategoryEdit($id){
         $data = Category::find($id);
         return view('admin.post.category_edit',compact('data'));
    }

    public function postCategoryUpdate(Request $request,$id){
        $data = Category::find($id);
        $unique_name = '';
        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $unique_name = hexdec(uniqid()).'.'.$icon->getClientOriginalExtension();
            Image::make($icon)->resize(80,80)->save('upload/posts/category/'.$unique_name);
            if(file_exists('upload/posts/category/'.$request->old_icon) && !empty($data->icon)){
                unlink('upload/posts/category/'.$request->old_icon);
            }
        }else{
            $unique_name = $request->old_icon;
        }

        $data->name = $request->name;
        $data->slug = Str::slug($request->name);
        $data->icon = $unique_name;
        $data->update();

        $notification = array(
            'message' => 'Post Category Updated Successfully',
            'type' => 'success'
        );
        return redirect()->route('post.category')->with($notification);
    }

    public function postCategoryDelete($id){
        $delete_pro_cat = Category::find($id);
        $delete_pro_cat->delete();

        $notification = array(
            'message' => 'Post Category Deleted Successfully',
            'type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }
}
