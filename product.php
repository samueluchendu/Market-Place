<?php 
include("includes/header.php");
if (!isset($_SESSION['is_active']) && empty($_SESSION['is_active'])) {
	header("Location: login.php");
}
?>


    <div class="parent">
         
        
        <h1>Add Product!</h1>
         <p style="color:green; margin-top:-10px; text-align:center; font-weight:bolder"><?php if(isset($_SESSION['success'])){ echo $_SESSION['success']; unset($_SESSION['success']) ;}  ?> </p><br>
		  		                                             
        <form action="Controllers/process_product.php" method="POST" style="border:1px solid #ccc">

            <div class="container">
                 <div class="first-name">
                    <label for="email"><b>Product Name</b></label>
                    <input type="text" placeholder="Enter product name" name="product_name">
                   <p style="color:red; margin-top:-10px; font-weight:bolder"><?php if(isset($_SESSION['product_err'])){echo $_SESSION['product_err']; unset($_SESSION['product_err']);}?> </p><br>
                </div>
                <div class="last-name">
                    <label for="psw"><b>Price</b></label>
                    <input type="text" placeholder="Enter Price" name="price" >
                    <p style="color:red; margin-top:-10px; font-weight:bolder"><?php if(isset($_SESSION['price_err'])){echo $_SESSION['price_err']; unset($_SESSION['price_err']);}?> </p><br>
                </div>
				 <div class="last-name">
                    <label for="psw"><b>Description</b></label>
                    <input type="text" placeholder="Enter Product Description" name="description" >
                    <p style="color:red; margin-top:-10px; font-weight:bolder"><?php if(isset($_SESSION['description_err'])){echo $_SESSION['description_err']; unset($_SESSION['description_err']);}?> </p><br>
                </div>		
                            
                <div class="clearfix">

                    <button type="submit" name="add_product" class="signupbtn">Submit</button>
                </div>
            </div>
        </form>

    </div>
   <?php include("includes/footer.php");?>