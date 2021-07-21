<?php 
include("includes/header.php");
include("Db_connection/config.php");
if (!isset($_SESSION['is_active']) && empty($_SESSION['is_active'])) {
	header("Location: login.php");
	
	
}

if (isset($_GET['id']) && !empty($_GET["id"])) {

	$id = $_GET['id'];
	$sql = "SELECT `id`, `product_name`, `description`, `price` FROM `product` WHERE id=$id";
	$result = mysqli_query($link, $sql);
	if (mysqli_num_rows($result) > 0) {
		
		
?>


    <div class="parent">
         
        
        <h1>Edit Product!</h1>
         <p style="color:green; margin-top:-10px; text-align:center; font-weight:bolder"><?php if(isset($_SESSION['success'])){ echo $_SESSION['success']; unset($_SESSION['success']) ;}  ?> </p><br>
		  		                                             
        <form action="Controllers/process_edit.php" method="POST" style="border:1px solid #ccc">
            <input type="hidden" name="todo_id" value="<?php echo $row["id"]; ?>">
            <div class="container">
                 <div class="first-name">
					 <?php while ($row = mysqli_fetch_array($result)) { ?>
                    <label for="email"><b>Product Name</b></label>
                    <input type="text" placeholder="Enter product name" name="product_name" value="<?php echo $row["product_name"]; ?>">
					<input type="hidden" name="product_id" value="<?php echo $row["id"]; ?>">
                   <p style="color:red; margin-top:-10px; font-weight:bolder"><?php if(isset($_SESSION['product_err'])){echo $_SESSION['product_err']; unset($_SESSION['product_err']);}?> </p><br>
                </div>
                <div class="last-name">
                    <label for="psw"><b>Price</b></label>
                    <input type="text" placeholder="Enter Price" name="price" value="<?php echo $row["price"]; ?>" >
                    <p style="color:red; margin-top:-10px; font-weight:bolder"><?php if(isset($_SESSION['price_err'])){echo $_SESSION['price_err']; unset($_SESSION['price_err']);}?> </p><br>
                </div>
				 <div class="last-name">
                    <label for="psw"><b>Description</b></label>
                    <input type="text" placeholder="Enter Product Description" name="description" value="<?php echo $row["description"]; ?>" >
                    <p style="color:red; margin-top:-10px; font-weight:bolder"><?php if(isset($_SESSION['description_err'])){echo $_SESSION['description_err']; unset($_SESSION['description_err']);}?> </p><br>
                </div>		
                     <?php }}
	                 mysqli_close($link);} ?>       
                <div class="clearfix">

                    <button type="submit" name="Update_product" class="signupbtn">Submit</button>
                </div>
            </div>
        </form>

    </div>
   <?php include("includes/footer.php");?>