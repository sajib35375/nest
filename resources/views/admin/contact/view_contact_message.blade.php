@extends('admin.admin_master')
@section('admin')

<div class="wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>View Single Contact Message</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">

                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td>{{ $data->name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $data->email }}</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>{{ $data->phone }}</td>
                            </tr>
                            <tr>
                                <td>Subject</td>
                                <td>{{ $data->subject }}</td>
                            </tr>
                            <tr>
                                <td>Message</td>
                                <td>{{ $data->message }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
