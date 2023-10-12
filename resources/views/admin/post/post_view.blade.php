@extends('admin.admin_master')
@section('admin')

<div class="wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Single Post View</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="20%">#</th>
                                <th>Data Information</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Post Title</td>
                                <td>{{ $data->title }}</td>
                            </tr>
                            <tr>
                                <td>Post Slug</td>
                                <td>{{ $data->slug }}</td>
                            </tr>
                            <tr>
                                <td>Categories</td>
                                <td>
                                    @foreach ($data->categories as $cat)
                                        {{ $cat->name }},
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>Tags</td>
                                <td>
                                    @foreach ($data->tags as $tag)
                                        {{ $tag->name }},
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>Post Image</td>
                                <td><img src="{{ URL::to('upload/posts/'.$data->image) }}" alt="" style="width: 100px;"></td>
                            </tr>

                            <tr>
                                <td>Post Description</td>
                                <td>
                                    {!! htmlspecialchars_decode($data->description) !!}
                                </td>
                            </tr>
                            <tr>
                                <td>Post Views</td>
                                <td>{{ $data->views }}</td>
                            </tr>
                            <tr>
                                <td>Post Status</td>
                                <td>
                                    @if ($data->status==true)
                                        <span class="btn btn-sm btn-success" href="">active</span>
                                    @else
                                        <span class="btn btn-sm btn-warning" href="">inactive</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
