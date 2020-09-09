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
			<h5 class="panel-title">Users List</h5>
			<?php echo $this->session->flashdata('msg'); ?>
			<a style="margin-left: 85%" href="<?php echo base_url('dashboard/add_users') ?>" class="btn btn-primary"><span>Add User</span></a>
			<br>
		</div>
		<div class="panel-body">
			<table class="table table-bordered table-dark">
				<thead>
					<tr>
						<th>Serial</th>
						<th>Username</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
	                if($users_list){
	                	$Serial=0;
	                	foreach ($users_list as $row) { $Serial++; ?>
						<tr>
							<?php if($row->user_email==$_SESSION['admin_email']) 
							{	
								$Serial--;
							}
							else 
							    {?>

							<td><?=$Serial?></td>
							<td><?=$row->user_name ?></td>
							<td><?=$row->user_email ?></td>
							<td><?=$row->user_phone ?></td>
							<td class="text-center">
			                    <ul class="icons-list">
			                        <li class="dropdown">
			                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			                                    <i class="icon-menu9"></i>
			                            </a>
			                            <ul class="dropdown-menu dropdown-menu-right">
			                                <li><a href="<?php echo base_url('dashboard/edit_users/'.$row->user_id); ?>"><i class="icon-file-excel"></i> Edit</a></li>
			                                <li><a onclick="return confirm('Are you sure you want to delete this ?');" href="<?php echo base_url('dashboard/delete_users/'.$row->user_id); ?>"><i class="icon-file-pdf"></i> Delete</a></li>
			                            </ul>
			                        </li>
			                    </ul>
			                </td>
							<?php } ?>
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
						

									