<?php session_start();
ob_start();
$conexion = conexion($db_config);

if (!$conexion) {
	//header('Refresh: 1; url=http://www.sileny.com/error.php');
}

sesion();

$usuario = $_SESSION['user'];
$adm = obtenerAdmin($conexion, $usuario);
if (!$adm) {
	header('Refresh: 1; url=' . route_admin);
}
$admin = $adm[0];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$titulo = limpiarDatos($_POST['name']);
	$price = limpiarDatos($_POST['price']);
	$features = $_POST['feature'];
	$i = 1;

	if (empty($titulo) || empty($price) || empty($features)) {
		$error = 'Alguno de los campos está vacío';
		return $error;
		header('Location: ' . route_admin);
	} else {
		$guardado = $conexion->prepare('INSERT INTO pricing (id_price, title, price, deleted)
      VALUES (null, :title, :price, 0)'
		);
		$guardado->execute(array(
			':title' => $titulo,
			':price' => $price,
		));

		$error = $guardado->errorInfo();
		if ($error[0] == '' || empty($error) || $error[0] == 0) {
			$last_record = $conexion->prepare("SELECT id_price FROM pricing ORDER BY id_price DESC LIMIT 1");
			$last_record->execute();
			$id_price = $last_record->fetchAll();
			foreach ($features as $feature) {
				$guardar_features = $conexion->prepare(
					'INSERT INTO features (id_feature, price_id, description)
            VALUES (null, :id_price, :ofert)'
				);
				$guardar_features->execute(array(
					':id_price' => $id_price[0][0],
					':ofert' => $feature,
				));

				$error = $guardar_features->errorInfo();
				if (empty($error) || $error[0] == 0) {
					$error = '';
				} else {
					$errores = '';
					foreach ($error as $errore) {
						$errores = $errore;
					}
					header('Location: ' . route_admin . '?status=' . $errores);
				}
				$i++;
			}
			if ($error == '' || $error == 0) {
				header('Location: ' . route_admin . '?status=success');
			}
		} else {
			$errores = '';
			foreach ($error as $errore) {
				$errores = $errore;
			}
			header('Location: ' . route_admin . '?status=' . $errores);
		}
	}
}
?>