 <!-- Page Content -->
<div id="body">

	<div id="page-content-wrapper" >
	
		<div class="container-fluid">
		
			<div class="row">
			
				<div class="col-lg-12">
				   <!--Brendcrubs -->	
					<ol class="breadcrumb">
					 <li><a href="#" style="color:#000;text-decoration:none;">Sub Category</a></li>
					 
			 		</ol>
					<!--End Brendcrubs -->				
					<!--Div For Button ADD Delete -->
					
					<div class="btn-group btn-group-justified" role="group" aria-label="...">
						  <div class="btn-group" role="group">
							<button type="button" class="btn btn-default btng">&nbsp;</button>
						  </div>
						  
						  
			        </div>
					<!--END Div For Button ADD Delete -->	
			      <?php if($cat_list) {//check's data exist if exist display's data?>	
					<br/>
					<!--Table  To display Data -->
				    <table class="table">
						
						<th><b>Category Name</b></th>
						<th><b>Sub Category Name</b></th>
						
						 <?php foreach($sub_cat_list as $cpost):?>
						 <tr>
							 <td><?php echo $cpost->name;?></td>
							 <td><?php echo $cpost->sub_cat;?></td>
							
						<?php endforeach; ?>
						</tr>
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
$('.stock').click(function(){
    var amount = prompt("Please enter thesub category name");
    if (amount != null) {
		var id = $(this).attr('id');
		
        $.post('<?php echo base_url('category/sub_category');?>',
		  {
			  stock:amount,
			  id:id
		  },
		  function(data,status)
			{
				$(this).load('<?php echo base_url('category');?>');
			});
    }
});
});
</script> 

