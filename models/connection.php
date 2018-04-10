<?php

class Conexion extends mysqli {
	public function __construct() {
		$db = new Schema();
		$db_config = $db->setDb();
		parent::__construct($db_config['host'], $db_config['user'], $db_config['pass'], $db_config['db_name']);
		$this->query("SET NAMES utf8;");
		$this->connect_errno ? die('ERROR: Connection fail') : null;
	}

	public function rows($x) {
		return mysqli_num_rows($x);
	}

	public function run($x) {
		return mysqli_fetch_array($x);
	}

	public function runMultiple($x) {
		$result = array();
		while ($row = mysqli_fetch_assoc($x)) {
			$result[] = $row;
		}
		return $result;
	}

	public function free($x) {
		return mysqli_free_result($x);
	}
}

?>