@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ url('/bots/'.$bots->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}

@include('bots.form')
</form>
</div>
@endsection