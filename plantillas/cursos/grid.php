<?php
    /**
        Para usar esta plantilla, la variable $cursos debe contener los
        cursos que queramos mostrar.
    */
?>
<!-- Inicio grid de cursos -->
<div id="gridCursos" class="center-block">
  <table class="table">
    <thead class="thead-inverse">
      <tr>
        <th>Id</th>
        <th>Nombre Curso</th>
        <th></th>
        <th>Edici&oacute;n</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
<?php    
    while($row = $cursos->fetch_object()) {
        $id = $row->id;

        print '<tr>';
        print '<td>'.$row->id.'</td>';
        print '<td>'.$row->nombre.'</td>';
        print '<td> <a href = "src/Curso.php?idCurso='.$id.'"><img src="imagenes/icon_enter.png" alt="Entrar en curso" id="entrarEnCurso"></a></td>';
        print '<td><img src="imagenes/icon_edit.png" alt="Editar curso" id="editarCurso"></td>';
        //print '<td><img src="imagenes/icon_delete.png" alt="Borrar curso" id="borrarCurso"></td>';
        require 'plantillas/cursos/tdBorrarCurso.php';
        print '</tr>';
    }  
?>
</tbody>
</table>

