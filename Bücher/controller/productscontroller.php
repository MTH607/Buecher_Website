<?php
$total_records_per_page = 3;
class BookController
{

	public function printAll()
	{
		$buecherList = buecher::getAll();
		require_once('view/allbuecher.php');
	}

	public function printSingle($nummer)
	{
		$buecher = buecher::getSingle($nummer);
		require_once('view/singlebuecher.php');
	}

	public function getSingle($nummer)
	{
		return buecher::getSingle($nummer);
	}

	public function create($nummer, $kurztitle, $title, $autor, $verkauft, $zustand, $katalog)
	{

		$buecher = buecher::getSingle($nummer);

		if ((!is_int($nummer)) && (strlen((string) $nummer))) {
			echo "<div class='confirmation center'><br />"
				. "<br /><a href='#' onclick='window.history.back(); return false;'>Back</a></div>";
		} elseif ($buecher->nummer != NULL) {
			echo "<div class='confirmation center'><br />Book number already exists"
				. "<br /><a href='#' class='edit-button btn btn-sm btn-default' onclick='window.history.back(); return false;'>Back</a></div>";
		} else {
			buecher::create($nummer, $kurztitle, $title, $autor, $verkauft, $zustand, $katalog);
			echo "<div class='confirmation center'><br />Successfully created new book</div>";
			self::printSingle($nummer);
		}
	}

	public function edit($originalnummer, $nummer, $kurztitle, $title, $autor, $verkauft, $zustand, $katalog)
	{
		$buecher = buecher::getSingle($nummer);
		if (($nummer != $originalnummer) && ($buecher->nummer != NULL)) {
			echo "<div class='confirmation center'><br />Book number already exists"
				. "<br /><a href='#' class='edit-button btn btn-sm btn-default' onclick='window.history.back(); return false;'>Back</a></div>";
		} else {
			buecher::edit($originalnummer, $nummer, $kurztitle, $title, $autor, $verkauft, $zustand, $katalog);
			echo "<div class='confirmation center'><br />You have succesfully edited the Book number " . $nummer . "<br /></div>";
			self::printSingle($nummer);
		}
	}

	public function delete($nummer)
	{
		return buecher::delete($nummer);
	}
}
if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
	$page_no = $_GET['page_no'];
} else {
	$page_no = 1;
}
