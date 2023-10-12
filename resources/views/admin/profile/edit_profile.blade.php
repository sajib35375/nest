@extends('admin.admin_master')
@section('admin')


<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Edit Your Profile</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-8 col-lg-12">
            <div class="card p-4">
                <div class="card-header">
                    <h5>Edit Profile</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $admin->name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $admin->email }}">
                        </div>
                        <div class="form-group">
                            <label for="">Profile Photo</label>
                            <input type="file" name="profile_photo_path" class="form-control" id="image">
                        </div>
                        <div class="form-group">
                            <img id="showImage" src="{{ (!empty($admin->profile_photo_path)) ? URL::to('upload/admin_images/'.$admin->profile_photo_path) : URL::to('upload/no_image.jpg') }}" alt="" style="width: 100px; height: 100px;">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
