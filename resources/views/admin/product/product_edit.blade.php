@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Product</h2>
                </div>
                <div class="card-body">
{{--                    @php--}}
{{--                        $current_date = \Carbon\Carbon::now()->format('Y-m-d');--}}
{{--                        $products = \App\Models\Product::where('deals_day',1)->get();--}}
{{--                        foreach ($products as $product){--}}
{{--                           $input_date = \Carbon\Carbon::parse($product->deals_date);--}}
{{--                            $difference = $input_date->diffInDays($current_date);--}}

{{--                        }--}}

{{--                    @endphp--}}
                    <form action="{{ route('update.product',$edit_product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Category</label>
                                    <select name="category_id" class="form-control" name="" id="">
                                        @foreach ($all_cat as $cat)
                                        <option {{ $edit_product->category_id == $cat->id ? 'selected' : '' }} value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach

                                    </select>
                                    @error('category_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            @php

                            $tag_arr = [];
                            foreach ($edit_product->tags as $value) {
                                array_push($tag_arr,$value->id);
                            }

                            @endphp
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Tag</label>
                                    <select name="tag_id[]" class="form-control" multiple="multiple" id="multi_tag">
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
                                    <label for="">Product Name</label>
                                    <input name="product_name" value="{{ $edit_product->product_name }}" class="form-control" type="text">
                                    @error('product_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Brand Name</label>
                                    <input name="brand_name" value="{{ $edit_product->brand_name }}" class="form-control" type="text">
                                    @error('brand_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Sale Price</label>
                                    <input name="sale_price" value="{{ $edit_product->sale_price }}" class="form-control" type="text">
                                    @error('sale_price')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Regular Price</label>
                                   <input name="regular_price" value="{{ $edit_product->regular_price }}" class="form-control" type="text">
                                   @error('regular_price')
                                   <p class="text-danger">{{ $message }}</p>
                               @enderror
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Type</label>
                                    <input name="type" value="{{ $edit_product->type }}" class="form-control" type="text">
                                    @error('type')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">MFG</label>
                                   <input name="MFG" value="{{ $edit_product->MFG }}" class="form-control" type="date">
                                   @error('MFG')
                                   <p class="text-danger">{{ $message }}</p>
                               @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">LIFE</label>
                                    <input name="LIFE" value="{{ $edit_product->LIFE }}" class="form-control" type="text">
                                    @error('LIFE')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">SKU</label>
                                   <input name="SKU" value="{{ $edit_product->SKU }}" class="form-control" type="text">
                                   @error('SKU')
                                   <p class="text-danger">{{ $message }}</p>
                               @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Rating Status</label>
                                   <input name="rating_status" value="{{ $edit_product->rating_status }}" class="form-control" type="text">
                                   @error('rating_status')
                                   <p class="text-danger">{{ $message }}</p>
                               @enderror
                                </div>
                            </div

                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Product Thumbnail</label>
                                    <img id="thumbnail" style="width: 200px;height: 200px;" src="{{ URL::to('') }}/backend/assets/imgs/products/{{ $edit_product->thumbnail }}" alt=""><br>
                                    <input name="old_photo" value="{{ $edit_product->thumbnail }}" type="hidden">
                                   <input name="thumbnail" class="form-control-file" type="file">
                                   @error('thumbnail')
                                   <p class="text-danger">{{ $message }}</p>
                               @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Hover Image</label>
                                    <img id="hover" style="width: 200px; height: 200px;" src="{{ URL::to('') }}/backend/assets/imgs/products/{{ $edit_product->hover_img }}" alt="">
                                    <input name="old_hover" value="{{ $edit_product->hover_img }}" type="hidden">
                                   <input name="hover_img" class="form-control-file" type="file">
                                   @error('hover_img')
                                   <p class="text-danger">{{ $message }}</p>
                               @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Short Description</label>
                                    <textarea class="form-control"  name="short_des" id="" cols="30" rows="10">{{ $edit_product->short_des }}</textarea>
                                    @error('short_des')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Long Description</label>
                                    <textarea class="form-control"  id="summary-ckeditor" name="long_des">{{ $edit_product->long_des }}</textarea>
                                    @error('long_des')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>

                            <div class="row" style="margin: 8px;">
                                <div class="col-md-4">
                                    <div class="my-3">
                                        <input value="1" {{ $edit_product->top_selling == 1 ? 'checked' : '' }} name="top_selling" type="checkbox" id="top_selling"><label for="top_selling">Top Selling</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="my-3">
                                        <input value="1" {{ $edit_product->trending_product == 1 ? 'checked' : '' }} name="trending_product" type="checkbox" id="trending_product"><label for="trending_product">Trending Product</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="my-3">
                                        <input value="1" {{ $edit_product->Recently_added == 1 ? 'checked' : '' }} name="Recently_added" type="checkbox" id="Recently_added"><label for="Recently_added">Recently Added</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="my-3">
                                        <input value="1" {{ $edit_product->top_rateded == 1 ? 'checked' : '' }} name="top_rateded" type="checkbox" id="top_rateded"><label for="top_rateded">Top Rated</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="my-3">
                                        <input value="1" {{ $edit_product->deals_day == 1 ? 'checked' : '' }} name="deals_day" type="checkbox" id="deals_day"><label for="deals_day">Deals Day</label>
                                    </div>
                                </div>
                                <div id="timer_id" style="margin: 7px;" class="col-md-12">
                                    <div class="my-3">
                                        <label for="">Input Date</label>
                                        <input id="deals_date" class="form-control" value="{{ $edit_product->deals_date }}" name="deals_date" type="date" >
                                    </div>
                                    <div class="my-3">
                                        <label for="">Input Time</label>
                                        <input name="deals_time" value="{{ $edit_product->deals_time }}" class="form-control" type="time">
                                    </div>
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



<div class="wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Multiple Image Update</h2>
                </div>
                <div class="card-body">


                    <form method="POST" action="{{ route('update.multiImg') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row row-sm">

                            @foreach( $multi_img as $multi )
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="{{ URL::to('') }}/backend/assets/imgs/products/{{ $multi->product_image }}" alt="">
                                        <div class="form-group">
                                            <label for="#">Delete Image<span class="text-danger">*</span></label><br>
                                            <a class="btn btn-sm btn-danger" id="delete" href="{{ route('delete.product',$multi->id) }}">Delete</a>
                                        </div>
                                       <div class="form-group">
                                           <label for="#">Change Photo <span class="text-danger">*</span></label>
                                           <input multiple class="form-control-file" type="file" name="multi_img[ {{ $multi->id }} ]">
                                       </div>
                                    </div>
                                </div>

                            </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <input value="update" class="btn btn-success" type="submit">
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>


@endsection
