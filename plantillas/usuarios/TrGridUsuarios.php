<?php
	$usuariosDb = UsuarioDb::getInstance();
	$usuarios = $usuariosDb->obtenerTodos();
	
	while($rowUsuarios = $usuarios->fetch_object()){
		print '<tr>';
			print'<TD>'.$rowUsuarios->id.'</TD>';
			print'<TD>'.$rowUsuarios->nombre.'</TD>';
			print'<TD>'.$rowUsuarios->password.'</TD>';
			print'<TD>'.$rowUsuarios->rol.'</TD>';
		print '</tr>';
		
	}



