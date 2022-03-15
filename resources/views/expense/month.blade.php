@php
    $page = 'expense';
@endphp

@extends('layouts.app')

@section('content')
<div class="">
    @php
        $color = ['primary','info','success','warning','secondary','danger','light','primary','info','success','warning','secondary','danger']
    @endphp
    @for ($i=1;$i<=12;$i++)
    @php
        $data = date("F",strtotime($i.' months'));
    @endphp
    <a href="{{ url('/month-expense/'.$data) }}" class="btn btn-{{ $color[$i-1] }} btn-sm my-1">{{ $data }}</a>
    @endfor
</div>
    <div class="row">
        <div class="col-md-10 m-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-success">{{ $date }} Expense</h4>
                    <div class="table-responsive">
                    <table class="table table-bordered" id="myTable">
                        <thead class="table-light">
                            <tr>
                                <th class="py-2">#</th>
                                <th class="py-2">Details</th>
                                <th class="py-2">Amount</th>
                                <th class="py-2">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($months as $month)
                            <tr>
                                <td class="py-2">{{ $i }}</td>
                                <td>{{ $month->details }}</td>
                                <td>{{ number_format($month->amount) }}</td>
                                <td>{{ $month->date }}</td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                    <h3 class="text-center text-success">Total Expense : {{ number_format($total) }} Tk</h3>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
