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
                    <h5 class="modal-title">Add Business</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('business.add') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="name">Business Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Business Name">

                            </div>

                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="user">User Email</label>
                                <input type="text" class="form-control" id="user" name="user" placeholder="User Email"/>

                            </div>

                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="col">
                                    <label for="type">Business Type</label>
                                    <input type="text" class="form-control" id="type" name="type" placeholder="Business Type">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="location">Location</label>
                                <input type="text" class="form-control" id="location" name="location" placeholder="location">
                            </div>


                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="overview">Business Overview</label>
                                <input type="text" class="form-control" id="overview" name="overview" placeholder="Business Overview" multiple/>
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


    {{--Edit Product Modal--}}



    <div class="container">
        <table class="table table-bordered table-responsive-md table1" >
            <thead>
            <tr>
                <th colspan="2">Search</th>
                <th colspan="2">Edit</th>
                <th colspan="2">
                    <button type="button" class="btn btn-primary" href="{{ route('business') }}" data-toggle="modal" data-target="#productmodal">
                        Add Business
                    </button>
                </th>

            </tr>

            <tr>
                <th scope="col">ID</th>
                <th scope="col">Business Name</th>
                <th scope="col">Business Type</th>
                <th scope="col">Location</th>
                <th colspan="2">Actions</th>
            </tr>
            </thead>

            <tbody>
            @foreach($businesses as $business)
                <tr>
                    <td scope="row">{{ $business->id }}</td>
                    <td><a href="{{ url('dashboard/businesses/edit/'.$business->id) }}">
                            {{ $business->name }}<br>
                            {{ $business->user }}</a></td>
                    <td>{{ $business->businesstype }}</td>

                    <td>{{ $business->location }}</td>
                    <td >
                        <button class="btn btn-primary"  data-toggle="modal" data-target="#editModal-{{ $business->id }}" > Edit </button>

                        <div class="modal" id="editModal-{{ $business->id }}" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Business</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">



                                        <form method="post" action="{{ url('dashboard/businesses/update'.$business->id) }}" enctype="multipart/form-data">

                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col">
                                                    <label for="name">Business Name</label>
                                                    <input type="text" class="form-control" id="name" value="{{ $business->name }}" name="name" placeholder="Business Name">

                                                </div>
                                                <div class="col">
                                                    <div class="col">
                                                        <label for="user">User</label>
                                                        <input type="text" class="form-control" id="user" value="{{ $business->user }}" name="user" placeholder="Business">
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <label for="type">Type</label>
                                                    <input type="text" class="form-control" id="type" name="type" id="description"  value="{{ $business->businesstype }}" placeholder="Business Type"/>

                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="col">
                                                        <label for="location">Location</label>
                                                        <input type="text" class="form-control" id="location" value="{{ $business->location }}" name="location" placeholder="Location">
                                                    </div>
                                                </div>



                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="overview">BusinessOverview</label>
                                                    <input type="text" class="form-control" id="overview" name="overview" value="{{ $business->overview }}" placeholder="Business Overview" multiple>
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

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" href="{{ url('dashboard/products/delete/'. $business->id ) }}"> Delete </button>

                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
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
        /*.table1{*/
        /*    display: flex;*/
        /*    align-items: center;*/
        /*    justify-content: center;*/
        /*    padding: inherit;*/

        /*}*/
    </style>


@stop

@section('js')
    <script> console.log('Hi!'); </script>


@stop