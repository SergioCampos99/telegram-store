@extends('layouts.app')
@section('content')

@foreach($Products as $product)
        <label for="">Precio: </label>
        <input type="text" value="{{ $product->Price }}">
@endforeach
<br>
<br>
@foreach($Bots as $bot)
<label for="">Bot: </label>
    <input type="text" value="{{ $bot->name }}">   
@endforeach
    
<a href="SendInvoice/">SendInvoice</a>
@endsection