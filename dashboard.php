
<?php
 include("includes/header.php");
include("Db_connection/config.php");
if (!isset($_SESSION['is_active']) && empty($_SESSION['is_active'])) {
	header("Location: login.php");
}

$user_id = $_SESSION['user_id'];
 ?>

		 <p style="color:green; margin-top:-10px; text-align:center; font-weight:bolder"><?php if(isset($_SESSION['success'])){ echo $_SESSION['success']; unset($_SESSION['success']) ;}  ?> </p><br>
		 
		
    <div class="parent">
		<h1>My Product List!</h1>
         <a href="product.php" class="btn btn-primary btn-md mb-3" >
            Add Product
         </a>
        
               		 
		 <!-- Table -->
		 <table class="table table-sm table-striped">	
			  <thead class="table-dark">
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Product Name</th>
			      <th scope="col">Product Description</th>
			      <th scope="col">Price</th>
				  <th scope="col" colspan="2">Action</th>
			    </tr>
			  </thead>
			  <?php

				$sql = "SELECT `id`, `product_name`, `description`, `price` FROM `product` WHERE `user_id`='$user_id' ";

				 $result = mysqli_query($link, $sql);
				if (mysqli_num_rows($result) > 0) { 
					$i = 1;
			  ?>
			  <tbody>
				<?php while ($row = mysqli_fetch_array($result)) { ?>
			    <tr>
			      <th scope="row"><?php echo $i++ ?></th>
			      <td><?php echo $row["product_name"] ?></td>
			      <td><?php echo $row["description"] ?></td>
			      <td><?php echo $row["price"] ?></td>
				  <td>
					 <a href="edit.php?id=<?php echo $row["id"] ?>" class="btn btn-info btn-sm" >
                        Edit
                     </a>
					 
				 </td>
				 <td>
					 <a href="delete.php?id=<?php echo $row["id"] ?>" class="btn btn-danger btn-sm" >
                        Delete
                    </a>
					 
				 </td>
			    </tr>
			   <?php }}else{?>
				     <tr>
						<td colspan="5" style="text-align:center; font-weight:bolder"><?php echo "No Product Added" ?></td>
					</tr>
				<?php }
				mysqli_close($link);?>
			  </tbody>
        </table>
		 
		 <!-- Button trigger modal -->


                              
     

    </div>
   <?php include("includes/footer.php");?>