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

	 <script src="<?php echo base_url(); ?>assets/js/pace.min.js"></script>
	 <style>
	 .pace {
  -webkit-pointer-events: none;
  pointer-events: none;
  -webkit-user-select: none;
  -moz-user-select: none;
  user-select: none;
}

.pace-inactive {
  display: none;
}

.pace .pace-progress {
  background: #ff0000;
  position: fixed;
  z-index: 2000;
  top: 0;
  right: 100%;
  width: 100%;
  height: 4px;
}

.pace .pace-progress-inner {
  display: block;
  position: absolute;
  right: 0px;
  width: 100px;
  height: 100%;
  box-shadow: 0 0 10px #ff0000, 0 0 5px #ff0000;
  opacity: 1.0;
  -webkit-transform: rotate(3deg) translate(0px, -4px);
  -moz-transform: rotate(3deg) translate(0px, -4px);
  -ms-transform: rotate(3deg) translate(0px, -4px);
  -o-transform: rotate(3deg) translate(0px, -4px);
  transform: rotate(3deg) translate(0px, -4px);
}

.pace .pace-activity {
  display: block;
  position: fixed;
  z-index: 2000;
  top: 15px;
  right: 15px;
  width: 14px;
  height: 14px;
  border: solid 2px transparent;
  border-top-color: #ff0000;
  border-left-color: #ff0000;
  border-radius: 10px;
  -webkit-animation: pace-spinner 400ms linear infinite;
  -moz-animation: pace-spinner 400ms linear infinite;
  -ms-animation: pace-spinner 400ms linear infinite;
  -o-animation: pace-spinner 400ms linear infinite;
  animation: pace-spinner 400ms linear infinite;
}

@-webkit-keyframes pace-spinner {
  0% { -webkit-transform: rotate(0deg); transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); transform: rotate(360deg); }
}
@-moz-keyframes pace-spinner {
  0% { -moz-transform: rotate(0deg); transform: rotate(0deg); }
  100% { -moz-transform: rotate(360deg); transform: rotate(360deg); }
}
@-o-keyframes pace-spinner {
  0% { -o-transform: rotate(0deg); transform: rotate(0deg); }
  100% { -o-transform: rotate(360deg); transform: rotate(360deg); }
}
@-ms-keyframes pace-spinner {
  0% { -ms-transform: rotate(0deg); transform: rotate(0deg); }
  100% { -ms-transform: rotate(360deg); transform: rotate(360deg); }
}
@keyframes pace-spinner {
  0% { transform: rotate(0deg); transform: rotate(0deg); }
  100% { transform: rotate(360deg); transform: rotate(360deg); }
}
</style>
	 
</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a  href="<?php echo base_url(); ?>index">
                       <i class="fa fa-home fa-2x"></i>
                    </a>
                </li>
			
				<li><a class='update' href="<?php echo base_url(); ?>category"><i class="fa fa-book"></i> Category </a></li>
				<li><a class='update' href="<?php echo base_url(); ?>sub_category"><i class="fa fa-book"></i>Sub Category </a></li>
				<li><a class='update' href="<?php echo base_url(); ?>product"><i class="fa fa-book"></i>Product</a></li>
				<li><a class='update' href="<?php echo base_url(); ?>packs"><i class="fa fa-book"></i>Packs </a></li>		
				<li><a class='update' href="<?php echo base_url(); ?>users"><i class="fa fa-book"></i>Users </a></li>		
				<li><a class='update' href="<?php echo base_url(); ?>order"><i class="fa fa-book"></i>Orders </a></li>		
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
		<?php $tot_cnt = $tot_usr->un + $tot_ord->un + $tot_del->un ; ?>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge badge-notify"><?php echo $tot_cnt; ?></span><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
             <li><a class='update' href="<?php echo base_url(); ?>users"><span class="badge"><?php echo $tot_usr->un ;?> New</span> Users Registered</a></li>
             <li><a class='update' href="<?php echo base_url(); ?>order"><span class="badge"><?php echo $tot_ord->un ;?> New</span> Orders</a></li>
             <li><a class='update' href="<?php echo base_url(); ?>order"><span class="badge"><?php echo $tot_del->un ;?> Delivey</span>Pending</a></li>
          <li><a class='update' href="<?php echo base_url(); ?>users/changes"><span class="badge"><?php echo $tot_changes->un ;?> Changes</span>in profile</a></li>
          </ul>
		  
        </li>
		 <li class="dropdown">
          <a href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $username; ?><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
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
