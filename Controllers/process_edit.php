<?php
session_start();
include("../Db_connection/config.php");



function check_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}


$productName = $price = $description =  "";
$error = [];
$user_id = $_SESSION['user_id'];

if(isset($_POST['Update_product'])){
	
	$id = $_POST['product_id'];

	///Validate Product Name;
	if (empty($_POST['product_name'])) {

		$_SESSION['product_err'] = "Product field can not be empty";

		header("Location: ../product.php");
	} else {

		$productName =  check_input($_POST['product_name']);

	}


	///Validate Price;
	if (empty($_POST['price'])) {

		$_SESSION['price_err'] = "Price field can not be empty";

		header("Location: ../product.php");
	} else {

		$price =  check_input($_POST['price']);
	}

	///Validate Description;
	if (empty($_POST['description'])) {

		$_SESSION['description_err'] = "Description can not be empty";

		header("Location: ../product.php");
	} else {

		$description =  check_input($_POST['description']);
	}


	//Insert into Database
	if (empty($_SESSION['price_err']) && empty($_SESSION['description_err'])&& empty($_SESSION['product_err'])) {

		$sql =  "UPDATE  `product` SET `product_name`='$productName', `price`='$price', `description`='$description' , `updated_at`=NOW() WHERE `id`=$id";

		if (mysqli_query($link, $sql)) {
			// echo "New record created successfully";
			$_SESSION['success'] = "Product Successfully Updated";
			header("Location: ../dashboard.php");
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($link);
		}

		mysqli_close($link);
	}
	
	
	
	
	
	
	
}
