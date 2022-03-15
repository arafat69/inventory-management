@php
    $page = 'pos';
@endphp
@extends('layouts.app')

@section('content')
<style>
    * {
     /* font-family: sans-serif !important; */
}
</style>
<div class="page-title">
    <h5 class=" bg-gray-700 text-white p-2">POS ( Point Of Sale )
        <span class="float-end"> <a class="text-info" href="{{ route('home') }}">Dashboard</a>/POS</span>
    </h5>
    <div class="category pb-2">
        @foreach ($category as $cat)
            <button class="btn btn-primary mt-1">{{ $cat->cat_name }}</button>
        @endforeach
    </div>
</div>

<div class="row">
    <div class="col-md-5">
        <div class="card p-1">
            <table class="table table-bordered">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="px-1 py-2">Name</th>
                        <th class="px-1">Quantity</th>
                        <th class="px-1">Single Price</th>
                        <th class="px-1">Sub Total</th>
                        <th class="px-1">Action</th>
                    </tr>
                </thead>
                @php
                    $cat_product = Cart::content();
                @endphp
                <tbody>
                    @foreach ($cat_product as $prod)
                    <tr>
                        <td class="px-1 py-2">{{ $prod->name }}</td>
                        <td class="px-1" style="width: 90px">
                        <form action="{{ url('/update-cart/'.$prod->rowId) }}" method="POST">
                            @csrf
                            <input type="number" name="qty" value="{{ $prod->qty }}" min="1" style="width: 40px; border:1px solid #ccc">
                            <button type="submit" class="btn p-1 btn-primary" style="border-radius: 50%;width: 25px;height: 25px;
                             margin-top: -6px"><i class="fa-solid fa-check"></i></button>
                        </form>
                        </td>
                        <td class="px-1">{{ number_format($prod->price) }}</td>
                        <td class="px-1">{{ number_format($prod->price * $prod->qty) }}</td>
                        <td class="px-1 text-center">
                           <a href="{{ URL::to('/remove-cart/'.$prod->rowId) }}" class="text-danger"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer bg-primary p-0 text-white text-center">
                <table class="table table-bordered text-white" style="border-color: #90b2d3;">
                    <tr>
                        <td class="text-end" style="font-size: 18px">Quantity :</td>
                        <td class="text-start" style="font-size: 18px">{{ Cart::count() }}</td>
                    </tr>
                    <tr>
                        <td class="text-end" style="font-size: 18px">Sub Total :</td>
                        <td class="text-start" style="font-size: 18px">{{ Cart::subtotal() }}</td>
                    </tr>
                    <tr>
                        <td class="text-end" style="font-size: 18px">Vat :</td>
                        <td class="text-start" style="font-size: 18px">{{ Cart::tax() }}</td>
                    </tr>
                    <tr>
                        <th><h2 class="m-0 text-white text-end">Total :</h2></th>
                        <th><h1 class="m-0 text-white text-start">{{ Cart::total() }}</h1></th>
                    </tr>
                </table>
            </div>
            <form action="{{ url('/invoice') }}" method="POST">
                @csrf
            <div class="card my-2">
                <h4 class="bg-light text-dark p-1 m-0">Customer
                    <button type="button" data-bs-toggle="modal" data-bs-target="#customerAddModel"
                    class="btn btn-secondary btn-sm float-end">Add New</button>
                </h4>
                <div class="card-body p-2">
                    <select name="customer" class="form-select select-item" style="width: 100%">
                        <option disabled selected> Select Customer</option>
                        @foreach ($customer as $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach
                    </select>
                    @error('customer')
                        <p class="text-danger m-0">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="next-button text-center py-2">
                <button type="submit" class="btn btn-success">Create Invoice</button>
            </div>
        </form>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="myTable">
                    <thead class="table-light">
                        <tr>
                            <th class="py-2">Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>P_Code</th>
                            <th>Add</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $products)
                        <tr>
                        <form action="{{ url('/add-cart') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $products->id }}">
                            <input type="hidden" name="name" value="{{ $products->product_name }}">
                            <input type="hidden" name="qty" value="1" hidden>
                            <input type="hidden" name="price" value="{{ $products->selling_price }}">
                            <input type="hidden" name="weight" value="550">
                            <td>
                                <img src="{{ asset('public/uploads/product/'.$products->product_image) }}" height="48">
                            </td>
                            <td>{{ $products->product_name }}</td>
                            <td>{{ $products->cat_name }}</td>
                            <td>{{ $products->product_code }}</td>
                            <td class="text-center">
                                <button type="submit" class="btn btn-sm btn-primary px-2 py-1">
                                <i class="fa-solid fa-plus"></i></button>
                            </td>
                        </form>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>

{{-- Customer add model --}}
<div class="modal fade" id="customerAddModel">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title text-white">Add New Customer</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
          </button>
        </div>
        <form action="{{ route('customer') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" name="address" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Shope Name</label>
                        <input type="text" name="shopename" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Account Holder</label>
                        <input type="text" name="account_holder" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Account Number</label>
                        <input type="text" name="account_number" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Bank Name</label>
                        <input type="text" name="bank_name" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Bank Branch</label>
                        <input type="text" name="bank_branch" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">City</label>
                        <input type="text" name="city" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <img src="" alt="" id="photoPreview" height="80">
                        <label for="">Photo</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Photo</label>
                        <input type="file" class="form-control" name="photo" accept="image/*" onchange="loadFile(event)" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save Now</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </form>
      </div>
    </div>
  </div>


@endsection
