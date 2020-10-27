<?php
include 'partials/header.php';
include 'partials/nav.php'
?>

<container class="buecher">
	<?php
	require_once('model/connection.php');
	require_once('controller/productscontroller.php');
	include 'model/buecher.php';

	BookController::printAll();
	?>
</container>

<?php
include 'partials/footer.php';
?>