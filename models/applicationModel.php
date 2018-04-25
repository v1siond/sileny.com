<?php
class ApplicationModel extends Schema {
	public $db;
	private $table;
	private $user;

	public function __construct($table) {
		require_once 'connection.php';
		$this->db = new Conexion();
		$this->table = $table;
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

	public function getAll($column) {
		$query = $this->db->query("SELECT * FROM $this->table ORDER BY $column DESC") or die(mysqli_error($this->db));

		if ($this->rows($query) > 0) {
			$result = $this->runMultiple($query);
			return $result;
		} else {
			return $query;
		}
	}

	public function getBy($column, $value) {
		$query = $this->db->query("SELECT * FROM $this->table WHERE $column='$value'") or die(mysqli_error($this->db));

		if ($this->rows($query) > 0) {
			$result = $this->runMultiple($query);
			return $result;
		} else {
			return $query;
		}
	}

	public function getMultiple($columnsValue) {
		$consult = '';
		foreach ($columnsValue as $key => $value) {
			$consult = $consult . ' ' . $value;
		}

		$query = $this->db->query("SELECT SQL_CALC_FOUND_ROWS * FROM $this->table WHERE $consult") or die(mysqli_error($this->db));
		if ($this->rows($query) > 0) {
			$result = $this->runMultiple($query);
			return $result;
		} else {
			return $query;
		}
	}

	public function getMultipleJoin($columnsValue, $joinQuery) {
		$consult = '';
		foreach ($columnsValue as $key => $value) {
			$consult = $consult . ' ' . $value;
		}

		$query = $this->db->query("SELECT SQL_CALC_FOUND_ROWS * FROM $this->table $joinQuery WHERE $consult") or die(mysqli_error($this->db));
		if ($this->rows($query) > 0) {
			$result = $this->runMultiple($query);
			return $result;
		} else {
			return $query;
		}
	}

	public function deleteBy($column, $value) {
		$query = $this->db->query("UPDATE $this->table SET deleted = 1 WHERE $column = $value") or die(mysqli_error($this->db));
		return $query;
	}

	public function deleteHardBy($column, $value) {
		$query = $this->db->query("DELETE FROM $this->table WHERE $column='$value'");
		return $query;
	}

	public function getUser() {
		$this->user = $_SESSION['user'];
		$sql = $this->db->query("SELECT id FROM admin WHERE username = '$this->user' OR email = '$this->user'") or die(mysqli_error($this->db));
		return $sql;
	}

	public function CheckView() {
		if (isset($_GET['view']) && $_GET['view'] == 'admin' && isset($_SESSION['id']) && isset($_SESSION['user'])) {
			return true;
		} else {
			return 2;
		}
	}

	public function paginaActual() {

		return isset($_POST['p']) ? (int) $_POST['p'] : 1;

	}
}
?>