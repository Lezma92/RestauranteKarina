<div class="modal" id="modalAgregarTiposComidas">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" method="post" enctype="multipart/form-data" id="formTiposComidas">

                <div class="modal-header bg-info">
                    <h4 class="modal-title text-white">Registrar tipos de comida</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-success">
                    <div class="form-group">
                        <label for="exampleInputFile">Nombre categoria:</label>
                        <div class="input-group">
                            <input type="text" name="nom_categoria" id="nom_categoria" class="form-control" required="">
                        </div>

                        <label for="exampleInputFile">Descripción de la categoria:</label>
                        <div class="input-group">
                            <input type="text" name="descripcion" id="descripcion" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label for="logo_liga">Agregar imagen:</label>
                            <input class="form-control" id="imagen" type="file" name="imagen" required="" accept=".jpg,.png">
                        </div>
                    </div>
                </div><!-- modal-body -->
                <div class="modal-footer justify-content-center bg-info">


                    <button type="submit" class="btn btn-Guardar_Propiedad btn-lg bg-danger">
                        Registrar
                    </button>


                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal" id="modalActualizarTiposComidas">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" method="post" enctype="multipart/form-data" id="ActualizarTiposComidas">

                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white">Modificar registro</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputFile">Modificar nombre:</label>
                        <div class="input-group">
                            <input type="text" name="act_nom_categoria" id="act_nom_categoria" class="form-control" required="">
                        </div>

                        <label for="exampleInputFile">Modificar Descripción:</label>
                        <div class="input-group">
                            <input type="text" name="act_descripcion" id="act_descripcion" class="form-control" required="">
                        </div>

                        <div class="form-group">
                            <label for="act_imagen" class="form-label">Modificar Imagen:</label>
                            <input class="form-control" type="file" id="act_imagen" type="file" name="act_imagen" accept=".jpg,.png">
                        </div>
                        <input type="hidden" name="act_id" id="act_id">
                    </div>
                </div>
                <!-- modal-body -->


                <div class="modal-footer justify-content-center bg-info">
                    <button type="submit" class="btn  btn-lg bg-dark">Guardar</button>
                </div>



            </form>
        </div>
    </div>
</div>