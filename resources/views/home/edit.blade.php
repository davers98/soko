@extends('adminlte::page')

@section('Soko','Dashboard')

@section('Soko')
    <h1>Dashboard</h1>
@stop
@section('content')
    {{--Edit Product Modal--}}

                            <div class="container">
                            <div class="form">
                            <form method="post" action="{{ url('dashboard/products/update/'. $products->id) }}" enctype="multipart/form-data">

                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col">
                                        <label for="productname">Product Name</label>
                                        <input type="text" class="form-control" id="productname" value="{{ $products->productname }}" name="productname" placeholder="Product Name">

                                    </div>
                                    <div class="col">
                                        <label class="mr-sm-2" for="category" >Category</label>
                                        <select class="custom-select mr-sm-2" id="category"  name="category">
                                            <option selected  value="{{ $products->category }}">{{ $products->category }}</option>
                                            @foreach($items as $item)
                                                <option value="{{ $item->id }}">{{ $item->category }}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="description">Description</label>
                                        <textarea type="text" class="form-control" name="description" id="description"  value="{{ $products->description }}" placeholder="Description"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="col">
                                            <label for="price">Price</label>
                                            <input type="number" class="form-control" id="price" value="{{ $products->price }}" name="price" placeholder="Price">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label for="units">Units</label>
                                        <input type="number" class="form-control" id="units" value="{{ $products->units }}" name="units" placeholder="Units">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="image">Images</label>
                                        <input type="file" class="form-control" id="image" name="image" placeholder="Image" multiple>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                            </div>
                            </div>

{{--                        @break--}}


    {{-- Example button to open modal --}}
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
            width: 400px;
            padding: inherit;

        }
    </style>
@stop
@section('js')
    <script> console.log('Hi!'); </script>
@stop