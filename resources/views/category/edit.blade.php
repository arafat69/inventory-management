@php
    $page = 'category';
@endphp

@extends('layouts.app')

@section('content')
    <!-- Page-Title -->

    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="card">
                <div class="card-title bg-primary p-2">
                    <h3 class="text-white">Edit Category</h3>
                </div>
                <div class="card-body">
                    <form role="form" method="POST" action="{{ url('/category/'.$category->id) }}">
                        @csrf
                        @method('patch')
                        <div class="row">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category Name</label>
                                    <input type="text" class="form-control" value="{{ $category->cat_name }}" name="cat_name" required>
                                </div>
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
