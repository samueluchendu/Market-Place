<?php
 include("includes/header.php");
include("Db_connection/config.php");
if (!isset($_SESSION['is_active']) && empty($_SESSION['is_active'])) {
	header("Location: login.php");
}

// $user_id = $_SESSION['user_id'];
 ?>

		
		
    <div class="parent">
		<h1>All Product List!</h1>
        
                       		 
		 <!-- Table -->
		 <table class="table table-sm table-striped">	
			  <thead class="table-dark">
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Product Name</th>
			      <th scope="col">Product Description</th>
			      <th scope="col">Price</th>
				  
			    </tr>
			  </thead>
			  <?php

				$sql = "SELECT `id`, `product_name`, `description`, `price` FROM `product` ";

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
				 
					 
				 </td>
			    </tr>
			   <?php }}else{?>
				     <tr>
						<td colspan="5" style="text-align:center; font-weight:bolder"><?php echo "No Task found" ?></td>
					</tr>
				<?php }
				mysqli_close($link);?>
			  </tbody>
        </table>
		 
		 <!-- Button trigger modal -->


                              
     

    </div>
   <?php include("includes/footer.php");?>