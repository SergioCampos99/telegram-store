    
    <div class="form-group">
    <label for="Name"> Name </label>
    <input type="text" class="form-control" name="Name" value="{{ $bots->name}}" id="Name" required>
    <br>
    </div>
    <div class="form-group">
    <label for="Description"> Token </label>
    <input type="text" class="form-control" name="token" value="{{ $bots->token}}" id="token" required>
    <br>
    </div>
    <div class="form-group">
    <label for="Post"> Post Item </label>
    <input type="submit" value="Guardar datos">
    <br>
    </div>
    <a href="{{ url('bots/') }}"> Volver </a>
    <br>