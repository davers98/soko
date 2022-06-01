@extends('adminlte::page')

@section('Soko','Dashboard')

@section('Soko')
    <h1>Dashboard</h1>


@stop

@section('content')

    <div class="modal" id="usermodal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ url('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="name">Name</label>
                                <input type="text" class="form-control"  id="name" name="name" placeholder="Name">

                            </div>

                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="email">Email</label>
                                <input type="text" class="form-control"  id="email" name="email" placeholder="Email"/>

                            </div>

                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" id="password"  name="password" placeholder="Password">

                            </div>

                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="text" class="form-control" id="password_confirmation"  name="password_confirmation" placeholder="Password">

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



    <table class="table table-bordered">
        <thead>
        <tr>
            <th colspan="2">Search</th>
            <th></th>
            <th scope="col">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#usermodal">
                    Add User
                </button>
            </th>
        </tr>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Date Joined</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td scope="row">{{ $user->id }}</td>
                <td>
                    <a href="{{ url('dashboard/categories/edit/'. $user->id) }}">
                        {{ $user->name }}<br>
                        <span> {{ $user->email }}</span>
                    </a>
                </td>
                <td>
                    {{ $user->created_at }}<br>

                </td>
                <td>
                    <button class="btn btn-primary"  data-toggle="modal" data-target="#editModal-{{ $user->id }}" > Edit </button>

                    <div class="modal" id="editModal-{{ $user->id }}" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit user</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ url('dashboard/users/update/'. $user->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" value="{{ $user->name }}" id="name" name="category" placeholder="Category">

                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" value="{{ $user->email }}" id="email" name="email" placeholder="Email"/>

                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label for="password">Password</label>
                                                <input type="text" class="form-control" id="password"  name="password" placeholder="Password">

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
                    <button type="submit" class="btn btn-danger" href="{{ url('dashboard/products/delete/'. $user->id ) }}"> Delete </button>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>



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