@extends('admin.admin_master')
@section('admin')
<div class="wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Add New Post</h2>
                </div>
                <div class="card-body">

                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Category</label>
                                    <select name="category_id[]" class="form-control multi_tag" name="" multiple="multiple">
                                        @foreach ($all_cats as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach

                                    </select>
                                    @error('category_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Tag</label>
                                    <select name="tag_id[]" class="form-control multi_tag" multiple="multiple">
                                        @foreach ($all_tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('tag_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Post Title</label>
                                    <input name="title" class="form-control" type="text">
                                    @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Post Image</label>
                                    <img id="image" src="" alt=""><br>
                                   <input name="image" class="form-control-file" type="file">
                                   @error('image')
                                   <p class="text-danger">{{ $message }}</p>
                               @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Post Description</label>
                                    <textarea class="form-control" id="summary-ckeditor" name="description" rows="10"></textarea>
                                    @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <input value="Add New Post" class="btn btn-primary" type="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://cdn.ckeditor.com/ckeditor5/35.3.1/classic/ckeditor.js"></script>


@endsection
