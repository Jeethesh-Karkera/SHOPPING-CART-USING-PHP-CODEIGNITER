 <!-- Page Content -->
<div id="body">

	<div id="page-content-wrapper" >
	
		<div class="container-fluid">
		
			<div class="row">
			
				<div class="col-lg-12">
				   <!--Brendcrubs -->	
					<ol class="breadcrumb">
					 <li><a href="#" style="color:#000;text-decoration:none;">Orders</a></li>
					 
			 		</ol>
					<!--End Brendcrubs -->				
					<!--Div For Button ADD Delete -->
					
					<!--END Div For Button ADD Delete -->	
			      <?php if($ord_list) {//check's data exist if exist display's data?>	
					<br/>
					<!--Table  To display Data -->
				    <table class="table">
						
						<th><b>Order No.</b></th>
						<th><b>Name</b></th>
						<th><b>Email Id</b></th>
						<th><b>Mob No</b></th>
						<th><b>Address</b></th>
						<th><b>Items</b></th>
						<th><b>Discount</b></th>
						<th><b>Grand Total</b></th>
						<th><b></b></th>
						<th><b></b></th>
						 <?php foreach($ord_list['id'] as $oid):?>
						 <tr>
						  
							 <td><?php echo $ord_list[$oid]['onum'];?></td>
							 <td><?php echo $ord_list[$oid]['name'];?></td>
							 <td><?php echo $ord_list[$oid]['email'];?></td>
							 <td><?php echo $ord_list[$oid]['mob'];?></td>
							 <td><?php echo $ord_list[$oid]['address'];?></td>
							 <td><?php echo $ord_list[$oid]['ord_det'];?></td>
							 <td><?php echo $ord_list[$oid]['disc']."%";?></td>
							 <td><?php echo $ord_list[$oid]['grand_tot'];?></td>
							 
							 <td><a href="<?php echo base_url(); ?>order/orderdetail/<?php echo $oid;?>" class="btn btn-default catadd">Details</a></td>
							 <td><a href="<?php echo base_url(); ?>order/orderdeliver/<?php echo $oid;?>" class="btn btn-default catadd">Deliverd</a></td>
							 <td><input type="submit" class ="btn btn-default discnt"  id="<?php echo $oid;?>" value="Discount"/></td>
							
						</tr>
								 <?php endforeach;?>
			        </table>
					<!--Table  END -->
						<?php } else {  echo '<br/><center><div class="alert alert-info">No Records Found !!</div><center>';}?>
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
 <script>
$('document').ready(function(){
$('.discnt').click(function(){
    var amount = prompt("Please enter the discount");
    if (amount != null) {
		var id = $(this).attr('id');
		
        $.post('<?php echo base_url('order/discount');?>',
		  {
			  disc:amount,
			  id:id
		  },
		  function(data,status)
			{
				$(this).load('<?php echo base_url('order');?>');
			});
    }
});
});
</script>