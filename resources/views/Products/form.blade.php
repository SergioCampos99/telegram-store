Formulario

    <label for="Name"> Name </label>
    <input type="text" name="Name" value="{{ $product->name}}" id="Name" required>
    <br>
    <label for="Description"> Description </label>
    <input type="text" name="Description" value="{{ $product->description}}" id="Description" required>
    <br>
    <label for="Price"> Price </label>
    <input type="number" name="Price" value="{{ $product->Price}}" id="Price" required>
    <br>
    <label for="Picture"> Picture </label>
    {{ $product->Picture}}
    <img src="{{asset('storage').'/'.$product->Picture}}" width="100" alt="">
    <input type="file" name="Picture" id="Picture" required>
    <br>
    <label for="Post"> Post Item </label>
    <input type="submit" value="Guardar datos">
    <br>
    <a href="{{ url('Products/') }}"> Volver </a>
    <br>
