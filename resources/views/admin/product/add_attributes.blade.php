@extends('admin.admin_master')
@section('admin')



<div class="wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Add New Product Attribute</h2>
                </div>
                <div class="card-body">

                    <form id="productForm" @if(empty($product_data)) action="{{ url('admin/add-attribute') }}" @endif method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_name">Product Name: </label>
                                        {{ $product_data->product_name }}
                                    </div>
                                    <div class="form-group">
                                        <label for="product_code">Product SKU: </label>
                                        {{ $product_data->SKU }}
                                    </div>

                                    <div class="form-group">
                                        <label for="product_color">Product Sale Price: </label>
                                        {{ $product_data->sale_price }}
                                    </div>
                                    <div class="form-group">
                                        <label for="product_color">Product Regular Price: </label>
                                       {{ $product_data->regular_price }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        @if(!empty($product_data->thumbnail ))
                                            <img style="width: 120px;" src="{{ URL::to('backend/assets/imgs/products/'.$product_data->thumbnail ) }}" alt="">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="field_wrapper">
                                            <div>
                                                <input type="text" name="weight[]" value="" placeholder="Weight" style="width: 120px" required />
                                                <input type="text" name="sku[]" value="" placeholder="SKU" style="width: 120px" required />
                                                <input type="number" name="sale_price[]" value="" placeholder="Sale Price" style="width: 120px" required />
                                                <input type="number" name="regular_price[]" value="" placeholder="Regular Price" style="width: 120px" required />
                                                <input type="text" name="color[]" value="" placeholder="Color" style="width: 120px" required />
                                                <input type="number" name="stock[]" value="" placeholder="Stock" style="width: 120px" required />
                                                <a href="javascript:void(0);" title="Add" class="add_button btn btn-rounded btn-success btn-sm" title="Add field">Add</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Add Attribute</button>
                        </div>
                      </form>


                      <form action="{{ url('/edit-attribute') }}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                            <h3 class="card-title">Added Product Attributes</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                            <table id="sections" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                <th>ID</th>
                                <th>Weight</th>
                                <th>Color</th>
                                <th>SKU</th>
                                <th>Sale Price</th>
                                <th>Regular Price</th>
                                <th>Stock</th>
                                <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($product_data->attributes as $data)
                                <input type="text" style="display: none;" name="attrId[]" value="{{ $data->id }}">
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $data->weight }}</td>
                                    <td>{{ $data->color }}</td>
                                    <td>{{ $data->sku }}</td>
                                    <td>
                                        <input type="number" name="sale_price[]" value="{{ $data->sale_price }}">
                                    </td>
                                    <td>
                                        <input type="number" name="regular_price[]" value="{{ $data->regular_price }}">
                                    </td>
                                    <td>
                                        <input type="number" name="stock[]" value="{{ $data->stock }}">
                                    </td>

                                    <td>
                                        <a title="Delete Attribute" href="javascript:void(0)" class="confirmDelete btn btn-sm btn-danger" record="attribute" recordId="{{ $data->id }}">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Update Attribute</button>
                            </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>






@endsection
