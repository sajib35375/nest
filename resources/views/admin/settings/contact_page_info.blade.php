@extends('admin.admin_master')
@section('admin')

<div class="wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Contact Page Information</h2>
                </div>
                <div class="card-body">

                    <form action="{{ route('update.contact-page-info',$data->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Main Title</label>
                                    <input name="main_title" value="{{ $data->main_title }}" class="form-control" type="text">
                                    @error('main_title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Main Short Description</label>
                                    <textarea class="form-control" name="main_description">{{ $data->main_description }}</textarea>
                                    @error('main_description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Sub Title One</label>
                                    <input name="sub_title_one" value="{{ $data->sub_title_one }}" class="form-control" type="text">
                                    @error('sub_title_one')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Sub Short Description One</label>
                                    <textarea class="form-control" name="sub_description_one">{{ $data->sub_description_one }}</textarea>
                                    @error('sub_description_one')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Sub Title Two</label>
                                    <input name="sub_title_two" value="{{ $data->sub_title_two }}" class="form-control" type="text">
                                    @error('sub_title_two')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Sub Short Description Two</label>
                                    <textarea class="form-control" name="sub_description_two">{{ $data->sub_description_two }}</textarea>
                                    @error('sub_description_two')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Sub Title Three</label>
                                    <input name="sub_title_three" value="{{ $data->sub_title_three }}" class="form-control" type="text">
                                    @error('sub_title_three')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Sub Short Description Three</label>
                                    <textarea class="form-control" name="sub_description_three">{{ $data->sub_description_three }}</textarea>
                                    @error('sub_description_three')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Sub Title Four</label>
                                    <input name="sub_title_four" value="{{ $data->sub_title_four }}" class="form-control" type="text">
                                    @error('sub_title_four')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Sub Short Description Four</label>
                                    <textarea class="form-control" name="sub_description_four">{{ $data->sub_description_four }}</textarea>
                                    @error('sub_description_four')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Embed Google Map Link</label>
                                    <textarea class="form-control" name="embded_googlemap_link">{{ $data->embded_googlemap_link }}</textarea>
                                    @error('embded_googlemap_link')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Office Address</label>
                                    <input name="office_address" value="{{ $data->office_address }}" class="form-control" type="text">
                                    @error('office_address')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Office Phone</label>
                                    <input name="office_phone" value="{{ $data->office_phone }}" class="form-control" type="text">
                                    @error('office_phone')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Office Email</label>
                                    <input name="office_email" value="{{ $data->office_email }}" class="form-control" type="text">
                                    @error('office_email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Office Google Map URL</label>
                                    <input name="office_googlemap_url" value="{{ $data->office_googlemap_url }}" class="form-control" type="text">
                                    @error('office_googlemap_url')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Studio Address</label>
                                    <input name="studio_address" value="{{ $data->studio_address }}" class="form-control" type="text">
                                    @error('studio_address')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Studio Phone</label>
                                    <input name="studio_phone" value="{{ $data->studio_phone }}" class="form-control" type="text">
                                    @error('studio_phone')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Studio Email</label>
                                    <input name="studio_email" value="{{ $data->studio_email }}" class="form-control" type="text">
                                    @error('studio_email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Studio Google Map URL</label>
                                    <input name="studio_googlemap_url" value="{{ $data->studio_googlemap_url }}" class="form-control" type="text">
                                    @error('studio_googlemap_url')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Shop Address</label>
                                    <input name="shop_address" value="{{ $data->shop_address }}" class="form-control" type="text">
                                    @error('shop_address')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Shop Phone</label>
                                    <input name="shop_phone" value="{{ $data->shop_phone }}" class="form-control" type="text">
                                    @error('shop_phone')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Shop Email</label>
                                    <input name="shop_email" value="{{ $data->shop_email }}" class="form-control" type="text">
                                    @error('shop_email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Shop Google Map URL</label>
                                    <input name="shop_googlemap_url" value="{{ $data->shop_googlemap_url }}" class="form-control" type="text">
                                    @error('shop_googlemap_url')
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
