@php
    $page = 'pos';
@endphp
@extends('layouts.app')
@section('content')

<div class="row" id="printableArea">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-start">
                        <h4 class="text-end">Inventory</h4>

                    </div>
                    <div class="float-end">
                        <h4>Invoice # <br>
                            <strong>{{ date('d-M-Y') }}</strong>
                        </h4>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">

                        <div class="float-start">
                            <address style="font-size: 16px; line-height: 32px">
                              <strong>Name: {{ $customer->name }}</strong><br>
                              <strong>Shope Name: {{ $customer->shopename }}</strong><br>
                              Address: {{ $customer->address }}<br>
                              City: {{ $customer->city }}<br>
                              Phone: {{ $customer->phone }}<br>
                              </address>
                        </div>
                        <div class="float-end" style="font-size: 16px">
                            <p><strong>Order Date: </strong>{{ date('M d, Y') }}</p>
                            <p><strong>Order Status: </strong> <span class="badge bg-danger">Pending</span></p>
                            @php
                                $odr_id = DB::table('orders')->latest('id')->first();
                            @endphp
                            <p><strong>Order ID: </strong> #{{ $odr_id->id+1 }}</p>
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
                                        <th>Item</th>
                                        <th>Quantity</th>
                                        <th>Unit Cost</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contents as $con)
                                    <tr>
                                        <td class="py-2">1</td>
                                        <td>{{ $con->name }}</td>
                                        <td>{{ $con->qty }}</td>
                                        <td>{{ $con->price }}</td>
                                        <td>{{ $con->subtotal }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row" style="border-radius: 0px;">
                    <div class="col-md-9"></div>
                    <div class="col-md-3">
                        <p class="text-end" style="font-size: 17px"><b>Sub-total: </b>{{ Cart::subtotal() }}</p>
                        <p class="text-end" style="font-size: 17px">VAT: {{ Cart::tax() }}</p>
                        <hr>
                        <h3 class="text-end" style="font-family: sans-serif !important">Total: {{ Cart::total() }}</h3>
                    </div>
                </div>
                <hr>
                <div class="hidden-print">
                    <div class="float-end">
                        <button onclick="printDiv('printableArea')" class="btn btn-outline-secondary btn-sm"><i class="fa fa-print"></i></button>
                        <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#invoicePayment">Submit</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


{{-- Customer add model --}}
<div class="modal fade" id="invoicePayment">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title text-white">Invoice {{ $customer->name }}</h5>
         <span style="font-family: sans-serif !important">Total: {{ Cart::total() }}</span>
        </div>
        <form action="{{ url('/final-invoice') }}" method="POST">
        @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="">Payment Status</label>
                <select name="payment_status" class="form-select">
                    <option value="HandCash">HandCash</option>
                    <option value="Cheque">Cheque</option>
                    <option value="Due">Due</option>
                </select>
            </div>
            <input type="hidden" id="totalpay" value="{{ Cart::total() }} ">
            <div class="form-group">
                <label for="">Payment</label>
                <input type="text" name="pay" id="pay" class="form-control" onkeyup="dueCalculate()" placeholder="Payment">
            </div>
            <div class="form-group">
                <label for="">Due</label>
                <input type="text" name="due" id="due" class="form-control" placeholder="Due" value="{{ str_replace( ',', '', Cart::total()) }}">
            </div>
        </div>
        <input type="hidden" name="customer_id" value="{{ $customer->id }}">
        <input type="hidden" name="order_date" value="{{ date('d/m/Y') }}">
        <input type="hidden" name="order_status" value="Pending">
        <input type="hidden" name="total_product" value="{{ Cart::count() }}">
        <input type="hidden" name="sub_total" value="{{ Cart::subtotal() }}">
        <input type="hidden" name="vat" value="{{ Cart::tax() }}">
        <input type="hidden" name="total" value="{{ str_replace( ',', '', Cart::total()) }}">
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save Now</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </form>
      </div>
    </div>
  </div>


@endsection
