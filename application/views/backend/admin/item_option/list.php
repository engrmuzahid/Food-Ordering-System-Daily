<?php 
foreach ($item_option_list as $row1) 
{
	$id=$row1->item_id;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Item Option List</h5>
		<?php echo $this->session->flashdata('msg'); ?>
		<a style="margin-left: 87%" style="margin-left: 90%" href="<?php echo base_url('dashboard/add_item_option/'.$id);?>" class="btn btn-primary"><span>Add New Item Option</span></a>
		<br>
	</div>
	<div class="panel-body">
		<table id="item_options_list" class="table table-bordered table-dark">
			<thead>
				<tr>
					<th>Serial</th>
					<th>Item Name</th>
					<th>Option Name</th>
					<th>Option Price</th>
					<th>Action</th>	
				</tr>
			</thead>
			<tbody>
						<?php
					if($item_option_list){
						$Serial=0;
						foreach ($item_option_list as $row) {
							$Serial++;
						?>
						<tr>
							<td><?=$Serial?></td>
							<td><?=$row->item_name ?></td>
							<td><?=$row->name ?></td>
							<td><?=number_format($row->price,2); ?></td>
							<td class="text-center">
								<ul class="icons-list">
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">
											<i class="icon-menu9"></i>
										</a>
										<ul class="dropdown-menu dropdown-menu-right">
											<li><a href="<?php echo base_url('dashboard/edit_item_option/'.$row->id); ?>"><i class="icon-file-excel"></i> Edit</a>
											</li>
											<li><a onclick="return confirm('Are you sure you want to delete this ?');" href="<?php echo base_url('dashboard/delete_item_option/'.$row->id); ?>"><i class="icon-file-pdf"></i> Delete</a>
											</li>			
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
<script>  
	 $(document).ready(function(){  
	      $('#item_options_list').DataTable();  
	 });  
	 </script>
</body>
</html>