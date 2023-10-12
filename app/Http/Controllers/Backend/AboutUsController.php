<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Image;

class AboutUsController extends Controller
{
    /**
     * @access private
     * @routes /edit/about-us
     * @method GET
     */
    public function editAboutUs(){
        $data = AboutUs::findOrFail(1);
        return view('admin.settings.about_us', compact('data'));
    }

    /**
     * @access private
     * @routes /update/about-us
     * @method POST
     */
    public function updateAboutUs(Request $request, $id){

        $data = AboutUs::findOrFail($id);

        // welcome image
        $welcome_image_u = '';
        if ($request->hasFile('welcome_image')) {
            $img = $request->file('welcome_image');
            $welcome_image_u = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(1292,1472)->save('upload/about/'.$welcome_image_u);
            if (file_exists('upload/about/' . $data->welcome_image) && !empty($data->welcome_image)) {
                unlink('upload/about/' . $data->welcome_image);
            }
        }else {
            $welcome_image_u = $data->welcome_image;
        }

        // performance image one
        $performance_image_one_u = '';
        if ($request->hasFile('performance_image_one')) {
            $img = $request->file('performance_image_one');
            $performance_image_one_u = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(1165,863)->save('upload/about/'.$performance_image_one_u);
            if (file_exists('upload/about/' . $data->performance_image_one) && !empty($data->performance_image_one)) {
                unlink('upload/about/' . $data->performance_image_one);
            }
        }else {
            $performance_image_one_u = $data->performance_image_one;
        }


         // welcome gallery image
         $w_gallery_unique_name_u = [];
         if ($request->hasFile('welcome_gallery')) {
             $images = $request->file('welcome_gallery');
             foreach ($images as $image) {
                 $gallery_unique_name = md5(time() . rand()) . '.' . $image->getClientOriginalExtension();
                 $extension = pathinfo($gallery_unique_name, PATHINFO_EXTENSION);
                 $valid_extension = array('jpg', 'jpeg', 'png', 'gif', 'webp');
                 if (in_array($extension, $valid_extension)) {
                     array_push($w_gallery_unique_name_u, $gallery_unique_name);
                     Image::make($image)->resize(366,448)->save('upload/about/'.$gallery_unique_name);
                 } else {
                     return response()->json([
                         'error' => 'Invalid file format! '
                     ]);
                 }
                //  if(!empty($data->welcome_gallery)){
                //     foreach ($data->welcome_gallery as $gallery) {
                //         if (file_exists('upload/about/' . $gallery) && !empty($gallery)) {
                //             unlink('upload/about/' . $gallery);
                //         }
                //     }
                //  }

             }
         } else {
             $w_gallery_unique_name_u = json_decode($data->welcome_gallery);
         }

         $about_data = json_decode($data->provide);
         $provide_logo = @$about_data->provide_logo;

         // provide_logo image
         $provide_logo_unique_name_u = [];
         if ($request->hasFile('provide_logo')) {
             $images = $request->file('provide_logo');
             foreach ($images as $image) {
                 $gallery_unique_name = md5(time() . rand()) . '.' . $image->getClientOriginalExtension();
                 $extension = pathinfo($gallery_unique_name, PATHINFO_EXTENSION);
                 $valid_extension = array('jpg', 'jpeg', 'png', 'gif', 'webp', 'svg');
                 if (in_array($extension, $valid_extension)) {
                     array_push($provide_logo_unique_name_u, $gallery_unique_name);
                     Image::make($image)->save('upload/about/'.$gallery_unique_name);
                 } else {
                     return response()->json([
                         'error' => 'Invalid file format! '
                     ]);
                 }
                 if(!empty($data->provide_logo)){
                    foreach ($data->provide_logo as $gallery) {
                        if (file_exists('upload/about/' . $gallery) && !empty($gallery)) {
                            unlink('upload/about/' . $gallery);
                        }
                    }
                 }

             }
         } else {
             $provide_logo_unique_name_u = $provide_logo;
         }

        $provide_data = [];
        if(!empty($request->provide_title)){
            foreach($request->provide_title as $key => $pro){
                $provide_data['provide_logo'] = $provide_logo_unique_name_u;
                $provide_data['provide_title'] = $request->provide_title;
                $provide_data['provide_description'] = $request->provide_description;
            }
        }else {
            $provide_data = $data->provide;
        }

        $data->welcome_title = $request->welcome_title;
        $data->welcome_description = $request->welcome_description;
        $data->welcome_image = $welcome_image_u;
        $data->welcome_gallery = json_encode($w_gallery_unique_name_u);
        $data->provide = json_encode($provide_data);
        $data->performance_title = $request->performance_title;
        $data->performance_description = $request->performance_description;
        $data->performance_image_one = $performance_image_one_u;
        $data->who_we_are_description = $request->who_we_are_description;
        $data->our_history_description = $request->our_history_description;
        $data->our_mission_description = $request->our_mission_description;
        $data->glorious_years = $request->glorious_years;
        $data->happy_clients = $request->happy_clients;
        $data->projects_complate = $request->projects_complate;
        $data->team_advisor = $request->team_advisor;
        $data->products_sale = $request->products_sale;
        $data->update();

        $notification = array(
            'message' => 'Data updated successful',
            'type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
