

    <div class="form-group">
    <label for="Name"> Name </label>
    <input type="text" class="form-control" name="Name" value="{{ $product->name}}" id="Name" required>
    <br>
    </div>
    <div class="form-group">
    <label for="Description"> Description </label>
    <input type="text" class="form-control" name="Description" value="{{ $product->description}}" id="Description" required>
    <br>
    </div>
    <div class="form-group">
    <label for="Price"> Price </label>
    <input type="number" class="form-control" name="Price" value="{{ $product->Price}}" id="Price" required>
    <br>
    </div>
    <div class="form-group">
    <label for="Picture"> Picture </label>
    {{ $product->Picture}}
    <img src="{{asset('storage').'/'.$product->Picture}}" width="100" alt="">
    <input type="file" class="form-control" name="Picture" id="Picture">
    <br>
    </div>
    <div class="form-group">
    <label for="Post"> Post Item </label>
    <input type="submit" value="Guardar datos">
    <br>
    </div>
    <a href="{{ url('Products/') }}"> Volver </a>
    <br>
