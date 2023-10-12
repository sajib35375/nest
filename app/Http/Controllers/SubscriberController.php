<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class SubscriberController extends Controller
{
    /**
     * @access public
     * @routes /subscriber
     * @method POST
     */
    public function storeSubscriber(Request $request) {
        $this->validate($request, [
            'email' => 'required'
        ],[
            'email.required' => 'Email field is required'
        ]);

        Subscriber::create([
            'email' => $request->email
        ]);

        return redirect()->back()->with('success', 'Subscription successfully done :)');
    }

    /**
     * @access private
     * @routes /all-subscriber
     * @method GET
     */
    public function allSubscriber(Request $request) {
        $all_data = Subscriber::latest()->get();
        return view('admin.subscriber.all_subscriber', compact('all_data'));
    }

    /**
     * @access private
     * @routes /delete-subscriber
     * @method GET
     */
    public function deleteSubscriber($id) {
        $data = Subscriber::findOrFail($id);
        $data->delete();
        $notification = [
            "message" => "Subscriber deleted successfully",
            "type" => "success"
        ];
        return redirect()->back()->with($notification);
    }
}
