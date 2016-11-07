 <?php
    //$calificacionesDb = calificacionDb::getInstance();

    $alumnosDb = alumnoDb::getInstance();
    $alumnos = $alumnosDb->obtenerAlumnosCursoId($idCurso);

	$calificacionDB = CalificacionDb::getInstance();
	
	while ($row = $alumnos->fetch_object()){
		print '<tr>';
                    print '<td>'. $row->nombre. '</td>';
                    require '../plantillas/cursos/TdGridcursoNotaParcial.php';
                    //print '<td class = "celdaNotaFinal" id = "celdaNotaFinal">' .$notaFinal. '</td>';
                    require '../plantillas/cursos/TdGridcursoNotaFinal.php';
		print '</tr>';
	}
