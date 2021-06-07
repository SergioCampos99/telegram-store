@extends('layouts.app')
@section('content')

<form action="SendInvoice" method="post">
    @csrf
@foreach($Products as $product)
        <label for="">Precio: </label>
        <input type="text" name="price" value="{{ $product->Price }}" readonly>
        <br>
        <label for="">Producto: </label>
        <input type="text" name="producto" value="{{ $product->name }}" readonly>
        <br>
        <label for="">Descripción: </label>
        <input type="text" name="description" value="{{ $product->description }}" readonly>
        <input type="text" name="product_id" value="{{ $product->id }}" >

@endforeach
<br>
<br>
@foreach($Bots as $bot)
    <label for="">Bot: </label>
    <input type="text" name="bot_name" value="{{ $bot->name }}" readonly>
    <br>
    <label for="">Token Bot: </label>
    <input type="text" name="bot_token" value="{{ $bot->token }}" readonly>

@endforeach

    <br>

    <label for="">Chat id: </label>
    <input type="text" name="chat_id" > 

    <br>

    <label for="">Payload: </label>
    <input type="text" name="payload" value="sku-p001">

    <br>

    <label for="">Provider token: </label>
    <input type="text" name="provider_token">

    <br>

    <label for="">Currency: </label>
    <input type="text" name="currency" value="EUR">

    <button type="submit">SendInvoice</button>
</form>

@endsection