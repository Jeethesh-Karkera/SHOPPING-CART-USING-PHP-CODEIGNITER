<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>jsTree test</title>
  <!-- 2 load the theme CSS file -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.min.css" />
</head>
<body>
  <!-- 3 setup a container element -->
  <?php echo "Your Reference Number: <b>".$username->ref_no."</b>"; ?>
  <div id="jstree">
    <!-- in this example the tree is populated from inline HTML -->
	
    <ul>
	<li><?php  echo $username->name; ?>
	<?php if($user_list) { ?>
	<ul>
	<?php foreach( $user_list['id'] as $i ) : ?>
	
	<?php $ref= $user_list[$i][$user_list[$i]['user']]['ref'];?>
      <li ><?php echo $user_list[$i]['user']; ?>
	  <ul>
	<?php foreach( $user_list[ $ref] as $j ) : ?>
	 <li ><?php echo $j; ?></li>
          <?php endforeach; ?>
        </ul>
      </li>
	<?php endforeach; ?>
	<?php } ?>
    </ul>
    </li>
    </ul>
  </div>
 

  <!-- 4 include the jQuery library 
  <script src="dist/libs/jquery.js"></script>-->
  <!-- 5 include the minified jstree source -->
  <script src="<?php echo base_url(); ?>assets/js/jstree.min.js"></script>
  <script>
    /*$(function () {
    // 6 create an instance when the DOM is ready
    $('#jstree').jstree();
    // 7 bind to events triggered on the tree
    $('#jstree').on("changed.jstree", function (e, data) {
      console.log(data.selected);
    });
    // 8 interact with the tree - either way is OK
  $('button').on('click', function () {
      $('#jstree').jstree(true).select_node('child_node_1');
      $('#jstree').jstree('select_node', 'child_node_1');
      $.jstree.reference('#jstree').select_node('child_node_1');
    });
  });*/
  $(function () {
  $("#jstree").jstree({
    "core" : {
      "check_callback" : true
    },
    "plugins" : [ "dnd" ]
  });
});
  /*$('#jstree').jstree({
  "core" : {
    "animation" : 0,
    "check_callback" : true,
    "themes" : { "stripes" : true },
    'data' : {
      'url' : function (node) {
        return node.id === '#' ?
          'ajax_demo_roots.json' : 'ajax_demo_children.json';
      },
      'data' : function (node) {
        return { 'id' : node.id };
		
      }
    }
  },
 
  "plugins" : [
    "contextmenu", "dnd", "search",
    "state", "types", "wholerow"
  ]
});*/
  </script>

  
</body>
</html>
