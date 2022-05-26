@extends('adminlte::page')

@section('Soko','Dashboard')

@section('Soko')
    <h1>Dashboard</h1>


@stop






@section('content')

{{--        //add product modal--}}
    <div class="modal" id="productmodal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
            <form method="post" action="{{ route('product.addProduct') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <label for="productname">Product Name</label>
                        <input type="text" class="form-control" id="productname" name="productname" placeholder="Product Name">

                    </div>
                    <div class="col">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Category</label>
                        <select class="custom-select mr-sm-2" id="category" name="category">
                            <option selected>Choose...</option>
                            @foreach($items as $item)
                            <option value="{{ $item->id }}">{{ $item->category }}</option>
                            @endforeach

                        </select>

                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="description">Description</label>
                        <textarea type="text" class="form-control" name="description" placeholder="Description"></textarea>

                    </div>

                </div>

                <div class="row">
                    <div class="col">
                        <div class="col">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="Price">
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="units">Units</label>
                        <input type="number" class="form-control" id="units" name="units" placeholder="Units">
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
        </div>
    </div>


    {{-- Example button to open modal --}}

{{--Edit Product Modal--}}

<div class="modal" id="editModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach($products as $product)
                    @if($product['id'] == $product['id'])
                <form method="post" action="{{ url('dashboard/product/'.$products->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="productname">Product Name</label>
                            <input type="text" class="form-control" id="productname" value="{{ $product->productname }}" name="productname" placeholder="Product Name">

                        </div>
                        <div class="col">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Category</label>
                            <select class="custom-select mr-sm-2" id="category" name="category">
                                <option selected  value="{{ $item->category }}"></option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->category }}</option>
                                @endforeach

                            </select>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="description">Description</label>
                            <textarea type="text" class="form-control" name="description" id="description"  value="{{ $product->description }}" placeholder="Description"></textarea>

                        </div>

                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="col">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" value="{{ $product->price }}" name="price" placeholder="Price">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="units">Units</label>
                            <input type="number" class="form-control" id="units" value="{{ $product->units }}" name="units" placeholder="Units">
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
                    @endif
                    @endforeach
            </div>
        </div>
    </div>
</div>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th colspan="2">Search</th>
            <th colspan="2">Edit</th>
            <th scope="col">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#productmodal">
                    Add Products
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
        @foreach($products as $product)
        <tr>
            <td scope="row">{{ $product->id }}</td>
            <td>{{ $product->productname }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->category }}</td>
            <td>{{ $product->price }}</td>
            <td >
                <button href="{{ url('dashboard/product/'.$product->id) }}" class="btn btn-primary" data-toggle="modal" data-target="#editModal"> Edit </button>
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