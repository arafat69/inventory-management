@php
    $page = 'salary';
@endphp
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 m-auto">
            <div>
                <a href="{{ route('allsalary') }}" class="btn btn-primary my-2">All Salary</a>
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
                            @foreach ($salary as $salary)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $salary->name }}</td>
                                <td>
                                    <img src="{{ asset('public/uploads/employee/'.$salary->photo) }}" width="50" height="50">
                                </td>
                                <td>{{ $salary->salary }}</td>
                                <td><span class="badge bg-success">{{ date("F",strtotime('-1 months')) }}</span></td>
                                <td>
                                    {{ number_format($salary->advanced_salary) }}
                                </td>
                                <td>
                                    @php
                                        $data = DB::table('employees')->where('nid_no',$salary->nid_no)->first();
                                        $month =date("F",strtotime('-1 months'));
                                        $year = date('Y');
                                        $check = DB::table('salaries')
                                                ->where('employee_id',$data->id)
                                                ->where('salary_month',$month)
                                                ->where('salary_year',$year)
                                                ->first();
                                    @endphp
                                    @if ($check)
                                    <span class="badge bg-purple">Success</span>
                                    @else
                                    <button data-bs-toggle="modal" data-bs-target="#paysalary{{ $salary->nid_no }}" class="btn btn-primary btn-sm">Pay Now</i></a>
                                    @endif
                                </td>
                                {{-- Customer pay model --}}
                                <div class="modal fade" id="paysalary{{ $salary->nid_no }}">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary text-white">
                                                <h5 class="modal-title text-white">Salary Pay : {{ $salary->name }} </h5>
                                                <span style="font-family: sans-serif !important">Advance: {{ $salary->advanced_salary }} </span>
                                            </div>
                                            <form action="{{ url('/salaryPay/'.$data->id) }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">Total Salary</label>
                                                        <input type="text" name="salary" class="form-control" value="{{ $salary->salary }}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Due Salary</label>
                                                        @php
                                                            $totalsalary = $salary->salary - $salary->advanced_salary;
                                                        @endphp
                                                        <input type="text" name="pay_salary" class="form-control" value="{{ $totalsalary }}">
                                                    </div>
                                                    <input type="hidden" name="month" value="{{ date("F",strtotime('-1 months')) }}">
                                                    <input type="hidden" name="year" value="{{ date("Y") }}">
                                                    <input type="hidden" name="advance_id" value="{{ $salary->id }}">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Pay Now</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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

