@extends('admin.admin_master')
@section('admin')

    <div class="wrap" style="margin: 30px;">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>All Coupon</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-stripped table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Coupon Name</th>
                                <th>Coupon Discount</th>
                                <th>Coupon Validity</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($coupons as $coupon)


                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $coupon->coupon_name }}</td>
                                    <td>{{ $coupon->coupon_discount }}%</td>
                                    <td>{{ $coupon->discount_date }}</td>
                                    <td>
                                        @if ($coupon->discount_date > \Carbon\Carbon::now())
                                            <span class="btn btn-sm btn-success">active</span>
                                        @else
                                            <span class="btn btn-sm btn-warning">inactive</span>
                                        @endif
                                    </td>
                                    <td>

                                        <a class="btn btn-sm btn-info" href="{{ route('coupon.edit',$coupon->id) }}">Edit</a>
                                        <a id="delete" class="btn btn-sm btn-danger" href="{{ route('coupon.delete',$coupon->id) }}">Delete</a>
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
                        <h2>Add New Coupon</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('coupon.store') }}" method="POST">
                            @csrf
                            <div class="my-3">
                                <label for="">Coupon Name</label>
                                <input name="coupon_name" class="form-control" type="text">
                                @error('coupon_name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="my-3">
                                <label for="">Coupon Discount</label>
                                <input name="coupon_discount" class="form-control" type="text">
                                @error('coupon_discount')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="my-3">
                                <label for="">Coupon Validity</label>
                                <input name="coupon_validity" class="form-control" type="date">
                                @error('coupon_validity')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="my-3">
                                <input value="Add Coupon" class="btn btn-primary" type="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
