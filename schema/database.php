<?php

Class Schema {
	private $db_config;

	public function setDb() {
		$this->db_config = array(
			'host' => 'localhost',
			'user' => 'root',
			'pass' => '',
			'db_name' => 'zilene',
		);
		return $this->db_config;
	}
}

?>