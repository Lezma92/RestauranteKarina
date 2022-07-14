<!--=====================================
MODAL AGREGAR USUARIO
======================================-->
<div class="modal fade" id="modalAgregarUsuario">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" id="Form_usurios" autocomplete="off">
        <input type="hidden" name="modal_es" id="modal_es">

        <div class="modal-header bg-info">
          <h4 class="modal-title">Agregar Usuario</h4>
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
                  <input type="text" name="input_nombre_user" id="input_nombre_user" class="form-control" placeholder="Ingresa Nombre Completo" required>
                </div>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label for="exampleInputFile">Apellidos:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" name="input_apps_user" id="input_apps_user" class="form-control" placeholder="Ingresa Apellidos" required>
                </div>
              </div>
            </div>

          </div>

          <div class="form-group">
            <label for="exampleInputFile">Usuario:</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
              </div>
              <input type="text" name="input_user" id="input_user" class="form-control" placeholder="Ingresa Nick" required>
            </div>

          </div>
          <div class="form-group">
            <label for="input_tel">Número de teléfono:</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
              </div>
              <input type="number" name="input_tel" id="input_tel" class="form-control" placeholder="TELÉFONO" required>
            </div>

          </div>

          <div class="form-group">
            <label for="input_pass">Contraseña</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
              </div>
              <input type="password" name="input_pass" id="input_pass" class="form-control" placeholder="Ingrese su contraseña" required>
            </div>

          </div>


          <div class="form-group">
            <label for="exampleInputFile">Tipo de usuario:</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-users"></i></span>
              </div>
              <select name="input_perfil" id="input_perfil" class="form-control" required>

                <option value="">Seleccione un tipo de usuario</option>
                <option value="Administrador">Administrador</option>
              </select>
            </div>
          </div>
          <!-- ------------------------------------------------------ -->
        </div>
        <div class="modal-footer justify-content-center bg-info">
          <button type="submit"class="btn  btn-lg bg-dark miBoton">Guardar Usuario</button>
        </div>
        <?php
        $archivo = new ControladorUsuarios2();
        $archivo->ctrCrearUsuario();
        ?>
      </form>
    </div>
  </div>
</div>

<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div class="modal fade" id="modalEditarUsuario">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" id="form_editar_usuario" autocomplete="off">
        <input type="hidden" name="modal_es_edi" id="modal_es_edi">

        <div class="modal-header" id="color_ofi">
          <h4 class="modal-title">Editar Usuario</h4>
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
                <label for="input_apps_user_E">Apellidos:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" name="input_apps_user_E" id="input_apps_user_E" class="form-control" placeholder="Ingresa Apellidos" required>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Usuario</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-at"></i></span>
              </div>
              <input type="text" name="input_user_E" id="input_user_E" class="form-control" placeholder="Ingresa Usuario" required>
            </div>

          </div>
          <div class="form-group">
            <label for="input_tel_e">Número de teléfono:</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
              </div>
              <input type="number" name="input_tel_e" id="input_tel_e" class="form-control" placeholder="Télefono" required>
            </div>

          </div>
          <div class="form-group">
            <label for="input_pass_e">Contraseña</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
              </div>
              <input type="password" name="input_pass_e" id="input_pass_e" class="form-control" placeholder="Ingresa Usuario" required>

            </div>

          </div>
          <input type="hidden" name="id_user_edi" id="id_user_edi" value="">

          <div class="form-group">
            <label for="exampleInputFile">Tipo de usuario:</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-users"></i></span>
              </div>
              <select name="input_perfil_E" class="form-control" required>
                <option value="" id="input_perfil_Ed"></option>
                <option value="Administrador">Administrador</option>
                <option value="Cliente">Cliente</option>

              </select>
            </div>
          </div>
          <!-- ------------------------------------------------------ -->
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn" data-dismiss="modal" id="color_ofi">Cerrar</button>
          <button type="submit" class="btn" id="color_ofi">Guardar Usuario</button>
        </div>
        <?php
        $editar = new ControladorUsuarios2();
        $editar->ctrEditarUsuario();

        ?>
      </form>
    </div>
  </div>
</div>