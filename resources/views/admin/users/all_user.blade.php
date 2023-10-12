@extends('admin.admin_master')
@section('admin')


    <div class="wrap" style="margin: 30px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>All Users</h2>
                    </div>
                    <div class="card-body">
                        <table id="table_id" class="table table-stripped table-bordered">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)


                                <tr>
                                    <td><img src="{{ (!empty($user->profile_photo_path))? URL::to('upload/userImages/'.$user->profile_photo_path) : URL::to('upload/no_image.jpg') }}" alt="" class="user_image" width="50px"
                                        height="50px"></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        @if($user->userOnline())
                                            <span class="badge rounded-sm bg-success">Active Now</span>
                                        @else
                                            <span class="badge rounded-sm bg-danger">{{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a id="delete" class="btn btn-sm btn-danger" href="{{ route('user.delete',$user->id) }}">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
