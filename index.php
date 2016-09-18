<?php
    require "/src/Conexion.php";
    require "/src/CursoDb.php";
            
    $cursoDb = CursoDb::getInstance();
    $cursos = $cursoDb->obtenerTodos();    
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Required meta tags always come first -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
        <link href="css/estilos.css" rel="stylesheet" type="text/css"/>
    <body>
      <div class="container">
        <nav class="navbar navbar-dark bg-primary">
          <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="#" id ="nuevo_curso" data-toggle="modal" data-target="#modal_nuevo_curso">Nuevo Curso <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="#" id="cursos">Cursos</a>
          </div>
        </nav>
        <!--modal prompt -->
        <div class="modal hide fade" id="modal_nuevo_curso">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Nuevo Curso</h4>
              </div>

              <form  id="form_nuevo_curso" name="form_nuevo_curso" method="POST" action="src/ProcesoFormularios.php">
                <div class="modal-body">
                    <div class="form-group">
                      <label for="nombre_curso" class="form-control-label">Nombre del curso:</label>
                      <input type="text" class="form-control" name = "nombre_nuevo_curso" id="nombre_nuevo_curso">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar_nuevo_curso">Cerrar</button>
                  <button type="submit" class="btn btn-primary" id="enviar_nuevo_curso">Enviar</button>
                </div>
              </form>

            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->        
        <!-- Fin modal Prompt -->        
        
        <!-- grid de cursos -->
        <?php require 'plantillas/cursos/grid.php' ?>
    </div>    
  </div>

    <!-- jQuery first, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
    <script src="js/util.js"></script>
  </body>
</html>