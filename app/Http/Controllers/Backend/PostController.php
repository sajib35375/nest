<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Mail;
use Image;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use App\Notifications\NewPostNotifiy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class PostController extends Controller
{

    public function allPost(){
        $all_data = Post::with(['categories', 'tags'])->orderBy('id','DESC')->get();
        return view('admin.post.all_post',compact('all_data'));
    }

    public function addNewPost(){
        $all_tags = Tag::where('status',true)->get();
        $all_cats = Category::where('status',true)->get();
        return view('admin.post.add_post',compact('all_tags','all_cats'));
    }

    public function postStore(Request $request){
        $this->validate($request,[
            'category_id' => 'required',
            'tag_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);

        $unique_name= '';
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $unique_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(873,407)->save('upload/posts/'.$unique_name);
        }

        $post = Post::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'image' => $unique_name
        ]);

        $post->categories()->attach($request->category_id);
        $post->tags()->attach($request->tag_id);

        // subscriber user send new post notification
        $subscribers = Subscriber::all();
        $messageData = [
            'title' => $request->title,
            'slug'  => Str::slug( $request->title ),
        ];

        foreach ( $subscribers as $subscriber ) {
            $email = $subscriber->email;
            Mail::send( 'emails.blog_email', $messageData, function ( $message ) use ( $email ) {
                $message->to( $email )->subject( 'New Post Added' );
            });
        }

        $notification = array(
            'message' => 'Post Added Successfully',
            'type' => 'success'
        );
        return redirect()->route('all.post')->with($notification);
    }

    public function editPost($id){
        $edit_post = Post::with(['categories', 'tags'])->find($id);
        $all_tags = Tag::where('status',true)->get();
        $all_cat = Category::where('status',true)->get();
        return view('admin.post.post_edit',compact('edit_post','all_tags','all_cat'));
    }

    public function updatePost(Request $request,$id){
        $update_post = Post::findOrFail($id);

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $unique_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(1100,1100)->save('upload/posts/'.$unique_name);
            if(file_exists('upload/posts/'.$request->old_photo) && !empty($request->old_photo)){
                unlink('upload/posts/'.$request->old_photo);
            }
        }else{
            $unique_name = $request->old_photo;
        }


        $categories = $request['category_id'];
        if (isset($categories)) {
            $update_post->categories()->sync($categories);  //If one or more tags is selected associate blog to tagblog
            }
        else {
            $update_post->categories()->detach(); //If no tags is selected remove exisiting role associated to a blogs
        }
        // $update_post->tags->id = $request->tag_id;
        $tags = $request['tag_id'];
        if (isset($tags)) {
            $update_post->tags()->sync($tags);  //If one or more tags is selected associate blog to tagblog
            }
        else {
            $update_post->tags()->detach(); //If no tags is selected remove exisiting role associated to a blogs
        }

        $update_post->user_id = Auth::user()->id;
        $update_post->title = $request->title;
        $update_post->slug = Str::slug($request->title);
        $update_post->image = $unique_name;
        $update_post->description = $request->description;
        $update_post->update();

        $notification = array(
            'message' => 'Post Updated Successfully',
            'type' => 'success'
        );
        return redirect()->route('all.post')->with($notification);
    }

    public function deletePost($id){
        $delete = Post::find($id);
        $delete->delete();

        $notification = array(
            'message' => 'Post Deleted Successfully',
            'type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }

    public function postView($id){
        $data = Post::with(['categories', 'tags'])->find($id);
        return view('admin.post.post_view',compact('data'));
    }

    public function postActive($id){
        $active = Post::find($id);
        $active->status = true;
        $active -> update();

        $notification = array(
            'message' => 'Post Active Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function postInactive($id){
        $active = Post::find($id);
        $active->status = false;
        $active -> update();

        $notification = array(
            'message' => 'Post Inactive Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
