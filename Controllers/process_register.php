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


$firstName = $lastName = $email = $password = "";
$error = [];

if (isset($_POST['register'])) {

	///Validate First Name;
	if (empty($_POST['firstname'])) {
		
		$_SESSION['firstname_err']= "firstname is required";
		
		 header("Location: ../index.php");
	} else {

		$firstName =  check_input($_POST['firstname']);

		if (!preg_match('/^[a-zA-Z]+$/', $firstName)) {

			$_SESSION['firstname_err']= "Kindly enter a valid First name";
			header("Location: ../index.php");
		} 
	}




	//Validate Last name

	if (empty($_POST['lastname'])) {
		$_SESSION['lastname_err'] = 'Lastname is required';
		header("Location: ../index.php");
	} else {

		$lastName =  check_input($_POST['lastname']);
		
if (!preg_match('/^[a-zA-Z]+$/',$lastName)) {
			$_SESSION['lastname_err'] = 'Kindly enter a valid Last name';
			header("Location: ../index.php");
		} 
	}


	//Validate Email

	if (empty($_POST['email'])) {
		$_SESSION['email_err'] = 'email is required';
		header("Location: ../index.php");
	} else {

		$email =  check_input($_POST['email']);

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

			$_SESSION['email_err'] = 'Kindly enter a valid email address';
			header("Location: ../index.php");
		}
          //Check if Email Exist in Database
		$sql = "SELECT  `email` FROM `user_profile` WHERE `email`='$email'";
		$result = mysqli_query($link, $sql);
		
		if (mysqli_num_rows($result) == 1) {
			$_SESSION['email_err'] = 'Email Address already Exist';
			header("Location: ../index.php");
		}
		
	}


	//Validate Password

	if (empty($_POST['psw'])) {
		$_SESSION['password_err'] = 'password is required';
		header("Location: ../index.php");
	} else {

		$password =  check_input($_POST['psw']);

		if (strlen($password) < 6) {

			$_SESSION['password_err']= 'Password must be equal or more than 6 characters';
			header("Location: ../index.php");
		} 
	}
	
	
	// When u return check if user exist before registering.....

if (empty($_SESSION['firstname_err']) && empty($_SESSION['lastname_err']) && empty($_SESSION['email_err']) && empty($_SESSION['password_err'])) {

		// echo "Details Successfull entered";

		$sql = "INSERT INTO `user_profile` (`firstName`, `lastName`, `email`, `password`, `created_at`, `updated_at`)VALUES ('$firstName', '$lastName', '$email', '$password', NOW(), NOW() )";

		if (mysqli_query($link, $sql)) {
			// echo "New record created successfully";
			$_SESSION['success'] = "Registration Successfull";
			header("Location: ../login.php");
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($link);
		}
		
	}
	mysqli_close($link);
}


?>