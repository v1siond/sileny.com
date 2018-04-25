<?php

Class Schema {
	private $db_config;

	public function setDb() {
		$this->db_config = array(
			'host' => 'https://www.sileny.com.ve',
			'user' => 'silenyco_sileny',
			'pass' => '12345678silenyco',
			'db_name' => 'silenyco_sileny',
		);
		return $this->db_config;
	}
}

?>