 <!-- Page Content -->
<div id="body">

	<div id="page-content-wrapper" >
	
		<div class="container-fluid">
		
			<div class="row">
			
				<div class="col-lg-12">
				   <!--Brendcrubs -->	
					<ol class="breadcrumb">
					 <li><a href="#" style="color:#000;text-decoration:none;">Orders</a></li>
					 <li class="active"><i class="icon-file-alt"></i>Order Details</li>
			 		</ol>
					<!--End Brendcrubs -->				
					<!--Div For Button ADD Delete -->
					
					
					<!--END Div For Button ADD Delete -->	
			     	
					
					<!--Table  To display Data -->
					<h3>CUSTOMER INFORMATION</h3>
				    <table class="table">
						
						<th><b>Order No.</b></th>
						<th><b>Name</b></th>
						<th><b>Email Id</b></th>
						<th><b>Mob No</b></th>
						<th><b>Address</b></th>
						  <tr>
							 <td><?php echo $details['onum'];?></td>
							 <td><?php echo $details['name'];?></td>
							 <td><?php echo $details['email'];?></td>
							 <td><?php echo $details['mob'];?></td>
							 <td><?php echo $details['address'];?></td>
							 </tr>
							 
							
			        </table>
					
					<h3>ORDER DETAILS</h3>
				    <table class="table">
						
						<th><b>Product Code</b></th>
						<th><b>Product Name</b></th>
						<th><b>Quantity</b></th>
						<th><b>Price</b></th>
						<th><b></b></th>
						
						  
						  <?php foreach($details['item_id'] as $id) : ?>
						  <tr>
							 <td><?php echo $details['cd'][$id];?></td>
							 <td><?php echo $details['pname'][$id];?></td>
							 <td><?php echo $details['quantity'][$id];?></td>
							 <td><?php echo $details['price'][$id];?></td>
							 <td><img class="media-object" height="50" width="60" src="<?php echo base_url(); ?><?php echo $details['image'][$id];?>" alt="no image">
								</td>
							  </tr>
							 <?php endforeach; ?>
							
							 
							
			        </table>
					
					<h3>AMOUNT DETAILS</h3>
				    <table class="table">
						
						<th><b>Total</b></th>
						<th><b>Discount</b></th>
						<th><b>Grand Total</b></th>
						
						
						  
						   <tr>
							<td><?php echo $details['total'];?></td>
							<td><?php echo $details['discount']."%";?></td>
							<td><?php echo $details['Grand_Total'];?></td>
							
						 </tr>
							
							 
							
			        </table>
					<!--Table  END -->
						
				</div><!-- col-lg-12 end -->
										
			</div><!-- /Row End -->
				
		</div><!-- container-fluid end-->
				
	</div><!-- /#page-content-wrapper -->
</div><!-- /#body -->

<script>

 $('.catadd').click(function(event){
     event.preventDefault();
//$('#branchadd').load($(this).attr('href'));
     $('#body').load($(this).attr('href')); 
 });
</script>
 