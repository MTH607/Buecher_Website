<?php

echo "<div class='col-sm-4 col-xs-0'></div>\n<div class='buecher-block col-sm-4 center' id='singlebuecher'>\n"
	. "Book Number: " . $buecher->id . "<br />\n"
	. "Kurztitle: " . $buecher->kurztitle . "<br />\n"
	. "Title: " . $buecher->title . "<br />\n"
	. "Autor: " . $buecher->autor . "<br />\n"
	. "Anzahl Verkauft: " . $buecher->verkauft . "<br />\n"
	. "Zustand: " . $buecher->zustand . '<br />' . "\n"
	. "Katalog: " . $buecher->katalog . '<br />' . "\n"
	. "<a class='edit-button btn btn-sm btn-default' href='edit.php?id=" . $buecher->id . "'>Edit</a>\n"
	. '<form action="confirm.php" method="post" onsubmit="return confirm(' . "'" . 'Are you sure you want to delete this book?' . "'" . ')";>' . "\n"
	. '<input type="submit" value="Delete" class="btn btn-sm btn-default">' . "\n"
	. '<input type="text" value="' . $buecher->id . '" name="id" style="display:none;">' . "\n"
	. '<input type="text" value="delete" name="action" style="display:none;"><br />' . "\n"
	. '</form>' . "\n"
	. "</div><div class='col-sm-4 col-xs-0'></div>\n\n";
