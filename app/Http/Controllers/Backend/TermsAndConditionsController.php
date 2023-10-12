<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TermsAndConditions;
use Illuminate\Http\Request;

class TermsAndConditionsController extends Controller
{
    /**
     * @access private
     * @routes /edit/terms-conditions
     * @method GET
     */
    public function editTermsConditions(){
        $data = TermsAndConditions::findOrFail(1);
        return view('admin.settings.terms_conditions', compact('data'));
    }

    /**
     * @access private
     * @routes /update/terms-conditions
     * @method POST
     */
    public function updateTermsConditions(Request $request, $id){
        $data = TermsAndConditions::findOrFail($id);
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
