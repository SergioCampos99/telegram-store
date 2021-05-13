@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ url('/Products/'.$product->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}

@include('Products.form')
</form>
</div>
@endsection

