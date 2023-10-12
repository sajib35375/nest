<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DeliveryInformation;
use Illuminate\Http\Request;

class DeliveryInformationController extends Controller
{
    /**
     * @access private
     * @routes /edit/delivery-information
     * @method GET
     */
    public function editDeliveryInformation(){
        $data = DeliveryInformation::findOrFail(1);
        return view('admin.settings.delivery_information', compact('data'));
    }

    /**
     * @access private
     * @routes /update/delivery-information
     * @method POST
     */
    public function updateDeliveryInformation(Request $request, $id){
        $data = DeliveryInformation::findOrFail($id);
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
