<?php
    /**
        Para usar esta plantilla, la variable $cursos, $parcialDb y $idCurso deben existir y tener valores validos.
    */
    $parcialDb = ParcialDb::getInstance();
    $parciales = $parcialDb->obtenerParcialesCurso($idCurso);



    
?>
<!-- Inicio grid de cursos -->
<div id="gridCurso" class="center-block">
  <table class="table">
    <thead class="thead-inverse">
      <tr>
        <th>Nombre Curso</th>
        <?php
        	while ($rowParcial = $parciales->fetch_object()){
        		print '<th>' . $rowParcial->nombre. '</th>';
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

