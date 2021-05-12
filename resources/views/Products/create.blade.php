creacion del producto
<form action="{{ url('/Products')}}" method="post" enctype="multipart/form-data">
@csrf
<label for="Name"> Name </label>
    <input type="text" name="Name" id="Name" required>
    <br>
    <label for="Description"> Description </label>
    <input type="text" name="Description" id="Description" required>
    <br>
    <label for="Price"> Price </label>
    <input type="integer" name="Price" id="Price" required>
    <br>
    <label for="Picture"> Picture </label>
    <input type="file" name="Picture" id="Picture" required>
    <br>
    <label for="Post"> Post Item </label>
    <input type="submit" value="Guardar datos">
    <br>
    <a href="{{ url('Products/') }}"> Volver </a>
    <br>
</form>