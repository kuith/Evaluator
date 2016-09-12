<!--
	La variable $idCurso debe existir
-->
<div class="modal hide fade" id="modal_eliminar_parcial">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Eliminar Parcial</h4>
			</div>
			<form  id="form_eliminar_parcial" name="form_eliminar_parcial" method="POST" action="../src/ProcesoFormularios.php">
				<div class="modal-body">
					<div class="form-group">
						<label for="nombre_parcial" class="form-control-label">Nombre del parcial:</label>
						<input type="text" class="form-control" name = "nombre_parcial" id="nombre_parcial">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar_eliminar_parcial">Cerrar</button>
					<?php
					print'<button type="submit" class="btn btn-primary" name = "form_eliminar_parcial" value='.$idCurso.' >Enviar</button>';
					?>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->  