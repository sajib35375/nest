<?php

namespace App\Http\Controllers\Backend;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function postTags(){
        $all_data = Tag::latest()->get();
        return view('admin.post.tags',compact('all_data'));
    }

    public function postTagsStore(Request $request){
        $this->validate($request,[
            'name' => 'required'
        ]);

        Tag::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        $notification = array(
            'message' => 'Post Tag Added Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function postTagActive($id){
        $active = Tag::find($id);
        $active->status = true;
        $active -> update();

        $notification = array(
            'message' => 'Post Tag Active Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function postTagInactive($id){
        $active = Tag::find($id);
        $active->status = false;
        $active -> update();

        $notification = array(
            'message' => 'Post Tag Inactive Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function postTagEdit($id){
        $edit_tag = Tag::find($id);
        return view('admin.post.tag_edit',compact('edit_tag'));
    }

    public function postTagUpdate(Request $request,$id){
        $update_tag = Tag::find($id);

        $update_tag->name = $request->name;
        $update_tag->update();

        $notification = array(
            'message' => 'Post Tag Updated Successfully',
            'type' => 'success'
        );
        return redirect()->route('post.tag')->with($notification);
    }

    public function postTagDelete($id){
        $delete_tag = Tag::find($id);
        $delete_tag->delete();

        $notification = array(
            'message' => 'Post Tag Deleted Successfully',
            'type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }
}
