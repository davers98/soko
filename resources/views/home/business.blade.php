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
                    <form method="post" action="{{ route('business.add') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="name">Business Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Product Name">

                            </div>
                            <div class="col">
                                <label class="mr-sm-2" for="user">Email</label>
                                <select class="custom-select mr-sm-2" id="user" name="user">
                                    <option selected>Choose...</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->email }}">{{ $user->email }}</option>
                                    @endforeach

                                </select>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="businesstype">Business Type</label>
                                <input type="text" class="form-control" id="businesstype" name="businesstype" placeholder="Business Type">
                            </div>


                        </div>

                        <div class="row">
                                <div class="col">
                                    <label for="overview">Business Overview</label>
                                    <textarea type="text" class="form-control" name="overview" placeholder="Overview"></textarea>

                                </div>

                            </div>
                            <div class="col">
                                <label for="location">Location</label>
                                <input type="text" class="form-control" id="location" name="location" placeholder="Location">
                            </div>


                        <div class="row">

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <table class="table table-bordered table-responsive-md" class="table1">
            <thead>
            <tr>
                <th colspan="2">Search</th>
                <th colspan="2">Edit</th>
                <th scope="col">

                </th>
                <th scope="col">
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
                <th scope="col">Date Added</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>

            <tbody>
            @if(!empty($businesses) && $businesses->count())
                @foreach($businesses as $key => $business)
                    <tr>
                        <td scope="row">{{ $business->id }}</td>
                        <td><a href="{{ url('dashboard/business/edit/'.$business->id) }}">{{ $business->name }}<br>
                        {{ $business->user }}</a></td>
                        <td>{{ $business->businesstype }}</td>
                        <td>{{ $business->location }}</td>
                        <td>{{ $business->created_at }}</td>
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



                                            <form method="post" action="{{ url('dashboard/businesses/update/'.$business->id) }}" enctype="multipart/form-data">

                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="name">Business Name</label>
                                                        <input type="text" class="form-control" id="name" value="{{ $business->name }}" name="name" placeholder="Product Name">

                                                    </div>
                                                    <div class="col">
                                                        <label class="mr-sm-2" for="user">User Email</label>
                                                        <select class="custom-select mr-sm-2" id="user" name="user">
                                                            <option selected  value="{{ $business->user }}"></option>
                                                            @foreach($users as $user)
                                                                <option value="{{ $user->email }}">{{ $user->email }}</option>
                                                            @endforeach

                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <label for="businesstype">Business Type</label>
                                                        <input type="text" class="form-control" name="businesstype" id="businesstype"  value="{{ $business->businesstype }}" placeholder="Business Type"/>

                                                    </div>
                                                    <div class="col">
                                                        <label for="location">Location</label>
                                                        <input type="text" class="form-control" name="location" id="location"  value="{{ $business->location }}" placeholder="Business Type"/>

                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                    <label for="overview">Business Overview</label>
                                                    <input type="text" class="form-control" name="overview" id="overview"  value="{{ $business->overview }}" placeholder="Business Type"/>

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
            @else
                <tr>
                    <td colspan="10">There are no data.</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
{{--    {!! $businesses->links() !!}--}}

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

    <style>
        .container{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .table1{
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