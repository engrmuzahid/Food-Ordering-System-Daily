
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
			<h5 class="panel-title">Delivery Address List</h5>
			<?php echo $this->session->flashdata('msg'); ?>
			<a style="margin-left: 85%" href="<?php echo base_url('dashboard/add_delivery_address') ?>" class="btn btn-primary"><span>Add Delivery Address</span></a>
			<br>
		</div>
		<div class="panel-body">
			<table class="table table-bordered table-dark">
				<thead>
					<tr>
						<th>Serial</th>
						<th>Address</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
	                if($delivery_address){
	                	$Serial=0;
	                	foreach ($delivery_address->result() as $row) { $Serial++; ?>
						<tr>
							<td><?=$Serial?></td>
							<td><?=$row->city ?></td>
							<td class="text-center">
								<ul class="icons-list">
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">
											<i class="icon-menu9"></i>
										</a>
										<ul class="dropdown-menu dropdown-menu-right">
											<li><a href="<?php echo base_url('dashboard/edit_delivery_address/'.$row->id); ?>"><i class="icon-file-excel"></i> Edit</a>
											</li>
											<li><a onclick="return confirm('Are you sure you want to delete this ?');" href="<?php echo base_url('dashboard/delete_delivery_address/'.$row->id); ?>"><i class="icon-file-pdf"></i> Delete</a>
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
</body>
</html>
						

									