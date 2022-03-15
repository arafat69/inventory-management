@php
    $page = 'advanceSalary';
@endphp

@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 m-auto">
            <a href="{{ route('advance.add') }}" class="btn btn-primary my-2">Add Advance advance</a>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="myTable">
                        <thead class="table-light">
                            <tr>
                                <th class="py-2">#</th>
                                <th class="py-2">Name</th>
                                <th >Photo</th>
                                <th>Salary</th>
                                <th>Month</th>
                                <th>Advanced</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($advance as $advances)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $advances->name }}</td>
                                <td>
                                    <img src="{{ asset('public/uploads/employee/'.$advances->photo) }}" width="50" height="50">
                                </td>
                                <td>{{ $advances->salary }}</td>
                                <td>{{ $advances->month }}</td>
                                <td>{{ $advances->advanced_salary }}</td>
                                <td>
                                    <a href="{{ url('/advance-salary/'.$advances->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="{{ url('/advance-salary/delete/'.$advances->id) }}" class="btn btn-danger btn-sm delete-confirm"><i class="fa-solid fa-trash"></i></a>
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modelView{{ $advances->id }}"><i class="fa-solid fa-eye"></i></button>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>

                </div>
                </div>
            </div>
        </div>
    </div>


@endsection

