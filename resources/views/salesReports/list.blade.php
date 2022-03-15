@php
    $page = 'expense';
@endphp

@extends('layouts.app')

@section('content')
    <div class="row" id="printelement">
        <div class="col-md-10 m-auto">
            <div class="mb-1">
                <a href="{{ route('today.sales') }}" class="btn btn-outline-warning btn-sm my-2">Today</a>
                <a href="{{ route('month.sales') }}" class="btn btn-success btn-sm my-2">Month</a>
                <a href="{{ route('year.sales') }}" class="btn btn-outline-secondary btn-sm my-2">Year</a>
            </div>
            <div class="card">
                <div class="card-header bg-info mb-1 py-3">
                    <h3 class="text-center text-white float-start m-0">Total Pay : {{ number_format($pay) }} Tk</h3>
                    <h3 class="text-center text-white float-end m-0">Total Due : {{ number_format($due) }} Tk</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="myTable">
                        <thead class="table-light">
                            <tr>
                                <th class="py-2">#</th>
                                <th class="py-2">Name</th>
                                <th class="py-2">Total Products</th>
                                <th class="py-2">Total Amount</th>
                                <th class="py-2">p_status</th>
                                <th class="py-2">Pay</th>
                                <th class="py-2">Due</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($sales as $today)
                            <tr>
                                <td class="py-2">{{ $i++ }}</td>
                                <td>{{ $today->name }}</td>
                                <td>{{ $today->total_products }}</td>
                                <td>{{ number_format($today->total) }}</td>
                                <td>{{ $today->payment_status }}</td>
                                <td>{{ number_format($today->pay) }}</td>
                                <td>{{ number_format($today->due) }}</td>
                                <td>
                                    @if ($today->order_status == 'Success')
                                    <span class="badge bg-success"> {{ $today->order_status }} </span>
                                    @else
                                    <span class="badge bg-danger"> {{ $today->order_status }} </span>
                                    @endif

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    <div class="text-center">
                        <button onclick="myprintelement()" class="btn btn-outline-success float-start"><i class="fa fa-print"></i></button>
                        <span class="text-info" style="font-size: 24px">Total Sales : {{ number_format($total) }} Tk</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
