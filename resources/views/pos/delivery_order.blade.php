@php
    $page = 'order';
@endphp
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 m-auto">
            <a href="{{ route('pending.order') }}" class="btn btn-primary my-2 btn-sm">Pending Order</a>
            <h4 class="text-primary">All Delivery Orders</h4>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="myTable">
                        <thead class="table-light">
                            <tr>
                                <th class="py-2">#</th>
                                <th class="py-2">Name</th>
                                <th>Date</th>
                                <th>Quantity</th>
                                <th>T0tal Amount</th>
                                <th>Payment Status</th>
                                <th>Order Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($delivery as $products)
                            <tr>
                                <td class="py-2">{{ $i++ }}</td>
                                <td class="py-2">{{ $products->name }}</td>
                                <td>{{ $products->order_date }}</td>
                                <td>{{ $products->total_products }}</td>
                                <td>{{ $products->total }}</td>
                                <td>{{ $products->payment_status}}</td>
                                <td> <span class="badge bg-success">{{ $products->order_status}}</span></td>
                                <td>
                                 <a href="{{ url('view-product-order/'.$products->id) }}" class="btn btn-primary btn-sm">view</a>
                                </td>
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

