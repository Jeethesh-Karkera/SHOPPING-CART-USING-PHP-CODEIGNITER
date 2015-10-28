<style>
.fr-hd{
	padding-top:30px;
	
	color:#FFFF;
}
.fr-btm{
	padding-right:100px;
	
}
</style>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/form-elements.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    <body id="body">

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
							<h3><a class="pull-right" href="<?php echo base_url();?>/index" ><i class='fa fa-home'></i></a></h3>
                        		<div class="form-top-left">
								
                        			<h2><center>REGISTER</center></h2>
                        			
                            		
                        		</div>
                        		
								
                            </div>
                            <div class="form-bottom">
			                   

							   <?php echo form_open_multipart('login/insert_data'); ?>
							  
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Name</label>
			                        	<input type="text" name="Name" placeholder="name.." class="form-username form-control" id="name" required>
			                        </div>
									<div class="form-group">
			                    		<label class="sr-only" for="form-email">Email</label>
			                        	<input type="text" name="email" placeholder="email/username.." class="form-email form-control" id="email" required>
			                        </div>
									
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="password" placeholder="Password..." class="form-password form-control" id="password" required>
			                        </div>
									<div class="form-group">
			                        	<label class="sr-only" for="form-gender">Gender</label>
			                        	<select class="form-gender form-control" name="gender">
										<option value='Male'>Male</option>
										<option value='Female'>FeMale</option>
										</select>
			                        </div>
									<div class="form-group">
			                        	<label class="sr-only" for="form-dob">DOB</label>
			                        	<input type="text" name="dob" placeholder="Date of birth..." class="form-dob form-control" id="dob" required>
			                        </div>
									<div class="form-group">
			                        	<label class="sr-only" for="form-material">Material Status</label>
			                        	<select class="form-material form-control" name="material">
										<option value='Married'>Married</option>
										<option value='Single'>Single</option>
										</select>
			                        </div>
									<div class="form-group">
			                    		<label class="sr-only" for="form-address">Address</label>
			                        	<input type="text" name="address" placeholder="address.." class="form-address form-control" id="address" required>
			                        </div>
									<div class="form-group">
			                    		<label class="sr-only" for="form-city">City</label>
			                        	<input type="text" name="city" placeholder="city.." class="form-city form-control" id="city" required>
			                        </div>
									<div class="form-group">
			                    		<label class="sr-only" for="form-district">District</label>
			                        	<input type="text" name="district" placeholder="district.." class="form-district form-control" id="district" required>
			                        </div>
									<div class="form-group">
			                    		<label class="sr-only" for="form-state">State</label>
			                        	<input type="text" name="state" placeholder="state.." class="form-state form-control" id="state" required>
			                        </div>
									<div class="form-group">
			                    		<label class="sr-only" for="form-pincode">Pincode</label>
			                        	<input type="text" name="pincode" placeholder="pincode.." class="form-pincode form-control" id="pincode" required>
			                        </div>
									<div class="form-group">
			                    		<label class="sr-only" for="form-mobile_no">Mobile</label>
			                        	<input type="text" name="mobile_no" placeholder="mobile no.." class="form-mobile_no form-control" id="mobile_no" required>
			                        </div>
									<div class="form-group">
			                    		<label class="sr-only" for="form-ref">Refence No</label>
			                        	<input type="text" name="ref" placeholder="Refence No.." class="form-ref form-control" id="ref" required>
			                        </div>
									
									<div class="form-group">
			                    		<label class="sr-only" for="form-ref">Sponser Ref No</label>
			                        	<input type="text" name="sref" placeholder="Put 000 if no sponser or else put sponser ref no." class="form-sref form-control" id="sref"  required>
			                        </div>
									<div class="form-group">
			                    		<label class="sr-only" for="form-ref">Position</label>
			                        	<input type="text" name="pos" placeholder="Position.." class="form-pos form-control" id="pos" required>
			                        </div>
									<div class="form-group">
			                    		<label class="sr-only" for="form-ref">Packs</label>
							
							   <select class="form-control col-xs-6"  id="pac_id" name="pac_id" placeholder="Select packs..">
								<option>Select packs..</option>
               			 <?php foreach($pack as $pk) : ?><?php if($pk->deleted =='no'){?>
               			 <option class="form-control col-xs-6" value="<?php echo $pk->pack_id;?>" ><?php echo $pk->pack_name;?></option>
                
               				 <?php }  endforeach; ?>
                			</select>
			                        </div>
									<div>Bank Details</div>
									<div class="form-group">
			                    		<label class="sr-only" for="form-ref">Bank Name</label>
			                        	<input type="text" name="bname" placeholder="bank name.." class="form-bname form-control" id="bname" required>
			                        </div>
									<div class="form-group">
			                    		<label class="sr-only" for="form-ref">Branch Name</label>
			                        	<input type="text" name="branch" placeholder="branch name.." class="form-branch form-control" id="branch" required>
			                        </div>
									<div class="form-group">
			                    		<label class="sr-only" for="form-ref">Account Number</label>
			                        	<input type="text" name="acno" placeholder="Account Number.." class="form-acno form-control" id="acno" required>
			                        </div>
									<div class="form-group">
			                    		<label class="sr-only" for="form-ref">Name as per bank a/c</label>
			                        	<input type="text" name="acname" placeholder="Name as per bank a/c.." class="form-acname form-control" id="acname" required>
			                        </div>
									<div class="form-group">
			                    		<label class="sr-only" for="form-ref">IFS Code</label>
			                        	<input type="text" name="ifs" placeholder="IFS Code.." class="form-ifs form-control" id="ifs" required>
			                        </div>
									
									
									<div class="form-group">
							 <label  for="form-ref">Upload Deposit Slip</label>
							<input type="file"  name="userfile"  />
							<?php if($error !='') {?>
							<span style="color:red;"><?php echo $error;?></span>
							<?php }?>
							
						</div>
									<br/>
			                        <button type="submit" class="btn" id='add'>Sign Up!</button>
			                    </form>
		                    </div>
                        </div>
						<div  Style="margin-left:40%;" class="col-md-offset-5 form-box">
						<div class="form-top "style="color:#000;">
                        		<div class="form-top-left" style="color:#000;">
						<div class="fr-hd" style="color:#000;"><h3><center>INSTRUCTIONS</center></h3></div>
						</div>
						</div>
						 <div class="form-bottom col-md-offset-7 ">
						<ul style="color:#0000;" align="justify">
						<li>Please Deposit Amount in Bank####### for Account Number####### Before Registration.</li>
						<li>Please Maintain a Scanned Copy of Deposited Slip</li>
						</ul>
						</div>
						
						</div>
                    </div>
                    
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="<?php echo base_url();?>assets/js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery.backstretch.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>


