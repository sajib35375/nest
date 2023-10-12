@extends('admin.admin_master')
@section('admin')

    <div class="wrap" style="margin: 30px;">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>All Division</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-stripped table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Division Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($all_div as $item)


                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->division_name }}</td>
                                    <td>

                                        <a class="btn btn-sm btn-info" href="{{ route('division.edit',$item->id) }}">Edit</a>
                                        <a id="delete" class="btn btn-sm btn-danger" href="{{ route('division.delete',$item->id) }}">Delete</a>
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
                        <h2>Add New Division</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('division.store') }}" method="POST">
                            @csrf

                            <div class="my-3">
                                <label for="">Division Name</label>
                                <input name="division_name" class="form-control" type="text">
                                @error('division_name')
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
