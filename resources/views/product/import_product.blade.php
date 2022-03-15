@php
    $page = 'product';
@endphp

@extends('layouts.app')

@section('content')
    <!-- Page-Title -->

    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="card">
                <div class="card-title bg-primary p-2">
                    <h3 class="text-white m-0">Products Import
                        <a href="{{ route('export') }}" class="btn btn-success float-end">Download Xlxs</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form role="form" method="POST" action="{{ route('import') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Xlxs File Import</label><br>
                                    <input type="file"  name="import_file" required>
                                </div>
                            <hr>
                            <div class="text-start">
                                <button type="submit" class="btn btn-primary ">Upload</button>
                                <button type="reset" class="btn btn-outline-warning">Reset</button>
                            </div>
                    </form>
                    <strong class="pt-3 text-danger">Please Download the xlsx file and clear it |
                        Now you can write your all products by listing and import it again | Thanks You.</strong>
                </div>
            </div> <!-- panel -->
        </div> <!-- col-->

    </div> <!-- End row -->
@endsection
