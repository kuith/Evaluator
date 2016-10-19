<?php

	$idCurso=$_GET['idCurso'];

	require "Conexion.php";
	require "CursoDb.php";
	require "ParcialDb.php";
    require "AlumnoDb.php";
    require "CalificacionDb.php";
		          
	$cursoDb = CursoDb::getInstance();
	$curso = ($cursoDb->obtenerCursoPorId($idCurso)->fetch_object());
	//$parcialDb = ParcialDb::getInstance();


	//$parciales = ($parcialDb->obtenerParcialesCurso($idCurso)->fetch_object());
	//echo ($curso->nombre);
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
    <!--<link href="css/estilos.css" rel="stylesheet" type="text/css"/>-->
	<link href="../css/estilos.css" rel="stylesheet" type="text/css"/>
  </head>
  <body>
    <div class = "container">
    	<div id="encabezadoTablaCurso" class="center-block">
            <?php print '<h2> Curso: ' .$curso->nombre. '</h2>'; ?>
            <button type="button" id="nuevoAlumno" data-toggle="modal" data-target="#modal_nuevo_alumno" class="btn btn-primary">Añadir Alumno</button>
            <button type="button" id="eliminarlumno" data-toggle="modal" data-target="#modal_eliminar_alumno" class="btn btn-primary">Eliminar Alumno</button>
            <button type="button" id="nuevoParcial" data-toggle="modal" data-target="#modal_nuevo_parcial"class="btn btn-primary">Añadir Parcial</button>
            <button type="button" id="eliminarParcial" data-toggle="modal" data-target="#modal_eliminar_parcial" class="btn btn-primary">Eliminar Parcial</button>
            
	</div>
        <!--modal prompt nuevo parcial-->
        <?php require 'modal/modalNuevoParcial.php' ?>       
        <!-- Fin modal Prompt nuevo parcial--> 
        <!--modal prompt eliminar parcial-->
        <?php require 'modal/modalEliminarParcial.php' ?>       
        <!-- Fin modal Prompt eliminar parcial--> 
        <!--modal prompt nuevo alumno-->
        <?php require 'modal/modalNuevoAlumno.php' ?> 
        <!-- Fin modal Prompt nuevo parcial-->
        <!--modal prompt eliminar alumno-->
        <?php require 'modal/modalEliminarAlumno.php' ?> 
        <!-- Fin modal Prompt eliminar parcial-->
        
	    <!--tabla del curso-->
	    <?php require '../plantillas/cursos/gridCurso.php' ?>

    </div>
    <!-- jQuery first, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
    <script src="../js/util.js" type="text/javascript"></script>
  </body>
</html>