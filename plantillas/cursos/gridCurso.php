<?php
    /**
        Para usar esta plantilla, la variable $cursos, $parcialDb y $idCurso deben existir y tener valores validos.
    */
    $parcialDb = ParcialDb::getInstance();
    $parciales = $parcialDb->obtenerParcialesCurso($idCurso);
 
?>
<!-- Inicio grid de cursos -->
<div id="gridCurso" class="center-block">
  <table class="table" id = "tablaContenedora">
    <thead class="thead-inverse">
      <tr>
        <th>Nombre</th>
        <?php
        	while ($rowParcial = $parciales->fetch_object()){
        		print '<th>' .$rowParcial->nombre. ' (' .$rowParcial->peso. ' %) </th>';
        	}

        ?>
        <th>Nota Final</th>
      </tr>
    </thead>
    <tbody>
        <?php require '../plantillas/cursos/TrgridCurso.php' ?>
    </tbody>
    </table>

</div>

<script>
		var idCurso = "<?php echo $idCurso; ?>",
        celdas = document.getElementsByClassName("celdaNota"),
        i,
        cuenta = celdas.length,
		limpiarNota = function (p_nota) {
			return Number(p_nota);
		},
		celdaBlurListener = function (e) {
			var idCalificacion = e.target.dataset.calificacionId,
				nota = limpiarNota(e.target.innerHTML),
				nota_antes = e.target.dataset.notaOriginal,
				url = '../ajax.actualizarNota.php?idCalificacion=' + idCalificacion + '&nota=' + nota;

			if (nota !== nota_antes) {
				$.ajax(url);
			}
        };
		
   		for (i = 0; i < cuenta; i++) {
       		celdas[i].addEventListener("blur", celdaBlurListener, false);
   		}
</script>
