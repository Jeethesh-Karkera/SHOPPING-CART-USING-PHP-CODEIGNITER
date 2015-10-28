
<html >
    <head>
        <title>Codeigniter cart class</title>
		<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
		
        <!--<link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700' rel='stylesheet' type='text/css'>-->
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
		<script src="<?php echo base_url(); ?>assets/js/jquery.jscroll.min.js"></script>
		
		  <style>
.navbar-nav > li > a {padding-top:10px !important; padding-bottom:10px !important;}
.navbar {min-height:30px !important}
.navbar-default .navbar-nav > li > a {
    color: #fff;
}
.dropdown-menu > li > a:hover {
    background-color: #61ed00 !important;
	color:#fff;
}
.dropdown-menu > li > a {
    border-bottom: 1px solid #000 !important;
	background:#ADD673 !important;
}
.dropdown-menu
{
	padding:0px !important;
}
body {
    background: transparent url("./images/bg.jpg") repeat scroll 0% 0% !important;
   
}
.dropdown-submenu {
    position: relative;
}

.dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -6px;
    margin-left: -1px;
    -webkit-border-radius: 0 6px 6px 6px;
    -moz-border-radius: 0 6px 6px;
    border-radius: 0 6px 6px 6px;
}

.dropdown-submenu:hover>.dropdown-menu {
    display: block;
}

.dropdown-submenu>a:after {
    display: block;
    content: " ";
    float: right;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 0 5px 5px;
    border-left-color: #ccc;
    margin-top: 5px;
    margin-right: -10px;
}

.dropdown-submenu:hover>a:after {
    border-left-color: #fff;
}

.dropdown-submenu.pull-left {
    float: none;
}

.dropdown-submenu.pull-left>.dropdown-menu {
    left: -100%;
    margin-left: 10px;
    -webkit-border-radius: 6px 0 6px 6px;
    -moz-border-radius: 6px 0 6px 6px;
    border-radius: 6px 0 6px 6px;
}

	</style>	   
		  </head>
		  <body id='body' >
		  <div class="col-md-12">
<div class="col-md-1">
</div>
<div class="col-md-10">
		  
		  
		  <nav class="navbar navbar-default" style="background:green;">
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
        <li><a href="<?php echo base_url();?>cart"><img style="max-height:50px; width:150px;" src="<?php echo base_url();?>images/logo.png" alt="..."></a></li>
      </ul>
      
       <ul class="nav navbar-nav navbar-right">
        <li ><a href="<?php echo base_url();?>cart">Home <span class="sr-only">(current)</span></a></li>
       
        
		     <li class="dropdown">
            <a id="dLabel" role="button" data-toggle="dropdown"  data-target="#" href="#">
                Category <span class="caret"></span>
            </a>
    		<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
			<?php foreach($category as $cat):?>
             
             
              <li class="dropdown-submenu">
                <a tabindex="-1" href="<?php echo base_url();?>cart/category/<?php echo $cat->id; ?>"  ><?php echo $cat->Name; ?></a>
                <ul class="dropdown-menu">
				<?php foreach($sub_cat as $sub) : if($cat->id == $sub->cat_id) {?>
                  <li><a href="<?php echo base_url();?>cart/sub_category/<?php echo $sub->id; ?>" ><?php echo $sub->sub_cat; ?></a></li>
				  <?php } endforeach; ?>
                  
                </ul>
              </li>
			  <?php endforeach; ?>
            </ul>
        </li>
		<li><a href="<?php echo base_url();?>cart/about_us">About Us</a></li>
        
		<?php if($username1== "0") {  ?>
		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url();?>index">Login</a></li>
			<li><a href="<?php echo base_url();?>register">Register</a></li>
          </ul>
		  </li>
		  <?php } else {  ?>
		  <li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $username1;?><span class="caret"></span></a>
          <ul class="dropdown-menu">
           <li><a href="<?php echo base_url();?>cart/profile">profile</a></li>
      <li><a href="<?php echo base_url();?>cart/logout">logout</a></li>
          </ul>
		  </li>
		  <?php } ?>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->



<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="height:300px">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active" align="center">
      <img style="max-height:300px; width:100%;" src="<?php echo base_url();?>images/Chrysanthemum.jpg" alt="...">
      <div class="carousel-caption">
        
      </div>
    </div>
    <div class="item" align="center">
      <img style="max-height:300px; width:100%;" src="<?php echo base_url();?>images/Jellyfish.jpg" alt="...">
      <div class="carousel-caption">
       
      </div>
    </div>
	<div class="item" align="center">
      <img style="max-height:300px; width:100%;" src="<?php echo base_url();?>images/Koala.jpg" alt="...">
      <div class="carousel-caption">
       
      </div>
    </div>
   
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</nav>
</div>
</div>
<div class="col-md-12">
<div class="col-md-1">
</div>
<div class="col-md-10">
<div align="center"> 
            <?php  $cart_check = $this->cart->contents();
            
            // If cart is empty, this will show below message.
             if(empty($cart_check)) {
             echo 'To add products to your shopping cart click on "Add to Cart" Button'; 
             }  ?> </div>
<table class="table table-bordered col-md-10">
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
			</div>
			<div class="col-md-12">
			<div class="col-md-1">
			</div>
			<div class="col-md-10 " height="300px">
			
			
            <h2  style="margin-top:0px;" align="center">Products</h2>
            <?php
            
            // "$products" send from "shopping" controller,its stores all product which available in database. 
            foreach ($products as $product) {
                $id = $product['pid'];
                $name = $product['pname'];
                $description = str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($product['misc']))));
                $price = $product['selling_price'];
                $pv = $product['pv'];
                $code = $product['code'];
				
                ?>
				
                <div class="col-md-3 col-sm-12" style="padding-left:0px;" >  
                    
                        <img id="<?php echo $id;?>" class="media-object p_desc" height="150" width="200" src="<?php echo base_url() . $product['image'] ?>"/></td>
						<div ><?php echo $name; ?></div>
                        <div > <?php echo preg_replace('/\s+?(\S+)?$/', '', substr($description, 0, 30));?></div>
                        <div > <?php echo truncate($description, 30);?></div>
						<div >  PV:<?php echo $pv; ?></div>
						<div>  Code:<?php echo $code; ?></div>
                        <div><b>Price</b>:<big style="color:green">
                        <?php echo "Rs:".$price; ?></big></div>
							
                        <?php
                        
                        // Create form and send values in 'shopping/add' function.
                        echo form_open('cart/add');
                        echo form_hidden('id', $id);
                        echo form_hidden('name', $name);
                        echo form_hidden('price', $price);
                        echo form_hidden('code', $code);
                        ?> 
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
                

<?php } ?>

       
        </div>
</div>

   <div class="col-md-12">
<div class="col-md-1">
</div>
<div class="col-md-10">
		  
		  
		  <nav class="navbar navbar-inverse " >
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
        <li><a href="<?php echo base_url();?>cart"><img style="max-height:50px; width:150px;" src="<?php echo base_url();?>images/logo.png" alt="..."></a></li>
      </ul>
<ul class="nav navbar-nav navbar-right">
        <li><img style="max-height:50px; width:50px;" src="<?php echo base_url();?>images/copy.png" alt="..."></li>
      </ul>
       
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->



</nav>
</div><!-- /.container-fluid -->
</div><!-- /.container-fluid -->
    </body>
</html>
<?php
function truncate($str, $width) {
    return strtok(wordwrap($str, $width, "...\n"), "\n");
}
?>
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
