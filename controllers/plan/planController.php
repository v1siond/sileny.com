<?php session_start();
ob_start();

$plans = new Plan();
$features = new Feature();
if ($_POST && $_POST['admin'] == true) {
	// Admin
	switch ($_POST['action']) {
	case 'info':
		$offers = $plans->getPlans();
		require 'views/plan/info.php';
		break;
	case 'new':
		if (!empty($_POST['titulo']) && !empty($_POST['price']) && $_POST["region"] != '' && !empty($_POST['feature'])) {
			$titulo = limpiarDatos($_POST['titulo']);
			$price = $_POST['price'];
			$region = $_POST['region'];
			$features = $_POST['feature'];
			$sql = $plans->savePlan($titulo, $price, $region, $features);
			if ($sql == 1) {
				$offers = $plans->getPlans();
				$flash_message = flashMessage('Plan creado exitosamente', 'success');
				echo $flash_message;
				require 'views/plan/info.php';
			} else {
				$flash_message = flashMessage($sql, 'error');
				echo $flash_message;
			}
		} else {
			require 'views/plan/new.php';
		}
		break;
	case 'update':
		if (!empty($_POST['titulo']) && !empty($_POST['price']) && $_POST["region"] != '') {
			$titulo = limpiarDatos($_POST['titulo']);
			$price = $_POST['price'];
			$region = $_POST['region'];
			$sql = $plans->updatePlan($titulo, $price, $region, $_POST['id']);
			if ($sql == 1) {
				$offers = $plans->getPlans();
				$flash_message = flashMessage('Plan actualizado exitosamente', 'success');
				echo $flash_message;
				require 'views/plan/info.php';
			} else {
				$flash_message = flashMessage($sql, 'error');
				echo $flash_message;
			}
		} else {
			$offer = $plans->getPlan($_POST['id']);
			$offer = $offer[0];
			require 'views/plan/update.php';
		}
		break;
	case 'delete':
		if (!empty($_POST['id'])) {
			$id = $_POST['id'];
			$sql = $plans->deletePlan($id);
			if ($sql > 1) {
				$offers = $plans->getPlans();
				$flash_message = flashMessage("Plan: $id borrado exitosamente", 'success');
				echo $flash_message;
				require 'views/plan/info.php';
			} else {
				$flash_message = flashMessage($sql, 'error');
				echo $flash_message;
			}
		}
		break;
	}
}

ob_end_flush();
?>
