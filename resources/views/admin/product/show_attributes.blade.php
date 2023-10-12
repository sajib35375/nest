@extends('admin.admin_master')
@section('admin')

<div class="wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Single Product Attributes</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Sale Price</th>
                                <th>Regular Price</th>
                                <th>Stock</th>
                                <th>SKU</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pro_attribute as $data)


                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $data->products->product_name }}</td>
                                <td>{{ $data->sale_price }}</td>
                                <td>{{ $data->regular_price }}</td>
                                <td>{{ $data->stock }}</td>
                                <td>{{ $data->sku }}</td>
                                <td>
                                    <a class="btn btn-sm btn-info" href="">Edit</a>
                                    <a id="delete" class="btn btn-sm btn-danger" href="">Delete</a>
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
