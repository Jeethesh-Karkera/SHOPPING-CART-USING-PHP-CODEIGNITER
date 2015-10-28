<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dash Board</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/css/simple-sidebar.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/admin.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	 <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.0.min.js"></script>
	 <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
	   
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
     <link href="<?php echo base_url(); ?>assets/css/datepicker.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a  href="<?php echo base_url(); ?>cart/profile">
                       <i class="fa fa-home fa-2x"></i>
                    </a>
                </li>
			
				<li><a class='update' href="<?php echo base_url(); ?>refered"><i class="fa fa-folder-open"></i> Refered_Customers</a></li>	<li><a class='update' href="<?php echo base_url(); ?>payout"><i class="fa fa-folder-open"></i> Payout </a></li>		
				<li><a class='update' href="<?php echo base_url(); ?>payout/index1"><i class="fa fa-folder-open"></i> Pv </a></li>		
			</ul>
        </div>
        <!-- /#sidebar-wrapper -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      
      <a href="#menu-toggle"  id="menu-toggle" class="navbar-brand" ><i id="tog" class="glyphicon glyphicon-hand-left"></i></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
        <ul class="nav navbar-nav navbar-right">
       <li><a target="_blank"href="<?php echo base_url(); ?>cart">See Web Page</a></li>
       
		 <li class="dropdown">
          <a href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $username; ?><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
		  <li>
			<a  href="#" id="setting" ><i class="fa fa-gear fa-2x"></i>SETTING
			</a> 
            </li>
            <li>
			<a  href="#" id="logout" ><i class="fa fa-sign-out fa-2x"></i>LOGOUT
			</a> 
            </li>
         
          </ul>
        </li>
      </ul>
     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
				<div style="padding-top:60px;">
                    <div id="body" class="col-lg-12" >
                     
                    </div>
                </div></div>
            </div>
        </div>
<script>
$(function()
{
	$('.update').click(function(event)
	{
		event.preventDefault();
		$('.update').removeClass("active");
		$(this).addClass("active");
        $('#body').load($(this).attr('href')); 
	});
  
});

</script> 

  <script>
   /* $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });*/
	$('#menu-toggle').click(function(event){
          toggleNav();
            });
			function toggleNav() {
    if ($('#wrapper').hasClass('toggled')) {
        // Do things on Nav Close
        $('#wrapper').removeClass('toggled');
		$('#tog').addClass('glyphicon-hand-left');
		$('#tog').removeClass('glyphicon-hand-right');
		
    } else {
        // Do things on Nav Open
        $('#wrapper').addClass('toggled');
		$('#tog').addClass('glyphicon-hand-right');
		$('#tog').removeClass(' glyphicon-hand-left');
    }

    //$('#site-wrapper').toggleClass('show-nav');
}
    </script>

	<script>
	$(document).ready(function(){
	$('#logout').click(function(){
	$.post('<?php echo base_url();?>index/logout',
	{
		
	},
	function(data,status)
{
	window.location.href='<?php echo base_url();?>index';

});
	
	});
	});
	</script>
	
	<script>
	$(document).ready(function(){
	$('#setting').click(function(){
	$.post('<?php echo base_url();?>index/setting',
	{
		
	},
	function(data,status)
{
	$('#body').html(data);

});
	
	});
	});
	</script>
