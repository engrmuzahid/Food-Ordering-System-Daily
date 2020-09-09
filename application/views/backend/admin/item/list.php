<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
	</style>
</head>
<body>	
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Item List</h5>
			<?php echo $this->session->flashdata('msg'); ?>
			<a style="margin-left: 90%" href="<?php echo base_url('dashboard/add_item') ?>" class="btn btn-primary"><span>Add New Item</span></a>
			<br>
		</div>
		<div class="panel-body">
			<table class="table table-bordered table-dark">
				<thead>
					<tr>
						<th>Serial</th>
						<th>Item Name</th>
						<th>Item Description</th>
						<th>Sort Order</th>				
						<th>Has Option</th>	
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
	                if($item_list){
	                	$Serial=0;
	                	foreach ($item_list->result() as $row) { $Serial++; ?>
    					<tr>
    						<td><?=$Serial?></td>
    						<td><?=$row->name ?></td>
    						<td><?=$row->description ?></td>
    						<td><?=$row->sort_order ?></td>
    						<td><?=$row->has_option ?></td>
    						<td class="text-center">
    							<ul class="icons-list">
    								<li class="dropdown">
    									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    										<i class="icon-menu9"></i>
    									</a>
    									<ul class="dropdown-menu dropdown-menu-right">
    										<li><a href="<?php echo base_url('dashboard/edit_item/'.$row->id); ?>"><i class="icon-file-excel"></i> Edit</a></li>
    									    <?php if($row->has_option=="Yes") { ?>
    									        <li><a href="<?php echo base_url('dashboard/item_option2_list/'.$row->id); ?>"><i class="icon-file-excel"></i>Options</a></li>
    									    <?php } ?>
    										<li><a onclick="return confirm('Are you sure you want to delete this ?');" href="<?php echo base_url('dashboard/delete_item/'.$row->id); ?>"><i class="icon-file-pdf"></i> Delete</a></li>
    										
    									</ul>
    								</li>
    							</ul>
    						</td>
    					</tr>
    				 <?php } 
	                }
	                else{
	                }
	                ?>			
				</tbody>
			</table>				
        </div>
    </div>
</body>
</html>