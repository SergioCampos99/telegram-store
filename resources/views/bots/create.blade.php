@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ url('/bots')}}" method="post" enctype="multipart/form-data">
@csrf
            <div class="form-group">
                <label for="Name"> Name </label>
                <input type="text" class="form-control" name="Name" id="Name" required>
                <br>
            </div>
            <div class="form-group">
                <label for="Name"> Token </label>
                <input type="text" class="form-control" name="token" id="token" required>
                <br>
            </div>
                    <label for="Post"> Add Bot </label>
                    <input type="submit" value="Guardar datos">
                    <br>
                    <a href="{{ url('bots/') }}"> Volver </a>
                    <br>
                <div style="visibility: hidden">
                    <input type="text" value="{{ Auth::user()->id}}" name="userid" id="userid" required>
                </div>
    </form>
</div>
@endsection