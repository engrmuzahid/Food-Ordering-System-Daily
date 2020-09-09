<!-- Column rendering -->
<form method="POST" action="<?php echo base_url('package/save_package_items'); ?>">
<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Add items on <?= $package->package_name; ?></h4>
		<!--<br/>Total Price : <?= $package->package_price; ?>-->
		<?php echo $this->session->flashdata('msg'); ?>					
	</div>
	<table style="width: 60%;margin-left: 10px;" border="1">
		<thead>
			<tr>
				<th>Item</th>
				<th>Price</th>
				<th>Sort Order</th> 
			</tr>
		</thead>
		<tbody>
			<tr>
				<div class="panel-body">
					<div class="col-md-8">
						<input type="hidden" class="form-control" name="package_id" value=<?= $package->package_id; ?> > 
					</div>
					<div id="itemsPanel">
						<?php foreach($final as $item) if($item->status==true){  ?>
					</div>
				</div>
			</tr>
			<td>
				<div class="checkbox w-50">
					<label><input type="checkbox" <?php echo $item->status ? "checked":""; ?> name="item_id[<?= $item->id; ?>]" value="<?= $item->name; ?>"><?= $item->name; ?></label>
				</div>
			</td>
			<td>
				<div class="form-group w-50">
					<label><input type="text"  class="form-control" name="item_price[<?= $item->id; ?>]"  value="<?= $item->extra_price; ?>"/></label>
				</div>
			</td>
			<td>
				<div class="form-group w-50">
					<label><input type="text"  class="form-control" name="sort_orde[<?= $item->id; ?>]"  value="<?= $item->sort_order; ?>"/> </label> 
				</div>
			</td>
		 
			<?php }?>
			</div>
			</tbody>
		</table>
		<br>	
		<button type="button" class="btn btn-success" id="show_items">Add More items</a> </button> <button type="submit" class="btn btn-success" id="update_package" style="margin-left: 52%;">Update Package items</button>
			</div>					
			<div id="btn">
				<table style="width: 60%;margin-left: 10px;" border="1">
					<thead>
						<tr>
							<th>Item</th>
							<th>Price</th>
							<th>Sort Order</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<div class="panel-body">
							<div class="col-md-8">
							<input type="hidden" class="form-control" name="package_id" value=<?= $package->package_id; ?> > 
							<div id="itemsPanel">
								<?php foreach($final as $item) if($item->status==false){  ?>
						</tr>
						<td>
							<div class="checkbox w-50">
								<label><input type="checkbox" name="item_id[<?= $item->id; ?>]" value="<?= $item->name; ?>"><?= $item->name; ?></label>
							</div>
						</td>
						<td>
							<div class="form-group w-50">
								<label><input type="text"  class="form-control" name="item_price[<?= $item->id; ?>]"  value="<?= $item->extra_price; ?>"/></label>
							</div>
						</td>
						<td>
							<div class="form-group w-50">
								<label><input type="text"  class="form-control" name="sort_orde[<?= $item->id; ?>]"  value="1"/> </label> 
							</div>
						</td>
						<?php 
						}?>
					    </div>
					</tbody>
				</table>
				<br>
				<button type="submit" class="btn btn-success" id="add_package" style="margin-left: 52%;">Update Package items</button>
			</div>
		</div>
</form>	
	<script type="text/javascript">
		$(document).ready(function()
			{
				$("#btn").hide();
				$("#show_items").click(function() 
				{
				    
					$("#update_package").hide();
					$("#show_items").hide();
					$("#btn").show();
				});
			});
	</script>
