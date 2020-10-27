<?php
include 'partials/header.php';
include 'partials/nav.php';
?>


<container class='create-form'>
	<div class='col-md-4 col-xs-0'></div>
	<div class='create-block center col-md-4'>
	<?php

	require_once('model/connection.php');
	require_once('controller/productscontroller.php');
	include 'model/buecher.php';

	echo '<form action="confirm.php" method="post">
			<input type="text" value="create" name="action" style="display:none;"><br />
			<span class="input-name center">id: </span><input type="text" name="id"><br />
			<span class="input-name center">Kurztitle: </span><input type="text" name="kurztitle"><br />
			<span class="input-name center">Title: </span><input type="text" name="title"><br />
			<span class="input-name center">Autor: </span><input type="text" name="autor"><br />
			<span class="input-name center">Verkauft: </span><input type="text" name="verkauft"><br />
			<span class="input-name center">Zustand: </span><input type="text" name="zustand"><br />
			<span class="input-name center">Katalog: </span><input type="text" name="katalog"><br />
			<input type="submit" class="btn btn-sm btn-default">
			</form>';
	?>
	</div>

	<div class='col-md-4 col-xs-0'></div>
</container>

<?php
include 'partials/footer.php';
?>