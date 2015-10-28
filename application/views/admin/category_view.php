 <!-- Page Content -->
<div id="body">

	<div id="page-content-wrapper" >
	
		<div class="container-fluid">
		
			<div class="row">
			
				<div class="col-lg-12">
				   <!--Brendcrubs -->	
					<ol class="breadcrumb">
					 <li><a href="#" style="color:#000;text-decoration:none;">Category</a></li>
					 
			 		</ol>
					<!--End Brendcrubs -->				
					<!--Div For Button ADD Delete -->
					
					<div class="btn-group btn-group-justified" role="group" aria-label="...">
						  <div class="btn-group" role="group">
							<button type="button" class="btn btn-default btng">&nbsp;</button>
						  </div>
						  <div class="btn-group" role="group">
							
							<a href="<?php echo base_url(); ?>category/categoryadd" class="btn btn-default btng pull-right catadd">Add <i class="fa fa-plus-square"></i></a>
						  </div>
						  
			        </div>
					<!--END Div For Button ADD Delete -->	
			      <?php if($cat_list) {//check's data exist if exist display's data?>	
					<br/>
					<!--Table  To display Data -->
				    <table class="table">
						
						<th><b>Name</b></th>
						<th><b>Description</b></th>
						<th><b>Edit</b></th>
						<th><b>Delete</b></th>
						<th></th>
						 <?php foreach($cat_list as $cpost):?>
						 <tr>
							 <td><?php echo $cpost->Name;?></td>
							 <td><?php echo $cpost->Description;?></td>
							 <td><a href="<?php echo base_url(); ?>category/categoryupdate/<?php echo $cpost->id;?>" class="btn btn-default catadd"><i class="fa fa-edit"></i></a></td>
							 <td><a href="<?php echo base_url(); ?>category/categorydelete/<?php echo $cpost->id;?>" class="btn btn-default catadd"><i class="fa fa-times"></i></a></td>
							
							 <td><input type="submit" class="btn btn-default stock" id="<?php echo $cpost->id;?>" value="Add Sub Cat"/></td>
						
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

