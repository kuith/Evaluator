 <?php
    //$calificacionesDb = calificacionDb::getInstance();

    $alumnosDb = alumnoDb::getInstance();
    $alumnos = $alumnosDb->obtenerAlumnosCursoId($idCurso);

    //$parcialDb = ParcialDb::getInstance();
    //$parciales = $parcialDb->obtenerParcialesCurso($idCurso);

	while ($row = $alumnos->fetch_object()){
		print '<tr>';
                    print '<td>'. $row->nombre. '</td>';
                    require '../plantillas/cursos/TdGridcursoNotaParcial.php';
		print '</tr>';
	}

?>
