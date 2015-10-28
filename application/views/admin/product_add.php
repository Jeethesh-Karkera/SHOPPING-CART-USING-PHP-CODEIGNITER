  <!-- Page Content -->
<div id="page-content-wrapper">

     <div class="container-fluid">
	 
        <div class="row">
		
            <div class="col-lg-12">
			
                <ol class="breadcrumb">
						 <li><a href="#" style="color:#000;text-decoration:none;">Products</a></li>
						  <li><a href="#" style="color:#000;text-decoration:none;">Add</a></li>
 				</ol>
				<?php $attributes = array( 'id' => 'myform');?>

				<?php echo form_open_multipart($action,$attributes);?>
					<div class="row">
						 <div class="col-md-6">
							 <label>Title</label>
							<input type="text" class="form-control" name="pname" value="<?php echo $pname;?>" required/>
						</div>
						<div class="col-md-6">
							 <label>Code</label>
							<input type="text" class="form-control" name="isbno" value="<?php echo $code;?>" required/>
						</div>
						
					</div>
					<div class="row">
						<div class="col-md-6">
							 <label>Category</label>
							 						
							   <select class="form-control col-xs-6" id="cat_id" name="cat_id" onChange="get_sub();">
					 <option></option>
               			 <?php foreach($cat as $ct) : ?><?php if($ct->deleted =='no')
               			 {?>
					 
               			 <option class="form-control col-xs-6" value="<?php echo $ct->id;?>"<?php  if($type=='update'){if($cat_id1==$ct->id)
               				 {echo "selected='selected'";}}?> ><?php echo $ct->Name;?></option>
                
               				 <?php
                				}  endforeach; ?>
                			</select>
							<div id="sub"></div>
						</div>
						
						<div class="col-md-6">
							<label>Packs</label>
							
							   <select class="form-control col-xs-6"  id="pac_id" name="pac_id">
					 
               			 <?php foreach($pack as $pk) : ?><?php if($pk->deleted =='no')
               			 {?>
               			 <option class="form-control col-xs-6" value="<?php echo $pk->pack_id;?>"<?php  if($type=='update'){if($pak_id1==$pk->pack_id)
               				 {echo "selected='selected'";}}?> ><?php echo $pk->pack_name;?></option>
                
               				 <?php
                				}  endforeach; ?>
                			</select>
						</div>
					    
					</div>
					<div class="row">
						<div class="col-md-6">
							 <label>Pv Points</label>
							<input type="text" class="form-control" name="pv" id="pv" value="<?php echo $pv;?>" required/>
						</div>
						<div class="col-md-6">
							 <label>Misc</label>
							<input type="text" class="form-control" name="misc" id="misc" value="<?php echo $misc;?>" required/>
						</div>
						</div>
					<div class="row">	
					<div class="col-md-6">
							 <label>Description</label>
						
						 <textarea class="form-control" id="desc" name="desc" rows="5" cols="40" required> <?php echo $pdesc;?></textarea>
							
						</div>
						<div class="col-md-6">
							 <label>No.of available product</label>
							<input type="text" class="form-control" name="stock" id="stock" value="<?php echo $stock;?>" required/>
						</div>
						</div>
						
					<div class="row">
						<div class="col-md-6">
							 <label>Selling Price</label>
							
							<input type="text" class="form-control" name="sell" id="sell" value="<?php echo $selling_price;?>" required/>
						</div>
					<div class="col-md-6">
							 <label>Received Price</label>
							 
							<input type="text" class="form-control" name="rcv" id="rcv" value="<?php echo $received_price;?>" required/>
					
						
					</div>
					<div class="row">
						
						<div class="col-md-6">
							 <label>Product Image</label>

							<br />
							<?php if($image !='') { ?>
							<img class="media-object" height="80" width="100" src="<?php echo base_url(); ?>/<?php echo $image;?>" alt="no image">

							<input type="checkbox" class="chk" name="chk" value="1">Change
							<?php } ?>
							<input type="file"  name="userfile" value="<?php echo base_url(); ?>images/<?php echo $image;?>" />

							<?php if($error !='') {?>
							<span style="color:red;"><?php echo $error;?></span>
							<?php }?>
						</div>
						

					</div>
					
					
					 <div class="row">
					 <div class="col-md-12">
					 &nbsp;<br/>
				    <input class="btn btn-primary pull-right " type="submit" value="Add" />
					</div>
					</div>

				</form>
				
		     </div>
				
        </div>
    </div>
       
</div> <!-- /#page-content-wrapper -->
<script>

 $('.btnadd').click(function(event){
     event.preventDefault();
//$('#branchadd').load($(this).attr('href'));
     $('#body').load($(this).attr('href')); 
 });
</script>

  <script>

function get_sub(){
$.post('<?php echo site_url('product/get_sub'); ?>', //action of the form 
    {
	  
	    cat_id:$('#cat_id').val()

	}, 
	function(data,status){
	$('#sub').html(data);
	
    return true;
	});

}
</script>
 