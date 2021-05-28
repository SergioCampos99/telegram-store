@extends('layouts.app')
@section('content')

<table class ="table table-light">
    <thead>
        
    </thead>

    <tbody>
        @foreach($products as $product)

        <?php
           if($product->id == $producto){

           
        ?>
            <label for="">Precio: </label>
            <input type="text" value="{{ $product->Price }}">
        <?php
            }
        ?>
        
        @endforeach
    </tbody>

    <table class ="table table-light">
    <thead>
        
    </thead>

    <tbody>
        @foreach($bots as $bot)
            <?php
            if($bot->id == $bot1){
            ?>
                <label for="">Bot: </label>
                <input type="text" value="{{ $bot->name }}">
            <?php
               }
            ?>
        @endforeach
    </tbody>


            <h2>{{ $producto }}</h2>


        <a href="filtrar/{{ $producto }}/{{ $bot1 }}" class="btn btn-warning">
            Filtrar
        </a>

        <input type="submit" value="Guardar datos">

@endsection