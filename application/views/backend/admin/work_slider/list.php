

					<!-- Column rendering -->
<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Slider List</h5>
		<?php echo $this->session->flashdata('msg'); ?>
		<a style="margin-left: 90%" href="<?php echo base_url('dashboard/add_work_slider') ?>" class="btn btn-primary"><span>Add New Slider</span></a>
		<br>
	</div>
			<div class="panel-body">
			<table class="table table-bordered table-dark">
				<thead>
					<tr>
						<th>Serial</th>
						<th>Title</th>
						<th>Description</th>
						<th>Action Link</th>
						<th>Sort Order</th>	
						<th>Action</th>
					</tr>
				</thead>
				<tbody>


					<?php
        if($work_slider){
        	$Serial=0;

        	foreach ($work_slider->result() as $row) {
        		$Serial++;
       ?>

					<tr>
						<td><?=$Serial?></td>
						<td><?=$row->title ?></td>
						<td><?=$row->description ?></td>
						<td><?=$row->action_link ?></td>
						<td><?=$row->sort_order ?></td>

						<td class="text-center">
							<ul class="icons-list">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="icon-menu9"></i>
									</a>

									<ul class="dropdown-menu dropdown-menu-right">

										<li><a href="<?php echo base_url('dashboard/edit_work_slider/'.$row->id); ?>"><i class="icon-file-excel"></i> Edit</a>
										<li><a onclick="return confirm('Are you sure you want to delete this ?');" href="<?php echo base_url('dashboard/delete_work_slider/'.$row->id); ?>"><i class="icon-file-pdf"></i> Delete</a></li>
										
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
</div><!--/span-->
</div>


		</div>
		<!-- /column rendering -->


		<!-- Footer -->
		
		<!-- /footer -->

	