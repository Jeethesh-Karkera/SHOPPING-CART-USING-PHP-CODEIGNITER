<html>
    <head>
        <title>Codeigniter cart class</title>
        <link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700' rel='stylesheet' type='text/css'>
          <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>CSS/style_cart.css">
		   <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
			<link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap-theme.min.css">
		<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.0.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

 
  <script>
  $(document).ready(function() {
	  var id ='<?php echo $id; ?>';
	  var add_id = '<?php echo $add;?>';
	
	  if(add_id == 1)
	  {
		  
		$('#collapseOne').hide();
		//$('#guest1').hide();
		//$('#user').hide();
		$('#collapseTwo').hide();
		$('#collapseThree').addClass('in');
	  }
	  else
	  {
	if(id){
		$('#collapseOne').removeClass('in');
		$('#collapseOne').hide();
		$('#guest1').hide();
		$('#collapseThree').hide();
		$('#collapseTwo').addClass('in');
		
		
	}
	else
	{
		$('#collapseOne').addClass('in');
		$('#collapseTwo').hide();
		$('#collapseThree').hide();
	}
	  }
  });
  </script>
		  </head>
    <body>
	 <div id='content'>
                <div id='tag'>
                   <!-- Formget Fugo logo image -->
                    
                </div>
				 <div id="cart" >
            <div id = "heading">
                <h2 align="center">SHOPPING CART</h2>
				
            </div>
			<div id="text"> 
            <?php  $cart_check = $this->cart->contents();
            
            // If cart is empty, this will show below message.
             if(empty($cart_check)) {
             echo 'To add products to your shopping cart click on "Add to Cart" Button'; 
             }  ?> </div>
			 <table id="table" class="table table-bordered">
                  <?php
                  // All values of cart store in "$cart". 
                  if ($cart = $this->cart->contents()): ?>
                    <tr id= "main_heading">
                        <td>Serial</td>
                        <td>Name</td>
                        <td>Price</td>
                        <td>Code</td>
                        <td>Qty</td>
                        <td>Amount</td>
                        <td>Cancel Product</td>
                    </tr>
					 <?php
                     // Create form and send all values in "shopping/update_cart" function.
                    echo form_open('cart/update_cart');
                    $grand_total = 0;
                    $i = 1;

                    foreach ($cart as $item):
                        //   echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                        //  Will produce the following output.
                        // <input type="hidden" name="cart[1][id]" value="1" />
                        
                        echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                        echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                        echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                        echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
						echo form_hidden('cart[' . $item['id'] . '][code]', $item['code']);
                        echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
                        ?>
                        <tr>
                            <td>
                       <?php echo $i++; ?>
                            </td>
                            <td>
                      <?php echo $item['name']; ?>
                            </td>
                            <td>
                                 <?php echo number_format($item['price'], 2); ?>
                            </td>
							<td>
                      <?php echo $item['code']; ?>
                            </td>
                            <td>
                            <?php echo form_input('cart[' . $item['id'] . '][qty]', $item['qty'], 'maxlength="3" size="1" style="text-align: right"'); ?>
                            </td>
                        <?php $grand_total = $grand_total + $item['subtotal']; ?>
                            <td>
                                 <?php echo number_format($item['subtotal'], 2) ?>
                            </td>
                            <td>
                              
                            <?php 
                            // cancle image.
                            $path = "<img src='http://localhost/simplecart/images/cart_cross.jpg' width='25px' height='20px'>";
                            echo anchor('cart/remove/' . $item['rowid'], $path); ?>
                            </td>
                     <?php endforeach; ?>
                    </tr>
                    <tr>
                        <td><b>Order Total: <?php 
                        
                        //Grand Total.
                        echo number_format($grand_total, 2); ?></b></td>
                        
                        <?php // "clear cart" button call javascript confirmation message ?>
                        <td colspan="5" align="right"></td>
                    </tr>
<?php endif; ?>
            </table>
			<div id = "heading">
                <h2 align="center">SHIPPING DETAILS</h2>
				
            </div>
			</div>
			</div>
