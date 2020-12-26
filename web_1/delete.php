<?php 
	if (isset($_GET['item'])) {
		$path = "uploads/".basename($_GET['item']);

		unlink($path);

		header('Location: index.php');
	} else{
		die();
	}
	
 ?> 