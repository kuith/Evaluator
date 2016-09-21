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
		
		
        print '<td contenteditable id="celdaNota">' .$notaResult. '</td>';
    }
?>
	<script>
			var e1 = document.getElementById('celdaNota'),
				idAlumnoNota = "<?php echo $idAlumnoNota;?>",
				idCursoNota = "<?php echo $idCursoNota;?>",
				idParcialNota = "<?php echo $idParcialNota;?>",
				nota = "<?php echo $notaResult;?>";
				
			e1.addEventListener("blur", function(){
				var nota = e1.innerHTML;
				//alert(nota + ". IdCurso = " + idCurso);
				window.location.href = '../src/procesadores/procesarNotas.php?idAlumnoNota=' + idAlumnoNota + "&idCursoNota=" + idCursoNota + "&idParcialNota=" + idParcialNota + "&nota=" + nota;
			}, true);
	</script>

<!--<script>
	var myData = 'whatever';
	window.location.href = '../src/procesadores/procesarNotas.php?myData=' + myData;
</script>-->

