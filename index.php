<?php
require 'schema/database.php';
require 'routes/routes.php';
require 'lib/parsedown.php';
require 'models/functions.php';
require 'models/connection.php';
require 'models/applicationModel.php';
require 'models/session/session.php';
require 'models/blog/blog.php';
require 'models/feature/feature.php';
require 'models/plan/plan.php';
require 'models/social/social.php';
require 'models/admin/admin.php';
require 'controllers/applicationController.php';

$view = isset($_GET['view']) ? $_GET['view'] : 'home';
if (file_exists("controllers/{$view}/{$view}Controller.php")) {
	$adm = new Admin();
	$admin = $adm->getAdmin();
	include "controllers/{$view}/{$view}Controller.php";
} else {
	echo 'asdasd fail';
}

?>