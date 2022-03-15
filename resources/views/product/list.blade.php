@php
    $page = 'product';
@endphp
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 m-auto">
            <a href="{{ route('product.add') }}" class="btn btn-primary my-2">Add Product</a>
            <a href="{{ route('import.product') }}" class="btn btn-secondary btn-sm my-2">Import Product</a>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="myTable">
                        <thead class="table-light">
                            <tr>
                                <th class="py-2">#</th>
                                <th class="py-2">Name</th>
                                <th>Code</th>
                                <th>Selling Price</th>
                                <th>image</th>
                                <th>Garage</th>
                                <th>Route</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($product as $products)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $products->product_name }}</td>
                                <td>{{ $products->product_code }}</td>
                                <td>{{ $products->selling_price }}</td>
                                <td>
                                    <img src="{{ asset('public/uploads/product/'.$products->product_image) }}" width="50" height="50">
                                </td>
                                <td>{{ $products->product_garage }}</td>
                                <td>{{ $products->product_route }}</td>
                                <td>
                                    <a href="{{ url('/product/'.$products->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="{{ url('/product/delete/'.$products->id) }}" class="btn btn-danger btn-sm delete-confirm"><i class="fa-solid fa-trash"></i></a>
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modelView{{ $products->id }}"><i class="fa-solid fa-eye"></i></button>
                                </td>
                            </tr>
                            <!-- view -->
                            <div class="modal fade" id="modelView{{ $products->id }}">
                                <div class="modal-dialog modal-fullscreen" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">product View</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row gutters-sm">
                                                <div class="col-md-4 mb-3">
                                                  <div class="card">
                                                    <div class="card-body">
                                                      <div class="d-flex flex-column align-items-center text-center">
                                                        <img src="{{ asset('public/uploads/product/'.$products->product_image) }}" width="80%">
                                                        <div class="mt-3">
                                                          <h4>{{ $products->product_name }}</h4>
                                                          <button class="btn btn-primary">Follow</button>
                                                          <button class="btn btn-outline-primary">Message</button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-md-8">
                                                  <div class="card mb-2">
                                                    <div class="card-body">
                                                      <div class="row">
                                                        <div class="col-sm-3">
                                                          <h6 class="mb-0">Category :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">{{ $products->category }}</div>
                                                      </div>
                                                      <hr>
                                                      <div class="row">
                                                        <div class="col-sm-3">
                                                          <h6 class="mb-0">Supplier :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">{{ $products->supplier }}</div>
                                                      </div>
                                                      <hr>
                                                      <div class="row">
                                                        <div class="col-sm-3">
                                                          <h6 class="mb-0">Product Code :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">{{ $products->product_code }}</div>
                                                      </div>
                                                      <hr>
                                                      <div class="row">
                                                        <div class="col-sm-3">
                                                          <h6 class="mb-0">Product Godaun :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">{{ $products->product_garage }}</div>
                                                      </div>
                                                      <hr>
                                                      <div class="row">
                                                        <div class="col-sm-3">
                                                          <h6 class="mb-0">Product Route :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">{{ $products->product_route }}</div>
                                                      </div>
                                                      <hr>
                                                      <div class="row">
                                                        <div class="col-sm-3">
                                                          <h6 class="mb-0">Buy Date :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">{{ $products->buy_date }}</div>
                                                      </div>
                                                      <hr>
                                                      <div class="row">
                                                        <div class="col-sm-3">
                                                          <h6 class="mb-0">Expire Date :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">{{ $products->expire_date }}</div>
                                                      </div>
                                                      <hr>
                                                      <div class="row">
                                                        <div class="col-sm-3">
                                                          <h6 class="mb-0">Buying Price :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">{{ $products->buying_price }}</div>
                                                      </div>
                                                        <hr>
                                                      <div class="row">
                                                        <div class="col-sm-3">
                                                          <h6 class="mb-0">Selling Price</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">{{ $products->selling_price }}</div>
                                                      </div>
                                                      <hr>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @php
                                $i++
                            @endphp
                            @endforeach
                        </tbody>
                    </table>

                </div>
                </div>
            </div>
        </div>
    </div>


@endsection

