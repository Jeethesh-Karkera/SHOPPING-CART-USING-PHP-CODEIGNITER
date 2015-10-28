 <!-- Page Content -->
<div id="body">

	<div id="page-content-wrapper" >
	
		<div class="container-fluid">
		
			<div class="row">
			
				<div class="col-lg-12">
				   <!--Brendcrubs -->	
					<ol class="breadcrumb">
					 <li><a href="#" style="color:#000;text-decoration:none;">Users</a></li>
					 
			 		</ol>
					<!--End Brendcrubs -->				
					<!--Div For Button ADD Delete -->
					
				
					<!--END Div For Button ADD Delete -->	
			      <?php if($usr_list) {//check's data exist if exist display's data?>	
					<br/>
					<!--Table  To display Data -->
				    <table class="table">
						
						<th><b>Name</b></th>
						<th><b>Address</b></th>
						<th><b>City</b></th>
						<th><b>Email</b></th>
						<th><b>Mobile</b></th>
						<th><b>Refence No</b></th>
						<th><b>Refered No</b></th>
						<th><b>Bank name</b></th>
						<th><b>Branch Name</b></th>
						<th><b>Account No</b></th>
						<th><b>Name as per a/c</b></th>
						<th><b>Ifs</b></th>
						<th><b>Deposit Slip</b></th>
						<th></th>
						 <?php foreach($usr_list as $cpost):?>
						 <tr>
							 <td><?php echo $cpost->name;?></td>
							 <td><?php echo $cpost->address;?></td>
							 <td><?php echo $cpost->city;?></td>
							 <td><?php echo $cpost->email_id;?></td>
							 <td><?php echo $cpost->mob_no;?></td>
							 <td><?php echo $cpost->ref_no;?></td>
							 <td><?php echo $cpost->referd_no;?></td>
							 <?php foreach($usr_bank as $bnk): if($cpost->customer_id == $bnk->cust_id){?>
							 <td><?php echo $bnk->bname;?></td>
							 <td><?php echo $bnk->branch;?></td>
							 <td><?php echo $bnk->acno;?></td>
							 <td><?php echo $bnk->acname;?></td>
							 <td><?php echo $bnk->ifs;?></td>
							 <?php } endforeach; ?>
							 <td><img class="media-object" height="50" width="60" src="<?php echo base_url(); ?><?php echo $cpost->image;?>" alt="no image">
								</td>
							  <td><a href="<?php echo base_url(); ?>users/profile_update/<?php echo $cpost->customer_id;?>" class="catadd"><i class="fa fa-edit "></i></a></td>
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
 