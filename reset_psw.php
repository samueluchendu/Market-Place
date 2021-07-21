<?php include("includes/header.php"); ?>


    <div class="parent">
         
        
        <h1>Reset Password!</h1>
         <p style="color:green; margin-top:-10px; text-align:center;"><?php if(isset($_SESSION['success'])){ echo $_SESSION['success']; unset($_SESSION['success']) ;}  ?> </p><br>
		 
                                             
        <form action="Controllers/process_reset_psw.php" method="POST" style="border:1px solid #ccc">

            <div class="container">
                 <div class="first-name">
                    <label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Enter Email" name="email">
                    <p style="color:red; margin-top:-10px;"><?php if(isset($_SESSION['email_err1'])){echo $_SESSION['email_err1']; unset($_SESSION['email_err1']);}?> </p><br>
                </div>
				
                <div class="last-name">
                    <label for="psw"><b>New Password</b></label>
                    <input type="password" placeholder="Enter New Password" name="psw" >
                    <p style="color:red; margin-top:-10px;"><?php if(isset($_SESSION['password_err1'])){echo $_SESSION['password_err1']; unset($_SESSION['password_err1']);}?> </p><br>
                </div>
				
				<div class="last-name">
                    <label for="psw"><b>Confirm Password</b></label>
                    <input type="password" placeholder="Confirm Password" name="confirm_psw" >
                    <p style="color:red; margin-top:-10px;"><?php if(isset($_SESSION['password_err2'])){echo $_SESSION['password_err2']; unset($_SESSION['password_err2']);}?> </p><br>
                </div>
				
				               
              
                <div class="clearfix">

                    <button type="submit" name="reset" class="signupbtn">Reset</button>
                </div>
            </div>
        </form>

    </div>
   <?php include("includes/footer.php");?>