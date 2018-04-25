<?php
class ApplicationController {
	public function __construct() {
		require_once 'EntidadBase.php';
		require_once 'ModeloBase.php';
		foreach (glob("models/*.php") as $file) {
			require_once $file;
		}
	}
}

?>