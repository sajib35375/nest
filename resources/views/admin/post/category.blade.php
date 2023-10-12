@extends('admin.admin_master')
@section('admin')

<div class="wrap" style="margin: 30px;">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>All Post Category</h2>
                </div>
                <div class="card-body">
                    <table id="table_id" class="table table-stripped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Icon</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_data as $cat)


                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $cat->name }}</td>
                                <td>
                                    @if ($cat->status==true)
                                    <span class="btn btn-sm btn-success" href="">active</span>
                                    @else
                                    <span class="btn btn-sm btn-warning" href="">inactive</span>
                                    @endif
                                </td>
                                <td><img style="width: 100px;height: 100px;" src="{{ URL::to('upload/posts/category/'.$cat->icon) }}"</td>
                                <td>
                                    @if ($cat->status==true)
                                    <a class="btn btn-warning btn-sm" href="{{ route('post.category.inactive',$cat->id) }}">inactive</a>
                                    @else
                                    <a class="btn btn-sm btn-light" href="{{ route('post.category.active',$cat->id) }}">active</a>
                                    @endif
                                    <a id="edit_cat" edit_id={{ $cat->id }} class="btn btn-sm btn-info" href="{{ route('post.category.edit',$cat->id) }}">Edit</a>
                                    <a id="delete" class="btn btn-sm btn-danger" href="{{ route('post.category.delete',$cat->id) }}">Delete</a>
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
                    <h2>Add New Post Category</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('post.category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="my-3">
                            <label for="">Name</label>
                            <input name="name" class="form-control" type="text">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="my-3">
                            <label for="">Icon</label><br>
                            <img id="icon" src="" alt="">
                            <input name="icon" class="form-control-file" type="file">
                            @error('icon')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="my-3">
                            <input value="Add Category" class="btn btn-primary" type="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
