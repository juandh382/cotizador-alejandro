<form action="../controller/QuoteController.php" method="POST" id="quote-form">
    <input type="hidden" name="accion" id="accion" value="agregar">
    <input type="hidden" name="idCotizacion" id="idCotizacion" value="">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="empresa">Empresa</label>
            <input type="text" class="form-control" id="empresa" name="empresa" required="">
        </div>
        <div class="form-group col-md-6">
            <label for="idCotizacion2">ID Cotizacion:</label>
            <input type="number" class="form-control" id="idCotizacion2" name="idCotizacion2">
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="fechaInicio">Fecha inicio</label>
        <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" required>
    </div>
    <div class="form-group col-md-6">
        <label for="fechaTermino">Fecha termino</label>
        <input type="date" class="form-control" id="fechaTermino" name="fechaTermino" required>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="insumos">Insumos:</label>
            <input type="text" class="form-control" id="insumos" name="insumos">
        </div>


        <div class="form-group col-md-6">
            <label for="pwd">Cantidad:</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad">
        </div>


        <div class="form-group col-md-12">
            <label for="comentarios">Comentarios</label>
            <textarea name="comentarios" id="comentarios" class="form-control" required></textarea>
        </div>

        <div class="form-group col-md-4">
            <label for="pwd">Valor unitario:</label>
            <input type="number" class="form-control" id="valorUnitario" name="valorUnitario">
        </div>
    </div>
    <div class="form-group col-md-4">
        <label for="pwd">Porcentaje:</label>
        <input type="number" class="form-control" id="porcentaje" name="porcentaje">
    </div>
    <div class="form-group col-md-4">
        <label for="pwd">Despacho:</label>
        <input type="number" class="form-control" id="despacho" name="despacho">
    </div>
    <div class="col-md-12">

        <button type="submit" class="btn btn-success" id="btn-agregar">Agregar</button>
    </div>
</form>