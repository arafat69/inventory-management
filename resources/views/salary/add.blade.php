@php
    $page = 'salary';
@endphp
@extends('layouts.app')

@section('content')
    <!-- Page-Title -->

    <div class="row">
        <div class="col-md-10 m-auto">
            <a href="{{ route('salary') }}" class="btn btn-primary my-2">All Advance Salary</a>
            <div class="card">
                <div class="card-title bg-primary p-2">
                    <h3 class="text-white">Add Salary</h3>
                </div>
                <div class="card-body">
                    <form role="form" method="POST" action="{{ url('/salary') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Employee Name</label>
                            <select name="employee_id" class="form-select select-item" style="width: 100%">
                                <option disabled selected>Select Employee Name</option>
                                @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select Salary Month</label>
                            <select name="month" class="form-select select-item" style="width: 100%">
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Advance Salary</label>
                            <input type="text" class="form-control" placeholder="Advanced Salary" name="advanced_salary" required>
                        </div>
                        {{-- <div class="form-group">
                            <label for="exampleInputEmail1">Year</label>
                            @php $date = date('Y') @endphp
                            <input type="text" class="form-control" placeholder="2022" value="{{ $date }}" name="year" required>
                        </div> --}}
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
