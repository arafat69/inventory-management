@php
    $page = 'attendence';
@endphp

@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 m-auto">
            <a href="{{ route('takeAttendence') }}" class="btn btn-primary my-2">Take Attendence</a>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="myTable">
                        <thead class="table-light">
                            <tr>
                                <th class="py-2">#</th>
                                <th class="py-2">Attendence Date</th>
                                <th class="py-2">Month</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($add_date as $date)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $date->add_date }}</td>
                                <td>{{ $date->month }}</td>
                                <td>
                                    <a href="{{ url('/attendence/'.$date->add_date) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="{{ url('/attendence/delete/'.$date->add_date) }}" class="btn btn-danger btn-sm delete-confirm"><i class="fa-solid fa-trash"></i></a>
                                    <a href="{{ url('/attendence-view/'.$date->add_date) }}" class="btn btn-success btn-sm"><i class="fa-solid fa-magnifying-glass"></i></a>
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
