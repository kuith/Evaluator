 <?php
    //$calificacionesDb = calificacionDb::getInstance();

    $alumnosDb = alumnoDb::getInstance();
    $alumnos = $alumnosDb->obtenerAlumnosCursoId($idCurso);

    //$parcialDb = ParcialDb::getInstance();
    //$parciales = $parcialDb->obtenerParcialesCurso($idCurso);

	while ($row = $alumnos->fetch_object()){
		$notaFinal = $row->id_curso;
		print '<tr>';
                    print '<td>'. $row->nombre. '</td>';
                    require '../plantillas/cursos/TdGridcursoNotaParcial.php';
					print '<td class = "celdaNotaFinal" id = "celdaNotaFinal">' .$notaFinal. '</td>';
		print '</tr>';
	}

?>