<div class="bs-example" id="content">
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">CHECKOUT OPTIONS</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in ">
                <div class="panel-body">
                    <div class="row-fluid">
											<div class="col-md-6">
												<h4>New Customer</h4>
												<p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
												<form action="#" method="post">
													<fieldset>
														<label class="radio" for="register">
															<input type="radio" name="account" id="guest" value="2" checked="checked">Register Account
														</label>
														<label class="radio" for="guest">
															<input type="radio" name="account"  id="guest" value="3">Guest Checkout
														</label>
														<br>
														<button class="btn btn-info guest" data-toggle="collapse" data-parent="#collapse2">Continue</button>
													</fieldset>
												</form>
											 </div>
											 <div class="col-md-6">
												<h4>Returning Customer</h4>
												<p>I am a returning customer</p>
												<?php echo validation_errors(); ?>
												<?php echo form_open('verifylogin1'); ?>
												<?php echo validation_errors(); ?>
													<fieldset>
														<div class="control-group">
															<label class="control-label">Username</label>
															<div class="controls">
																<input type="text" placeholder="Enter your username" id="username"  name="username" class="input-xlarge">
															</div>
														</div>
														<div class="control-group">
															<label class="control-label">Password</label>
															<div class="controls">
															<input type="password" placeholder="Enter your password" id="password" name="password" class="input-xlarge">
															</div>
														</div>
														<button class="btn btn-info">Continue</button>
													</fieldset>
												</form>
											</div>
  </div>
                </div>
            </div>
        </div>
		<div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">ACCOUNT AND BILLING DETAILS</a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
				
				<?php if($id) { ?>
				<?php if($add == 0) { ?>
				<div id="user" class="row-fluid">
				<form id="register-form" action="<?php echo base_url(); ?>cart/register" method="post">
				<div class="col-md-6">
												<h4>Your Personal Details</h4>
												
												<div class="control-group">
													<label class="control-label"><span class="required">*</span> Name</label>
													<div class="controls">
														<input type="text" id="fname" name="fname" placeholder="" class="input-xlarge" value="<?php echo $name;?>"/>
													</div>
												</div>
																	  
												<div class="control-group">
													<label class="control-label"><span class="required">*</span> Email Address</label>
													<div class="controls">
														<input type="text" id="email" name="email" placeholder="" class="input-xlarge" value="<?php echo $email;?>"/>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label"><span class="required">*</span> Mobile No.</label>
													<div class="controls">
														<input type="text" id="mob" name="mob" placeholder="" class="input-xlarge" value="<?php echo $mobile;?>"/>
													</div>
												</div>
												
											</div>
											<div class="col-md-6">
												<h4>Your Address</h4>																  
												<div class="control-group">
													<label class="control-label"><span class="required">*</span> Address :</label>
													<div class="controls">
														<input type="text" id="address"  name="address" placeholder="" class="input-xlarge" value="<?php echo $address;?>"/>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label"><span class="required">*</span> City:</label>
													<div class="controls">
														<input type="text" id="city" name="city" placeholder="" class="input-xlarge" value="<?php echo $city;?>"/>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label"><span class="required">*</span> State:</label>
													<div class="controls">
														<input type="text" id="state" name="state" placeholder="" class="input-xlarge" value="<?php echo $state;?>"/>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label"><span class="required">*</span> Post Code:</label>
													<div class="controls">
														<input type="text" id="pin" name="pin" placeholder="" class="input-xlarge" value="<?php echo $pin;?>"/>
													</div>
												</div>
												
												<button class="btn btn-info">Continue</button>
												</div>
							</form>
												</div>
				<?php } ?>
				<?php } ?>
                   <div id="guest1" class="row-fluid">
				   <form id="register-form" action="<?php echo base_url(); ?>cart/register1" method="post">
				   <div class="col-md-6">
												<h4>Your Personal Details</h4>
												<div class="control-group">
													<label class="control-label"><span class="required">*</span> First Name</label>
													<div class="controls">
														<input type="text" id="fname" name="fname" placeholder="" class="input-xlarge" >
													</div>
												</div>
																	  
												<div class="control-group">
													<label class="control-label"><span class="required">*</span> Email Address</label>
													<div class="controls">
														<input type="text" id="email" name="email" placeholder="" class="input-xlarge" >
													</div>
												</div>
												<div class="control-group">
													<label class="control-label"><span class="required">*</span> Mobile No.</label>
													<div class="controls">
														<input type="text" id="mob" name="mob" placeholder="" class="input-xlarge">
													</div>
												</div>
												
											</div>
											<div class="col-md-6">
												<h4>Your Address</h4>																  
												<div class="control-group">
													<label class="control-label"><span class="required">*</span> Address :</label>
													<div class="controls">
														<input type="text" id="address"  name="address" placeholder="" class="input-xlarge" >
													</div>
												</div>
												<div class="control-group">
													<label class="control-label"><span class="required">*</span> City:</label>
													<div class="controls">
														<input type="text" id="city" name="city" placeholder="" class="input-xlarge" >
													</div>
												</div>
												<div class="control-group">
													<label class="control-label">State</label>
													<div class="controls">
														<input type="text" id="state" name="state" placeholder="" class="input-xlarge" >
													</div>
												</div>
												<div class="control-group">
													<label class="control-label"><span class="required">*</span> Post Code:</label>
													<div class="controls">
														<input type="text" id="pin" name="pin" placeholder="" class="input-xlarge" >
													</div>
												</div>
												
												<button class="btn btn-info">Continue</button>
												</div>
												</form>
												</div>
				
				</div>
				</div>				   
                </div>
		<div class="panel panel-default">
			<div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">ORDER CONFIRM.?</a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse in ">
                <div class="panel-body">
				<?php if($add == 1) { ?>
                    <div class="row-fluid">
							<h4>Shipping Address</h4>	
							
							<div><?php echo $name1;?></div>
							<div><?php echo $email1;?></div>
							<div><?php echo $mob1;?></div>
							<div><?php echo $address1.",";?></div>
							<div><?php echo $city1.",".$state1;?></div>
							<div><span style="display:none"><input type ="text" id="gid" value="<?php echo $gid;?>"/></span></div>
							<div><?php echo $pin1;?></div>
							<div><span style="display:none"><input type ="text" id="tot" value="<?php echo $grand_total;?>"/></span><?php echo "Grand Total : ".$grand_total;?></div>
							<div class="col-md-6"><input type ="button" class ="btn btn-info" id="place_order" value="Place_Order"/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type ="button" class ="btn btn-info" id="cancel" value="Cancel"/></div>
							
					</div>
				<?php } ?>
                </div>
            </div>
        </div>
      </div>
     </div>
		
		
			
		

 </body>
