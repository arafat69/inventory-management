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
                    <h3 class="text-white">Edit Customer</h3>
                </div>
                <div class="card-body">
                    <form role="form" method="POST" action="{{ url('/customer/'.$customer->id) }}" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $customer->name }}" required>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" value="{{ $customer->email }}" name="email">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Address</label>
                                    <input type="text" class="form-control" value="{{ $customer->address }}" name="address" required>
                                    @error('address')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phone</label>
                                    <input type="text" class="form-control" value="{{ $customer->phone }}" name="phone" required>
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Shopename</label>
                                    <input type="text" class="form-control" value="{{ $customer->shopename }}" name="shopename">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Account Holder.</label>
                                    <input type="text" class="form-control" value="{{ $customer->account_holder }}" name="account_holder">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Account Number</label>
                                    <input type="text" class="form-control" value="{{ $customer->account_number }}" name="account_number">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bank Name</label>
                                    <input type="text" class="form-control" value="{{ $customer->bank_name }}" name="bank_name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bank Branch</label>
                                    <input type="text" class="form-control" value="{{ $customer->bank_branch }}" name="bank_branch">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">City</label>
                                    <input type="text" class="form-control" value="{{ $customer->city }}" name="city">
                                </div>
                                <img src="{{ asset('public/uploads/customer/'.$customer->photo) }}" alt="" id="photoPreview" width="80" height="80">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Photo</label>
                                    <input type="file" class="form-control" name="photo" accept="image/*"
                                        onchange="loadFile(event)">
                                </div>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary ">Update</button>
                                <button type="reset" class="btn btn-outline-warning">Reset</button>
                            </div>
                    </form>
                </div>
            </div> <!-- panel -->
        </div> <!-- col-->

    </div> <!-- End row -->
@endsection
