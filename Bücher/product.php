<?php
include 'partials/header.php';
include 'partials/nav.php'
?>


<?php


require_once('model/connection.php');
require_once('controller/productscontroller.php');
include 'model/buecher.php';


?>

<container class="single-product">
	<?php

	if (!isset($_GET['id'])) {
		echo "No number requested";
	} else {
		BookController::printSingle($_GET['id']);
	}

	?>
</container>



<?php
include 'partials/footer.php';
?>