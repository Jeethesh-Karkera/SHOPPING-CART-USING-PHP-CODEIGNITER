
<html >
    <head>
        <title>Codeigniter cart class</title>
		<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700' rel='stylesheet' type='text/css'>
          <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>CSS/style_cart.css">
		  <script type="text/javascript">
            // To conform clear all data in cart.
            function clear_cart() {
                var result = confirm('Are you sure want to clear all bookings?');

                if (result) {
                    window.location = "<?php echo base_url(); ?>cart/remove/all";
                } else {
                    return false; // cancel button
                }
            }
        </script>
		<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.0.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
		  <style>
         #primary_nav_wrap
{
	margin-top:0px
}

#primary_nav_wrap ul
{
  list-style:none;
	position:relative;
	float:right;
	margin:0;
	padding:0
}

#primary_nav_wrap ul a
{
	display:block;
	color:#333;
	text-decoration:none;
	font-weight:700;
	font-size:12px;
	line-height:32px;
	padding:0 15px;
	
}

#primary_nav_wrap ul li
{
	position:relative;
	z-index: 99999;
	float:left;
	margin:0;
	padding:0
}

#primary_nav_wrap ul li.current-menu-item
{
	background:#ddd
}

#primary_nav_wrap ul li:hover
{
	background:#f6f6f6
}

#primary_nav_wrap ul ul
{
	display:none;
	position:absolute;
	top:100%;
	left:0;
	background:#fff;
	padding:0
}

#primary_nav_wrap ul ul li
{
	float:none;
	width:200px
}

#primary_nav_wrap ul ul a
{
	line-height:120%;
	padding:10px 15px
}

#primary_nav_wrap ul ul ul
{
	top:0;
	left:100%
}

#primary_nav_wrap ul li:hover > ul
{
	display:block;
}

.nav_wrap_bar ul ul {
	
	display: none;
	
}

.nav_wrap_bar ul li:hover > ul {
		display: block;
		background: #000; 
		width:165px !important;
	}
	
.nav_wrap_bar ul {
	background: #08BBB7; 
	padding: 0 20px;
	list-style: none;
	position: relative;
	display: inline-table;
	width:940px !important;
	
}
.nav_wrap_bar ul:after {
		content: ""; clear: both; display: block;
	}
	
.nav_wrap_bar ul li {
	float: left;
	z-index: 99999;
}

.nav_wrap_bar ul li:hover {
		background:#0ACFCB;
		
	}
.nav_wrap_bar ul li:hover a {
			color: #fff;
		}
	
.nav_wrap_bar ul li a {
		display: block; padding: 25px 40px;
		color: #757575; text-decoration: none;
	}
	
.nav_wrap_bar ul ul {
	background: #5f6975; border-radius: 0px; padding: 0;
	position: absolute; top: 100%;
}
.nav_wrap_bar ul ul li {
		float: none; 
		
		border-bottom: 1px solid #575f6a;
		position: relative;
	}
.nav_wrap_bar ul ul li a {
			padding: 5px 4px;
			color: #000;
		}	
.nav_wrap_bar ul ul li a:hover {
				background: #000;
			}
.nav_wrap_bar ul ul ul {
	position: absolute; left: 100%; top:0;
}
.nav_wrap_bar li ul li {
	background: #0ACFCB;
}
	</style>	   
		  </head>
		  <div class="col-md-12">
		  <div class="col-md-2">
		  </div>
		  <div class="col-md-10">
		  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo base_url();?>cart">Home <span class="sr-only">(current)</span></a></li>
       
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Category<span class="caret"></span></a>
          <ul class="dropdown-menu">
           <?php foreach($category as $cat):?>
			<li><a href="<?php echo base_url();?>cart/category/<?php echo $cat->id; ?>" ><?php echo $cat->Name; ?></a></li>
		<?php endforeach; ?>
          </ul>
        </li>
		<li><a href="#">About Us</li>
      </ul>
      
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>
</div>
    <body id='body' >
	 <div id='content'>
                <div id='tag'>
                   <!-- Formget Fugo logo image -->
                    
                </div>
				 <div id="cart" >
            <div id = "heading">
			
<nav class="nav_wrap_bar">
	<ul>
		<li><a href="<?php echo base_url();?>cart">Home</a></li>
		<li><a href="#">Category</a>
		
		<ul>
		<?php foreach($category as $cat):?>
		
		<li><a href="<?php echo base_url();?>cart/category/<?php echo $cat->id; ?>" ><?php echo $cat->Name; ?></a></li>
		
		<?php endforeach; ?></ul>
		</li>
		
			
		</li>
		
	</ul>
