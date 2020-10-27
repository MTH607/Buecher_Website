<?php
include 'partials/header.php';
include 'partials/nav.php'
?>


<container class="singlebuecher">
	<div class="output col-md-12 center">
		<?php
		require_once('model/connection.php');
		require_once('controller/productscontroller.php');
		include 'model/buecher.php';

		if ($_POST['action'] == 'create') {
			BookController::create($_POST['id'], $_POST['kurztitle'], $_POST['title'], $_POST['autor'], $_POST['verkauft'], $_POST['zustand'], $_POST['katalog']);
		} elseif ($_POST['action'] == 'edit') {
			BookController::edit($_POST['originalid'], $_POST['id'], $_POST['kurztitle'], $_POST['title'], $_POST['autor'], $_POST['verkauft'], $_POST['zustand'], $_POST['katalog']);
		} elseif ($_POST['action'] == 'delete') {
			BookController::delete($_POST['id']);
		}
		?>

	</div>
</container>