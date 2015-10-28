

    <body id='body'>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
							<h3><a class="pull-right" href="<?php echo base_url();?>/index" ><i class='fa fa-home'></i></a></h3>
                        		<div class="form-top-left">
                        			<h2><center>Login</center></h2>
                            		
                        		</div>
                        		
								<div class="form-top-right">
                        			 <button type="submit" id="reg" class="btn btn-info">Sign up!</button>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                   <?php echo form_open('verifylogin'); ?>

							   <?php echo validation_errors(); ?>
							  
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Username</label>
			                        	<input type="text" name="username" placeholder="Username..." class="form-username form-control" id="username" required>
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="password" placeholder="Password..." class="form-password form-control" id="password" required>
			                        </div>
			                        <button type="submit" class="btn">Sign in!</button>
			                    </form>
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


<script>
$('document').ready(function(){
$('#reg').click(function(){
$.post('<?php echo base_url('login/register') ;?>',
{
	
},
function(data,status)
{
	$('#body').html(data);
	return true;

});
});	
});
</script>