<?php 

namespace Main\Creational\Singleton;

use PDO;
use PDOException;

class DatabaseConnectionPool {
	
	private static $instance;

	private function __construct(){
		echo __CLASS__ . ' executed';
	}

	private function __clone(){}

	private function __wakeup(){}

	private function init() {

		if ( !isset( self::$instance ) ) {
			self::$instance = new DatabaseConnectionPool();
		}

		return self::$instance;
	}

	public static function getConnection() {

		$host 		= 'localhost';
		$port 		= '5432';
		$user 		= 'root';
		$dbname 	= 'go_resto_app';
		$password 	= 'a1l12d4i9X';
		$dsn 		= 'pgsql:host=' . $host . ';port='. $port . ';dbname=' . $dbname . ';charset=UTF8';

		try {
			
			$pdo 	= new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]); 

			if ( $pdo ) { return $pdo; }

		} catch ( PDOException $e ) {
			die($e->getMessage());
		}
	}
}