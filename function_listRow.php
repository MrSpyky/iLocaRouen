<?php

	function listRow (Meuble $meuble) {
	
	echo '<tr>';
	
			echo addData($meuble->id());
			echo addData($meuble->type());
			echo addData($meuble->photo1());
			echo addData($meuble->photo2());
			echo addData($meuble->photo3());
			echo addData($meuble->rentedBy());
	echo '</tr>';
	}
	
	function addRow($string) {
		return '<tr>'.$string.'</tr>';
	}
	
	function addData($string) {
		return '<td>'.$string.'</td>';
	}
?>
