<?php
    include_once "Conexion.php";
	
    Class UsuarioDb{
	
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
		
	/* recuperar todos los usuarios*/
        public function obtenerTodos() { 
	$results = $this->dbcon->query("SELECT * FROM usuario;");
            return $results;
	}
		
	//Dar de alta un nuevo usuario
        public function nuevo($nombreUsuario, $password, $rol) {
            $this->sql = "INSERT INTO usuario (id, nombre, password, rol) VALUES (null, '$nombreUsuario', '$password', '$rol');";
            $this->dbcon->query($this->sql);
	}
		
	//Eliminar un usuario por nombre
        public function eliminarPorNombre($nombre){
            $this->sql = "DELETE FROM usuario WHERE nombre = $nombre";
            $this->dbcon->query($this->sql);
	}
	
	//Eliminar un usuario por id
        public function eliminarUsuarioPorId($id){
            $this->sql = "DELETE FROM usuario WHERE id = $id";
            $this->dbcon->query($this->sql);
	}
		
	//buscar usuario por nombre
	public function buscarUsuarioPorNombre($nombreUsuario){
            $this->sql = "SELECT * FROM usuario WHERE nombre = $nombreUsuario;";
            $result = $this->dbcon->query($this->sql);
            return $result;
	}
		
	//buscar usuario por contraseña
	public function buscarUsuarioPorPassword($password){
            $this-> sql = "SELECT *FROM usuario WHERE password = $password;";
            $result = $this->dbcon->query($this->sql);
            return $result;
	}
		
	//buscar usaurio por nombre o por contraseña
	public function buscarUsuarioPorNombreOPassword($nombre, $password){
            $this -> sql = "SELECT * FROM usuario WHERE nombre = $nombre OR password = $password;";
            $result = $this->dbcon->query($this->sql);
            return $result;
	}
    }
