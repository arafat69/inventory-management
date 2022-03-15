@php
    $page = 'advanceSalary';
@endphp
@extends('layouts.app')

@section('content')
    <!-- Page-Title -->

    <div class="row">
        <div class="col-md-10 m-auto">
            <div class="card">
                <div class="card-title bg-primary p-2">
                    <h3 class="text-white">Edit Advance Salary</h3>
                </div>
                <div class="card-body">
                    <form role="form" method="POST" action="{{ url('/advance-salary/'.$advance->id) }}">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="exampleInputEmail1">Employee Name</label>
                            <select name="employee_id" class="form-select select-item" style="width: 100%">
                                @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}"
                                    @if($employee->id == $advance->employee_id ) selected @endif>
                                    {{ $employee->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Month</label>
                            <select name="month" class="form-select select-item" style="width: 100%">
                                <option disabled selected> Select Month</option>
                                @for ($m=0;$m <=3; $m++)
                                @php
                                    $month =date("F",strtotime($m.' months'));
                                @endphp
                                <option value="{{ $month }}" @if ($advance->month == $month ) selected @endif>
                                    {{ $month }} </option>
                                @endfor
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Advance Salary</label>
                            <input type="text" class="form-control" value="{{ $advance->advanced_salary }}" name="advanced_salary" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Year</label>
                            <input type="text" class="form-control" placeholder="2022" value="{{ $advance->year }}" name="year" required>
                        </div>
                        <hr>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary ">update</button>
                            <a href="{{ route('advanceSalary') }}" class="btn btn-outline-danger">Back</a>
                        </div>
                    </form>
                </div>
            </div> <!-- panel -->
        </div> <!-- col-->

    </div> <!-- End row -->
@endsection