</nav>
				<span class=" pull-right"><?php if($username1== "0") {  ?><nav id="primary_nav_wrap">
<ul>
  
  <li><a href="#">My Account</a>
    <ul>
      <li><a href="<?php echo base_url();?>index">Login</a></li>
      <li><a href="<?php echo base_url();?>register">Register</a></li>
      
      
	  </ul>
</nav><?php } else {  ?><nav id="primary_nav_wrap">
<ul>
  
  <li><a href="#"><?php echo $username1;?></a>
    <ul>
      <li><a href="<?php echo base_url();?>cart/profile">profile</a></li>
      <li><a href="<?php echo base_url();?>cart/logout">logout</a></li>
      
	  </ul>
</nav><?php } ?></span>
            </div>-->
			<div id="text"> 
            <?php  $cart_check = $this->cart->contents();
            
            // If cart is empty, this will show below message.
             if(empty($cart_check)) {
             echo 'To add products to your shopping cart click on "Add to Cart" Button'; 
             }  ?> </div>
			 <table id="table" border="0" cellpadding="5px" cellspacing="1px">
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
                            $path = "<img src='http://localhost/MLM/images/cart_cross.jpg' width='25px' height='20px'>";
                            echo anchor('cart/remove/' . $item['rowid'], $path); ?>
                            </td>
                     <?php endforeach; ?>
                    </tr>
                    <tr>
                        <td><b>Order Total: <?php 
                        
                        //Grand Total.
                        echo number_format($grand_total, 2); ?></b></td>
                        
                        <?php // "clear cart" button call javascript confirmation message ?>
                        <td colspan="6" align="right"><input type="button" class ='fg-button teal' value="Clear Cart" onclick="clear_cart()">
                            
                            <?php //submit button. ?>
                            <input type="submit" class ='fg-button teal' value="Update Cart">
                            <?php echo form_close(); ?>
                            
                            <!-- "Place order button" on click send "billing" controller  -->
                            <input type="button" class ='fg-button teal' value="Check out" onclick="window.location = '<?php echo base_url('cart/check_out');?>'"></td>
                    </tr>
					<?php  endif; ?>
            </table>
			</div>
	   <div id="products_e" align="center">

            <h2 id="head" style="margin-top:0px;" align="center">Products</h2>
            <?php
            
            // "$products" send from "shopping" controller,its stores all product which available in database. 
            foreach ($products as $product) {
                $id = $product['pid'];
                $name = $product['pname'];
                $description = $product['misc'];
                $price = $product['selling_price'];
                $pv = $product['pv'];
                $code = $product['code'];
				
                ?>

                <div id='product_div'>  
                    <div id='image_div'>
                        <img id="<?php echo $id;?>" class="media-object p_desc" height="150" width="160" src="<?php echo base_url() . $product['image'] ?>"/>
                    </div>
                    <div id='info_product'>
                        <div id='name'><?php echo $name; ?></div>
                        <div id='desc'>  <?php echo $description; ?></div>
						<div id='pv'>  PV:<?php echo $pv; ?></div>
						<div id='code'>  Code:<?php echo $code; ?></div>
                        <div id='rs'><b>Price</b>:<big style="color:green">
                        <?php echo "Rs:".$price; ?></big></div>
							
                        <?php
                        
                        // Create form and send values in 'shopping/add' function.
                        echo form_open('cart/add');
                        echo form_hidden('id', $id);
                        echo form_hidden('name', $name);
                        echo form_hidden('price', $price);
                        echo form_hidden('code', $code);
                        ?> </div> 
                    <div id='add_button'>
                        <?php
                        $btn = array(
                            'class' => 'fg-button teal',
                            'value' => 'Add to Cart',
                            'name' => 'action'
                        );
                        
                        // Submit Button.
                        echo form_submit($btn);
                        echo form_close();
                        ?>
                    </div>
                </div>

<?php } ?>

        </div>
        </div>
      
    </body>
</html>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.0.min.js"></script>
<script>
$('.p_desc').click(function(){
	var code = $(this).attr('id');
	$.post('<?php echo base_url();?>cart/product_view',
	{
			id:code
	},	
	function(data,status)
{
	$('#body').html(data);
	return true;

});
});
</script>