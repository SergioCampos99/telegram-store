@section('content')
<div class="container">
    <form action="{{ route('Invoice.post')}}" method="post" enctype="multipart/form-data">
    @csrf 
        <div class ="form-group">
        <label for="Name"> Producto </label>
            <select name="products" id="1">
                @foreach ($products as $product)
                    <option value="{{ $product['id'] }}">{{$product['name']}}</option>
                @endforeach
            </select>
        </div>
        <div class ="form-group">
        <label for="Name"> Bot </label>
        <select name="bots" id="2">
                @foreach ($bots as $bot)
                    <option value="{{ $bot['id'] }}">{{$bot['name']}}</option>
                @endforeach
            </select>
        </div>
        <label for="Post"> Add Invoice </label>
                    <input type="submit" value="Guardar datos">
                    <br>
                    <a href="{{ url('Invoices/') }}"> Volver </a>
                    <br>
    </form>
</div>
@endsection

<!-- @extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ url('/Invoices')}}" method="post" enctype="multipart/form-data">
@csrf
            <div class="form-group">
                <label for="Name"> Name </label>
                <input type="text" class="form-control" name="Name" id="Name" required>
                <br>
            </div>
            <div class="form-group">
                <label for="Description"> Description </label>
                <input type="text" class="form-control" name="Description" id="Description" required>
                <br>
            </div>
            <div class="form-group">
                <label for="Price"> Price </label>
                <input type="integer" class="form-control" name="Price" id="Price" required>
                <br>
            </div>
            <div class="form-group">
                <label for="Picture"> Picture </label>
                <input type="file" class="form-control" name="Picture" id="Picture" required>
                <br>
            </div>
                <label for="Post"> Post Item </label>
                <input type="submit" value="Guardar datos">
                <br>
            <a href="{{ url('Products/') }}"> Volver </a>
                <br>
            <div style="visibility: hidden">
                <input type="text" value="{{ Auth::user()->id}}" name="userid" id="userid" required>
            </div>
    </form>
</div>
@endsection -->