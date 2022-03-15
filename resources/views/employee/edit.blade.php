@php
    $page = 'employee';
@endphp
@extends('layouts.app')

@section('content')
<!-- Page-Title -->

<div class="row">
    <div class="col-md-10 m-auto">
        <div class="card">
            <div class="card-title bg-primary p-2"><h3 class="text-white">Edit Employee</h3></div>
            <div class="card-body">
                <form role="form" method="POST" action="{{ url('/employee/'.$employee->id) }}" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $employee->name }}">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control"  value="{{ $employee->email }}" name="email" >
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" class="form-control" value="{{ $employee->address }}" name="address" >
                        @error('address')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="text" class="form-control" value="{{ $employee->phone }}" name="phone" >
                        @error('phone')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Experience</label>
                        <input type="text" class="form-control" value="{{ $employee->experience }}" name="experience">
                        @error('experience')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">NID No.</label>
                        <input type="text" class="form-control" value="{{ $employee->nid_no }}" name="nid_no">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Salary</label>
                        <input type="text" class="form-control" value="{{ $employee->salary }}" name="salary">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Vacation</label>
                        <input type="text" class="form-control"  value="{{ $employee->vacation }}" name="vacation">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">City</label>
                        <input type="text" class="form-control" value="{{ $employee->city }}" name="city" required>
                    </div>
                   <div class="row">
                       <div class="col-sm-8">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Photo</label>
                            <input type="file" class="form-control" name="photo" accept="image/*" onchange="loadFile(event)">
                        </div>
                       </div>
                       <div class="col-sm-4">
                        <img src="{{ asset('public/uploads/employee/'.$employee->photo) }}" alt="" id="photoPreview" width="80" height="80">
                       </div>
                   </div>
                </div>
                </div>
                    <hr>
                    <div class="text-center">
                 <button type="submit" class="btn btn-primary ">Update</button>
                 <input type="reset" class="btn btn-outline-warning" value="Reset">
                </div>
                </form>
            </div>
        </div> <!-- panel -->
    </div> <!-- col-->

</div> <!-- End row -->
@endsection
