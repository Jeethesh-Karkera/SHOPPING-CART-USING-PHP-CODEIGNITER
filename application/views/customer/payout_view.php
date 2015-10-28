 <!-- Page Content -->
<div id="body">

	<div id="page-content-wrapper" >
	
		<div class="container-fluid">
		
			<div class="row">
			
				<div class="col-lg-12">
				   <!--Brendcrubs -->	
					<ol class="breadcrumb">
					 <li><a href="#" style="color:#000;text-decoration:none;">Payouts</a></li>
					 
			 		</ol>
					<!--End Brendcrubs -->				
					<!--Div For Button ADD Delete -->
					
					<!--END Div For Button ADD Delete -->	
			
					<br/>
					<!--Table  To display Data -->
				    <table class="table">
						
						<th><b>Leftside Amount</b></th>
						<th><b>Rightside Amount</b></th>
						<th><b>Total</b></th>
						
						<?php $tot = $pay->L + $pay->R;?>
						 <tr>
							 <td><?php echo $pay->L;?></td>
							 <td><?php echo $pay->R;?></td>
							 <td><?php echo $tot;?></td>
						</tr>
								
			        </table>
					<!--Table  END -->
						
				</div><!-- col-lg-12 end -->
										
			</div><!-- /Row End -->
				
		</div><!-- container-fluid end-->
				
	</div><!-- /#page-content-wrapper -->
</div><!-- /#body -->


 