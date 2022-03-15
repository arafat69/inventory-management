@php
    $page = 'salary';
@endphp
@extends('layouts.app')

@section('content')
    <div class="row" id="printelement">
        <div class="col-md-11 m-auto">
            <div>
                <a href="{{ route('salary') }}" class="btn btn-primary my-2">Pay Salary</a>
                <h4 class="float-end"> {{ date('d F Y') }} </h4>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="myTable">
                        <thead class="table-light">
                            <tr>
                                <th class="py-2">#</th>
                                <th class="py-2">Name</th>
                                <th >Photo</th>
                                <th >Total Salary</th>
                                <th >Pay Salary</th>
                                <th>Month</th>
                                <th>Year</th>
                                <th>Advanced</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($salary as $salary)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $salary->name }}</td>
                                <td>
                                    <img src="{{ asset('public/uploads/employee/'.$salary->photo) }}" width="50" height="50">
                                </td>
                                <td>{{ $salary->salary }}</td>
                                <td>{{ $salary->paid_salary }}</td>
                                <td><span class="badge bg-success">{{ $salary->salary_month}}</span></td>
                                <td><span class="badge bg-success">{{ $salary->salary_year}}</span></td>
                                <td>
                                    {{ number_format($salary->advanced_salary) }}
                                </td>
                                <td>
                                    <a href="{{ url('/salary/delete/'.$salary->salary_id) }}" class="btn btn-danger btn-sm delete-confirm"><i class="fa-solid fa-trash"></i></a>
                                </td>

                            </tr>

                            @endforeach
                        </tbody>
                    </table>

                </div>
                <button onclick="myprintelement()" class="btn btn-outline-success"><i class="fa fa-print"></i></button>
                </div>
            </div>
        </div>
    </div>


@endsection

