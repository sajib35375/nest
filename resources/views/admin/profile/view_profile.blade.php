@extends('admin.admin_master')

@section('admin')
<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Admin Profile</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-8 col-lg-12 text-center">
            <div class="card text-center p-4">
                <img style="width:200px; height: 200px; " src="{{ (!empty($admin->profile_photo_path))? URL::to('upload/admin_images/'.$admin->profile_photo_path) : URL::to('upload/no_image.jpg') }}" alt="" class="card-img-top mx-auto">
                <div class="card-body">
                    <h5 class="card-title">Name: {{ $admin->name }}</h5>
                    <p class="card-text">Email: {{ $admin->email }}</p>
                    <a href="{{ route('admin.profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
