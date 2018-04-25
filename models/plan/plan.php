<?php

class Plan extends ApplicationModel {
	private $user;
	private $page_start;
	private $page_limit;
	private $titulo;
	private $price;
	private $zone;
	private $features;

	public function __construct() {
		parent::__construct('pricing');
	}

	public function getPlan($id) {
		try {
			$plan = $this->getBy('id_price', $id);
			if (!is_string($plan)) {
				return $plan;
			} else {
				$flash_message = flashMessage('Error al leer el Plan', 'error');
				echo $flash_message;
			}
		} catch (Exception $plans) {
			echo $plans->getMessage();
		}
	}

	public function getPlanInternational() {
		try {
			$plan = $this->getBy('region', 0);
			if (!is_string($plan)) {
				return $plan;
			} else {
				$flash_message = flashMessage('Error al leer el Plan', 'error');
				echo $flash_message;
			}
		} catch (Exception $plans) {
			echo $plans->getMessage();
		}
	}

	public function getPlanVenezuela() {
		try {
			$plan = $this->getBy('region', 1);
			if (!is_string($plan)) {
				return $plan;
			} else {
				$flash_message = flashMessage('Error al leer el Plan', 'error');
				echo $flash_message;
			}
		} catch (Exception $plans) {
			echo $plans->getMessage();
		}
	}

	public function getPlans() {
		try {
			$this->page_limit = 6;
			$this->page_start = ($this->paginaActual() > 1) ? ($this->paginaActual() * $page_limit - $page_limit) : 0;
			$consult = ["deleted = 0", "ORDER BY id_price DESC", "LIMIT {$this->page_start}, {$this->page_limit}"];
			$plans = $this->getMultiple($consult);
			if (!is_string($plans)) {
				return $plans;
			} else {
				$flash_message = flashMessage('Error al leer el Artículo', 'error');
				echo $flash_message;
			}
		} catch (Exception $plans) {
			echo $plans->getMessage();
		}
	}

	public function savePlan($titulo, $precio, $zona, $features) {
		try {
			$sql = $this->getUser();
			if ($this->rows($sql) > 0) {
				$this->titulo = $titulo;
				$this->price = $precio;
				$this->zone = $zona;
				$this->features = $features;
				$sql2 = $this->db->query("INSERT INTO pricing (id_price, title, price, region, deleted, created_at)
          VALUES (null, '$this->titulo', '$this->price', $this->zone, 0, now());") or die(mysqli_error($this->db));
				if ($sql2 == 1) {
					$last_record = $this->db->query("SELECT id_price FROM pricing ORDER BY id_price DESC LIMIT 1") or die(mysqli_error($this->db));
					$id_price = $this->run($last_record);
					foreach ($this->features as $feature) {
						$guardar_features = $this->db->query("INSERT INTO features (id_feature, price_id, description)
                VALUES (null, {$id_price['id_price']}, '$feature')") or die(mysqli_error($this->db));
					}
					return 1;
				} else {
					return false;
				}
			} else {
				$flash_message = flashMessage('Error', 'error');
				echo $flash_message;
			}
		} catch (Exception $plans) {
			echo $plans->getMessage();
		}
	}

	public function updatePlan($titulo, $precio, $zona, $id) {
		try {
			$sql = $this->getUser();
			if ($this->rows($sql) > 0) {
				$this->titulo = $titulo;
				$this->price = $precio;
				$this->zone = $zona;
				$sql2 = $this->db->query("UPDATE pricing SET title = '$this->titulo', price = '$this->price', region = '$this->zone' WHERE id_price = {$id};") or die(mysqli_error($this->db));
				return $sql2;
			} else {
				$flash_message = flashMessage('Error', 'error');
				echo $flash_message;
			}
		} catch (Exception $plans) {
			echo $plans->getMessage();
		}
	}

	public function deletePlan($id) {
		try {
			$sql = $this->getUser();
			if ($this->rows($sql) > 0) {
				$sql2 = $this->deleteBy('id_price', $id);
				if ($sql2 == 1) {
					return $id;
				} else {
					return $sql2;
				}
			} else {
				$flash_message = flashMessage('Error', 'error');
				echo $flash_message;
			}
		} catch (Exception $plans) {
			echo $plans->getMessage();
		}
	}
}

?>