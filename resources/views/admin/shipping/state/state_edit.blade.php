@extends('admin.admin_master')
@section('admin')

    <div class="wrap" style="margin: 30px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit State</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('state.update',$edit_state->id) }}" method="POST">
                            @csrf
                            <div class="my-3">
                                <label for="">Division Name</label>
                                <select class="form-control" name="division_id">
                                    @foreach($all_div as $div)
                                        <option {{ $edit_state->division_id == $div->id ? 'selected': '' }} value="{{ $div->id }}">{{ $div->division_name }}</option>
                                    @endforeach
                                </select>
                                @error('division_id')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="my-3">
                                <label for="">District Name</label>
                                <select class="form-control" name="district_id">
                                    @foreach($all_dis as $dis)
                                    <option {{ $edit_state->district_id == $dis->id ? 'selected': '' }} value="{{ $dis->id }}">{{ $dis->district_name }}</option>
                                    @endforeach
                                </select>
                                @error('district_id')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="my-3">
                                <label for="">State Name</label>
                                <input name="state_name" value="{{ $edit_state->state_name }}" class="form-control" type="text">
                                @error('state_name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="my-3">
                                <label for="">Delivery Charge</label>
                                <input name="delivery_charge" value="{{ $edit_state->delivery_charge }}" class="form-control" type="text">
                                @error('delivery_charge')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="my-3">
                                <input class="btn btn-primary" type="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>







@endsection
