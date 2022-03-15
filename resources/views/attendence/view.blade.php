@php
    $page = 'attendence';
@endphp

@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 m-auto">
            <a href="{{ route('attendence') }}" class="btn btn-primary my-2">All Attendence</a>
            <div class="card">
                <div class="card-body">
                    @foreach ($attendence as $att) @endforeach
                    <h4 class="text-primary text-center">View Attendence {{ $att->att_date }}</h4>
                    <div class="table-responsive-sm">
                            <table class="table table-bordered" id="myTable">
                                <thead class="table-light">
                                    <tr>
                                        <th class="py-2">#</th>
                                        <th class="py-2">Name</th>
                                        <th>photo</th>
                                        <th>Attendence</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach ($attendence as $attendence)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $attendence->name }}</td>
                                        <td>
                                            <img src="{{ asset('public/uploads/employee/'.$attendence->photo) }}" width="50" height="50">
                                        </td>
                                        <td>
                                            @if($attendence->attendence == 'Present')
                                             <label class="badge bg-success">Present</label>
                                            @else
                                            <label class="badge bg-danger">Absence</label>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
