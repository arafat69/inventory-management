@php
    $page = 'supplier';
@endphp
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 m-auto">
            <a href="{{ route('supplier.add') }}" class="btn btn-primary my-2">Add New</a>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="myTable">
                        <thead class="table-light">
                            <tr>
                                <th class="py-2">#</th>
                                <th class="py-2">Name</th>
                                <th >Phone</th>
                                <th>Address</th>
                                <th>Type</th>
                                <th>photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($supplier as $suppliers)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $suppliers->name }}</td>
                                <td>{{ $suppliers->phone }}</td>
                                <td>{{ $suppliers->address }}</td>
                                <td>{{ $suppliers->type }}</td>
                                <td>
                                    <img src="{{ asset('public/uploads/supplier/'.$suppliers->photo) }}" width="50" height="50">
                                </td>
                                <td>
                                    <a href="{{ url('/supplier/'.$suppliers->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="{{ url('/supplier/delete/'.$suppliers->id) }}" class="btn btn-danger btn-sm delete-confirm"><i class="fa-solid fa-trash"></i></a>
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modelView{{ $suppliers->id }}"><i class="fa-solid fa-eye"></i></button>
                                </td>
                            </tr>
                            <!-- view -->
                            <div class="modal fade" id="modelView{{ $suppliers->id }}">
                                <div class="modal-dialog modal-fullscreen" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Supplier View</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row gutters-sm">
                                                <div class="col-md-4 mb-3">
                                                  <div class="card">
                                                    <div class="card-body">
                                                      <div class="d-flex flex-column align-items-center text-center">
                                                        <img src="{{ asset('public/uploads/supplier/'.$suppliers->photo) }}" width="80%">
                                                        <div class="mt-3">
                                                          <h4>{{ $suppliers->name }}</h4>
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
                                                          <h6 class="mb-0">Full Name :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">{{ $suppliers->name }}</div>
                                                      </div>
                                                      <hr>
                                                      <div class="row">
                                                        <div class="col-sm-3">
                                                          <h6 class="mb-0">Email :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">{{ $suppliers->email }}</div>
                                                      </div>
                                                      <hr>
                                                      <div class="row">
                                                        <div class="col-sm-3">
                                                          <h6 class="mb-0">Phone :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">{{ $suppliers->phone }}</div>
                                                      </div>
                                                      <hr>
                                                      <div class="row">
                                                        <div class="col-sm-3">
                                                          <h6 class="mb-0">Address :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">{{ $suppliers->address }}</div>
                                                      </div>
                                                      <hr>
                                                      <div class="row">
                                                        <div class="col-sm-3">
                                                          <h6 class="mb-0">Type :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">{{ $suppliers->type }}</div>
                                                      </div>
                                                      <hr>
                                                      <div class="row">
                                                        <div class="col-sm-3">
                                                          <h6 class="mb-0">Account Holder :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">{{ $suppliers->account_holder }}</div>
                                                      </div>
                                                      <hr>
                                                      <div class="row">
                                                        <div class="col-sm-3">
                                                          <h6 class="mb-0">Account Number :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">{{ $suppliers->account_number }}</div>
                                                      </div>
                                                      <hr>
                                                      <div class="row">
                                                        <div class="col-sm-3">
                                                          <h6 class="mb-0">Bank Name :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">{{ $suppliers->bank_name }}</div>
                                                      </div>
                                                      <hr>
                                                      <div class="row">
                                                        <div class="col-sm-3">
                                                          <h6 class="mb-0">Branch Name :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">{{ $suppliers->branch_name }}</div>
                                                      </div>
                                                        <hr>
                                                      <div class="row">
                                                        <div class="col-sm-3">
                                                          <h6 class="mb-0">City</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">{{ $suppliers->city }}</div>
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


                            @endforeach
                        </tbody>
                    </table>

                </div>
                </div>
            </div>
        </div>
    </div>


@endsection

