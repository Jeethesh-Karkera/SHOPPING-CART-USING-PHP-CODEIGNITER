
 <style>
 #radioBtn .notActive{
    color: #3276b1;
    background-color: #fff;
}
 </style>
 <!-- Page Content -->
<div id="body">

	<div id="page-content-wrapper" >
	
		<div class="container-fluid">
		
			<div class="row">
			
				<div class="col-lg-12">
					<!--Brendcrubs -->					
					<ol class="breadcrumb">
					
					 <li><a href="#" style="color:#000;text-decoration:none;">Products</a></li>
					 
					</ol>					
					<!--End Brendcrubs -->				
					<!--Div For Button ADD Delete -->
						
					<div class="btn-group btn-group-justified" role="group" aria-label="...">
							  <div class="btn-group" role="group">
								<button type="button" class="btn btn-default btng">&nbsp;</button>
							  </div>
							  <div class="btn-group" role="group">
								
								<a href="<?php echo base_url(); ?>product/addproduct" class="btn btn-default btnadd">Add <i class="fa fa-plus-square"></i></a>
							  </div>
							 
					</div>
					<!--END Div For Button ADD Delete -->	
					<?php if($pposts){ //check's data exist if exist display's data?>
					<br/>
					<!--Table  To display Data -->
					 <table class="table">
							 
							 <th><b>Name</b></th>
							 <th><b>Code</b></th>
							 <th><b>Category</b></th>
							 <th><b>Pack Name</b></th>
							 <th><b>Selling/Received Price</b></th>
							 <th><b>Pv</b></th>
							 <th><b>Stock</b></th>
							 <th><b>Description</b></th>
							 <th><b>Image</b></th>
							 <th>Edit</th>					 
							 <th>Delete</th>					 
							<?php foreach($pposts as $ppost):?>
								<tr>
								<td><?php echo $ppost->pname;?></td>
								<td><?php echo $ppost->code;?></td>
								<td><?php echo $ppost->Name;?></td>
								<td><?php echo $ppost->pack_name;?></td>
								<td><?php echo $ppost->selling_price."/".$ppost->received_price;?></td>
								<td><?php echo $ppost->pv;?></td>
								<td><?php echo $ppost->stock;?></td>
								<td><?php echo $ppost->description;?></td>
								<td><img class="media-object" height="50" width="60" src="<?php echo base_url(); ?><?php echo $ppost->image;?>" alt="no image">
								</td>
							    <td><a href="<?php echo base_url(); ?>product/productupdate/<?php echo $ppost->pid;?>" class="btnadd"><i class="fa fa-edit "></i></a></td>
							    <td><a href="<?php echo base_url(); ?>product/productdelete/<?php echo $ppost->pid;?>" class="btnadd"><i class="fa fa-remove"></i></a></td>
								<?php if($ppost->stock < 5) { ?>
								<td class="txtblnk"> <p><strong><font color="red">Item Insufficeint</font>
								<input type="submit" class="btn btn-default stock" id="<?php echo $ppost->pid;?>" value="update"/></td>
								<?php } ?>
							   </tr>
							 <?php endforeach;?>
							
					 </table>
					 <!--Table  END -->
					 <?php } else {  echo '<br/><div class="alert alert-info">No Records Found !!</div>';}?>
				</div><!-- col-lg-12 end -->
										
			</div><!-- /Row End -->
				
		</div><!-- container-fluid end-->
				
	</div><!-- /#page-content-wrapper -->
</div><!-- /#body -->
 
<script>

 $('.btnadd').click(function(event){
     event.preventDefault();
//$('#branchadd').load($(this).attr('href'));
     $('#body').load($(this).attr('href')); 
 });
</script>

 <script type="text/javascript">
$(function() {
blinkeffect('.txtblnk');
})
function blinkeffect(selector) {
$(selector).fadeOut('slow', function() {
$(this).fadeIn('slow', function() {
blinkeffect(this);
});
});
}
</script>

 <script>
$('document').ready(function(){
$('.stock').click(function(){
    var amount = prompt("Please enter the available no of items");
    if (amount != null) {
		var id = $(this).attr('id');
		
        $.post('<?php echo base_url('product/stock_update');?>',
		  {
			  stock:amount,
			  id:id
		  },
		  function(data,status)
			{
				$(this).load('<?php echo base_url('product');?>');
			});
    }
});
});
</script>