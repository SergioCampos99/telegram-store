@extends('layouts.app')
@section('content')
<div class="container">
@if(Session::has('mensaje'))
{{ Session::get('mensaje')}}
@endif
<a href="{{ url('Invoices/create') }}" class="btn btn-success"> Añada una nueva factura a su lista </a>
<br/>
<br/>
<table class ="table table-light">
    <thead>
       
        <th>ID</th>
        <th>Price</th>
        <th>User ID</th>
        <th>ProductID</th>
    </thead>
    <tbody>
    @foreach($Invoices as $invoice)
        <tr>
            
            <td>{{$invoice->id}}</td>
            <td>{{$invoice->price}}</td>
            <td>{{$invoice->userid}}</td>
            <td>{{$invoice->productid}}</td>
            <td>
                <a href="{{ url('/Invoices/'.$invoice->id.'/edit') }}" class="btn btn-warning">
                        Editar
                </a>     
                <form action="{{url('/Invoices/'.$invoice->id) }}" method="post" class="d-inline">
                    @csrf
                    {{ method_field('DELETE')}}
                    <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar" class="btn btn-danger">
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
@endsection