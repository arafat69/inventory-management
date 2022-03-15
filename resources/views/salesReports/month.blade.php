@php
    $page = 'sales';
@endphp

@extends('layouts.app')

@section('content')
<div class="">
    @php
        $color = ['primary','info','success','warning','secondary','danger','light','primary','info','success','warning','secondary','danger']
    @endphp
    @for ($i=1;$i<=12;$i++)
    @php
        $month = date("F",strtotime($i.' months'));
    @endphp
    <a href="{{ url('/monthly-sales/'.$month) }}" class="btn btn-{{ $color[$i-1] }} btn-sm my-1">{{ $month }}</a>
    @endfor
</div>
    <div class="row" id="printelement">
        <div class="col-md-12 m-auto">

            <h3 class="m-0">{{ $date }} Sales</h3>
            <div class="">
                <a href="{{ route('today.sales') }}" class="btn btn-outline-primary btn-sm my-2">Today</a>
                <a href="{{ route('year.sales') }}" class="btn btn-success btn-sm my-2">Year</a>
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
                                <th class="py-2">Product</th>
                                <th class="py-2">T_Amount</th>
                                <th class="py-2">p_status</th>
                                <th class="py-2">Pay</th>
                                <th class="py-2">Due</th>
                                <th class="py-2">O_date</th>
                                <th class="py-2">D_date</th>
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
                                <td>{{ $today->order_date}}</td>
                                <td>{{ $today->delivery_date }}</td>
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
                        <a href="{{ url('/month-pdf/'.$date) }}" class="btn btn-outline-primary float-start ms-1"> Download PDF</a>
                        <span class="text-info" style="font-size: 24px">Total Sales : {{ number_format($total) }} Tk</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
