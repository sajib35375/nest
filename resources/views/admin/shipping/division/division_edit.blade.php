@extends('admin.admin_master')
@section('admin')

   <div class="wrap" style="margin: 30px;">
       <div class="row">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header">
                       <h2>Add New Division</h2>
                   </div>
                   <div class="card-body">
                       <form action="{{ route('division.update',$edit->id) }}" method="POST">
                           @csrf

                           <div class="my-3">
                               <label for="">Division Name</label>
                               <input name="division_name" value="{{ $edit->division_name }}" class="form-control" type="text">
                               @error('division_name')
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
