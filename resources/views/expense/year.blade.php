@php
    $page = 'expense';
@endphp

@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 m-auto">
            <div class="">
                <a href="{{ route('today') }}" class="btn btn-outline-warning btn-sm my-2">Today</a>
                <a href="{{ route('month') }}" class="btn btn-success btn-sm my-2">This Month</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <h3 class="text-success text-center">Total Expense : {{ number_format($total) }} Tk</h3>
                    <div class="table-responsive">
                    <table class="table table-bordered" id="myTable">
                        <thead class="table-light">
                            <tr>
                                <th class="py-2">#</th>
                                <th class="py-2">Details</th>
                                <th class="py-2">Amount</th>
                                <th class="py-2">Month</th>
                                <th class="py-2">Date</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($years as $year)
                            <tr>
                                <td class="py-2">{{ $i }}</td>
                                <td>{{ $year->details }}</td>
                                <td>{{ number_format($year->amount) }}</td>
                                <td>{{ $year->month }}</td>
                                <td>{{ $year->date }}</td>
                                {{-- <td>
                                    <a href="{{ url('/expense/'.$year->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                </td> --}}
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
