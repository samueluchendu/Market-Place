<?php
session_start();
include("Db_connection/config.php");
if (!isset($_SESSION['is_active']) && empty($_SESSION['is_active'])) {
	header("Location: login.php");
}



if (isset($_GET['id'])) {

	$id = $_GET['id'];

	$sql = "DELETE FROM `product` WHERE id=$id";

	if ($link->query($sql) === TRUE) {
		$_SESSION['success'] = "Record deleted Successfully";
		header("Location: dashboard.php");
	} else {
		echo "Error deleting record: " . $link->error;
	}

	$link->close();
}


?>