<html>
<?php

$output = "";
foreach ($buecherList as $key => $buecher) {
	$output = $output . "\n<div class='buecher-block col-md-4 col-sm-6 center' id='buecherBlock'>\n"
		. "id: " . $buecher->id . "<br />\n"
		. "Title: " . $buecher->kurztitle . "<br />\n"
		. "Autor: " . $buecher->autor . "<br />\n"
		. "Anzahl erkauft: " . $buecher->verkauft . "<br />\n"
		. "Zustand: " . $buecher->zustand . "<br />\n"
		. "Katalog: " . $buecher->katalog . "<br />\n"
		. "<a class='view-button btn btn-sm btn-default' href='buecher.php?id=" . $buecher->id . "'>View</a>\n"
		. "<a class='edit-button btn btn-sm btn-default' href='edit.php?id=" . $buecher->id . "'>Edit</a>\n"
		. '<form action="confirm.php" method="post" onsubmit="return confirm(' . "'" . 'Are you sure you want to delete this book?' . "'" . ')";>' . "\n"
		. '<input type="submit" class="btn btn-sm btn-default" value="Delete">' . "\n"
		. '<input type="text" value="' . $buecher->id . '" name="id" style="display:none;">' . "\n"
		. '<input type="text" value="delete" name="action" style="display:none;">' . "\n"
		. '</form>' . "\n"
		. "</div>\n";

	if (isset($_GET['pageno'])) {
		$pageno = $_GET['pageno'];
	} else {
		$pageno = 1;
	}
	$no_of_records_per_page = 3;
	$offset = ($pageno - 1) * $no_of_records_per_page;

	$conn = mysqli_connect("localhost", "root", "", "books");
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
	}

	$total_pages_sql = "SELECT COUNT(*) FROM buecher";
	$result = mysqli_query($conn, $total_pages_sql);
	$total_rows = mysqli_fetch_array($result)[0];
	$total_pages = ceil($total_rows / $no_of_records_per_page);

	$sql = "SELECT * FROM buecher LIMIT $offset, $no_of_records_per_page";
	$res_data = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_array($res_data));
	mysqli_close($conn);


	echo '<div class="container all-buecher-table" id="buecherTable"><div class="row">' . "\n" . $output . "</div>\n</div>\n";
}
?>
<ul class="pagination">
	<li><a href="?pageno=1">First</a></li>
	<li class="<?php if ($pageno <= 1) {
					echo 'disabled';
				} ?>">
		<a href="<?php if ($pageno <= 1) {
						echo '#';
					} else {
						echo "?pageno=" . ($pageno - 1);
					} ?>">Prev</a>
	</li>
	<li class="<?php if ($pageno >= $total_pages) {
					echo 'disabled';
				} ?>">
		<a href="<?php if ($pageno >= $total_pages) {
						echo '#';
					} else {
						echo "?pageno=" . ($pageno + 1);
					} ?>">Next</a>
	</li>
	<li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
</ul>
</body>

</html>