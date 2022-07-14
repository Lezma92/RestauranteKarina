<div class="modal fade" id="modalAddPlatillos" tabindex="-1" role="document" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info" >
                <h4 class="modal-title" id="myModalLabel">Registrar Platillo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="POST" enctype="multipart/form-data" id="formAddPlatillos">
                <div class="modal-body text-success">

                    <div class="form-group">
                        <div class="form-group">
                            <label for="nombre_platillo" class="form-label">Nombre del platillo:</label>
                            <input class="form-control" type="text" require name="nombre_platillo" id="nombre_platillo" class="form-control" placeholder="Ej. Pezcado al mojo de ajo" required>
                        </div>
                        <input type="hidden" id="id_categoria_platillo" name="id_categoria_platillo" value="">

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="etq_precioxu" class="form-label">Precio Unitario:</label>
                                    <input class="form-control" type="number" require name="etq_precioxu" id="etq_precioxu" class="form-control" placeholder="Ej. $10 - $250" required>
                                </div>

                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="etq_precioxp" class="form-label">Precio x Paquete:</label>
                                    <input class="form-control" type="number" require name="etq_precioxp" id="etq_precioxp" class="form-control" placeholder="Ej. $0 - $250" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="img_ilustracion" class="form-label">Ilustración:</label>
                            <input class="form-control" type="file" id="img_ilustracion" type="file" name="img_ilustracion" accept=".jpg,.png" require>
                        </div>
                        <div class="form-group">
                            <label for="eqt_descripcion">Descripción del platillo</label>
                            <textarea class="form-control" id="eqt_descripcion" name="eqt_descripcion" rows="3" require></textarea>
                        </div>
                    </div>
                </div>
                <p id="mensaje" style="color: #FF0000" value=""></p>
                <div class="modal-footer  justify-content-center bg-info">
                    <button type="submit" class="btn btn-dark  btn-lg">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>