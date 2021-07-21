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


if (isset($_POST['login'])) {



	if (empty($_POST['email'])) {
		$_SESSION['email_err1'] = 'email is required';
		header("Location: ../login.php");
	} else {

		$email =  check_input($_POST['email']);

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

			$_SESSION['email_err1'] = 'Kindly enter a valid email address';
			header("Location: ../login.php");
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
			header("Location: ../login.php");
		}
	}
	
	//Check if user exist in Database
	
	if(empty($_SESSION['email_err1']) && empty($_SESSION['password_err1'])){

		$sql = "SELECT `id`, `firstName`, `lastName`, `email`, `password` FROM `user_profile` WHERE `email`='$email' AND `password`= '$password'";
		
		$result = mysqli_query($link, $sql);
		
		if (mysqli_num_rows($result) == 1) {
            //User Exist
			while ($row = mysqli_fetch_array($result)) {
				   
				//Get Details  AND Redirect user to Dashboard;
					$_SESSION['user_id']   = $row['id'];
					$_SESSION['firstname'] = $row['firstName'];
					$_SESSION['is_active'] = "true";
					
					header("Location: ../dashboard.php");
					
			}
		}else{
			    //If User doesnt Exist
				$_SESSION['incorrect_details'] = 'Email and Password incorrect';
				header("Location: ../login.php");
			}
		}
		

	
	
}
	
	
	?>