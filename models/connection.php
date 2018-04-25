<?php

class Conexion extends mysqli {
	public function __construct() {
		$db = new Schema();
		$db_config = $db->setDb();
		parent::__construct($db_config['host'], $db_config['user'], $db_config['pass'], $db_config['db_name']);
		$this->query("SET NAMES utf8;");
		$this->connect_errno ? die('ERROR: Connection fail') : null;
	}
}

?>