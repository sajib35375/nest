<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Models\State;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function divisionView(){
        $all_div = Division::latest()->get();
        return view('admin.shipping.division.division',compact('all_div'));
    }

    public function divisionStore(Request $request){
        $this->validate($request,[
            'division_name' => 'required'
        ]);

        Division::insert([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Division Inserted Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function divisionEdit($id){
        $edit = Division::find($id);
        return view('admin.shipping.division.division_edit',compact('edit'));
    }
    public function divisionUpdate(Request $request,$id){
        $update = Division::find($id);
        $update->division_name = $request->division_name;
        $update->updated_at = Carbon::now();
        $update->update();

        $notification = array(
            'message' => 'Division Updated Successfully',
            'type' => 'success'
        );
        return redirect()->route('division.view')->with($notification);
    }
    public function divisionDelete($id){
        $delete = Division::find($id);
        $delete->delete();
        $notification = array(
            'message' => 'Division Deleted Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function districtView(){
        $all_dis = District::latest()->get();
        $all_div = Division::latest()->get();
        return view('admin.shipping.district.district_view',compact('all_dis','all_div'));
    }

    public function districtStore(Request $request){
        $this->validate($request,[
            'division_id' => 'required',
            'district_name' => 'required'
        ]);

        District::insert([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'District Added Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function districtEdit($id){
        $edit = District::find($id);
        $all_div = Division::latest()->get();
        return view('admin.shipping.district.district_edit',compact('edit','all_div'));
    }

    public function districtUpdate(Request $request,$id){
        $update = District::find($id);
        $update->division_id = $request->division_id;
        $update->district_name = $request->district_name;
        $update->updated_at = Carbon::now();
        $update->update();

        $notification = array(
            'message' => 'District Updated Successfully',
            'type' => 'success'
        );
        return redirect()->route('district.view')->with($notification);
    }

    public function districtDelete($id){
        $delete = District::find($id);
        $delete->delete();

        $notification = array(
            'message' => 'District Deleted Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function stateView(Request $request){
        $all_dis = District::latest()->get();
        $all_div = Division::latest()->get();
        $all_state = State::latest()->get();
        return view('admin.shipping.state.state',compact('all_div','all_dis','all_state'));
    }


    public function districtLoad($id){
        return $id;
       $district = District::where('division_id',$id)->get();
        return response()->json($district);
    }

    public function stateStore(Request $request){
        $this->validate($request,[
            'division_id' => 'required',
            'district_id' => 'required',
            'state_name' => 'required'
        ]);
        State::insert([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'delivery_charge' => $request->delivery_charge,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'State Inserted Successfully',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function stateEdit($id){
        $edit_state = State::find($id);
        $all_div = Division::latest()->get();
        $all_dis = District::latest()->get();
        return view('admin.shipping.state.state_edit',compact('edit_state','all_div','all_dis'));
    }

    public function stateEditDistrictLoad($id){
        $district = District::where('division_id',$id)->get();
        return response()->json($district);
    }

    public function stateUpdate(Request $request,$id){
        $update_state = State::find($id);
        $update_state->division_id = $request->division_id;
        $update_state->district_id = $request->district_id;
        $update_state->state_name = $request->state_name;
        $update_state->delivery_charge = $request->delivery_charge;
        $update_state->updated_at = Carbon::now();
        $update_state->update();

        $notification = array(
            'message' => 'State Updated Successfully',
            'type' => 'success'
        );
        return redirect()->route('state.view')->with($notification);
    }

    public function stateDelete($id){
        $delete = State::find($id);
        $delete->delete();

        $notification = array(
            'message' => 'State Deleted Successfully',
            'type' => 'success'
        );
        return redirect()->route('state.view')->with($notification);
    }




}
