<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventory management System | Sales Report</title>
</head>
<style>
    *{
        padding: 0;margin: 0;
    }
    .table {
        border-collapse: collapse;
        width: 100%;
    }

    .card {
        width: 100%;
        border: 1px solid rgba(0, 0, 0, .125);
        border-radius: 3px;
        box-sizing: border-box;
    }

    .card .card-body {
        padding: 8px 16px;
    }

    th {
        color: #000;
        background-color: #ebebeb;
    }

    th,
    td {
        padding: 9px 12px;
        border-color: #dfe0e1;
    }

    .card-header:first-child {
        border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
    }

    .card-header {
        padding: 16px 12px;
        margin-bottom: 0;
        background-color: #007bff !important;
        border-bottom: 1px solid #007bff;
        color: white;
        overflow: hidden;
    }

    h2 {
        margin: 0;
        margin-bottom: 6px;
    }

    .text-left {
        text-align: left !important;
        font-size: 22px;
    }

    .text-right {
        text-align: right !important;
        float: right;
        font-size: 22px;
    }

    .bg-success {
        background-color: #17a2b8 !important;
        padding: 4px 8px;
        color: #fff;
        border-radius: 25px;
    }

    .bg-danger {
        background-color: #dc3545 !important;
        padding: 4px 8px;
        color: #fff;
        border-radius: 25px;
    }

</style>

<body>
    <div class="card">
        <div class="card-header">
            <span class="text-left">Total Pay : {{ number_format($pay) }} Tk</span>
            <span class="text-right">Total Due : {{ number_format($due) }} Tk</span>
        </div>
        <div class="card-body">
            <h2>Total Sales : {{ number_format($total) }} Tk</h2>
            <table class="table" border="1" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Total Products</th>
                        <th>Total Amount</th>
                        <th>p_status</th>
                        <th>Pay</th>
                        <th>Due</th>
                        <th>O_date</th>
                        <th>D_date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($sales as $today)
                        <tr>
                            <td>{{ $i++ }}</td>
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
                                    <span class="bg-success"> {{ $today->order_status }} </span>
                                @else
                                    <span class="bg-danger"> {{ $today->order_status }} </span>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
