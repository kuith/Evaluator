<div class="modal hide fade" id="modal_eliminar_usuario">
    <div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Eliminar Usuario</h4>
			</div>

			<form  method="POST" action="../src/procesadores/ProcesoUsuarios.php">
				<div class="modal-body">
					<div class="form-group">
						<label for="nombre_eliminar_usuario" class="form-control-label">Nombre usuario:</label>
						<input type="text" class="form-control" name = "nombre_eliminar_usuario" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar_eliminar_usuario">Cerrar</button>
					<button type="submit" class="btn btn-primary" name = "form_eliminar_usuario">Enviar</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 

