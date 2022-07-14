<!--=====================================
MODAL EDITAR RESERVACIONES
======================================-->

<div class="modal fade" id="modalAceptarReservaciones">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" autocomplete="off" id="formaceptarReservacion">
        <input type="hidden" name="modal_es_aceptar" id="modal_es_aceptar">
        <input type="hidden" name="fecha_reservacion" id="fecha_reservacion">
        <div class="modal-header bg-info">
          <h4 class="modal-title">Aceptar Resevación</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
          <!-- ------------------------------------------------------------ -->

          <h6><strong class="text-success">Nombre: </strong>
            <p class="etq_n"></p>
          </h6>
          <h6><strong class="text-success">Fecha de entrada: </strong>
            <p class="f_emtrada"></p>
          </h6>
          <h6><strong class="text-success">Cantidad de personas: </strong>
            <p class="c_personas"></p>
          </h6>

          <div class="form-group">
            <label class="text-success" for="n_mesa">Número de mesa:</label>
            <select name="n_mesa" class="form-control" id="n_mesa" required>
            <option selected disabled value="">Seleccionar</option>
              <option value="1">Mesa 1</option>
              <option value="2">Mesa 2</option>
              <option value="3">Mesa 3</option>
              <option value="4">Mesa 4</option>
              <option value="5">Mesa 5</option>
              <option value="6">Mesa 6</option>
              <option value="7">Mesa 7</option>
            </select>
          </div>
          <div class="col">
            <div class="form-group">
              <label class="text-success" for="etq_comentario">Comentario:</label>
              <div class="input-group">
                <textarea type="text-area" name="etq_comentario" id="etq_comentario" class="form-control" rows="2" required></textarea>
              </div>
            </div>
          </div>
        </div>

        <input type="hidden" name="reservacion_id" id="reservacion_id" value="">
        <!-- ------------------------------------------------------ -->
        <div class="modal-footer justify-content-center bg-info">
          <button type="submit" class="btn  btn-lg bg-dark guardarReservacion">Guardar</button>
        </div>
    </div>

    <?php
    // $editar = new ControladorUsuarios2();
    // $editar->ctrEditarReservacion();

    ?>
    </form>
  </div>
</div>
</div>