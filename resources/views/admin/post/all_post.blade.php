@extends('admin.admin_master')
@section('admin')

<div class="wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>All Post</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered" id="table_id">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Post Title</th>
                                <th>Category</th>
                                <th>Tag</th>
                                <th>Status</th>
                                <th>Post Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_data as $data)


                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ Str::words($data->title, 5, '...') }}</td>
                                <td>
                                    @foreach ($data->categories as $cat)
                                        {{ $cat->name }},
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($data->tags as $tag)
                                        {{ $tag->name }},
                                    @endforeach
                                </td>
                                <td>
                                    @if ($data->status==true)
                                    <span class="btn btn-sm btn-success" href="">active</span>
                                    @else
                                    <span class="btn btn-sm btn-warning" href="">inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <img style="width: 80px;height: 80px;" src="{{ URL::to('upload/posts/'.$data->image) }}" alt="">
                                </td>
                                <td>
                                    @if ($data->status==true)
                                    <a class="btn btn-warning btn-sm mb-2" href="{{ route('post.inactive',$data->id) }}">inactive</a>
                                    @else
                                    <a class="btn btn-sm btn-light mb-2" href="{{ route('post.active',$data->id) }}">active</a>
                                    @endif
                                    <a class="btn btn-sm btn-info mb-2" href="{{ route('edit.post',$data->id) }}">Edit</a>
                                    <a class="btn btn-sm btn-success mb-2" href="{{ route('view.post',$data->id) }}">View</a>
                                    <a id="delete" class="btn btn-sm btn-danger mb-2" href="{{ route('delete.posts',$data->id) }}">Delete</a>
                                </td>

                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>






@endsection
