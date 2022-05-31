@extends('adminlte::page')

@section('Soko','Dashboard')

@section('Soko')
    <h1>Dashboard</h1>




@stop






@section('content')

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