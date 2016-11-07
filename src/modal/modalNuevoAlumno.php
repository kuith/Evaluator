<?php
  /* para que funcione debe existir $idCurso*/
?>

<div class="modal hide fade" id="modal_nuevo_alumno">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Añadir Alumno</h4>
              </div>

              <form  method="POST" action="../src/ProcesoFormularios.php">
                <div class="modal-body">
                    <div class="form-group">
                      <label for="nombre_alumno" class="form-control-label">Nombre del alumno:</label>
                      <input type="text" class="form-control" name = "nombre_alumno" id="nombre_alumno">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar_nuevo_alumno">Cerrar</button>
                  <?php
                    print'<button type="submit" class="btn btn-primary" name = "form_nuevo_alumno" value='.$idCurso.' >Enviar</button>';
                  ?>
                </div>
              </form>

            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->   