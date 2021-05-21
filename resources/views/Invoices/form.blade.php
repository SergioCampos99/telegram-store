    
    <div class="form-group">
    <label for="id"> id </label>
    <input type="text" class="form-control" name="id" value="{{ $Invoice->id}}" id="id" required>
    <br>
    </div>
    <div class="form-group">
    <label for="Description"> price </label>
    <input type="text" class="form-control" name="price" value="{{ $Invoice->price}}" id="price" required>
    <br>
    </div>
    <div class="form-group">
    <label for="Post"> Post Item </label>
    <input type="submit" value="Guardar datos">
    <br>
    </div>
    <a href="{{ url('Invoices/') }}"> Volver </a>
    <br>