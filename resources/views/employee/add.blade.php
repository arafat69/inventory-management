@php
    $page = 'employee';
@endphp
@extends('layouts.app')

@section('content')
<!-- Page-Title -->

<div class="row">
    <div class="col-md-10 m-auto">
        <div class="card">
            <div class="card-title bg-primary p-2">
                <h3 class="text-white float-start">Add Employee</h3>
                <a href="{{ route('employee') }}" class="btn btn-secondary btn-sm float-end">All Employee</a>
            </div>
            <div class="card-body">
                <form role="form" method="POST" action="{{ url('/employee') }}" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" name="name"  placeholder="Full Name" value="{{ old('name') }}" required>
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control"  placeholder="Enter Email" name="email" value="{{ old('email') }}">
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" class="form-control"  placeholder="Enter Address" name="address" value="{{ old('address') }}">
                        @error('address')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="text" class="form-control"  placeholder="Enter Phone" name="phone" value="{{ old('phone') }}">
                        @error('phone')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Experience</label>
                        <input type="text" class="form-control"  placeholder="Enter Experience" name="experience" required value="{{ old('experience') }}">
                        @error('experience')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">NID No.</label>
                        <input type="text" class="form-control"  placeholder="National ID No." name="nid_no" value="{{ old('nid_no') }}" required>
                        @error('nid_no')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Salary</label>
                        <input type="text" class="form-control"  placeholder="Enter Salary" name="salary" value="{{ old('salary') }}" required>
                        @error('salary')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Vacation</label>
                        <input type="text" class="form-control"  placeholder="Vacation" name="vacation" value="{{ old('vacation') }}" required>
                        @error('vacation')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">City</label>
                        <input type="text" class="form-control"  placeholder="City" name="city" required value="{{ old('city') }}">
                        @error('city')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                   <div class="row">
                       <div class="col-sm-8">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Photo</label>
                            <input type="file" class="form-control" name="photo" accept="image/*" onchange="loadFile(event)" required>
                            @error('photo')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                       </div>
                       <div class="col-sm-4">
                        <img src="{{ asset('public/assets/images/employee.jpg') }}" alt="" id="photoPreview" width="80" height="80">
                       </div>
                   </div>
                </div>
                </div>
                    <hr>
                    <div class="text-center">
                 <button type="submit" class="btn btn-primary ">Submit</button>
                 <button type="reset" class="btn btn-outline-warning">Reset</button>
                </div>
                </form>
            </div>
        </div> <!-- panel -->
    </div> <!-- col-->

</div> <!-- End row -->
@endsection
