
 <!-- Page Content -->
<div id="body">
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
							 <label>Name</label>
							<input type="text" class="form-control" id="name" name="name" value="<?php echo $profile->name;?>" required/>
						</div>
						
					 <div class="col-md-6">
							 <label>Address</label>
							<input type="text" class="form-control" id="add" name="add" value="<?php echo $profile->address;?>" required/>
						</div>
						</div>
					<div class="row">
						<div class="col-md-6">
							 <label>City</label>
							<input type="text" class="form-control" id="city" name="city" value="<?php echo $profile->city;?>" required/>
						</div>
						
					
						<div class="col-md-6">
							 <label>Disctrict</label>
							 	<input type="text" class="form-control" id="dis" name="dis" value="<?php echo $profile->district;?>" required/>
						</div>
						</div>
					<div class="row">
						
							<div class="col-md-6">
							 <label>State</label>
							 	<input type="text" class="form-control" id="state" name="state" value="<?php echo $profile->state;?>" required/>
						
						</div>
					    <div class="col-md-6">
							 <label>Pin</label>
							 	<input type="text" class="form-control" id="pin" name="pin" value="<?php echo $profile->pin;?>" required/>
						</div>
						
						</div>
						<div class="row">
						
							<div class="col-md-6">
							 <label>Mobile No</label>
							 	<input type="text" class="form-control" id="mob" name="mob" value="<?php echo $profile->mob_no;?>" required/>
						
						</div>
					    <div class="col-md-6">
							 <label>DOB</label>
							 	<input type="text" class="form-control" id="dob" name="dob" value="<?php echo $profile->dob;?>" required/>
						</div>
						
						</div>
					<h3>Bank Details</h3>
					<div class="row">
						
							<div class="col-md-6">
							 <label>Bank Name</label>
							 	<input type="text" class="form-control" id="bname" name="bname" value="<?php echo $profile->bname;?>" required/>
						
						</div>
					    <div class="col-md-6">
							 <label>Branch Name</label>
							 	<input type="text" class="form-control" id="branch" name="branch" value="<?php echo $profile->branch;?>" required/>
						</div>
					</div>
					<div class="row">
						
							<div class="col-md-6">
							 <label>Account No</label>
							 	<input type="text" class="form-control" id="acno" name="acno" value="<?php echo $profile->acno;?>" required/>
						
						</div>
					    <div class="col-md-6">
							 <label>Name as per bank a/c</label>
							 	<input type="text" class="form-control" id="acname" name="acname" value="<?php echo $profile->acname;?>" required/>
						</div>
					</div>
					<div class="row">
						
							<div class="col-md-6">
							 <label>IFS No</label>
							 	<input type="text" class="form-control" id="ifs" name="ifs" value="<?php echo $profile->ifs;?>" required/>
						<div style="display:none"><input type="text" id="cust_id" value="<?php echo $profile->customer_id;?>"/></div>
						</div>
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
</div>
<script>

 $('.btnadd').click(function(event){
     event.preventDefault();
//$('#branchadd').load($(this).attr('href'));
     $('#body').load($(this).attr('href')); 
 });
</script>

<script>
$('#sub').click(function(){
	$.post('<?php echo base_url();?>users/update_profile',
	{
		id:$('#cust_id').val(),
		name:$('#name').val(),
		add:$('#add').val(),
		city:$('#city').val(),
		dis:$('#dis').val(),
		state:$('#state').val(),
		pin:$('#pin').val(),
		mob:$('#mob').val(),
		dob:$('#dob').val(),
		bname:$('#bname').val(),
		branch:$('#branch').val(),
		acno:$('#acno').val(),
		acname:$('#acname').val(),
		ifs:$('#ifs').val()
	},
	function(data,status){
	$('#body').html(data);
    return true;
  });
	
});
</script>
 