<?php include("includes/header.php"); ?>


    <div class="parent">
         
        
        <h1>Register Here!</h1>
         <p style="color:green; margin-top:-10px; text-align:center;"><?php if(isset($_SESSION['success'])){ echo $_SESSION['success']; unset($_SESSION['success']) ;}  ?> </p><br>
         <p style="color:red; margin-top:-10px; text-align:center;"><?php if(isset($_SESSION['incorrect_details'])){ echo $_SESSION['incorrect_details']; unset($_SESSION['incorrect_details']) ;}  ?> </p><br>
                                             
        <form action="Controllers/process_register.php" method="POST" style="border:1px solid #ccc; margin-top:-70px;">

            <div class="container">
                <div class="row">
                    <div class="first-name">
                        <label for="email"><b>First name</b></label>
                        <input type="text" placeholder="Enter First name" name="firstname" >
         <p style="color:red; margin-top:-10px;"><?php if(isset($_SESSION['firstname_err'])){echo $_SESSION['firstname_err']; unset($_SESSION['firstname_err']);}?> </p><br>
                    </div>
                    <div class="last-name"> 
                        <label for="psw"><b>Last name</b></label>
                        <input type="text" placeholder="Enter Last name" name="lastname" >
                <p style="color:red; margin-top:-10px;"><?php if(isset($_SESSION['lastname_err'])){echo $_SESSION['lastname_err']; unset($_SESSION['lastname_err']);}?> </p><br>
                    </div>
                </div>
                <div class="first-name">
                    <label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Enter Email" name="email">
                    <p style="color:red; margin-top:-10px;"><?php if(isset($_SESSION['email_err'])){echo $_SESSION['email_err']; unset($_SESSION['email_err']);}?> </p><br>
                </div>
                <div class="last-name">
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" >
                    <p style="color:red; margin-top:-10px;"><?php if(isset($_SESSION['password_err'])){echo $_SESSION['password_err']; unset($_SESSION['password_err']);}?> </p><br>
                </div>
               
              
                <div class="clearfix">

                    <button type="submit" name="register" class="signupbtn">Sign Up</button>
                </div>
            </div>
        </form>

    </div>
   <?php include("includes/footer.php");?>