@php
    $page = 'order';
@endphp
@extends('layouts.app')
@section('content')

<div class="row" id="printelement">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-start">
                        @if ($order->order_status == 'Success')
                        <h4 class="text-primary">Delivery Order Details</h4>
                        @else
                        <h4 class="text-primary">Pending Order Confirmation</h4>
                        @endif
                    </div>
                    <div class="float-end">
                        <h4>Order Date <br>
                            <strong>{{ $order->order_date}}</strong>
                        </h4>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">

                        <div class="float-start">
                            <address style="font-size: 16px; line-height: 32px">
                              <strong>Name: {{ $order->name }}</strong><br>
                              <strong>Shope Name: {{ $order->shopename }}</strong><br>
                              Address: {{ $order->address }}<br>
                              City: {{ $order->city }}<br>
                              Phone: {{ $order->phone }}<br>
                              </address>
                        </div>
                        <div class="float-end" style="font-size: 16px">
                            @if ($order->order_status == 'Success')
                            <p><strong>Delivery Date : </strong>{{ $order->delivery_date }}</p>
                            @else
                            <p><strong>Today : </strong>{{ date('M d, Y') }}</p>
                            @endif
                            @if ($order->order_status == 'Success')
                            <p><strong>Order Status: </strong> <span class="badge bg-success">{{ $order->order_status }}</span></p>
                            @else
                            <p><strong>Order Status: </strong> <span class="badge bg-danger">{{ $order->order_status }}</span></p>
                            @endif

                            <p><strong>Order ID: </strong> #{{ $order->id }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered" style="font-size: 16px">
                                <thead class="table-info">
                                    <tr>
                                        <th class="py-2">#</th>
                                        <th>Product Name</th>
                                        <th>Product Code</th>
                                        <th>Quantity</th>
                                        <th>Unit Cost</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order_details as $row)
                                    <tr>
                                        <td class="py-2">1</td>
                                        <td>{{ $row->product_name }}</td>
                                        <td>{{ $row->product_code }}</td>
                                        <td>{{ $row->quantity }}</td>
                                        <td>{{ $row->unitcast }}</td>
                                        <td>{{ $row->total }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row" style="border-radius: 0px;">
                    <div class="col-sm-8">
                        <h5><strong>Payment By :</strong> {{ $order->payment_status }}</h5>
                        <h5><strong>Pay :</strong> {{ number_format($order->pay )}}</h5>
                        <h5><strong>Due :</strong> {{ number_format($order->due) }}
                           @if ($order->due > 0)
                           <span class="badge bg-danger" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#DuePayment">
                            <i class="fa-solid fa-pen-to-square"></i></span>
                           @endif
                        </h5>
                    </div>
                    <div class="col-sm-4">
                        <h5 class="text-end"><b>Sub-total: </b>{{ $order->sub_total }}</h5>
                        <h5 class="text-end">VAT: {{ $order->vat }}</h5>
                        <hr>
                        <h3 class="text-end" style="font-family: sans-serif !important">Total: {{ $order->total }}</h3>
                    </div>
                </div>
                <hr>
                <div class="hidden-print">
                    <div class="float-end">
                        @if ($order->order_status == 'Pending')
                        <button onclick="myprintelement()" class="btn btn-outline-secondary btn-sm"><i class="fa fa-print"></i></button>
                        <a href="{{ url('/order-done/'.$order->id) }}" class="btn btn-primary">Delivery Done</a>
                        <a href="{{ url('/delete-order/'.$order->id) }}" class="btn btn-danger btn-sm delete-confirm" >Delete</a>
                        @else
                        <button onclick="myprintelement()" class="btn btn-outline-success"><i class="fa fa-print"></i></button>
                        <a href="{{ route('delivery.order') }}" class="btn btn-danger"><i class="fa-solid fa-arrow-left-long"></i> Back</a>
                        @endif

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

 {{-- Customer Due model --}}
 <div class="modal fade" id="DuePayment">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title text-white">Pay {{ $order->name }}</h5>
                <span style="font-family: sans-serif !important">Due: {{ $order->due}}</span>
            </div>
            <form action="{{ url('/pay-amount/'.$order->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Pay Amount</label>
                        <input type="text" name="pay" id="pay" class="form-control" onkeyup="dueCalculate()" placeholder="Payment">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Pay Now</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
