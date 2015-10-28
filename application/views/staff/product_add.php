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
							 						
							   <select class="form-control col-xs-6" id="cat_id" name="cat_id">
					 
               			 <?php foreach($cat as $ct) : ?><?php if($ct->deleted =='no')
               			 {?>
               			 <option class="form-control col-xs-6" value="<?php echo $ct->id;?>"<?php  if($type=='update'){if($cat_id1==$ct->id)
               				 {echo "selected='selected'";}}?> ><?php echo $ct->Name;?></option>
                
               				 <?php
                				}  endforeach; ?>
                			</select>
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
							 <label>Description</label>
						
						 <textarea class="form-control" id="desc" name="desc" rows="5" cols="40" required> <?php echo $pdesc;?></textarea>
							
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
 
 <!-- Page Content -->
<!--<div id="page-content-wrapper">

     <div class="container-fluid">
	 
        <div class="row">
		
            <div class="col-lg-12">
			
                <ol class="breadcrumb">
						 <li><a href="#" style="color:#000;text-decoration:none;">Products</a></li>
						  <li><a href="#" style="color:#000;text-decoration:none;">Add</a></li>
 				</ol>
				
					<div class="table-responsive">
              <table class="table table-border table-hover tablesorter">
                <thead>
                  <tr></tr>
				  <tr></tr>
                </thead>
                <tbody>
				<tr>
							 <td><Strong>Title</Strong></td>
							<td><input type="text" class="form-control" name="pname" id="pname" value="<?php echo $pname;?>"/></td>
						</tr>
				<tr>
							 <td><Strong>code</Strong></td>
							<td><input type="text" class="form-control" name="code" id="code" value="<?php echo $code;?>"/>
						</td>
						
					<tr>
							 <td><Strong>Category</Strong></td>
							 <td>   <select class="form-control col-xs-6" id="cat_id" name="cat_id">
					 
               			 <?php foreach($cat as $ct) : ?><?php if($ct->deleted =='no')
               			 {?>
               			 <option class="form-control col-xs-6" value="<?php echo $ct->id;?>"<?php  if($type=='update'){if($cat_id1==$ct->id)
               				 {echo "selected='selected'";}}?> ><?php echo $ct->Name;?></option>
                
               				 <?php
                				}  endforeach; ?>
                			</select>
                	</td>
					</tr>
					<tr>
						<td><Strong>Packs</Strong></td>
							 <td>   <select class="form-control col-xs-6" id="pac_id" name="pac_id">
					 
               			 <?php foreach($pack as $pk) : ?><?php if($pk->deleted =='no')
               			 {?>
               			 <option class="form-control col-xs-6" value="<?php echo $pk->pack_id;?>"<?php  if($type=='update'){if($cat_id1==$pk->pack_id)
               				 {echo "selected='selected'";}}?> ><?php echo $pk->pack_name;?></option>
                
               				 <?php
                				}  endforeach; ?>
                			</select>
                	</td>
					</tr>
					<tr>
							 <td><Strong>Pv Points</Strong></td>
							<td><input type="text" class="form-control" name="pv" id="pv" value="<?php echo $pv;?>"/>
						</td>
						
					</tr>
						<tr>
						<td><Strong>Description </Strong></td>
						 
						   <td><textarea class="form-control" id="desc" name="desc" rows="5" cols="40"> <?php echo $pdesc;?></textarea></td>
							
						</tr>
						<tr>
							 <td><Strong>Selling Price</Strong></td>
							<td><input type="text" class="form-control" name="sell" id="sell" value="<?php echo $selling_price;?>"/>
						</td>
						
					</tr>
					<tr>
							 <td><Strong>Received Price</Strong></td>
							<td><input type="text" class="form-control" name="rcv" id="rcv" value="<?php echo $received_price;?>"/>
						</td>
						
					</tr>
					    
					<tr>
							 <td><Strong>Product Image</Strong></td>
							<td><input type="file" id="img" name="userfile" action="POST"  /></td>

					<tr>
                    <td></td>
                    <td><?php if($type=='add') { ?>
								  <div style="display:none"><input type="text" class='id' value="<?php echo $id;?>"></div>
								  <div style="display:none"><input type="text" class='type' value="<?php echo $type;?>"></div>
										  <button type="submit" class="btn btn-default pull-right add">Add</button>
								  <?php } else { ?>
								  <div style="display:none"><input type="text" class='id' value="<?php echo $id;?>"></div>
								  <div style="display:none"><input type="text" class='type' value="<?php echo $type;?>"></div>
								  <div style="display:none"><input type="text" class='password' value="<?php echo $add_id;?>"></div>
									<button type="submit" class="btn btn-default pull-right add">Update</button>
								  <?php } ?></td>
				</tr>
                  
				</tbody>
              </table>
					</div>
					</div>
					</div>
					</div>
					
					
       
</div> <!-- /#page-content-wrapper -->
<!--<script>
$('.add').click(function()
{
	alert($('#img').val());
});
</script>-->