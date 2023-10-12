@extends('admin.admin_master')
@section('admin')

<div class="wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Post</h2>
                </div>
                <div class="card-body">

                    <form action="{{ route('update.post',$edit_post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                            @php
                                $cat_arr = [];
                                foreach ($edit_post->categories as $value) {
                                    array_push($cat_arr,$value->id);
                                }
                            @endphp
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Category</label>
                                    <select name="category_id[]" class="form-control multi_tag" multiple="multiple">
                                        @foreach ($all_cat as $cat)
                                            <option {{ in_array($cat->id,$cat_arr) ? 'selected' : '' }} value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('tag_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            @php
                                $tag_arr = [];
                                foreach ($edit_post->tags as $value) {
                                    array_push($tag_arr,$value->id);
                                }
                            @endphp
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Tag</label>
                                    <select name="tag_id[]" class="form-control multi_tag" multiple="multiple">
                                        @foreach ($all_tags as $tag)
                                            <option {{ in_array($tag->id,$tag_arr) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->name }}</option>
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
                                    <input name="title" value="{{ $edit_post->title }}" class="form-control" type="text">
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Post Image</label>
                                    <img id="image" style="width: 200px;height: 200px;" src="{{ URL::to('upload/posts/'.$edit_post->image) }}" alt=""><br>
                                    <input name="old_photo" value="{{ $edit_post->image }}" type="hidden">
                                   <input name="image" class="form-control-file" type="file">
                                   @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Description</label>
                                    <textarea class="form-control"  id="summary-ckeditor" name="description">{{ $edit_post->description }}</textarea>
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

<script src="https://cdn.ckeditor.com/ckeditor5/35.3.1/classic/ckeditor.js"></script>


@endsection
