@php
    $page = 'advanceSalary';
@endphp

@extends('layouts.app')

@section('content')
    <!-- Page-Title -->

    <div class="row">
        <div class="col-md-8 m-auto">
            <a href="{{ route('advanceSalary') }}" class="btn btn-primary my-2">All Advance Salary</a>
            <div class="card">
                <div class="card-title bg-primary p-2">
                    <h3 class="text-white">Add Advance Salary</h3>
                </div>
                <div class="card-body">
                    <form role="form" method="POST" action="{{ url('/advance-salary') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Employee Name</label>
                            <select name="employee_id" class="form-select select-item" style="width: 100%">
                                <option disabled selected>Select Employee Name</option>
                                @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                @endforeach
                            </select>
                            @error('employee_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select Month</label>
                            <select name="month" class="form-select select-item" style="width: 100%">
                                <option disabled selected>Select Month</option>
                                @for ($m=0;$m <=3; $m++)
                                <option value="{{ date("F",strtotime($m.' months')) }}">{{ date("F",strtotime($m.' months')) }}</option>
                                @endfor
                            </select>
                            @error('month')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Advance Salary</label>
                            <input type="text" class="form-control" placeholder="Amount" name="advanced_salary" required>
                            @error('advanced_salary')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Year</label>
                            @php $date = date('Y') @endphp
                            <input type="text" class="form-control" placeholder="2022" value="{{ $date }}" name="year" required>
                            @error('year')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
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
