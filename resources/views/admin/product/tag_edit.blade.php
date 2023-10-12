@extends('admin.admin_master')
@section('admin')

<div class="wrap" style="margin: 30px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Product Tag</h2>
                </div>
                <div class="card-body">

                    <form action="{{ route('product.tag.update',$edit_tag->id) }}" method="POST">

                        @csrf
                        <div class="my-3">
                            <label for="">Name</label>
                            <input name="name" value="{{ $edit_tag->name }}" class="form-control" type="text">

                        </div>
                        <div class="my-3">
                            <input value="Update" class="btn btn-primary" type="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection
