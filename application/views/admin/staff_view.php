 <!-- Page Content -->
<div id="body">

	<div id="page-content-wrapper" >
	
		<div class="container-fluid">
		
			<div class="row">
			
				<div class="col-lg-12">
				   <!--Brendcrubs -->	
					<ol class="breadcrumb">
					 <li><a href="#" style="color:#000;text-decoration:none;">Staff</a></li>
					 
			 		</ol>
					<!--End Brendcrubs -->				
					<!--Div For Button ADD Delete -->
					
					<div class="btn-group btn-group-justified" role="group" aria-label="...">
						  <div class="btn-group" role="group">
							<button type="button" class="btn btn-default btng">&nbsp;</button>
						  </div>
						  <div class="btn-group" role="group">
							
							<a href="<?php echo base_url(); ?>staff/staffadd" class="btn btn-default btng pull-right catadd">Add <i class="fa fa-plus-square"></i></a>
						  </div>
						  
			        </div>
					<!--END Div For Button ADD Delete -->	
			      <?php if($stf_list) {//check's data exist if exist display's data?>	
					<br/>
					<!--Table  To display Data -->
				    <table class="table">
						
						<th><b>Name</b></th>
						<th><b>Email</b></th>
						<th><b>Adress</b></th>
						<th><b>City</b></th>
						<th><b>State</b></th>
						<th><b>Pin</b></th>
						<th><b>Mobile No</b></th>
						<th><b>Edit</b></th>
						<th><b>Delete</b></th>
						 <?php foreach($stf_list as $cpost):?>
						 <tr>
							 <td><?php echo $cpost->staff_name;?></td>
							 <td><?php echo $cpost->staff_email;?></td>
							 <td><?php echo $cpost->address;?></td>
							 <td><?php echo $cpost->city;?></td>
							 <td><?php echo $cpost->state;?></td>
							 <td><?php echo $cpost->pin;?></td>
							 <td><?php echo $cpost->mob_no;?></td>
							 <td><a href="<?php echo base_url(); ?>staff/staffupdate/<?php echo $cpost->staff_id;?>/<?php echo $cpost->id;?>" class="btn btn-default catadd"><i class="fa fa-edit"></i></a></td>
							 <td><a href="<?php echo base_url(); ?>staff/staffdelete/<?php echo $cpost->staff_id;?>" class="btn btn-default catadd"><i class="fa fa-times"></i></a></td>
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
 