@extends('admin.admin_master')
@section('admin')

<div class="wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>All Product</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Sale Price</th>
                                <th>Regular Price</th>
                                <th>Discount(%)</th>
                                <th>Product Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_product as $data)
                                @php
                                $discount = ( $data->regular_price - $data->sale_price )*100/($data->regular_price)
                            @endphp
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ @$data->product_name }}</td>
                                <td>{{ @$data->categories->name }}</td>
                                <td>{{ @$data->sale_price }}</td>
                                <td>{{ @$data->regular_price }}</td>
                                <td>{{ round($discount) }}%</td>
                                <td><img style="width: 80px;height: 80px;" src="{{ URL::to('') }}/backend/assets/imgs/products/{{ $data->thumbnail }}" alt=""></td>
                                <td>
                                    <a class="btn btn-sm btn-info" href="{{ route('edit.product',$data->id) }}">Edit</a>
                                    <a class="btn btn-sm btn-warning" href="{{ url('/add-attribute/'. $data->id) }}">Add Attribute</a>
                                    <a class="btn btn-sm btn-success" href="{{ route('show.attributes',$data->id) }}">Show Attribute</a>
                                    <a id="delete" class="btn btn-sm btn-danger" href="{{ route('delete.products',$data->id) }}">Delete</a>
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
