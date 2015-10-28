<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LOGIN</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/form-elements.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        

    </head>
	<body>
<div id="top-bar" class="container">
			<div class="row">
				
				<div class="span8">
					<div class="account pull-right">
						<ul class="user-menu">				
							<li class="dropdown">
								<a href="#" id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									   My Account
								</a>
								 
									  <ul class="dropdown-menu my-acc" role="menu" aria-labelledby="dLabel">
									  <?php if($username) {?>
										<li>
										 <a class="uname" href="#"><?php echo $username;?></a>
										</li>
										
										
										<li><a href="<?php echo base_url(); ?>orders">Orders / User Account</a></li>
										<li><a href="<?php echo base_url(); ?>home/logout">Logout</a></li>
										<?php } else{ ?>
								         <li><a href="<?php echo base_url(); ?>user">Login / Register</a></li>
							            <?php }  ?>
									  </ul>
							      
							</li>
					
							
														
													
							
						</ul>
					</div>
				</div>
			</div>
		</div>
		</body>