@extends('adminlte::page')

@section('Soko','Dashboard')

@section('Soko')
    <h1>Dashboard</h1>


@stop






@section('content')

    <p>Welcome to this beautiful admin panel.</p>
{{--    <x-adminlte-button label="Button"/>--}}
    {{-- Custom --}}
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
                            <option value="1">Electronic</option>
                            <option value="2">Home Appliances</option>
                            <option value="3">Gadgets</option>
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
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#productmodal">
        Add Products
    </button>
    @php
    $heads = [
    'ID',
    'Name',
    ['label' => 'Phone','width'=> 40],
    ['label' => 'Actions', 'no-export'=>false, 'width'=>5 ],

    ];
    $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
        <i class="fa fa-lg fa-fw fa-pen"></i>
    </button>';
    $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </button>';
    $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                   <i class="fa fa-lg fa-fw fa-eye"></i>
               </button>';

    $config = [
    'data' => [
        [22, 'John Bender', '+02 (123) 123456789', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
        [19, 'Sophia Clemens', '+99 (987) 987654321', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
        [3, 'Peter Sousa', '+69 (555) 12367345243', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
    ],
    'order' => [[1, 'asc']],
    'columns' => [null, null, null, ['orderable' => false]],

];

    @endphp


    {{-- Minimal example / fill data using the component slot --}}

    <x-adminlte-datatable id="table7" :heads="$heads" head-theme="light" :config="$config" striped hoverable with buttons>
        @foreach($config['data'] as $row)
            <tr>
                @foreach($row as $cell)
                    <td>{!! $cell !!}</td>
                @endforeach
            </tr>
        @endforeach
    </x-adminlte-datatable>



@stop

    {{-- Compressed with style options / fill data using the plugin config --}}
{{--    <x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark" :config="$config"--}}
{{--                          striped hoverable bordered compressed/>--}}






@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

{{--@section('plugins.Datatables', true)--}}


@section('js')
    <script> console.log('Hi!'); </script>
@stop