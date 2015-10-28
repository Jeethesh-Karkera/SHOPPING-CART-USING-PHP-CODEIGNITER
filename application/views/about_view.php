
<html >
    <head>
        <title>Codeigniter cart class</title>
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
			<div class="col-md-10 col-sm-10" height="300px">
			
			
            <h2  style="margin-top:0px;" align="center">About Us</h2>
            <h3 Style="font-family: inherit;
font-weight: bold;
color: #666;"><u>Founders Fundamental</u></h3> 

<h4 style="font-family: 'Open Sans','Helvetica Neue','Helvetica,Arial';
    font-size: 16px;" align="justify">Dear Distributors,<br/>

Welcome to the world of AKSHAYAGURU - a world of zest, innovation & social concern.</h4>

<p class='desc' align="justify">”AKSHAYAGURU” is the subsidary concern of AKSHAYA ENTERPRISES, which was started since from 2006 in Dakshina Kannada District Karnataka state. Which was involved in  marketing of Financial products, Health insurance produrcts of other Banks, Financial sectors and Insurance companies. AKSHAYAGURU was the one of the marketing portal the marketing the consumer durables, Ayurveda products, Electronics products and Financial productshe  etc.To support the companies to marketing their products to the public in easy way  with very low cost.Ever since its inception, Akshaya Guru has always believed in empowering individuals to decide their own destiny. We do this by providing them with the finest products and all the support that they need. All we ask for is initiative and the dedication to meet targets. This is an opportunity open to everyone, irrespective of caste, colour, sex or even academic qualification. 

We strongly believe that " While an enterprise is in its preliminary stage, it is the property of the owner; while the enterprise transforms into a multinational corporation, it should be the property of the society, the state and the people! " 

Our website represents our endeavour to place the Akshaya Guru’s  opportunity and our range of products on the web. The Internet is perhaps the greatest communication tool in the world today and we aim to leverage its interactivity as well as its reach to spread the Akshaya Guru philosophy. 

</p>
<p class='desc' align="justify">Together we move ahead......</p>


<p class='desc' align="justify">Best of Luck! </p>


 <h3 Style="font-family: inherit;
font-weight: bold;
color: #666;"><u>Our Mission</u></h3>  
<h4 style="font-family: 'Open Sans','Helvetica Neue','Helvetica,Arial';
    font-size: 16px;" align="justify">Our mission is to be India’s most respected and attractive company in our industry.</h4>
<p class='desc' align="justify">We strive to leverage our shared experience and knowledge throughout our national network, actively applying this excellence to where it has the greatest benefit – in the markets and communities in which we operate. 
        The company is formed with an objective to inspire ordinary people and to offer them a platform to explore their qualities and live their dreams. The company wishes to make remarkable contribution in strengthening India's economy from micro to macro by creating an opportunity to every Indian and supporting them on their path to success. 
        AKSHAYA GURU  aims to be the favored choice of every Indian family and to help them towards better Health,nutrition and wellness, Safety, Personal Care and quality Agri inputs to better the lives of all Indians. 
We regard our IBO’s and our suppliers within the company, as partners and endeavor to integrate them in our decision-making process – working collaboratively to develop innovative professional solutions.</p>

 <h3 Style="font-family: inherit;
font-weight: bold;
color: #666;"><u>Our Vision</u></h3>   
<h4 style="font-family: 'Open Sans','Helvetica Neue','Helvetica,Arial';
    font-size: 16px;" align="justify">Our vision is to provide foundations for society’s future.</h4>
<p class='desc' align="justify">We have evolved from an unknown entity into a leading group that can meet the challenges of an increasingly competitive marketplace in India. Our central strategies while enabling the local strengths to the benefit of all. We are trusted partners to the communities in which we live and work. 
      We provide enduring value and constancy through the opportunities we create, our active social involvement in each local community, and our stewardship of the environment and sustainable resources for future generations. 
      We provide foundations for people’s growth through our commitment to developing the full potential of our IBO’s. 
A good reputation is the foundation for any strong business. Our business is no exception and companies that want to grow by double - digits, like we do. Rules to maintain a successful business are really not that much different than the rules for living successful life. 
        Inspiring people to live better lives and make them successful entrepreneurs. Pamosa lives up to its core purpose, which is to help you live a life of economic independence on your own terms; to fill your life with WEALTH.</p>
      
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
