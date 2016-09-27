<?php
    $calificacionesDb = calificacionDb::getInstance();
    $parcialDb = ParcialDb::getInstance();
    $parciales = $parcialDb->obtenerParcialesCurso($idCurso);
    
    while ($rowParcial = $parciales->fetch_object()){
        $calificacion = $calificacionesDb->obtenerNotaAlumnoCursoParcial($row->id, $idCurso, $rowParcial->id);
        $nota = mysqli_fetch_assoc($calificacion);
        $notaResult = (int)$nota["nota"];
				
		$idAlumnoNota = $row->id;
		$idParcialNota = $rowParcial->id;
		$idCursoNota = $idCurso;
	
        print '<td contenteditable class="celdaNota" id="celdaNota">' .$notaResult. '</td>';
    }
?>
<script>
		var idCurso = "<?php echo $idCurso; ?>",
        celdas = document.getElementsByClassName("celdaNota"),
        i,
        cuenta = celdas.length,
        celdaBlurListener = function () {
			idAlumnoNota = "<?php echo $idAlumnoNota;?>",
			idCursoNota = "<?php echo $idCursoNota;?>",
			idParcialNota = "<?php echo $idParcialNota;?>",
			nota = "<?php echo $notaResult;?>";
			console.log(idAlumnoNota);
       		//alert(idAlumnoNota);
       		window.location.href = '../src/procesadores/procesadorNotas.php?idAlumnoNota=' + idAlumnoNota
									+ "&idCursoNota=" + idCursoNota
									+ "&idParcialNota=" + idParcialNota
									+ "&nota=" + nota;
        };

   		for (i = 0; i < cuenta; i++) {
			//var nota = celdas[i].innerHTML;
			//celdas[i].addEventListener("blur", function(){celdaBlurListener(nota)}, true);
       		celdas[i].addEventListener("blur", celdaBlurListener, true);

   		}
	   
</script>


