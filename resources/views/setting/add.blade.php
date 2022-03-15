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
                    <h3 class="text-white">Add Customer</h3>
                </div>
                <div class="card-body">
                    <form role="form" method="POST" action="{{ url('/customer') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Full Name" required>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" placeholder="Enter Email" name="email">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Address</label>
                                    <input type="text" class="form-control" placeholder="Enter Address" name="address" required>
                                    @error('address')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phone</label>
                                    <input type="text" class="form-control" placeholder="Enter Phone" name="phone" required>
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Shopename</label>
                                    <input type="text" class="form-control" placeholder="Enter Shopename"
                                        name="shopename">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Account Holder.</label>
                                    <input type="text" class="form-control" placeholder="Account Holder"
                                        name="account_holder">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Account Number</label>
                                    <input type="text" class="form-control" placeholder="Enter Account Number"
                                        name="account_number">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bank Name</label>
                                    <input type="text" class="form-control" placeholder="Bank Name" name="bank_name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bank Branch</label>
                                    <input type="text" class="form-control" placeholder="BANK BRANCH" name="bank_branch">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">City</label>
                                    <input type="text" class="form-control" placeholder="City" name="city">
                                </div>
                                <img src="" alt="" id="photoPreview" width="80" height="80">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Photo</label>
                                    <input type="file" class="form-control" name="photo" accept="image/*"
                                        onchange="loadFile(event)" required>
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
