<?php
include 'partials/header.php';
include 'partials/nav.php'
?>


<container class='edit-form'>
	<div class='col-md-4 col-xs-0'></div>
	<div class='edit-block center col-md-4'>
		<?php

		require_once('model/connection.php');
		require_once('controller/productscontroller.php');
		include 'model/buecher.php';

		$buecher = BookController::getSingle($_GET['id']);

		echo '<form action="confirm.php" method="post">
			<input type="text" value="edit" name="action" style="display:none;">
			<input type="text" value="' . $buecher->id . '" name="originalid" style="display:none;"><br />
			<span class="input-name center">id: </span><input type="text" name="id" value="' . $buecher->id . '"><br />
			<span class="input-name center">Kurztitle: </span><input type="text" name="kurztitle" value="' . $buecher->kurztitle . '"><br />
			<span class="input-name center">Title: </span><input type="text" name="title" value="' . $buecher->title . '"><br />
			<span class="input-name center">Autor: </span><input type="text" name="autor" value="' . $buecher->autor . '"><br />
			<span class="input-name center">Verkauft: </span><input type="text" name="verkauft" value="' . $buecher->verkauft . '"><br />
			<span class="input-name center">Zustand: </span><input type="text" name="zustand" value="' . $buecher->zustand . '"><br />
			<span class="input-name center">Katalog: </span><input type="text" name="katalog" value="' . $buecher->katalog . '"><br />
			<input type="submit" class="btn btn-sm btn-default">
			</form>';

		?>
	</div>

	<div class='col-md-4 col-xs-0'></div>
</container>

<?php
include 'partials/footer.php';
?>