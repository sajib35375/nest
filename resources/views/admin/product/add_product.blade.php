@extends('admin.admin_master')
@section('admin')


<div class="wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Add New Product</h2>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <p class="text-danger">{{ $errors->first() }}</p>
                    @endif

                    <form id="product" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Category</label>
                                    <select name="category_id" class="form-control" name="" id="">
                                        <option value="">-Select-</option>
                                        @foreach ($all_cat as $cat)
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
                                    <select name="tag_id[]" class="form-control" multiple="multiple" id="multi_tag">
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
                                    <label for="">Product Name</label>
                                    <input name="product_name" class="form-control" type="text">
                                    @error('product_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Brand Name</label>
                                    <input name="brand_name" class="form-control" type="text">
                                    @error('brand_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Sale Price</label>
                                    <input name="sale_price" class="form-control" type="text">
                                    @error('sale_price')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Regular Price</label>
                                   <input name="regular_price" class="form-control" type="text">
                                   @error('regular_price')
                                   <p class="text-danger">{{ $message }}</p>
                               @enderror
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Type</label>
                                    <input name="type" class="form-control" type="text">
                                    @error('type')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">MFG</label>
                                   <input name="MFG" class="form-control" type="date">
                                   @error('MFG')
                                   <p class="text-danger">{{ $message }}</p>
                               @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">LIFE</label>
                                    <input name="LIFE" class="form-control" type="text">
                                    @error('LIFE')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">SKU</label>
                                   <input name="SKU" class="form-control" type="text">
                                   @error('SKU')
                                   <p class="text-danger">{{ $message }}</p>
                               @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Rating Status</label>
                                   <input name="rating_status" class="form-control" type="text">
                                   @error('rating_status')
                                   <p class="text-danger">{{ $message }}</p>
                               @enderror
                                </div>
                            </div

                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Product Thumbnail</label>
                                    <img id="thumbnail" src="" alt=""><br>
                                   <input name="thumbnail" class="form-control-file" type="file">
                                   @error('thumbnail')
                                   <p class="text-danger">{{ $message }}</p>
                               @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Product Multiple Image</label>
                                    <br>
                                    <div id="multipic"></div>
                                   <input id="multi" name="multiple_img[]" multiple class="form-control-file" type="file">
                                   @error('multiple_img')
                                   <p class="text-danger">{{ $message }}</p>
                               @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Hover Image</label><br>
                                    <img id="hover" src="" alt="">
                                   <input name="hover_img" class="form-control-file" type="file">
                                   @error('hover_img')
                                   <p class="text-danger">{{ $message }}</p>
                               @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Short Description</label>
                                    <textarea class="form-control" name="short_des" id="" cols="30" rows="10"></textarea>
                                    @error('short_des')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Long Description</label>
                                    <textarea class="form-control" id="summary-ckeditor" name="long_des"></textarea>
                                    @error('long_des')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>

                            <div class="row" style="margin: 8px;">
                                <div class="col-md-4">
                                    <div class="my-3">
                                        <input value="1" name="top_selling" type="checkbox" id="top_selling"><label for="top_selling">Top Selling</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="my-3">
                                        <input value="1" name="trending_product" type="checkbox" id="trending_product"><label for="trending_product">Trending Product</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="my-3">
                                        <input value="1" name="Recently_added" type="checkbox" id="Recently_added"><label for="Recently_added">Recently Added</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="my-3">
                                        <input value="1" name="top_rateded" type="checkbox" id="top_rateded"><label for="top_rateded">Top Rated</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="my-3">
                                        <input value="1" name="deals_day" type="checkbox" id="deals_day"><label for="deals_day">Deals of the Day</label>
                                    </div>
                                </div>
                            </div>
                            <div id="timer" style="display: none; margin: 10px;" class="col-md-12">
                                <div class="my-3">
                                    <label for="">Input Date</label>
                                    <input class="form-control" name="deals_date" type="date" >
                                </div>
                                <div class="my-3">
                                    <label for="">Input Time</label>
                                    <input name="deals_time" class="form-control" type="time">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input id="add" class="btn btn-primary" type="submit">

                        </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>


@endsection
