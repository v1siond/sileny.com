<?php session_start();
ob_start();

$features = new Feature();
$plans = new Plan();
if ($_POST && $_POST['admin'] == true) {
	// Admin
	switch ($_POST['action']) {
	case 'update':
		if (!empty($_POST['description']) && !empty($_POST['id'])) {
			$description = limpiarDatos($_POST['description']);
			$id = $_POST['id'];
			$sql = $features->updateFeature($description, $id);
			if ($sql == 1) {
				$offers = $plans->getPlans();
				$flash_message = flashMessage('feature actualizado exitosamente', 'success');
				echo $flash_message;
				require 'views/plan/info.php';
			} else {
				$flash_message = flashMessage($sql, 'error');
				echo $flash_message;
			}
		} else {
			$feature = $features->getFeature($_POST['id']);
			$feature = $feature[0];
			require 'views/feature/update.php';
		}
		break;
	case 'delete':
		if (!empty($_POST['id'])) {
			$id = $_POST['id'];
			$sql = $features->deleteFeature($id);
			if ($sql > 1) {
				$offers = $plans->getPlans();
				$flash_message = flashMessage("feature: $id borrado exitosamente", 'success');
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
