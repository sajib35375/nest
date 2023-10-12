<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use Illuminate\Http\Request;
use Image;

class SeoController extends Controller
{
    /**
     * @access private
     * @routes /edit/seo
     * @method GET
     */
    public function editSeo(){
        $data = Seo::findOrFail(1);
        return view('admin.settings.seo', compact('data'));
    }

    /**
     * @access private
     * @routes /update/seo
     * @method POST
     */
    public function updateSeo(Request $request, $id){

        $data = Seo::findOrFail($id);

        // Site Logo
        $logo_u = '';
        if ($request->hasFile('logo')) {
            $img = $request->file('logo');
            $logo_u = 'logo'.'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(215,66)->save('upload/theme/'.$logo_u);
            if (file_exists('upload/theme/' . $data->logo) && !empty($data->logo)) {
                unlink('upload/theme/' . $data->logo);
            }
        }else {
            $logo_u = $data->logo;
        }

        // Site Favicon
        $favicon_u = '';
        if ($request->hasFile('favicon')) {
            $img = $request->file('favicon');
            $favicon_u = 'favicon'.'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(78,60)->save('upload/theme/'.$favicon_u);
            if (file_exists('upload/theme/' . $data->favicon) && !empty($data->favicon)) {
                unlink('upload/theme/' . $data->favicon);
            }
        }else {
            $favicon_u = $data->favicon;
        }

        if ($request->hasFile('header')) {
            $img = $request->file('header');
            $unique_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(1744,319)->save('upload/theme/'.$unique_name);
                if ($data->header){
                    unlink('upload/theme/'.$request->old_header);
                }


        }else {
            $unique_name = $request->old_header;
        }


        $data->logo = $logo_u;
        $data->favicon = $favicon_u;
        $data->header = $unique_name;
        $data->footer_title = $request->footer_title;
        $data->footer_address = $request->footer_address;
        $data->footer_phone_no = $request->footer_phone_no;
        $data->footer_email = $request->footer_email;
        $data->office_hours = $request->office_hours;
        $data->footer_copyright_text = $request->footer_copyright_text;
        $data->working_teliphone = $request->working_teliphone;
        $data->support_teliphone = $request->support_teliphone;
        $data->facebook_link = $request->facebook_link;
        $data->twitter_link = $request->twitter_link;
        $data->instagram_link = $request->instagram_link;
        $data->pinterest_link = $request->pinterest_link;
        $data->youtube_link = $request->youtube_link;
        $data->follow_us_title = $request->follow_us_title;
        $data->meta_author = $request->meta_author;
        $data->meta_title = $request->meta_title;
        $data->meta_keyword = $request->meta_keyword;
        $data->meta_description = $request->meta_description;
        $data->google_analytics = $request->google_analytics;
        $data->alexa_analytics = $request->alexa_analytics;
        $data->google_verification = $request->google_verification;
        $data->og_title = $request->og_title;
        $data->og_type = $request->og_type;
        $data->og_url = $request->og_url;
        $data->og_image_link = $request->og_image_link;
        $data->update();

        $notification = array(
            'message' => 'Data updated successful',
            'type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
