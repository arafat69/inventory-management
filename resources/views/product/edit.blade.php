@php
    $page = 'product';
@endphp
@extends('layouts.app')

@section('content')
    <!-- Page-Title -->

    <div class="row">
        <div class="col-md-10 m-auto">
            <div class="card">
                <div class="card-title bg-primary p-2">
                    <h3 class="text-white">Edit Product</h3>
                </div>
                <div class="card-body">
                    <form role="form" method="POST" action="{{ url('/product/'.$product->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Name</label>
                                    <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}" required>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Select Category</label>
                                    <select name="category_id" class="form-select select-item" style="width: 100%">
                                        <option disabled selected>Select Category</option>
                                        @foreach ($category as $category)
                                            <option value="{{ $category->id }}"
                                                @if ($product->category_id == $category->id ) selected @endif>
                                                {{ $category->cat_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Supplier</label>
                                    <select name="supplier_id" class="form-select select-item" style="width: 100%">
                                        <option disabled selected> Select Supplier</option>
                                        @foreach ($supplier as $supplier)
                                            <option value="{{ $supplier->id }}"
                                                 @if ($product->supplier_id == $supplier->id ) selected @endif>
                                                 {{ $supplier->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Code</label>
                                    <input type="text" class="form-control" value="{{ $product->product_code }}" name="product_code" required>
                                    @error('product_code')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Godaun</label>
                                    <input type="text" class="form-control" value="{{ $product->product_garage }}" name="product_garage" required>
                                    @error('product_garage')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Route</label>
                                    <input type="text" class="form-control" value="{{ $product->product_route }}" name="product_route" required>
                                    @error('product_route')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Buy Date</label>
                                    <input type="date" class="form-control" value="{{ $product->buy_date }}" name="buy_date" required>
                                    @error('buy_date')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Expire Date.</label>
                                    <input type="date" class="form-control" value="{{ $product->expire_date }}" name="expire_date">
                                    @error('expire_date')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Buying Price</label>
                                    <input type="text" class="form-control" value="{{ $product->buying_price }}" name="buying_price">
                                    @error('buying_price')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Selling Price</label>
                                    <input type="text" class="form-control" value="{{ $product->selling_price }}" name="selling_price">
                                    @error('selling_price')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <img src="{{ asset('public/uploads/product/'.$product->product_image) }}" alt="" id="photoPreview" width="80" height="80">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Photo</label>
                                    <input type="file" class="form-control" name="product_image" accept="image/*"
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
