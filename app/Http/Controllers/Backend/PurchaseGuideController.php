<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PurchaseGuide;
use Illuminate\Http\Request;

class PurchaseGuideController extends Controller
{
    /**
     * @access private
     * @routes /edit/purchase-guide
     * @method GET
     */
    public function editPurchaseGuide(){
        $data = PurchaseGuide::findOrFail(1);
        return view('admin.settings.purchase_guide', compact('data'));
    }

    /**
     * @access private
     * @routes /update/purchase-guide
     * @method POST
     */
    public function updatePurchaseGuide(Request $request, $id){
        $data = PurchaseGuide::findOrFail($id);
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
