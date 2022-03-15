@php
    $page = 'expense';
@endphp

@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 m-auto">
            <div class="mb-1">
                <a href="{{ route('today') }}" class="btn btn-outline-warning btn-sm my-2">Today</a>
                <a href="{{ route('month') }}" class="btn btn-success btn-sm my-2">Month</a>
                <a href="{{ route('year') }}" class="btn btn-outline-secondary btn-sm my-2">Year</a>
            </div>
            <div class="card">
                <div class="card-title bg-primary mb-0">
                    <h4 class="text-white py-2 px-3 m-0">Expense List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="myTable">
                        <thead class="table-light">
                            <tr>
                                <th class="py-2">#</th>
                                <th class="py-2">Details</th>
                                <th class="py-2">Amount</th>
                                <th class="py-2">Month</th>
                                <th class="py-2">Year</th>
                                <th class="py-2">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($expenses as $expense)
                            <tr>
                                <td class="py-2">{{ $i }}</td>
                                <td class="py-2">{{ $expense->details }}</td>
                                <td>{{ number_format($expense->amount) }}</td>
                                <td>{{ $expense->month }}</td>
                                <td>{{ $expense->year }}</td>
                                <td>{{ $expense->date }}</td>
                            </tr>
                            @php
                                $i++;
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
