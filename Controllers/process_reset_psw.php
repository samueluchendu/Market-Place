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


$email = $confirm_password = "";


if (isset($_POST['reset'])) {


       // Validate Email
	if (empty($_POST['email'])) {
		$_SESSION['email_err1'] = 'email is required';
		header("Location: ../reset_psw.php");
	} else {

		$email =  check_input($_POST['email']);

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

			$_SESSION['email_err1'] = 'Kindly enter a valid email address';
			header("Location: ../reset_psw.php");
		}
	}


	//Validate Password

	if (empty($_POST['psw'])) {
		$_SESSION['password_err1'] = 'password is required';
		header("Location: ../login.php");
	} else {

		$password =  check_input($_POST['psw']);

		if (strlen($password) < 6) {

			$_SESSION['password_err1'] = 'Password must be equal or more than 6 characters';
			header("Location: ../reset_psw.php");
		}
	}
	
	  //Validate Confirm Password

	if (empty($_POST['confirm_psw'])) {
		$_SESSION['password_err2'] = 'password is required';
		header("Location: ../reset_psw.php");
	} else {

		$confirm_password  =  check_input($_POST['confirm_psw']);

		if (strlen($password) < 6) {

			$_SESSION['password_err2'] = 'Password must be equal or more than 6 characters';
			header("Location: ../reset_psw.php");
		}
		
		if($password !== $confirm_password ){

			$_SESSION['password_err2'] = 'New Password and Confirm Password dont Match';
			header("Location: ../reset_psw.php");
			
		}
	  }
	  
	  
	  if(empty($_SESSION['password_err2']) && empty($_SESSION['password_err1']) && empty($_SESSION['email_err1'])){
         
		//Check if User Exist in Database
		$sql = "SELECT `email` FROM `user_profile` WHERE `email`='$email' ";

		$result = mysqli_query($link, $sql);

		if (mysqli_num_rows($result) == 1) {

			//Update New Password;
			$sql = "UPDATE  `user_profile` SET `password`='$confirm_password' WHERE `email`='$email' ";

			if (mysqli_query($link, $sql)) {
				
				// Password Reset successful Redirect to Login";
				$_SESSION['success']= "Password Reset Was Successful You Can Now Login! ";
				header("Location: ../login.php");
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($link);
			}
			
			
			
		}else{
			$_SESSION['incorrect_details'] = "Email does not Exist Kindly Register ";
			header("Location: ../index.php");
		}
		
		
		
	  }

	mysqli_close($link);
	
	
	}
	

?>