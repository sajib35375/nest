<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    /**
     * @access private
     * @routes /contact-message
     * @method GET
     */
    public function contactMessage(){
        $all_data = ContactForm::latest()->get();
        return view('admin.contact.all_contact_message', compact('all_data'));
    }

    /**
     * @access private
     * @routes /view/contact-message
     * @method GET
     */
    public function viewContactMessage($id){
        $data = ContactForm::findOrFail($id);
        $data->status = true;
        $data->update();
        return view('admin.contact.view_contact_message', compact('data'));
    }

    /**
     * @access private
     * @routes /delete/contact-message
     * @method GET
     */
    public function deleteContactMessage($id){
        $data = ContactForm::findOrFail($id);
        $data->delete();
        $notification = array(
            'message' => 'Data deleted successful',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
