@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ url('/Products')}}" method="post" enctype="multipart/form-data">
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
    </form>
</div>
@endsection