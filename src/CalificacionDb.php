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

    /*Obtencion de todas las calificaciones*/
    public function obtenerCalificaciones(){
        $results = $this->dbCon->query("SELECT * FROM calificaciones;"); 
        return $results;

    }

    /*Obtencion de las calificaciones de un determinado alumno*/
    public function obtenerCalificacionesAlumno($idAlumno){
        $this->sql = "SELECT * FROM calificaciones WHERE id_alumno = $idAlumno;";
        $results = $this->dbcon->query($this->sql);
        return $results;

    }

    /*Obtencion de las calificaciones de un determinado alumno y curso*/
    public function obtenerCalificacionesAlumnoCurso($idAlumno, $idCurso){
        $this->sql = "SELECT * FROM calificaciones WHERE id_alumno = $idAlumno AND id_curso = $idCurso;";
        $results = $this->dbcon->query($this->sql);
        return $results;
    }

    /*Obtencion de la nota de un determinado parcial de un determinado alumno y curso*/
    public function obtenerNotaAlumnoCursoParcial($idAlumno, $idCurso, $idParcial){
        $this->sql = "SELECT nota FROM calificacion WHERE id_alumno = $idAlumno AND id_curso = $idCurso AND id_parcial = $idParcial;";
        $results = $this->dbcon->query($this->sql);
        return $results;
    }

}