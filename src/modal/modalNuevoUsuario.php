<div class="modal hide fade" id="modal_nuevo_usuario">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
		</button>
		<h4 class="modal-title">Añadir Usuario</h4>
            </div>

            <form  method="POST" action="../src/ProcesoUsuarios.php">
                <div class="modal-body">
                    <div class="form-group">
			<label for="nombre_usuario" class="form-control-label">Nombre usuario:</label>
			<input type="text" class="form-control" name = "nombre_nuevo_usuario" id="">
                        
			<label for="password" class="form-control-label">Contraseña:</label>
			<input type="text" class="form-control" name = "password_nuevo_usuario" id="">
                        
			<label for="rol" class="form-control-label">Rol:</label>
			<input type="text" class="form-control" name = "rol_nuevo_usuario" id="">
                    </div>
		</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar_nuevo_usuario">Cerrar</button>
                    <button type="submit" class="btn btn-primary" name = "form_nuevo_usuario">Enviar</button>
                </div>
            </form>
	</div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 