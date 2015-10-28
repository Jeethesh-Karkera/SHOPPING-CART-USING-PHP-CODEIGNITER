
<html >
    <head>
        <title>Codeigniter cart class</title>
       <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
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
		  
		  
		  <nav class="navbar navbar-default " style="background:green;">
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
		<li><a href="#">About Us</a></li>
        
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



</nav>
</div><!-- /.container-fluid -->
</div><!-- /.container-fluid -->
           
	   <div class="col-md-12">
			<div class="col-md-1">
			</div>
			<div class="col-md-10 " >
			<div class="btn-group btn-breadcrumb">
            <a href="<?php echo base_url();?>cart" class="btn btn-success"><i class="glyphicon glyphicon-home"></i></a>
            <a href="#" class="btn btn-success">product view</a>
            
        </div>
	<div>
            <!--<h2  style="margin-top:0px;" align="center"><?php echo $product->pname;?></h2>-->
            <?php
            
            // "$products" send from "shopping" controller,its stores all product which available in database. 
           $id = $product->pid;
                $name = $product->pname;
                $description = $product->description;
                $price = $product->selling_price;
                $pv = $product->pv;
                $code = $product->code;
?>
                <div class="col-md-6 " style="padding-left:0px;" >  
                    
                        <img id="<?php echo $id;?>" class="media-object p_desc" height="450" width="560" src="<?php echo base_url() . $product->image; ?>"/></td>
                    </div>
               <div class="col-md-2" >  
			   </div>
			   <div class="col-md-3 col-sm-10" style="padding-left:0px;" >  
			  <table class="table table-hover" style="padding-top:100px; !important">
                       
						<tr><td>  Product Name:<?php echo $product->pname; ?></td></tr>
						 <tr><td style="word-wrap:break-word">  <?php echo $description; ?></td></tr>
						<tr><td>  PV:<?php echo $pv; ?></td></tr>
						<tr><td>  Code:<?php echo $code; ?></td></tr>
                        <tr><td><b>Price</b>:<big style="color:green">
                        <?php echo "Rs:".$price; ?></big></td></tr>
							
                       <tr><td> <?php
                        
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
                        ?></td></tr>
                   
                </div>
                </div>

        </div>
</div>

       
      
    </body>
</html>

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

<script>
$('#addcart').click(function(){
	 var id = '<?php echo $product->pid;?>';
     var name = '<?php echo $product->pname;?>';
     var price = '<?php echo $product->selling_price;?>';
	 var code = '<?php echo $product->code;?>';
	 
	$.post('<?php echo base_url();?>cart/add',
	{
			id:id,
			name:name,
			price:price,
			code:code
	},	
	function(data,status)
{
	$('#body').html(data);
	return true;

});			
				
});
</script>