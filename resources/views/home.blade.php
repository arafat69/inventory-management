@php
    $page = 'dashboard';
@endphp
@extends('layouts.app')

@section('content')
<style>
    span{
        font-family: sans-serif !important;
    }
</style>
<section class="section">

<div class="row">
    <div class="col-md-6 col-sm-6 col-lg-3">
        <div class="mini-stat clearfix bx-shadow">
            <span class="mini-stat-icon bg-info"><i class="fa-solid fa-dollar-sign"></i></span>
            <div class="mini-stat-info text-end text-muted">
                <span class="count">{{ $todaySale }}</span>
                Today Sales
            </div>
            <div class="tiles-progress">
                <div class="mt-3">
                    <h6 class="text-uppercase">Sales <span class="float-end">{{ $newOrder*5 }}%</span></h6>
                    <div class="progress progress-sm m-0">
                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="{{ $newOrder*5 }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $newOrder*5 }}%;">
                            <span class="sr-only">{{ $newOrder*5 }}% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-3">
        <div class="mini-stat clearfix bx-shadow">
            <span class="mini-stat-icon bg-purple"><i class="fa-solid fa-cart-shopping"></i></span>
            <div class="mini-stat-info text-end text-muted">
                <span class="count">{{ $newOrder }}</span>
                New Orders
            </div>
            <div class="tiles-progress">
                <div class="mt-3">
                    <h6 class="text-uppercase">Orders <span class="float-end">{{ $newOrder }}%</span></h6>
                    <div class="progress progress-sm m-0">
                        <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="{{ $newOrder }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $newOrder }}%;">
                            <span class="sr-only">{{ $newOrder }}% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-lg-3">
        <div class="mini-stat clearfix bx-shadow">
            <span class="mini-stat-icon bg-success"><i class="fa-solid fa-eye"></i></span>
            <div class="mini-stat-info text-end text-muted">
                <span class="count">{{ $pendingTotal }}</span>
                Pending Orders
            </div>
            <div class="tiles-progress">
                <div class="mt-3">
                    <h6 class="text-uppercase">Pending <span class="float-end">{{ $pendingorder }}%</span></h6>
                    <div class="progress progress-sm m-0">
                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $pendingorder }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $pendingorder }}%;">
                            <span class="sr-only">{{ $pendingorder }}% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-lg-3">
        <div class="mini-stat clearfix bx-shadow">
            <span class="mini-stat-icon bg-primary"><i class="fa-solid fa-credit-card"></i></span>
            <div class="mini-stat-info text-end text-muted">
                <span class="count">{{ $due }}</span>
                Due Month
            </div>
            <div class="tiles-progress">
                <div class="mt-3">
                    <h6 class="text-uppercase">Due <span class="float-end">50%</span></h6>
                    <div class="progress progress-sm m-0">
                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                            <span class="sr-only">50% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-sm-6 col-lg-3">
        <div class="mini-stat clearfix bx-shadow">
            <span class="mini-stat-icon bg-warning"><i class="fa-solid fa-list"></i></span>
            <div class="mini-stat-info text-end text-muted">
                <span class="count">{{ $category }}</span>
                Total Category
            </div>
            <div class="tiles-progress">
                <div class="mt-3">
                    <h6 class="text-uppercase">Category <span class="float-end">{{ $category }}%</span></h6>
                    <div class="progress progress-sm m-0">
                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="{{ $category }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $category }}%;">
                            <span class="sr-only">{{ $category }}% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-3">
        <div class="mini-stat clearfix bx-shadow">
            <span class="mini-stat-icon bg-green"><i class="fa-solid fa-box-open"></i></span>
            <div class="mini-stat-info text-end text-muted">
                <span class="count">{{ $product }}</span>
                Total Products
            </div>
            <div class="tiles-progress">
                <div class="mt-3">
                    <h6 class="text-uppercase">Products <span class="float-end">{{ $product }}%</span></h6>
                    <div class="progress progress-sm m-0">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{ $product }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $product }}%;">
                            <span class="sr-only">{{ $product }}% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-3">
        <div class="mini-stat clearfix bx-shadow">
            <span class="mini-stat-icon bg-danger"><i class="fa-solid fa-users-gear"></i></span>
            <div class="mini-stat-info text-end text-muted">
                <span class="count">{{ $customer }}</span>
                Total Customers
            </div>
            <div class="tiles-progress">
                <div class="mt-3">
                    <h6 class="text-uppercase">Customers <span class="float-end">{{ $customer }}%</span></h6>
                    <div class="progress progress-sm m-0">
                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="{{ $customer }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $customer }}%;">
                            <span class="sr-only">{{ $customer }}% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-3">
        <div class="mini-stat clearfix bx-shadow">
            <span class="mini-stat-icon bg-secondary"><i class="fa-solid fa-user-group"></i></span>
            <div class="mini-stat-info text-end text-muted">
                <span class="count">{{ $employee }}</span>
                Total Employee
            </div>
            <div class="tiles-progress">
                <div class="mt-3">
                    <h6 class="text-uppercase">Employee <span class="float-end">{{ $employee }}%</span></h6>
                    <div class="progress progress-sm m-0">
                        <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="{{ $employee }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $employee }}%;">
                            <span class="sr-only">{{ $employee }}% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-sm-6 col-lg-3">
        <div class="mini-stat clearfix bx-shadow">
            <span class="mini-stat-icon" style="background: #148F77"><i class="fa-solid fa-people-carry-box"></i></span>
            <div class="mini-stat-info text-end text-muted">
                <span class="count">{{ $supplier }}</span>
                Total Suppliers
            </div>
            <div class="tiles-progress">
                <div class="mt-3">
                    <h6 class="text-uppercase">Suppliers <span class="float-end">{{ $supplier }}%</span></h6>
                    <div class="progress progress-sm m-0">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{ $supplier }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $supplier }}%;">
                            <span class="sr-only">{{ $supplier }}% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-3">
        <div class="mini-stat clearfix bx-shadow">
            <span class="mini-stat-icon" style="background-color: #9B59B6"><i class="fa-solid fa-wallet"></i></span>
            <div class="mini-stat-info text-end text-muted">
                <span class="count">{{ $todayExpense }}</span>
                Today Expense
            </div>
            <div class="tiles-progress">
                <div class="mt-3">
                    <h6 class="text-uppercase">Expense <span class="float-end">{{ $Expense*4 }}%</span></h6>
                    <div class="progress progress-sm m-0">
                        <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="{{ $Expense*4 }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $Expense*4 }}%;">
                            <span class="sr-only">{{ $Expense*4 }}% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-lg-3">
        <div class="mini-stat clearfix bx-shadow">
            <span class="mini-stat-icon bg-danger"><i class="fa-solid fa-credit-card"></i></span>
            <div class="mini-stat-info text-end text-muted">
                <span class="count">{{ $monthExpense }}</span>
                Month Total
            </div>
            <div class="tiles-progress">
                <div class="mt-3">
                    <h6 class="text-uppercase">Expense Months <span class="float-end">{{ $Expensemonth*2 }}%</span></h6>
                    <div class="progress progress-sm m-0">
                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="{{ $Expensemonth*2 }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $Expensemonth*2 }}%;">
                            <span class="sr-only">{{ $Expensemonth*2 }}% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-lg-3">
        <div class="mini-stat clearfix bx-shadow">
            <span class="mini-stat-icon" style="background-color: #1ABC9C"><i class="fa-solid fa-eye"></i></span>
            <div class="mini-stat-info text-end text-muted">
                <span class="count">{{ $pendingTotal }}</span>
                Pending Orders
            </div>
            <div class="tiles-progress">
                <div class="mt-3">
                    <h6 class="text-uppercase">Pending <span class="float-end">{{ $pendingorder }}%</span></h6>
                    <div class="progress progress-sm m-0">
                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $pendingorder }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $pendingorder }}%;">
                            <span class="sr-only">{{ $pendingorder }}% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</section>

@endsection
