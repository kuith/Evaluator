<div class="modal hide fade" id="modal_eliminar_alumno">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Eliminar Alumno</h4>
              </div>

              <form  id="form_eliminar_alumno" name="form_eliminar_alumno" method="POST" action="../src/ProcesoFormularios.php">
                <div class="modal-body">
                    <div class="form-group">
                      <label for="nombre_parcial" class="form-control-label">Nombre del alumno:</label>
                      <input type="text" class="form-control" name = "nombre_alumno_eliminar" id="nombre_alumno_eliminar" required>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar_eliminar_alumno">Cerrar</button>
					<?php
						print'<button type="submit" class="btn btn-primary" name = "form_eliminar_alumno" value='.$idCurso.' >Enviar</button>';
					?>
                </div>
              </form>

            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->  