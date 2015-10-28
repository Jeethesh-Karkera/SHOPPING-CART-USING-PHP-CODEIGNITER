
 <!-- Page Content -->
<div id="body">

	<div id="page-content-wrapper" >
	
		<div class="container-fluid">
		
			<div class="row">
			
				<div class="col-lg-12">
					<!--Brendcrubs -->					
					<ol class="breadcrumb">
					
					 <li><a href="#" style="color:#000;text-decoration:none;">Changes</a></li>
					 
					</ol>					
					<!--End Brendcrubs -->				
					<!--Div For Button ADD Delete -->
						
					<div class="btn-group btn-group-justified" role="group" aria-label="..."> 
					</div>
					<!--END Div For Button ADD Delete -->	
					<?php if($changes){ //check's data exist if exist display's data?>
					<br/>
					<!--Table  To display Data -->
					 <table class="table">
							<th><b>Customer Name</b></th>
							 <th><b>Required Changes</b></th>
								<th></th>				 
							<?php foreach($changes as $chg):?>
								<tr>
								<td><?php echo $chg->cust_name;?></td>
								<td><?php echo $chg->desc;?></td>
								<td><a href="<?php echo base_url(); ?>users/changeupdate/<?php echo $chg->id;?>" class="btnadd"><input type="submit" class="btn btn-default" value="Done"></a></td>
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
