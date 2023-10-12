@extends('admin.admin_master')
@section('admin')

    <div class="wrap" style="margin: 30px;">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>All State</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-stripped table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Division Name</th>
                                <th>District Name</th>
                                <th>State Name</th>
                                <th>Delivery_charge</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($all_state as $item)


                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->division->division_name }}</td>
                                    <td>{{ $item->district->district_name }}</td>
                                    <td>{{ $item->state_name }}</td>
                                    <td>{{ $item->delivery_charge }}</td>
                                    <td>

                                        <a class="btn btn-sm btn-info" href="{{ route('state.edit',$item->id) }}">Edit</a>
                                        <a id="delete" class="btn btn-sm btn-danger" href="{{ route('state.delete',$item->id) }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h2>Add New State</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('state.store') }}" method="POST">
                            @csrf
                            <div class="my-3">
                                <label for="">Division Name</label>
                                <select class="form-control" id="division_id" name="division_id">
                                    <option value="">-select-</option>
                                    @foreach($all_div as $div)
                                        <option value="{{ $div->id }}">{{ $div->division_name }}</option>
                                    @endforeach
                                </select>
                                @error('division_id')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="my-3">
                                <label for="">District Name</label>
                                <select class="form-control" name="district_id">

                                </select>
                                @error('district_id')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="my-3">
                                <label for="">State Name</label>
                                <input name="state_name" class="form-control" type="text">
                                @error('state_name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="my-3">
                                <label for="">Delivery Charge</label>
                                <input name="delivery_charge" class="form-control" type="text">
                                @error('charge')
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
