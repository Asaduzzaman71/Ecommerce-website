<?php include 'inc/header.php'; ?>

<?php
        $login=session::get("customer_login");
        if($login==false){
        	header("location:login.php");
        	}
   ?>
<style >
	table.tblone img{
		height:90px;
		width: 100px;
	}
</style>


 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Compare</h2>
			    	
						<table class="tblone">
							<tr>
								<th >Sl</th>
								<th>Product Name</th>
								<th >Image</th>
			    				<th >Price</th>				
								<th >Action</th>
							</tr>


							<?php
								$customerId=Session::get("customer_id");
								$getproduct=$pd->getCompareProduct($customerId);
								$i=0;
								if($getproduct){
									while($result=$getproduct->fetch_assoc()){
										$i++;
									

							?>						
						
							<tr>

								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName'];?></td>
								<td><img src="admin/<?php echo $result['image'];?>" alt=""/></td>
								<td><?php echo $result['price'];?></td>
								<td><a href="details.php?productid=<?php echo $result['productId']; ?>">View</a></td>
								
							</tr>
							

							
						
					   <?php
					   		}}  ?>
					  </table>
					</div>
					<div class="shopping">
						<div class="shopleft" style="width:100%; text-align:center">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include 'inc/footer.php'; ?>