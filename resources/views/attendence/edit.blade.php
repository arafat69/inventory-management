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
                    <h4 class="text-primary text-center">Update Attendence {{ $att->att_date }}</h4>
                    <div class="table-responsive-sm">
                        <form action="{{ url('/attendence/'.$date) }}" method="POST">
                            @method('put')
                            @csrf
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
                                            <img src="{{ asset('public/uploads/employee/'.$attendence->photo) }}" width="60" height="60">
                                        </td>
                                        <td>
                                            <div class="form-check p-0 float-start border rounded-3 bg-success border-success m-1">
                                                <input class="form-check-input mt-2 mx-0" type="radio" name="attendence[{{ $attendence->id }}]"
                                                id="success{{ $attendence->id }}" value="Present" @if($attendence->attendence == 'Present') checked @endif>
                                                <label class="form-check-label btn-outline-info btn btn-sm text-white" for="success{{ $attendence->id }}">Present</label>
                                            </div>
                                            <div class="form-check p-0 float-start border rounded-3 bg-danger border-danger m-1">
                                                <input class="form-check-input mt-2 mx-0" type="radio" name="attendence[{{ $attendence->id }}]"
                                                id="danger{{ $attendence->id }}" value="Absence" @if($attendence->attendence == 'Absence') checked @endif>
                                                <label class="form-check-label btn btn-outline-warning text-white btn-sm" for="danger{{ $attendence->id }}">Absence</label>
                                            </div>
                                        </td>
                                        <input type="text" name="id[]" value="{{ $attendence->id }}" hidden>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <input type="submit" class="btn btn-info" value="Update Attendence">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
