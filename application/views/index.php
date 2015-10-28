  <style> 
 
.defbtn{
width:50px;
height:100px;
padding:10%;
}


i{
	color:blue
	}
	
.menuicon li{
list-style:none;
display:inline;
}
.btn-lg {
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.33;
  border-radius: 6px;
}

span.glyphicon-tower,span.glyphicon-icon-group,span.glyphicon-list,span.glyphicon-euro,span.glyphicon-envelope,span.glyphicon-align-left,span.glyphicon-building,span.glyphicon-git_branch,span.glyphicon-ok,span.glyphicon-stats,span.glyphicon-briefcase,span.glyphicon-user,span.glyphicon-user_add,span.glyphicon-search,span.glyphicon-group,span.glyphicon-git_branch,span.glyphicon-tower,span.glyphicon-check,span.glyphicon-signal,span.glyphicon-cog,span.glyphicon-usd,span.glyphicon-th-list,span.glyphicon-home ,span.glyphicon-inbox,span.glyphicon-list-alt,span.glyphicon-th{
    font-size: 6em;
}

.glyphicon-building:before{content:'\e139';}
sidebar-nav {
    padding: 9px 0;
}

.dropdown-menu .sub-menu {
    left: 100%;
    position: absolute;
    top: 0;
    visibility: hidden;
    margin-top: -1px;
}

.dropdown-menu li:hover .sub-menu {
    visibility: visible;
}

.dropdown:hover .dropdown-menu {
    display: block;
}

.nav-tabs .dropdown-menu, .nav-pills .dropdown-menu, .navbar .dropdown-menu {
    margin-top: 0;
}

.navbar .sub-menu:before {
    border-bottom: 7px solid transparent;
    border-left: none;
    border-right: 7px solid rgba(0, 0, 0, 0.2);
    border-top: 7px solid transparent;
    left: -7px;
    top: 10px;
}
.navbar .sub-menu:after {
    border-top: 6px solid transparent;
    border-left: none;
    border-right: 6px solid #fff;
    border-bottom: 6px solid transparent;
    left: 10px;
    top: 11px;
    left: -6px;
}
.btn-darkest {
  color: #4AAF51;
  background-color: #4AAF51;
  border-color: #4AAF51;
}
.btn-darkest:hover,
.btn-darkest:focus,
.btn-darkest:active,
.btn-darkest.active,
.open .dropdown-toggle.btn-darkest {
  color: #000000;
  background-color: #bbbbbb;
  border-color: #ffffff;
}
.btn-darkest:active,
.btn-darkest.active,
.open .dropdown-toggle.btn-darkest {
  background-image: none;
}
.btn-darkest.disabled,
.btn-darkest[disabled],
fieldset[disabled] .btn-darkest,
.btn-darkest.disabled:hover,
.btn-darkest[disabled]:hover,
fieldset[disabled] .btn-darkest:hover,
.btn-darkest.disabled:focus,
.btn-darkest[disabled]:focus,
fieldset[disabled] .btn-darkest:focus,
.btn-darkest.disabled:active,
.btn-darkest[disabled]:active,
fieldset[disabled] .btn-darkest:active,
.btn-darkest.disabled.active,
.btn-darkest[disabled].active,
fieldset[disabled] .btn-darkest.active {
  background-color: #777777;
  border-color: #777777;
}

</style>
 <body>

<header class="navbar navbar-inverse navbar-fixed-top">

<a href="#menu-toggle" class="btn btn-darkest pull-left" data-target=".sidebar" data-toggle="collapse" id="menu-toggle"><i id="tog" class="glyphicon glyphicon-hand-left"></i></a>
    <div class="container">
        <div class="navbar-header">
              <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
          
        </div>
        <nav class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a  href="<?php echo site_url(); ?>index">Home</a></li>
		            </ul>
          
            
           <ul class="nav navbar-nav  navbar-right">
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo site_url(); ?>"><?php echo ucfirst($username); ?><b class="caret"></b></a>
				<ul class="dropdown-menu">
                       <?php foreach ($modules['module_name'] as $module):?> 
                     
				<?php if($module=='settings' || $module=='logout'){?> 
                       <li><a <?php if($module=='settings') echo' class="update"'; ?> href='<?php echo site_url().'home/'.$module.'/'.$id; ?>'><?php echo ucfirst($module);?></a></li>
					
						<?php }?>  <?php endforeach; ?>
						</ul>
				</li>
            </ul> 
        </nav>
    </div>
</header>
  <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper" >
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="#menu-toggle" class="btn btn-primary " id="menu-toggle1">Toggle Menu</a>
                   <?php //foreach ($test1_data as $key => $items): ?>
                    
            </li>
            
               <ul class="nav">
                   
					  <?php foreach ($modules['module_name']  as $module):?>
                      
					   <?php if($module=='settings' || $module=='logout'|| $module=='login'|| $string1 ==true|| $string ==true||$modules['module_p'][$module]['view']!='1'){?> 
                        <?php }else{?>
						<li><a class='update' href='<?php echo site_url().$module; ?>'><?php echo ucfirst($module);?></a></li>
	
		 <?php }endforeach; ?>
                
            </ul>
			
			
			
			</ul>
        </div>
		
        <!-- /#sidebar-wrapper -->

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
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

   

    <!-- Menu Toggle Script -->
	
<script>
$('#body').load('<?php echo base_url(); ?>index');
</script>
 <script>
   $(function(){

                $('.update').click(function(event){
                event.preventDefault();
                //  getLocationHash ();
				$(".menuicon").hide();
                 $('.update').removeClass("active");
                 $(this).addClass("active");
                  // alert($(this).attr('href'));
                    $('#body').load($(this).attr('href')); 
                });
  
});
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
</body>

</html>
