<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    /**
     * @access private
     * @routes /edit/privacy-policy
     * @method GET
     */
    public function editPrivacyPolicy(){
        $data = PrivacyPolicy::findOrFail(1);
        return view('admin.settings.privacy_policy', compact('data'));
    }

    /**
     * @access private
     * @routes /update/privacy-policy
     * @method POST
     */
    public function updatePrivacyPolicy(Request $request, $id){
        $data = PrivacyPolicy::findOrFail($id);
        $data->title = $request->title;
        $data->created_by = $request->created_by;
        $data->description = $request->description;
        $data->update();

        $notification = array(
            'message' => 'Data updated successful',
            'type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
