
 <!-- Page Content -->

<div id="page-content-wrapper body">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<ol class="breadcrumb">
						 <li><a href="#" style="color:#000;text-decoration:none;">Profile</a></li>
						  <li><a href="#" style="color:#000;text-decoration:none;">Update</a></li>
 				</ol>
				<div class="row">
						 <div class="col-md-6">
							 <label>Address</label>
							<input type="text" class="form-control" id="add" name="add" value="<?php echo $profile->address;?>" required/>
						</div>
						<div class="col-md-6">
							 <label>City</label>
							<input type="text" class="form-control" id="city" name="city" value="<?php echo $profile->city;?>" required/>
						</div>
						
					</div>
					<div class="row">
						<div class="col-md-6">
							 <label>Disctrict</label>
							 	<input type="text" class="form-control" id="dis" name="dis" value="<?php echo $profile->district;?>" required/>
						</div>
						
						
							<div class="col-md-6">
							 <label>State</label>
							 	<input type="text" class="form-control" id="state" name="state" value="<?php echo $profile->state;?>" required/>
						
						</div>
					    
					</div>
					<div class="row">
						
							<div class="col-md-6">
							 <label>Pin</label>
							 	<input type="text" class="form-control" id="pin" name="pin" value="<?php echo $profile->pin;?>" required/>
						</div>
						
						</div>
					<div class="row">
					<h3>You can change only address details. To change any other details write here to admin to change the details</h3>
					 <label>Other Details:</label>
					<textarea class="form-control" id="desc" name="desc" rows="5" cols="40" placeholder="You can change only address details. To change any other details write here to admin to change the details."> </textarea>
					</div>
					
					
					 <div class="row">
					 <div class="col-md-12">
					 &nbsp;<br/>
				    <input class="btn btn-primary pull-right " id="sub" type="submit" value="Update" />
					</div>
					</div>

				
				
		     </div>
				
        </div>
    </div>
       
</div> <!-- /#page-content-wrapper -->

<script>

 $('.btnadd').click(function(event){
     event.preventDefault();
//$('#branchadd').load($(this).attr('href'));
     $('#body').load($(this).attr('href')); 
 });
</script>

<script>
$('#sub').click(function(){
	$.post('<?php echo base_url();?>index/profile_update',
	{
		add:$('#add').val(),
		city:$('#city').val(),
		dis:$('#dis').val(),
		state:$('#state').val(),
		pin:$('#pin').val(),
		desc:$('#desc').val()
	},
	function(data,status){
	$('#body').html(data);
    return true;
  });
	
});
</script>
 