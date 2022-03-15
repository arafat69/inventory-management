@php
    $page = 'expense';
@endphp

@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 m-auto">
            <div class="">
                <a href="{{ route('expense.add') }}" class="btn btn-success btn-sm my-2">Add New</a>
                <a href="{{ route('month') }}" class="btn btn-outline-primary btn-sm my-2">This Month</a>
                <a href="{{ route('expense.list') }}" class="btn btn-info btn-sm my-2">List</a>
            </div>
            <h4>{{ date("d F Y") }}</h4>
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center text-dark">Total : {{ number_format($totalExpense) }} Tk</h3>
                    <div class="table-responsive">
                    <table class="table table-bordered" id="myTable">
                        <thead class="table-light">
                            <tr>
                                <th class="py-2">#</th>
                                <th class="py-2">Details</th>
                                <th class="py-2">Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($today as $today)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $today->details }}</td>
                                <td>{{ number_format($today->amount) }}</td>
                                <td>
                                    <a href="{{ url('/expense/'.$today->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="{{ url('/expense/delete/'.$today->id) }}" class="btn btn-danger btn-sm delete-confirm"><i class="fa-solid fa-trash"></i></a>
                                </td>
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
