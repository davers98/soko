@extends('adminlte::page')

@section('Soko','Dashboard')

@section('Soko')
    <h1>Dashboard</h1>




@stop






@section('content')

    <div class="container">
    <div class="card" style="width: 10rem;">
        <a href="{{ url('dashboard/users') }}">
        <div class="card-body">
            <h3 class="card-title" style="align-items: center">Users</h3><br>
            <h1>{{ $users }}</h1>

            <p class="card-text">
            </p>
        </div>
        </a>
    </div>

        <div class="card" style="width: 10rem;">
            <a href="{{ url('dashboard/products') }}">
                <div class="card-body">
                    <h3 class="card-title" style="align-items: center">Products</h3><br>
                    <h1>{{ $count }}</h1>

                    <p class="card-text">
                    </p>
                </div>
            </a>
        </div>

        <div class="card" style="width: 10rem;">
            <a href="{{ url('dashboard/businesses') }}">
                <div class="card-body">
                    <h3 class="card-title" style="align-items: center">Business</h3><br>
                    <h1>{{ $business }}</h1>

                    <p class="card-text">
                    </p>
                </div>
            </a>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

    <style>
        .container{
            display: flex;
        }
        .table1{
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: inherit;

        }
        .card{
            margin: 16px;
        }


    </style>


@stop

@section('js')
    <script> console.log('Hi!'); </script>


@stop