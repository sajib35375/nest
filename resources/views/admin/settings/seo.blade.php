@extends('admin.admin_master')
@section('admin')


<div class="wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Site Settings And SEO</h2>
                </div>
                <div class="card-body">

                    <form action="{{ route('update.seo',$data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Site Logo</label>
                                    <img id="logo" src="{{ URL::to('upload/theme/'.$data->logo) }}" alt=""><br>
                                    <input name="logo" class="form-control" type="file">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Header Image</label>
                                    <img id="header" src="{{ URL::to('') }}/upload/theme/{{ $data->header }}" alt=""><br>
                                    <input name="old_header" value="{{ $data->header }}" type="hidden">
                                    <input name="header" class="form-control-file" type="file">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Site Favicon</label>
                                    <img id="favicon" src="{{ URL::to('upload/theme/'.$data->favicon) }}" alt=""><br>
                                    <input name="favicon" class="form-control" type="file">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Footer Title</label>
                                    <input name="footer_title" value="{{ $data->footer_title }}" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Footer Phone Number</label>
                                    <input name="footer_phone_no" value="{{ $data->footer_phone_no }}" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Footer Address</label>
                                    <input name="footer_address" value="{{ $data->footer_address }}" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Footer Email</label>
                                    <input name="footer_email" value="{{ $data->footer_email }}" class="form-control" type="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Office Hours</label>
                                    <input name="office_hours" value="{{ $data->office_hours }}" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Coppyright Text</label>
                                    <input name="footer_copyright_text" value="{{ $data->footer_copyright_text }}" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Working Teliphone Number</label>
                                    <input name="working_teliphone" value="{{ $data->working_teliphone }}" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Support Center Teliphone Number</label>
                                    <input name="support_teliphone" value="{{ $data->support_teliphone }}" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Facebook Link</label>
                                    <input name="facebook_link" value="{{ $data->facebook_link }}" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Twitter Link</label>
                                    <input name="twitter_link" value="{{ $data->twitter_link }}" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Instagram Link</label>
                                    <input name="instagram_link" value="{{ $data->instagram_link }}" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Pinterest Link</label>
                                    <input name="pinterest_link" value="{{ $data->pinterest_link }}" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Youtube Link</label>
                                    <input name="youtube_link" value="{{ $data->youtube_link }}" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Follow Us Title</label>
                                    <input name="follow_us_title" value="{{ $data->follow_us_title }}" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Meta Author</label>
                                    <input name="meta_author" value="{{ $data->meta_author }}" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Meta Title</label>
                                    <input name="meta_title" value="{{ $data->meta_title }}" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Meta Keyword</label>
                                    <textarea class="form-control" name="meta_keyword">{{ $data->meta_keyword }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Meta Description</label>
                                    <textarea class="form-control" name="meta_description">{{ $data->meta_description }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Meta Analytics</label>
                                    <textarea class="form-control" name="google_analytics">{{ $data->google_analytics }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Alexa Analytics</label>
                                    <textarea class="form-control" name="alexa_analytics">{{ $data->alexa_analytics }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Google Verification</label>
                                    <textarea class="form-control" name="google_verification">{{ $data->google_verification }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Open Graph Title</label>
                                    <input name="og_title" value="{{ $data->og_title }}" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Open Graph Type</label>
                                    <input name="og_type" value="{{ $data->og_type }}" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Open Graph URL</label>
                                    <input name="og_url" value="{{ $data->og_url }}" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Open Graph Image URL</label>
                                    <input name="og_image_link" value="{{ $data->og_image_link }}" class="form-control" type="text">
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
