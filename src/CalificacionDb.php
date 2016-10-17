<?php
//use \Conexion;
//require "/src/Conexion.php";
include_once "Conexion.php";

Class CalificacionDb {
    static $_instance;
    private $sql;
    private $dbcon;

    /*La función construct es privada para evitar que el objeto pueda ser creado mediante new*/
    private function __construct($con = null) {
        if ($con === null) {
            $con = Conexion::getInstance();
        }
        $this->dbcon = $con;
    }

    /*Evitamos el clonaje del objeto. Patrón Singleton*/
    private function __clone(){ }

    /*Función encargada de crear, si es necesario, el objeto. Esta es la función que debemos llamar desde fuera de la clase para instanciar el objeto, y así, poder utilizar sus métodos*/
    public static function getInstance() {
        if (!(self::$_instance instanceof self)) {
            self::$_instance=new self();
        }
        return self::$_instance;
    }
	
	//nueva calificacion
	public function nuevaCalificacion($idAlumno, $idCurso, $idParcial, $nota){
		$this->sql = "INSERT INTO calificacion (id, id_alumno, id_curso, id_parcial, nota) VALUES (null, '$idAlumno', '$idCurso', '$idParcial', '$nota');";
        $this->dbcon->query($this->sql);
	}

	/*Obtencion de todas las calificaciones*/
    public function obtenerCalificaciones(){
        $results = $this->dbCon->query("SELECT * FROM calificacion;"); 
        return $results;

    }

    /*Obtencion de las calificaciones de un determinado alumno*/
    public function obtenerCalificacionesAlumno($idAlumno){
        $this->sql = "SELECT * FROM calificacion WHERE id_alumno = $idAlumno;";
        $results = $this->dbcon->query($this->sql);
        return $results;

    }

    /*Obtencion de las calificaciones de un determinado alumno y curso*/
    public function obtenerCalificacionesAlumnoCurso($idAlumno, $idCurso){
        $this->sql = "SELECT * FROM calificacion WHERE id_alumno = $idAlumno AND id_curso = $idCurso;";
        $results = $this->dbcon->query($this->sql);
        return $results;
    }

    /*Obtencion de la nota de un determinado parcial de un determinado alumno y curso*/
    public function obtenerNotaAlumnoCursoParcial($idAlumno, $idCurso, $idParcial){
        $this->sql = "SELECT id, nota FROM calificacion WHERE id_alumno = $idAlumno AND id_curso = $idCurso AND id_parcial = $idParcial;";
        $results = $this->dbcon->query($this->sql);
        return $results;
    }
	
	/*Obtencion de las calificaciones de un determinado alumno y curso que no sea parcial final*/
    public function obtenerCalificacionesAlumnoCursoNoFinal($idAlumno, $idCurso,$idParcial){
        $this->sql = "SELECT * FROM calificacion WHERE id_alumno = $idAlumno AND id_curso = $idCurso AND id_parcial != $idParcial;";
        $results = $this->dbcon->query($this->sql);
        return $results;
    }
	
	//Actualizar nota
	public function actualizarNota($idCalificacion, $nota){
		$this->sql = "UPDATE calificacion SET  nota= $nota WHERE id = $idCalificacion";
		//$this->sql = "UPDATE calificacion SET nota = CAST($nota as DECIMAL(4,2)) WHERE id = $idCalificacion";
		$results = $this->dbcon->query($this->sql);
        return $results;
	}
	
	//Obtener una determinada calificacion
	public function obtenerCalificacion($idCalificacion){
		$this->sql = "SELECT * FROM calificacion WHERE id = $idCalificacion";
        $results = $this->dbcon->query($this->sql);
        return $results;
	}
	
	//obtener nota final por idParcial
	public function obtenerNotaFinal($idParcial){
		$this->sql = "SELECT nota FROM calificacion WHERE id_parcial = $idParcial";
        $results = $this->dbcon->query($this->sql);
        return $results;
	}
	
	//obtener idCalificacion por idAlumno y idParcial
	public function obtenerIdCalificacionIdAlumnoIdParcial($idAlumno, $idParcial){
	$this->sql = "SELECT id FROM calificacion WHERE id_alumno = $idAlumno AND id_parcial = $idParcial";
        $results = $this->dbcon->query($this->sql);
        return $results;
	}
	
	//eliminar las calificaciones de un determinado parcial
	public function eliminarCalificacionPorParcial($idParcial){
		$this->sql="DELETE FROM calificacion WHERE id_parcial = $idParcial";
		$results = $this->dbcon->query($this->sql);
		return $results;
	}
        
        //Eliminar las calificaciones de un determinado curso
        public function eliminarCalificacionesCurso($idCursol){
		$this->sql="DELETE FROM calificacion WHERE id_curso = $idCursol";
		$results = $this->dbcon->query($this->sql);
		return $results;
	}
		
}
