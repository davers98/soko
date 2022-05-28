@extends('adminlte::page')

@section('Soko','Dashboard')

@section('Soko')
    <h1>Dashboard</h1>
@stop
@section('content')
    {{--Edit Product Modal--}}
                    @foreach($products as $product)
                        @if($product->id)
                            <form method="post" action="{{ url('dashboard/productsUpdate/'.$product->id) }}" enctype="multipart/form-data">

                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col">
                                        <label for="productname">Product Name</label>
                                        <input type="text" class="form-control" id="productname" value="{{ $product->productname }}" name="productname" placeholder="Product Name">

                                    </div>
                                    <div class="col">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Category</label>
                                        <select class="custom-select mr-sm-2" id="category" name="category">
                                            <option selected  value="{{ $product->category }}"></option>
                                            @foreach($items as $item)
                                                <option value="{{ $item->id }}">{{ $item->category }}</option>
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
                        @break
                    @endforeach

    {{-- Example button to open modal --}}
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script> console.log('Hi!'); </script>
@stop