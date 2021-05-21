@extends('layouts.app')

@section('content')
<div class="container">

@if(Session::has('mensaje'))
{{ Session::get('mensaje')}}
@endif

<a href="{{ url('bots/create') }}" class="btn btn-success"> Añada un nuevo Bot a su lista </a>
<br/>
<br/>
<table class ="table table-light">
    <thead>
        <th>#</th>
        <th>ID</th>
        <th>Name</th>
        <th>Token</th>
    </thead>

    <tbody>
    @foreach($bots as $bot)
        <tr>
            <td>#</td>
            <td>{{$bot->id}}</td>
            <td>{{$bot->name}}</td>
            <td>{{$bot->token}}</td>
            <td>
                <a href="{{ url('/bots/'.$bot->id.'/edit') }}" class="btn btn-warning">
                        Editar
                </a>
                
                
                <form action="{{url('/bots/'.$bot->id) }}" method="post" class="d-inline">
                    @csrf
                    {{ method_field('DELETE')}}


                    <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar" class="btn btn-danger">
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>

</table>

{!! $bots->links() !!}

</div>
@endsection