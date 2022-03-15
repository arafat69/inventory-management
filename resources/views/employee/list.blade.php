@php
    $page = 'employee';
@endphp
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 m-auto">
            <a href="{{ route('employee.add') }}" class="btn btn-primary my-2">Add New</a>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="myTable">
                        <thead class="table-light">
                            <tr>
                                <th class="py-2">#</th>
                                <th class="py-2">Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Salary</th>
                                <th>photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($employee as $employees)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $employees->name }}</td>
                                <td>{{ $employees->phone }}</td>
                                <td>{{ $employees->address }}</td>
                                <td> {{ number_format($employees->salary) }} </td>
                                <td>
                                    <img src="{{ asset('public/uploads/employee/'.$employees->photo) }}" width="50" height="50">
                                </td>
                                <td>
                                    <a href="{{ url('/employee/'.$employees->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="{{ url('/employee/delete/'.$employees->id) }}" class="btn btn-danger btn-sm delete-confirm"><i class="fa-solid fa-trash"></i></a>
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modelView{{ $employees->id }}"><i class="fa-solid fa-eye"></i></button>
                                </td>
                            </tr>
                             <!-- view -->
                             <div class="modal fade" id="modelView{{ $employees->id }}">
                                <div class="modal-dialog modal-fullscreen" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Employee View</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row gutters-sm">
                                                <div class="col-md-4 mb-3">
                                                  <div class="card">
                                                    <div class="card-body">
                                                      <div class="d-flex flex-column align-items-center text-center">
                                                        <img src="{{ asset('public/uploads/employee/'.$employees->photo) }}" width="80%">
                                                        <div class="mt-3">
                                                          <h4>{{ $employees->name }}</h4>
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
                                                        <div class="col-sm-9 text-secondary">{{ $employees->name }}</div>
                                                      </div>
                                                      <hr>
                                                      <div class="row">
                                                        <div class="col-sm-3">
                                                          <h6 class="mb-0">Email :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">{{ $employees->email }}</div>
                                                      </div>
                                                      <hr>
                                                      <div class="row">
                                                        <div class="col-sm-3">
                                                          <h6 class="mb-0">Phone :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">{{ $employees->phone }}</div>
                                                      </div>
                                                      <hr>
                                                      <div class="row">
                                                        <div class="col-sm-3">
                                                          <h6 class="mb-0">Address :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">{{ $employees->address }}</div>
                                                      </div>
                                                      <hr>
                                                      <div class="row">
                                                        <div class="col-sm-3">
                                                          <h6 class="mb-0">Experience :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">{{ $employees->experience }}</div>
                                                      </div>
                                                      <hr>
                                                      <div class="row">
                                                        <div class="col-sm-3">
                                                          <h6 class="mb-0">NID No. :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">{{ $employees->nid_no }}</div>
                                                      </div>
                                                      <hr>
                                                      <div class="row">
                                                        <div class="col-sm-3">
                                                          <h6 class="mb-0">Salary :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">{{ $employees->salary }}</div>
                                                      </div>
                                                      <hr>
                                                      <div class="row">
                                                        <div class="col-sm-3">
                                                          <h6 class="mb-0">Vacation :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">{{ $employees->vacation }}</div>
                                                      </div>
                                                      <hr>
                                                      <div class="row">
                                                        <div class="col-sm-3">
                                                          <h6 class="mb-0">City :</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">{{ $employees->city }}</div>
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
