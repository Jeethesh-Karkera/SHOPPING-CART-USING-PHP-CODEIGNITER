<script src="<?php echo base_url();?>CSS/js/jquery.validate.min.js "></script>
<style>
.error-name {
    color: red;
	font-family: calibri;
}
</style>
<div class="col-lg-12">
	<h1>Add Staff</h1>
		<ol class="breadcrumb">
              <li><a href="#"><i class="icon-dashboard"></i> Staff</a></li>
              <li class="active"><i class="icon-file-alt"></i> Add Staff</li>
             
		<div style="clear: both;"></div>
	</ol>
	
	<div class="table-responsive">
              <table class="table table-border table-hover tablesorter">
                <thead>
                  <tr></tr>
				  <tr></tr>
                </thead>
                <tbody>
				<tr>
                    <td><strong>Staff Name:</strong></td>
                    <td><input name="staff_name" type="text" required='required' class="form-control staff_name" placeholder="Enter your Staff Name " value="<?php echo $staff_name ;?>" data-errorclass="error-name"></td>
				</tr>
				<tr>
                    <td><strong>User Name:</strong></td>
                    <td><input name="user_name" type="text" required='required' class="form-control user_name" placeholder="Enter your Staff Name " value="<?php echo $user_name ;?>" data-errorclass="error-name"></td>
				</tr>
				<tr>
                    <td><strong>Email Id:</strong></td>
                    <td><input name="email" type="email" required='required'  class="form-control email" placeholder="Enter your Email Id "  value="<?php echo $staff_email ;?>" data-errorclass="error-name"></td>
				
				</tr>
				<?php if($type == 'add') { ?>
				<tr>
                    <td><strong>Password:</strong></td>
                    <td><input name="password" type="password" required='required'  class="form-control password" placeholder="Enter your Email Id "  value="<?php echo $password ;?>" data-errorclass="error-name"></td>
				
				</tr>
				<?php } ?>
				<tr>
                    <td><strong>Mobile No:</strong></td>
                    <td><input name="mobile" type="text" required='required' class="form-control mobile_no" placeholder="Enter your Mobile " value="<?php echo $mobile ;?>" data-errorclass="error-name"></td>
				</tr>
				
				<tr>
                    <td><strong>Address:</strong></td>
                    <td><input name="address" type="text" required='required' class="form-control address" placeholder="Enter your Address " value="<?php echo $address ;?>" data-errorclass="error-name"></td>
				</tr>
				<tr>
                    <td><strong>Date of Birth:</strong></td>
                    <td><input name="dob" type="text" required='required' class="form-control dob" placeholder="Enter your Date of Birth " value="<?php echo $dob ;?>" data-errorclass="error-name"></td>
				</tr>
				<tr>
                    <td><strong>City:</strong></td>
                    <td><input name="city" type="text" required='required' class="form-control city" placeholder="Enter your City" value="<?php echo $city ;?>" data-errorclass="error-name"></td>
				</tr>
				<tr>
                    <td><strong>District:</strong></td>
                    <td><input name="district" type="text" required='required' class="form-control district" placeholder="Enter your District " value="<?php echo $district ;?>" data-errorclass="error-name"></td>
				</tr>
				<tr>
                    <td><strong>State:</strong></td>
                    <td><input name="state" type="text" required='required' class="form-control state" placeholder="Enter your State " value="<?php echo $state ;?>" data-errorclass="error-name"></td>
				</tr>
				<tr>
                    <td><strong>Pincode:</strong></td>
                    <td><input name="pincode" type="text" required='required' class="form-control pincode" placeholder="Enter your Pincode " value="<?php echo $pincode ;?>" data-errorclass="error-name"></td>
				</tr>
				<tr>
                    <td></td>
                    <td><?php if($type=='add') { ?>
								  <div style="display:none"><input type="text" class='id' value="<?php echo $id;?>"></div>
								  <div style="display:none"><input type="text" class='type' value="<?php echo $type;?>"></div>
										  <button type="submit" class="btn btn-default pull-right add">Add</button>
								  <?php } else { ?>
								  <div style="display:none"><input type="text" class='id' value="<?php echo $id;?>"></div>
								  <div style="display:none"><input type="text" class='type' value="<?php echo $type;?>"></div>
								  <div style="display:none"><input type="text" class='password' value="<?php echo $add_id;?>"></div>
									<button type="submit" class="btn btn-default pull-right add">Update</button>
								  <?php } ?></td>
				</tr>
                  
				</tbody>
              </table>
            </div>
			
</div>

<script>
$('document').ready(function() {
$('.add').click(function(){

$.post('<?php echo base_url('staff/insert_staff') ;?>',
{
	type:$('.type').val(),
	id:$('.id').val(),
	user_name:$('.user_name').val(),
	staff_name:$('.staff_name').val(),
	email_id:$('.email').val(),
	mobile_no:$('.mobile_no').val(),
	address:$('.address').val(),
	password:$('.password').val(),
	dob:$('.dob').val(),
	city:$('.city').val(),
	district:$('.district').val(),
	state:$('.state').val(),
	pincode:$('.pincode').val()
},
function(data,status)
{
	$('#body').load('<?php echo base_url('staff');?>');

});
});
});

</script>