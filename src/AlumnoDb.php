<?php
//use \Conexion;
//require "/src/Conexion.php";
include_once "Conexion.php";

Class AlumnoDb {
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

	/*Obtencion de todos los alumnos*/
 	public function obtenerAlumnos(){
    	$results = $this->dbCon->query("SELECT * FROM alumno;"); 
        return $results;

    }  


    /*Obtencion de los alumnos de un determinado cursoporId*/
    public function obtenerAlumnosCursoId($idCurso){
        $this->sql = "SELECT * FROM alumno WHERE id_curso = $idCurso;";
    	$results = $this->dbcon->query($this->sql);
        return $results;

    }

    //Dar de alta un nuevo alumno
    public function nuevo($nombreAlumno, $idCurso) {

        $this->sql = "INSERT INTO alumno (id, nombre, id_curso) VALUES (null, '$nombreAlumno', '$idCurso');";
        $this->dbcon->query($this->sql);

    }

    //Eliminar un alumno
    public function eliminar($idAlumno){
        $this->sql = "DELETE FROM parcial WHERE id = $idAlumno";
        $this->dbcon->query($this->sql);
    }



    
}