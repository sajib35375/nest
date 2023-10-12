@extends('admin.admin_master')
@section('admin')

    <div class="wrap" style="margin: 30px;">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>All Post Tag</h2>
                    </div>
                    <div class="card-body">
                        <table id="table_id" class="table table-stripped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_data as $tag)


                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td>
                                        @if ($tag->status==true)
                                        <span class="btn btn-sm btn-success">active</span>
                                        @else
                                        <span class="btn btn-sm btn-warning">inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($tag->status==true)
                                        <a class="btn btn-warning btn-sm" href="{{ route('post.tag.inactive',$tag->id) }}">inactive</a>
                                        @else
                                        <a class="btn btn-sm btn-light" href="{{ route('post.tag.active',$tag->id) }}">active</a>
                                        @endif
                                        <a id="edit_cat" class="btn btn-sm btn-info" href="{{ route('post.tag.edit',$tag->id) }}">Edit</a>
                                        <a id="delete" class="btn btn-sm btn-danger" href="{{ route('post.tag.delete',$tag->id) }}">Delete</a>
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
                        <h2>Add New Post Tag</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('post.tag.store') }}" method="POST">
                            @csrf
                            <div class="my-3">
                                <label for="">Name</label>
                                <input name="name" class="form-control" type="text">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="my-3">
                                <input value="Add Tag" class="btn btn-primary" type="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
