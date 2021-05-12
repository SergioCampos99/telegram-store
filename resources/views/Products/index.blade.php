Productos
@if(Session::has('mensaje'))
{{ Session::get('mensaje')}}
@endif




<a href="{{ url('Products/create') }}"> Añada un nuevo producto a su catalogo </a>
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
                <a href="{{ url('/Products/'.$product->id.'/edit') }}">
                        Editar
                </a>
                
                
                <form action="{{url('/Products/'.$product->id) }}" method="post">
                    @csrf
                    {{ method_field('DELETE')}}


                    <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>

</table>