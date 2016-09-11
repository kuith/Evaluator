<?php
	//La variable $id debe existir

	print	'<td>';
	print		'<form action="src/ProcesoFormularios.php" method="post" id = "form_eliminar_Curso">';
	print			'<input type="hidden" name="borrarCurso" value='.$id.' img src="imagenes/icon_delete.png"">';
	print			'<input type="submit" id ="btnEliminarCurso" name="submit" value="">';
	print		'</form>';
	print	'</td>';
 
