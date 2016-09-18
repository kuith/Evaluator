<?php
//use \Conexion;
//require "/src/Conexion.php";
include_once "Conexion.php";

Class CursoDb {
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

    /* recuperar todos los cursos*/
    public function obtenerTodos() { //obtenerTodos($con = null)
        //if ($con === null) {
        //    $con = Conexion::getInstance();
        //}
        //$results = $con->query("SELECT * FROM curso;");
        $results = $this->dbcon->query("SELECT * FROM curso;");
        return $results;
    }

    /*recuperar un curso por su id*/
    public function obtenerCursoPorId($idCurso){
        $result = $this->dbcon->query("SELECT * FROM curso WHERE id = $idCurso;");
        return $result;
    }

    /*recuperar un curso por su nombre*/
    public function obtenerCursoPorNombre($nombreCurso){
        $result = $this->dbcon->query("SELECT * FROM curso WHERE nombre = $nombreCurso;");
        return $result;
    }
	public function obtenerIdPorNombre($nombreCurso){
        $result = $this->dbcon->query("SELECT id FROM curso WHERE nombre = $nombreCurso;");
        return $result;
    }

    //Dar de alta un nuevo curso
    public function nuevo($nombreCurso) { //public function nuevo($nombreCurso, $numeroAlumnos, $con = null)
    	//if ($con === null) {
        //    $con = Conexion::getInstance();
        //}
        //$this->$sql = 'INSERT INTO curso (id, nombre, nAlumnos) VALUES (null, \"'. $nombreCurso.'\", '.$numeroAlumnos.');';
       // $numeroAlumnosCifra = (int)$numeroAlumnos;

        $this->sql = "INSERT INTO curso (id, nombre) VALUES (null, '$nombreCurso');";
        $this->dbcon->query($this->sql);

    }

    //Eliminar un curso
    public function eliminar($idCurso){
        $this->sql = "DELETE FROM curso WHERE id = $idCurso";
        $this->dbcon->query($this->sql);
    }
}

