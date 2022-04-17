<?php
//configuracion
define("HOST", "localhost");
define("USER", "root");
define("PASS", "");
define("DBNAME", "tarjetas");
define("PORT", 3306);

class DB extends mysqli{
	protected static $instance;

	public function __construct($host,$user,$pass,$dbname,$port) {
        mysqli_report(MYSQLI_REPORT_OFF);
        @parent::__construct($host,$user,$pass,$dbname,$port);
        if( mysqli_connect_errno() ) {
            throw new exception(mysqli_connect_error(), mysqli_connect_errno()); 
        }

    }

	public static function getDBConnection(){
		if( !self::$instance ) {
            self::$instance = new self(HOST,USER,PASS,DBNAME,PORT);
            $consulta = "SET CHARACTER SET UTF8";
			self::$instance->query($consulta);
        }
        return self::$instance;		
	}
	
	function getCards(){
		$consulta = "SELECT * FROM productos LIMIT 10";
		print($consulta."<br>");
		return $this->query($consulta);
	}

	function getCard($cardName){
		$consulta = "SELECT * FROM productos WHERE nombre='".$cardName."'";
		print($consulta."<br>");
		return $this->query($consulta);
	}

	function createCard($cardName,$desc,$precio,$imagen){
		$consulta = "INSERT INTO productos (nombre,descripcion,precio,imagen) VALUE("
			."'".$cardName."', "
			."'".$desc."', "
			.$precio.", "
			."'".$imagen."')";
		print($consulta."<br>");
		return $this->query($consulta);
	}

	function deleteCard($cardName){
		$consulta = "DELETE FROM productos WHERE nombre='".$cardName."'";
		print($consulta."<br>");
		return $this->query($consulta);
	}

	function updateCard($cardName, $newCardName,$desc,$precio,$imagen = ""){
		if($imagen!=""){
			$consulta = "UPDATE productos SET "
			."nombre='".$newCardName."',"
			."descripcion='".$desc."', "
			."precio=".$precio.", "
			."imagen='".$imagen."' "
			."WHERE nombre='".$cardName."'";
		} else {
			$consulta = "UPDATE productos SET "
			."nombre='".$newCardName."',"
			."descripcion='".$desc."', "
			."precio=".$precio." "
			."WHERE nombre='".$cardName."'";
		}
		print($consulta."<br>");
		return $this->query($consulta);
	}

	function getUser($name,$pass){
		$consulta = "SELECT * FROM usuarios WHERE nombre='".$name."' AND password='".$pass."'";
		print($consulta."<br>");
		return $this->query($consulta);
	}
}