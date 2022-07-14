<!--=====================================
MODAL EDITAR RESERVACIONES
======================================-->

<div class="modal fade" id="modalEditarReservaciones">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" id="form_editar_Reservaciones" autocomplete="off">
        <input type="hidden" name="modal_es_edi" id="modal_es_edi">

        <div class="modal-header" id="color_ofi">
          <h4 class="modal-title">Modificar Reservación</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- ------------------------------------------------------------ -->
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="exampleInputFile">Nombre:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" name="input_nombre_user_E" id="input_nombre_user_E" class="form-control" placeholder="Ingresa Nombre Completo" required>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="etq_app">Apellidos Paterno</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" name="etq_app" id="etq_app" class="form-control" placeholder="Ingresa Apellidos" required>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="etq_apm">Apellidos Materno</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" name="etq_apm" id="etq_apm" class="form-control" placeholder="Ingresa Apellidos" required>
                </div>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label for="etq_nTel">Número de teléfono:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                  </div>
                  <input type="number" name="etq_nTel" id="etq_nTel" class="form-control" placeholder="TELÉFONO" required>
                </div>

              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="etq_correo">Correo Electronico</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-at"></i></span>
              </div>
              <input type="email" name="etq_correo" id="etq_correo" class="form-control" placeholder="Ingresa Usuario" required>
            </div>
          </div>
          <input type="hidden" name="id_reservacion" id="id_reservacion" value="">

          <div class="form-group">
            <label for="etq_Ctdpersonas">Cantidad de personas:</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-users"></i></span>
              </div>
              <select name="etq_Ctdpersonas" class="form-control" required>
              <option selected disabled value="">Cantidad de Personas</option>
                        <option value="1">1 Persona</option>
                        <option value="2">2 Personas</option>
                        <option value="3">3 Personas</option>
                        <option value="4">4 Personas</option>
                        <option value="5">5 Personas</option>
                        <option value="6">6 Personas</option>

              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="fecha_hora" class="form-label">Fecha de Entrada</label>
            <input class="form-control" value="" type="datetime-local" id="fecha_hora" name="fecha_hora" max="2026-12-12">

          </div>
          <!-- ------------------------------------------------------ -->
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn" data-dismiss="modal" id="color_ofi">Cerrar</button>
          <button type="submit" class="btn" id="color_ofi">Guardar Usuario</button>
        </div>
        <?php
        $editar = new ControladorReservaciones();
        $editar->ctrEditarReservacion();

        ?>
      </form>
    </div>
  </div>
</div>