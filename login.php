<?php 
include("includes/header.php");


?>


    <div class="parent">
         
        
        <h1>Login Here!</h1>
         <p style="color:green; margin-top:-10px; text-align:center; font-weight:bolder"><?php if(isset($_SESSION['success'])){ echo $_SESSION['success']; unset($_SESSION['success']) ;}  ?> </p><br>
		 <p style="color:red; margin-top:-10px; text-align:center;"><?php if(isset($_SESSION['incorrect_details'])){ echo $_SESSION['incorrect_details']; unset($_SESSION['incorrect_details']) ;}  ?> </p><br>
                                             
        <form action="Controllers/process_login.php" method="POST" style="border:1px solid #ccc; margin-top:-70px;">

            <div class="container">
                 <div class="first-name">
                    <label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Enter Email" name="email">
                    <p style="color:red; margin-top:-10px;"><?php if(isset($_SESSION['email_err1'])){echo $_SESSION['email_err1']; unset($_SESSION['email_err1']);}?> </p><br>
                </div>
				
                <div class="last-name">
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" >
                    <p style="color:red; margin-top:-10px;"><?php if(isset($_SESSION['password_err1'])){echo $_SESSION['password_err1']; unset($_SESSION['password_err1']);}?> </p><br>
                </div>
				
				<div  style="text-align:right; text-decoration:none;">
					<a href="reset_psw.php"  style="text-decoration:none;">Forget password?</a>
				</div>
               
              
                <div class="clearfix">

                    <button type="submit" name="login" class="signupbtn">Login</button>
                </div>
            </div>
        </form>

    </div>
   <?php include("includes/footer.php");?>