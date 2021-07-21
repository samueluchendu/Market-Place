<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Market Place</title>
	<link rel="stylesheet" href="./css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

<body>

	<nav class="nav2">
		<div>
			<span class="hamburger2" onclick="openSidebar()">&#9776;</span>
			<span class="studentworker2">Market Place</span>
		</div>
		<div class="end">
			<?php

			if (!isset($_SESSION['is_active']) && empty($_SESSION['is_active'])) { ?>
				<span><a href="index.php">Register</a></span>
				<span><a href="login.php">Login</a></span>
			<?php } else { ?>

				<!-- <span><a href="product.php">My Products</a></span> -->
				<span><a href="all_products.php">All Products</a></span>
				<span><a href="logout.php">Logout</a></span>
				<span><i class="far fa-comment" style="color: #341F97;"></i></span>
				<span><a href="dashboard.php">Dashboard</a></span>
				<span><i class="fa fa-caret-down" style="color: #341F97;"></i></span>

			<?php } ?>


		</div>
		<!-- <div class="hidecomment"><span><i class="far fa-comment" style="color: #341F97;"></i></span></div> -->
	</nav>