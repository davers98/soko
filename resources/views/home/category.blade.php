@extends('adminlte::page')

@section('Soko','Dashboard/Categories')

@section('Soko')
    <h1>Categories</h1>


@stop






@section('content')

    {{--    <x-adminlte-button label="Button"/>--}}
    {{-- Custom --}}
    <div class="modal" id="productmodal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="category">Category</label>
                                <input type="text" class="form-control" id="category" name="category" placeholder="Category">

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
                                <input type="text" class="form-control" id="swacategory" name="swacategory" placeholder="Kategori">

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
        </div>
    </div>


    {{-- Example button to open modal --}}




    {{-- Minimal example / fill data using the component slot --}}

    <table class="table table-bordered">
        <thead>
        <tr>
            <th colspan="2">Search</th>
            <th colspan="2">Edit</th>
            <th scope="col">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#productmodal">
                    Add Category
                </button>
            </th>
        </tr>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Product Name</th>
            <th scope="col">Desciption</th>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td scope="row">{{ $item->id }}</td>
                <td>{{ $item->category }}</td>
                <td>{{ $item->catdescription }}</td>
                <td>{{ $item->swacategory }}</td>
                <td>{{ $item->swacatdescription }}</td>
                <td>
                    <i class="fa-solid fa-pen-to-square"></i>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>



@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop


@section('js')
    <script> console.log('Hi!'); </script>
@stop