@php
    $page = 'setting';
@endphp

@extends('layouts.app')

@section('content')
    <!-- Page-Title -->

    <div class="row">
        <div class="col-md-10 m-auto">
            <div class="card">
                <div class="card-title bg-primary p-2">
                    <h3 class="text-white">Update Setting</h3>
                </div>
                <div class="card-body">
                    <form role="form" method="POST" action="{{ url('/setting/'.$setting->id) }}" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Company Name</label>
                                    <input type="text" class="form-control" name="company_name" value="{{ $setting->company_name }}" required>
                                    @error('company_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Company Address</label>
                                    <input type="text" class="form-control" value="{{ $setting->company_address }}" name="company_address">
                                    @error('company_address')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Company Email</label>
                                    <input type="email" class="form-control" value="{{ $setting->company_email }}" name="company_email" required>
                                    @error('company_email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Company Phone</label>
                                    <input type="text" class="form-control" value="{{ $setting->company_phone }}" name="company_phone" required>
                                    @error('company_phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Company Mobile</label>
                                    <input type="text" class="form-control" value="{{ $setting->company_mobile }}" name="company_mobile">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Company City</label>
                                    <input type="text" class="form-control" value="{{ $setting->company_city }}" name="company_city">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Company Country</label>
                                    <input type="text" class="form-control" value="{{ $setting->company_country }}" name="company_country">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ompany Zipcode</label>
                                    <input type="text" class="form-control" value="{{ $setting->company_zipcode }}" name="company_zipcode">
                                </div>
                                <img src="{{ asset('public/uploads/company/'.$setting->company_logo) }}" alt="" id="photoPreview" width="80" height="80">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Company Logo</label>
                                    <input type="file" class="form-control" name="company_logo" accept="image/*"
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
