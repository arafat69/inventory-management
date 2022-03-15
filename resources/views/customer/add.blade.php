@php
    $page = 'customer';
@endphp

@extends('layouts.app')

@section('content')
    <!-- Page-Title -->

    <div class="row">
        <div class="col-md-10 m-auto">
            <div class="card">
                <div class="card-title bg-primary p-2">
                    <h3 class="text-white float-start">Add Customer</h3>
                    <a href="{{ route('customer') }}" class="btn btn-secondary btn-sm float-end">All Customer</a>
                </div>
                <div class="card-body">
                    <form role="form" method="POST" action="{{ url('/customer') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Full Name" required value="{{ old('name') }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" placeholder="Enter Email" name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Address</label>
                                    <input type="text" class="form-control" placeholder="Enter Address" name="address" required value="{{ old('address') }}">
                                    @error('address')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phone</label>
                                    <input type="text" class="form-control" placeholder="Enter Phone" name="phone" required value="{{ old('phone') }}">
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Shopename</label>
                                    <input type="text" class="form-control" placeholder="Enter Shopename"
                                        name="shopename" value="{{ old('shopename') }}">
                                    @error('shopename')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Account Holder.</label>
                                    <input type="text" class="form-control" placeholder="Account Holder"
                                        name="account_holder" value="{{ old('account_holder') }}">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Account Number</label>
                                    <input type="text" class="form-control" placeholder="Enter Account Number"
                                        name="account_number" value="{{ old('account_number') }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bank Name</label>
                                    <input type="text" class="form-control" placeholder="Bank Name" name="bank_name" value="{{ old('bank_name') }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bank Branch</label>
                                    <input type="text" class="form-control" placeholder="BANK BRANCH" name="bank_branch" value="{{ old('bank_branch') }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">City</label>
                                    <input type="text" class="form-control" placeholder="City" name="city" value="{{ old('city') }}">
                                    @error('city')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <img src="" alt="" id="photoPreview" width="80" height="80">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Photo</label>
                                    <input type="file" class="form-control" name="photo" accept="image/*"
                                        onchange="loadFile(event)" required>
                                    @error('photo')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
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
