@extends('admin.admin_master')
@section('admin')

<div class="wrap" style="margin: 30px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Product Category</h2>
                </div>
                <div class="card-body">

                    <form action="{{ route('product.category.update',$edit_pro_cat->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="my-3">
                            <label for="">Name</label>
                            <input name="name" value="{{ $edit_pro_cat->name }}" class="form-control" type="text">

                        </div>
                        <div class="my-3">
                            <label for="">Icon</label></br>
                            <img id="icon" style="width: 150px; height: 150px;" src="{{ URL::to('') }}/frontend/assets/imgs/icon/{{ $edit_pro_cat->icon }}" alt="">
                            <input name="old_icon" value="{{ $edit_pro_cat->icon }}"  type="hidden">
                            <input name="icon" class="form-control-file" type="file">

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
