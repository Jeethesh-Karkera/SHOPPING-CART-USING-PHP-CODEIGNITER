<script src="<?php echo base_url();?>CSS/js/jquery.validate.min.js "></script>
<style>
.error-name {
    color: red;
	font-family: calibri;
}
</style>
<div class="col-lg-12">

	<h1>Add Packs</h1>
		<ol class="breadcrumb">
              <li><a href="#"><i class="icon-dashboard"></i>Packs</a></li>
              <li class="active"><i class="icon-file-alt"></i>Add packs</li>
             
		<div style="clear: both;"></div>
	</ol>
	
	<div class="table-responsive">
              <table class="table table-border table-hover tablesorter">
                <thead>
                  <tr></tr>
				  <tr></tr>
                </thead>
                <tbody>
				<tr>
                    <td><strong>Pack Name:</strong></td>
                    <td><input name="pack_name" type="text" id= "pack_name" required='required' class="form-control staff_name" placeholder="Pack Name " value="<?php echo $name ;?>" data-errorclass="error-name"></td>
				</tr>
				<tr>
                    <td><strong>Pack Amount:</strong></td>
                    <td><input name="amount" type="text" required='required' id ="amount" class="form-control user_name" placeholder="Pack Amount" value="<?php echo $amount ;?>" data-errorclass="error-name"></td>
				</tr>
				<tr>
                    <td><strong>Pack Pv Value:</strong></td>
                    <td><input name="pv" type="pv" required='required' id ="pv" class="form-control email" placeholder="Pack pv value"  value="<?php echo $pv ;?>" data-errorclass="error-name"></td>
				
				</tr>
				<tr>
                    <td><strong>Payout Amt:</strong></td>
                    <td><input name="po" type="po" required='required' id ="po" class="form-control email" placeholder="Payout Amt"  value="<?php echo $po;?>" data-errorclass="error-name"></td>
				
				</tr>
				<tr>
                    <td><strong>Binary Completion Amt:</strong></td>
                    <td><input name="bi" type="bi" required='required' id ="bi" class="form-control email" placeholder="Binary Comp Amt"  value="<?php echo $bi ;?>" data-errorclass="error-name"></td>
				
				</tr>
					<tr>
                    <td></td>
                    <td><?php if($type=='add') { ?>
								  <div style="display:none"><input type="text" id='id' value="<?php echo $id;?>"></div>
								  <div style="display:none"><input type="text" id='type' value="<?php echo $type;?>"></div>
										  <button type="submit" class="btn btn-default pull-right add">Add</button>
								  <?php } else { ?>
								  <div style="display:none"><input type="text" id='id' value="<?php echo $id;?>"></div>
								  <div style="display:none"><input type="text" id='type' value="<?php echo $type;?>"></div>
									<button type="submit" class="btn btn-default pull-right add">Update</button>
								  <?php } ?>
								  </div></td>
				</tr>
					</div>
								  
				
		</tbody>
              </table>
            </div>
			
</div>
			
		
  
  <script>
  $('document').ready(function() {
	  $('.add').click(function(){
		  var ab =$('#pack_name').val();
		  
		  if($('#pack_name').val() == ''   && $('#amount').val() == ''  && $('#pv').val() == '' && $('#po').val() == '' && $('#bi').val() == '')
		  {
			  alert("please enter all fields");
		  }
		  else
		  {
		   $.post('<?php echo base_url('packs/insert_pack');?>',
		  {
			  name:$('#pack_name').val(),
			  amount:$('#amount').val(),
			  pv:$('#pv').val(),
			  id:$('#id').val(),
			  po:$('#po').val(),
			  bi:$('#bi').val(),
			  type:$('#type').val()
		  },
		  function(data,status)
		{
			
			$('#body').load('<?php echo base_url('packs');?>');
			
			//return true;
		});
		  }
	  });
	  
  });
  </script>
