@extends('admin.admin_master')
@section('admin')


  <div class="wrap" style="margin: 30px;">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                      <h2>Edit District</h2>
                  </div>
                  <div class="card-body">
                      <form action="{{ route('district.update',$edit->id) }}" method="POST">
                          @csrf
                          <div class="my-3">
                              <label for="">Division Name</label>
                              <select class="form-control" name="division_id">
                                  @foreach($all_div as $div)
                                      <option {{ $div->id == $edit->division_id ? 'selected' : '' }} value="{{ $div->id }}">{{ $div->division_name }}</option>
                                  @endforeach
                              </select>
                              @error('division_id')
                              <p class="text-danger">{{ $message }}</p>
                              @enderror
                          </div>
                          <div class="my-3">
                              <label for="">District Name</label>
                              <input name="district_name" value="{{ $edit->district_name }}" class="form-control" type="text">
                              @error('district_name')
                              <p class="text-danger">{{ $message }}</p>
                              @enderror
                          </div>

                          <div class="my-3">
                              <input class="btn btn-primary" type="submit">
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>









@endsection
