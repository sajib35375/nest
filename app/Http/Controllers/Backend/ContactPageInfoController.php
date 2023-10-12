<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContactPageInfo;
use Illuminate\Http\Request;

class ContactPageInfoController extends Controller
{
    /**
     * @access private
     * @routes /edit/contact-page-info
     * @method GET
     */
    public function editContactPageInfo(){
        $data = ContactPageInfo::findOrFail(1);
        return view('admin.settings.contact_page_info', compact('data'));
    }

    /**
     * @access private
     * @routes /update/contact-page-info
     * @method POST
     */
    public function updateContactPageInfo(Request $request, $id){
        $data = ContactPageInfo::findOrFail($id);
        $data->main_title = $request->main_title;
        $data->main_description = $request->main_description;
        $data->sub_title_one = $request->sub_title_one;
        $data->sub_description_one = $request->sub_description_one;
        $data->sub_title_two = $request->sub_title_two;
        $data->sub_description_two = $request->sub_description_two;
        $data->sub_title_three = $request->sub_title_three;
        $data->sub_description_three = $request->sub_description_three;
        $data->sub_title_four = $request->sub_title_four;
        $data->sub_description_four = $request->sub_description_four;
        $data->embded_googlemap_link = $request->embded_googlemap_link;
        $data->office_address = $request->office_address;
        $data->office_phone = $request->office_phone;
        $data->office_email = $request->office_email;
        $data->office_googlemap_url = $request->office_googlemap_url;
        $data->studio_address = $request->studio_address;
        $data->studio_phone = $request->studio_phone;
        $data->studio_email = $request->studio_email;
        $data->studio_googlemap_url = $request->studio_googlemap_url;
        $data->shop_address = $request->shop_address;
        $data->shop_phone = $request->shop_phone;
        $data->shop_email = $request->shop_email;
        $data->shop_googlemap_url = $request->shop_googlemap_url;
        $data->update();

        $notification = array(
            'message' => 'Data updated successful',
            'type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
