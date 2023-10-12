@extends('admin.admin_master')
@section('admin')

<div class="wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>All Subscriber</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered" id="table_id">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_data as $data)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td>{{ $data->updated_at }}</td>
                                    <td>
                                        <a id="delete" class="btn btn-sm btn-danger mb-2" href="{{ route('delete.subscriber',$data->id) }}">Delete</a>
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
