 <!-- Page Content -->
 <div id="page-content-wrapper">
 
    <div class="container-fluid">
	
        <div class="row" >
		
            <div class="col-lg-12">
			
                     <ol class="breadcrumb">
						 <li><a href="#" style="color:#000;text-decoration:none;">Category</a></li>
						  <li><a href="#" style="color:#000;text-decoration:none;">Add</a></li>
					 </ol>
					 
						  
					<div class="row">
						  <div class="col-lg-4">
						     <label for="cname">Name <span>*</span></label>
						  </div>
						  <div class="col-lg-8">
							<input type="text" class="form-control" id="cname" name="cname"  id="exampleInputEmail3" placeholder="Category name" value="<?php echo $name;?>">
						  </div>
					</div>
					<br/>
					<br/>	   
					<div class="row">
						  <div class="col-md-4">
						  <label for="description">Description <span>*</span></label>
						  </div>
						   <div class="col-md-8">
						   <textarea class="form-control" id="desc" name="desc" rows="5" cols="40"> <?php echo $desc;?></textarea>
									 
						   </div>
					</div>
					<br/>
					<br/>
					<div class="row">
								  <div class="col-md-4">
									&nbsp;
								   </div>
								  <div class="col-md-4"> 
								  
								  <?php if($type=='add') { ?>
								  <div style="display:none"><input type="text" id='id' value="<?php echo $id;?>"></div>
								  <div style="display:none"><input type="text" id='type' value="<?php echo $type;?>"></div>
										  <button type="submit" class="btn btn-default pull-right add">Add</button>
								  <?php } else { ?>
								  <div style="display:none"><input type="text" id='id' value="<?php echo $id;?>"></div>
								  <div style="display:none"><input type="text" id='type' value="<?php echo $type;?>"></div>
									<button type="submit" class="btn btn-default pull-right add">Update</button>
								  <?php } ?>
								  </div>
					</div>
								  
				
			</div>
			
		</div>
		
    </div>
	
  </div>
  
  <script>
  $('document').ready(function() {
	  $('.add').click(function(){
		   $.post('<?php echo base_url('category/insert_cat');?>',
		  {
			  name:$('#cname').val(),
			  desc:$('#desc').val(),
			  id:$('#id').val(),
			  type:$('#type').val()
		  },
		  function(data,status)
		{
			
			$('#body').load('<?php echo base_url('category');?>');
			
			//return true;
		});
	  });
  });
  </script>
