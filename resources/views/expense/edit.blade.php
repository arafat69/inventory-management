@php
    $page = 'expense';
@endphp

@extends('layouts.app')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-md-10 m-auto">
            <div class="card">
                <div class="card-title bg-gray-700 p-2">
                    <h3 class="text-white float-start">Edit Expensee</h3>
                    <div class="float-end">
                        <a href="{{ route('today') }}" class="btn btn-warning my-2">Today</a>
                        <a href="{{ route('expense.list') }}" class="btn btn-primary my-2">List</a>
                    </div>
                </div>
                <div class="card-body">
                    <form role="form" method="POST" action="{{ url('/expense/'.$expense->id) }}">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="exampleInputEmail1">Expense Details</label>
                            <textarea name="details" rows="3" class="form-control" required>{{ $expense->details }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Amount</label>
                                    <input type="text" name="amount" value="{{ $expense->amount }}" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <input type="text" name="month" value="{{ $expense->month }}" class="form-control" hidden>
                        <input type="text" name="year" value="{{ $expense->year }}" class="form-control" hidden>
                        <input type="text" name="date" value="{{ $expense->date }}" class="form-control" hidden>
                        <hr>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary ">Update</button>
                            <button type="reset" class="btn btn-outline-warning">Reset</button>
                        </div>
                    </form>
                </div>
            </div> <!-- panel -->
        </div> <!-- col-->

    </div> <!-- End row -->
@endsection
