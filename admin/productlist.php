﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Product.php';?>
<?php include_once'../helpers/Format.php';?>

<?php

	$product=new Product();
	$fm=new Format();
?>

<?php
     
     if(isset($_GET['delproduct'])){

     	$id=$_GET['delproduct'];
     	$id=preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['delproduct']);
     	
     	$delproduct=$product->delProductById($id);
     }
 ?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block"> 
          <?php
                	if(isset($delproduct)){
                		echo $delproduct;
                	}
            ?> 
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Sl</th>
					<th>Product Name</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Description</th>
					<th>Price</th>
					<th>Image</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>

				<?php
						    $getproduct=$product->getAllProduct();
						    if($getproduct){
						    	$i=0;
						    	while($result=$getproduct->fetch_assoc()){
						    		$i++;
						?>


				<tr class="odd gradeX">
					<td> <?php echo $i; ?></td>
					<td> <?php echo $result['productName'];    ?>  </td>
					<td> <?php echo $result['catName'];          ?>  </td>
					<td> <?php echo $result['brandName'];        ?>  </td>
					<td> <?php echo $fm->textShorten($result['body'],40);  ?>  </td>
					<td> $ <?php echo $result['price'];  		   ?>  </td>
					<td> <img src=" <?php  echo $result['image']; ?> "; width="40px" ; height="50px" >  </td>
					<td> <?php   
							if( $result['type']==0){
								 echo "Featured";
							}  
							else{ 
								echo "General";
								}     	   
						?>
					</td>
					
					<td> <a href="productedit.php?productId=<?php echo $result['productId'];?>"> Edit </a> 
						    || 
							<a onclick="return confirm('Are you sure to delete!')" href="?delproduct=<?php echo 
							$result['productId'];?>">Delete</a> 
					</td>
				</tr>
				
				<?php 
					    	 } }
					     ?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
