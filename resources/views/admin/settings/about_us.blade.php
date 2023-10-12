@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Edit About Us Page</h2>
                </div>
                <div class="card-body">

                    <form action="{{ route('update.about-us',$data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Welcome Title</label>
                                    <input name="welcome_title" value="{{ $data->welcome_title }}" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Welcome Description</label>
                                    <textarea class="form-control" name="welcome_description">{{ $data->welcome_description }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Welcome Image</label>
                                    <img id="welcome_image" src="" alt=""><br>
                                    <input name="welcome_image" class="form-control-file" type="file">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Welcome Gallery</label>
                                    <div id="welcome_gallery"></div>
                                   <input id="gallery" name="welcome_gallery[]" multiple class="form-control-file" type="file">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Performance Title</label>
                                    <input name="performance_title" value="{{ $data->performance_title }}" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label for="">Performance Image One</label>
                                    <img id="performance_image_one" src="" alt=""><br>
                                    <input name="performance_image_one" class="form-control-file" type="file">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Performance Description</label>
                                    <textarea class="form-control" name="performance_description">{{ $data->performance_description }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Who We Are Description</label>
                                    <textarea class="form-control" name="who_we_are_description">{{ $data->who_we_are_description }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Our History Description</label>
                                    <textarea class="form-control" name="our_history_description">{{ $data->our_history_description }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label for="">Our Mission Description</label>
                                    <textarea class="form-control" name="our_mission_description">{{ $data->our_mission_description }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="my-3">
                                    <label for="">Glorious Years</label>
                                    <input name="glorious_years" value="{{ $data->glorious_years }}" class="form-control" type="number">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="my-3">
                                    <label for="">Happy Clients</label>
                                    <input name="happy_clients" value="{{ $data->happy_clients }}" class="form-control" type="number">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="my-3">
                                    <label for="">Projects Complate</label>
                                    <input name="projects_complate" value="{{ $data->projects_complate }}" class="form-control" type="number">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="my-3">
                                    <label for="">Team Advisor</label>
                                    <input name="team_advisor" value="{{ $data->team_advisor }}" class="form-control" type="number">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="my-3">
                                    <label for="">Products Sale</label>
                                    <input name="products_sale" value="{{ $data->products_sale }}" class="form-control" type="number">
                                </div>
                            </div>
                            @php
                                $provide_data = json_decode($data->provide);
                            @endphp
                            <div class="col-md-6">
                                <div class="my-3">
                                    <div class="mb-4">
                                        <label class="form-label">Provide Logo One</label>
                                        <input class="form-control" type="file" name="provide_logo[]">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Provide Title One</label>
                                        <input type="text" name="provide_title[]" class="form-control" value="{{ @$provide_data->provide_title[0] }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Provide Description One</label>
                                        <textarea class="form-control" name="provide_description[]">{{ @$provide_data->provide_description[0] }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <div class="mb-4">
                                        <label class="form-label">Provide Logo Two</label>
                                        <input class="form-control" type="file" name="provide_logo[]">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Provide Title Two</label>
                                        <input type="text" name="provide_title[]" class="form-control" value="{{ @$provide_data->provide_title[1] }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Provide Description Two</label>
                                        <textarea class="form-control" name="provide_description[]">{{ @$provide_data->provide_description[1] }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <div class="mb-4">
                                        <label class="form-label">Provide Logo Three</label>
                                        <input class="form-control" type="file" name="provide_logo[]">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Provide Title Three</label>
                                        <input type="text" name="provide_title[]" class="form-control" value="{{ @$provide_data->provide_title[2] }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Provide Description Three</label>
                                        <textarea class="form-control" name="provide_description[]">{{ @$provide_data->provide_description[2] }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <div class="mb-4">
                                        <label class="form-label">Provide Logo Four</label>
                                        <input class="form-control" type="file" name="provide_logo[]">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Provide Title Four</label>
                                        <input type="text" name="provide_title[]" class="form-control" value="{{ @$provide_data->provide_title[3] }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Provide Description Four</label>
                                        <textarea class="form-control" name="provide_description[]">{{ @$provide_data->provide_description[3] }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <div class="mb-4">
                                        <label class="form-label">Provide Logo Five</label>
                                        <input class="form-control" type="file" name="provide_logo[]">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Provide Title Five</label>
                                        <input type="text" name="provide_title[]" class="form-control" value="{{ @$provide_data->provide_title[4] }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Provide Description Five</label>
                                        <textarea class="form-control" name="provide_description[]">{{ @$provide_data->provide_description[4] }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <div class="mb-4">
                                        <label class="form-label">Provide Logo Six</label>
                                        <input class="form-control" type="file" name="provide_logo[]">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Provide Title Six</label>
                                        <input type="text" name="provide_title[]" class="form-control" value="{{ @$provide_data->provide_title[5] }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Provide Description Six</label>
                                        <textarea class="form-control" name="provide_description[]">{{ @$provide_data->provide_description[5] }}</textarea>
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



@endsection
