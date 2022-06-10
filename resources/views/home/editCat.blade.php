@extends('adminlte::page')

@section('Soko','Dashboard')

@section('Soko')
    <h1>Dashboard</h1>
@stop
@section('content')
    {{--Edit Product Modal--}}

    <div class="container">
        <div class="form">
            <form method="post" action="{{ url('dashboard/categories/update/' .$categories->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col">
                        <label for="category">Category</label>
                        <input type="text" class="form-control" id="category" name="category" value="{{ $categories->category }}" placeholder="Category">

                    </div>

                </div>

                <div class="row">
                    <div class="col">
                        <label for="catdescription">Category Description</label>
                        <textarea type="text" class="form-control" name="catdescription" placeholder="Category Description"></textarea>

                    </div>

                </div>

                <div class="row">
                    <div class="col">
                        <label for="swacategory">Kategori</label>
                        <input type="text" class="form-control" id="swacategory" value="{{ $categories->swacategory }}" name="swacategory" placeholder="Kategori">

                    </div>

                </div>

                <div class="row">
                    <div class="col">
                        <label for="swacatdescription">Maelezo ya Kategory</label>
                        <textarea type="text" class="form-control" name="swacatdescription" placeholder="Maelezo ya Kategori"></textarea>

                    </div>

                </div>





                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>


@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>

        .container{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .form{
            display: flex;
            align-items: center;
            justify-content: center;
            padding: inherit;

        }
    </style>
@stop
@section('js')
    <script> console.log('Hi!'); </script>
@stop