<?php
	require '../CalificacionDb.php';
	require "../ParcialDb.php";

	$idAlumnoNotaRecibido = $_GET['idAlumnoNota'];
	$idCursoNotaRecibido = $_GET['idCursoNota'];
	$idParcialNotaRecibido = $_GET['idParcialNota'];
	$notaRecibida = $_GET['nota'];
	
	
	echo 'Se ha recibido.  idAlumno = ' . $idAlumnoNotaRecibido . '. idCurso = ' . $idCursoNotaRecibido . '. idParcial = ' . $idParcialNotaRecibido . '. nota = ' . $notaRecibida . '.';

if(is_numeric($notaRecibida)){
	procesarNota();
		
} else {
	mostrarAviso();
}


function procesarNota() {
	//actualizarBd();
	procesarNotaFinal();
}

function mostrarAviso() {
	header("Location:avisos/avisoNotaNoNumerica.php");
}

function actualizarBd(){}
	//manda al procesarFormularios para que lo haga

function procesarNotaFinal(){
	$notaFinal = 0;
	global $idAlumnoNotaRecibido;
	global $idCursoNotaRecibido;
	global $idParcialNotaRecibido;
	
	
	$calificacionBb = CalificacionDb::getInstance();
	$calificaciones = $calificacionBb->obtenerCalificacionesAlumnoCurso($idAlumnoNotaRecibido, $idCursoNotaRecibido);
	
	$parcialDb = parcialDb::getInstance();
	$PesoParcial = $parcialDb->obtenerPesoParcialPorId($idParcialNotaRecibido);
	$pesoObtenido = mysqli_fetch_assoc($PesoParcial);
	$peso = $pesoObtenido["peso"];
	
	while ($row = $calificaciones->fetch_object()){
		$nota = $row->nota;
		$notaFinal += $nota * ($peso/100);
	}
	echo "La nota final es: ".$notaFinal;
}


