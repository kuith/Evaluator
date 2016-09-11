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
                    /*while ($rowParcial = $parciales->fetch_object()){
        		$calificacion = $calificacionesDb->obtenerNotaAlumnoCursoParcial($row->id, $idCurso, $rowParcial->id);

			$nota = mysqli_fetch_assoc($calificacion);
			$notaResult = $nota["nota"];
        		print '<td>'.$notaResult. '</td>';
                    }*/
		print '</tr>';
	}

?>