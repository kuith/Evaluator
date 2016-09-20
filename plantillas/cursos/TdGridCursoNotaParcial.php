<?php
    $calificacionesDb = calificacionDb::getInstance();
    $parcialDb = ParcialDb::getInstance();
    $parciales = $parcialDb->obtenerParcialesCurso($idCurso);
    
    while ($rowParcial = $parciales->fetch_object()){
        $calificacion = $calificacionesDb->obtenerNotaAlumnoCursoParcial($row->id, $idCurso, $rowParcial->id);
        $nota = mysqli_fetch_assoc($calificacion);
        $notaResult = (int)$nota["nota"];
		
        print '<td contenteditable = "true" id="celdaNota">' .$notaResult. '</td>';
    }
?>

<script>
 	var e1 = document.getElementById('celdaNota'),
		idParcial = <?php echo $rowParcial->id?>;
	
	e1.addEventListener('blur', function(){
		var nota = e1.innerHTML;
		alert(nota + "..." + idParcial);
	}, true);
</script>

