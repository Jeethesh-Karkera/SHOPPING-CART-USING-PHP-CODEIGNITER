 <!-- Page Content -->
<div id="body">

	<div id="page-content-wrapper" >
	
		<div class="container-fluid">
		
			<div class="row">
			
				<div class="col-lg-12">
				   <!--Brendcrubs -->	
					<ol class="breadcrumb">
					 <li><a href="#" style="color:#000;text-decoration:none;">Packs</a></li>
					 
			 		</ol>
					<!--End Brendcrubs -->				
					<!--Div For Button ADD Delete -->
					
					<div class="btn-group btn-group-justified" role="group" aria-label="...">
						  <div class="btn-group" role="group">
							<button type="button" class="btn btn-default btng">&nbsp;</button>
						  </div>
						  <div class="btn-group" role="group">
							
							<a href="<?php echo base_url(); ?>packs/packadd" class="btn btn-default btng pull-right catadd">Add <i class="fa fa-plus-square"></i></a>
						  </div>
						  
			        </div>
					<!--END Div For Button ADD Delete -->	
			      <?php if($cat_list) {//check's data exist if exist display's data?>	
					<br/>
					<!--Table  To display Data -->
				    <table class="table">
						
						<th><b>Pack Name</b></th>
						<th><b>Amount</b></th>
						<th><b>Pv</b></th>
						<th><b>Payout Amt</b></th>
						<th><b>Binary Comp Amt</b></th>
						<th><b>Edit</b></th>
						<th><b>Delete</b></th>
						 <?php foreach($cat_list as $cpost):?>
						 <tr>
							 <td><?php echo $cpost->pack_name;?></td>
							 <td><?php echo $cpost->amount;?></td>
							 <td><?php echo $cpost->pv;?></td>
							 <td><?php echo $cpost->payout;?></td>
							 <td><?php echo $cpost->binary;?></td>
							 <td><a href="<?php echo base_url(); ?>packs/packupdate/<?php echo $cpost->pack_id;?>" class="btn btn-default catadd"><i class="fa fa-edit"></i></a></td>
							 <td><a href="<?php echo base_url(); ?>packs/packdelete/<?php echo $cpost->pack_id;?>" class="btn btn-default catadd"><i class="fa fa-times"></i></a></td>
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
 