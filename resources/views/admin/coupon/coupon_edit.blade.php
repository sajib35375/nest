@extends('admin.admin_master')
@section('admin')

    <div class="wrap" style="margin: 30px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Coupon Edit</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('coupon.update',$edit->id) }}" method="POST">
                            @csrf
                            <div class="my-3">
                                <label for="">Coupon Name</label>
                                <input name="coupon_name" value="{{ $edit->coupon_name }}" class="form-control" type="text">
                                @error('coupon_name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="my-3">
                                <label for="">Coupon Discount</label>
                                <input name="coupon_discount" value="{{ $edit->coupon_discount }}" class="form-control" type="text">
                                @error('coupon_discount')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="my-3">
                                <label for="">Coupon Validity</label>
                                <input name="coupon_validity" value="{{ $edit->discount_date }}" class="form-control" type="date">
                                @error('coupon_validity')
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
