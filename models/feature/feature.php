<?php

class Feature extends ApplicationModel {
	private $user;
	private $planId;
	private $description;
	public function __construct() {
		parent::__construct('features');
	}

	public function getFeature($id) {
		try {
			$feature = $this->getBy('id_feature', $id);
			if (!is_string($feature)) {
				return $feature;
			} else {
				$flash_message = flashMessage('Error al cargar los datos', 'error');
			}
		} catch (Exception $features) {
			echo $features->getMessage();
		}
	}

	public function getFeatures($plan_id) {
		try {
			$this->planId = $plan_id;
			$features = $this->getBy('price_id', $this->planId);
			if (!is_string($features)) {
				return $features;
			} else {
				$flash_message = flashMessage('Error al cargar los datos', 'error');
			}
		} catch (Exception $features) {
			echo $features->getMessage();
		}
	}

	public function updateFeature($description, $id) {
		try {
			$sql = $this->getUser();
			if ($this->rows($sql) > 0) {
				$this->description = $description;
				$sql2 = $this->db->query("UPDATE features SET description = '$this->description' WHERE id_feature = {$id};") or die(mysqli_error($this->db));
				return $sql2;
			} else {
				$flash_message = flashMessage('Error al actualizar los datos', 'error');
			}
		} catch (Exception $features) {
			echo $features->getMessage();
		}
	}

	public function deleteFeature($id) {
		try {
			$sql = $this->getUser();
			if ($this->rows($sql) > 0) {
				$sql2 = $this->deleteHardBy('id_feature', $id);
				if ($sql2 == 1) {
					return $id;
				} else {
					return $sql2;
				}
			} else {
				$flash_message = flashMessage('Error', 'error');
			}
		} catch (Exception $features) {
			echo $features->getMessage();
		}
	}
}

?>