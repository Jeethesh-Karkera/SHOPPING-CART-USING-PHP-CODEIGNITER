 <!-- Page Content -->
<div id="body">

	<div id="page-content-wrapper" >
	
		<div class="container-fluid">
		
			<div class="row">
			
				<div class="col-lg-12">
				   <!--Brendcrubs -->	
					<ol class="breadcrumb">
					 <li><a href="#" >Settings</a></li>
					 <li class="active"><i class="icon-file-alt"></i>Profile</li>
			 		</ol>
					<!--End Brendcrubs -->				
					<!--Div For Button ADD Delete -->
					
					
					<!--END Div For Button ADD Delete -->	
			     	
					
					<!--Table  To display Data -->
					<h3>PROFILE</h3>
				    <table class="table">
					<th><b>Name</b></th>
					<th><b>Email Id</b></th>
					<th><b>Address</b></th>
					<th><b>City</b></th>
					<th><b>District</b></th>
					<th><b>State</b></th>
					<th><b>Pin</b></th>
					<th><b>Mob No</b></th>
					<th></th>
					<tr>
						<td><?php echo $profile->name;?></td>
						<td><?php echo $profile->email_id;?></td>
						<td><?php echo $profile->address;?></td>
						<td><?php echo $profile->city;?></td>
						<td><?php echo $profile->district;?></td>
						<td><?php echo $profile->state;?></td>
						<td><?php echo $profile->pin;?></td>
						<td><?php echo $profile->mob_no;?></td>
						 <td><a href="<?php echo base_url(); ?>index/update" class="btn btn-default catadd"><i class="fa fa-edit"></i></a></td>
					</tr>
							 
							
			        </table>
					
					<h3>Bank Details</h3>
				    <table class="table">
						
						<th><b>Bank Name</b></th>
						<th><b>Branch Name</b></th>
						<th><b>Account No</b></th>
						<th><b>Name as per a/c</b></th>
						<th><b>IFS No</b></th>
						<th><b></b></th>
						
						  <tr>
							 <td><?php echo $profile->bname;?></td>
							 <td><?php echo $profile->branch;?></td>
							 <td><?php echo $profile->acno;?></td>
							 <td><?php echo $profile->acname;?></td>
							 <td><?php echo $profile->ifs;?></td>
						  </tr>
					</table>
					
					
				    <table class="table">
						<thead>
							<tr>	    
								<td><button  class="btn btn-info text-center" id="changepswrd" >Change Password</button></td>
							</tr>
						</thead>
				    </table>
					<!--Table  END -->
					<div id="password">
	<div class="text-center">
		<h3>Change Password:</h3>
		</div>
<table class="table table-bordered">

<tbody>

<tr class="form-group">
<td class="col-md-6">Old Password: </td>
<td class="col-md-6"><input class="form-control col-xs-6"  id="opassword" name="opassword" type="password" required onchange="checkopassd();"
			size="30"  />
			<span class="err" style="color:red;" ></span></td>


</tr>
<tr class="form-group">
<td class="col-md-6">New Password:</td>
<td class="col-md-6"><input class="form-control col-xs-6" id="npassword" required name="npassword" type="password" 
			size="30"  /></td>

</tr>
<tr class="form-group">
<td class="col-md-6">Confirm Password:</td>
<td class="col-md-6"><input class="form-control col-xs-6" id="cpassword" required name="cpassword" type="password" onchange="checkconfirmpassd();"
			size="30"  />
			<span class="error" style="color:red;" ></span></td>
</tr>

<tr class="form-group shw"><td class="col-md-6" colspan="2" align="center"><button type="submit" id="sub" class="btn btn-primary" ><i class=" icon-ok-sign icon-white"></i>&nbsp;Submit</button></td></tr>
</tbody>
</table>
	</div>	
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
$('.shw').hide();
$('#password').hide();
</script>

<script>
$('#changepswrd').click(function(){
	$('#password').show();
});
</script>

<script>
var a= 0;
function checkopassd()
{

//alert($('#group_no').val());
 $.post('<?php echo site_url('index/chkop'); ?>', /*action of the form */
    {
		opassword:$('#opassword').val()
	},

    function(data,status){
		
	$('.err').html(data);
    return true;
  });
}
</script>

<script>
var b = 0;
function checkconfirmpassd()
{
	var npass = $('#npassword').val();
	var cpass = $('#cpassword').val();
	if(cpass != npass)
	{
		$('.error').html("confirm password does not match");
		$('.shw').hide();
	}
	else
	{
		$('.shw').show();
		$('.error').html("");
	}
}
</script>

  <script>

 $('#sub').click(function(event){
     event.preventDefault();
 $.post('<?php echo site_url('index/changepwd'); ?>', //action of the form 
    {
	  
	    opassword:$('#opassword').val(),
	   npassword:$('#npassword').val(),
	   cpassword:$('#cpassword').val()

	}, 
	function(data,status){
		if(data == 0)
		{
			alert("Please enter proper details");
		}
		else
		{
			alert("Password Updated");
			$('#body').load('<?php echo base_url();?>index/setting');
		}	
	
    return true;
	});

});
</script>

 