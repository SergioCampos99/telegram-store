@extends('layouts.app')

@section('content')
<div class="container">

@if(Session::has('mensaje'))
{{ Session::get('mensaje')}}
@endif

<a href="{{ url('Products/create') }}" class="btn btn-success"> Añada un nuevo producto a su catalogo </a>
<br/>
<br/>
<table class ="table table-light">
    <thead>
        <th>#</th>
        <th>ID</th>
        <th>Picture</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
    </thead>

    <tbody>
    @foreach($Products as $product)
        <tr>
            <td>#</td>
            <td>{{$product->id}}</td>
            <td>
            <img src="{{asset('storage').'/'.$product->Picture}}" width="100" alt="">
            </td>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->Price}}</td>
            <td>
                <a href="{{ url('/Products/'.$product->id.'/edit') }}" class="btn btn-warning">
                        Editar
                </a>
                
                
                <form action="{{url('/Products/'.$product->id) }}" method="post" class="d-inline">
                    @csrf
                    {{ method_field('DELETE')}}


                    <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar" class="btn btn-danger">
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>

</table>

{!! $Products->links() !!}

</div>
@endsection