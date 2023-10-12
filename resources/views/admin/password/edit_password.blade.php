@extends('admin.admin_master')

@section('admin')
<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Admin Change Password</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-8 col-lg-12">
            <div class="card p-4">
                <div class="card-header">
                    <h5>Change Password</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.password.update') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Current Password</label>
                            <input id="current_password" type="password" name="current_password" class="form-control">
                            @error('current_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">New Password</label>
                            <input id="password" type="password" name="password" class="form-control">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control">
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-20">
                            <input type="submit" class="btn btn-primary" value="Saved">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
