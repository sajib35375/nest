@extends('admin.admin_master')
@section('admin')

<div class="wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Terms & Conditions</h2>
                </div>
                <div class="card-body">

                    <form action="{{ route('update.terms-conditions',$data->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="col-md-8">
                                <div class="my-3">
                                    <label for="">Title</label>
                                    <input name="title" value="{{ $data->title }}" class="form-control" type="text">
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="my-3">
                                    <label for="">Created By</label>
                                    <input name="created_by" value="{{ $data->created_by }}" class="form-control" type="text">
                                    @error('created_by')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Description</label>
                                    <textarea class="form-control"  id="summary-ckeditor" name="description">{{ $data->description }}</textarea>
                                    @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input value="Update" class="btn btn-primary" type="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