</html>

<script>
$('.guest').click(function(){
	var id =$("input[name=account]:checked").val();
	if(id == 2)
	{
		//window.location.href = '<?php echo base_url('login/register');?>';
		$.post('<?php echo base_url('login/register') ;?>',
{
	
},
function(data,status)
{
	window.location.href = '<?php echo base_url('login/register');?>';
	return true;

});
	}
	else
	{
		
		$('#collapseOne').hide();
		$('#collapseTwo').show();
		$('#guest1').show();
		
		
		
	}
});
</script>
<script>
$('#place_order').click(function(){ 
	$.post('<?php echo base_url('cart/save_order');?>',
	{
		gid:$('#gid').val(),
		tot:$('#tot').val()
},
function(data,status)
{
	if(data == 0)
	{
		
		window.location.href = '<?php echo base_url('cart/cust');?>';
	}
	else
	{
		window.location.href = '<?php echo base_url('cart');?>';
	}
});
});
</script>

<script>
$(document).ready(function(){
$('#cancel').click(function(){ 
var gid = '<?php echo $gid; ?>';
	var result = confirm('Are you sure want to cancel all orders?');
	if (result) {
                   if(gid == 0)
	{
		
		window.location.href = '<?php echo base_url('cart/cust');?>';
	}
	else
	{
		window.location.href = '<?php echo base_url('cart');?>';
	}
                } else {
                    return false; // cancel button
                }
	
});
});
</script>

