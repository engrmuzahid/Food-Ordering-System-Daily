<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Package List</h5>
            <?php echo $this->session->flashdata('msg'); ?>
            <a style="margin-left: 88%" href="<?php echo base_url('dashboard/add_package') ?>" class="btn btn-primary"><span>Add New Package</span></a>
            <br>
    </div>
    <div class="panel-body">
        <table class="table table-bordered table-dark">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Package Name</th>
                    <th>Package Price</th>
                    <th>Package Description</th>
                    <th>Default Day</th>
                    <th>Calories</th>
                    <th>Sort Order</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($package_list){
                        $Serial=0;
                        foreach ($package_list->result() as $row) {
                            $Serial++;
                   ?>
                <tr>
                    <td><?=$Serial?></td>
                    <td><?=$row->package_name ?></td>
                    <td><?=number_format($row->package_price,2);?></td>
                    <td><?=$row->description ?></td>
                    <td><?=$row->default_day ?></td>
                    <td><?=$row->calories ?></td>
                    <td><?=$row->sort_order ?></td>
                    <td><?=$row->status ?></td>
                    <td class="text-center">
                        <ul class="icons-list">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="<?php echo base_url('dashboard/edit_package/'.$row->package_id); ?>"><i class="icon-file-excel"></i> Edit</a></li>
                                    <li><a href="<?php echo base_url('package/add_items/'.$row->package_id); ?>"><i class="icon-edit"></i> Add Items</a></li>
                                    <li><a onclick="return confirm('Are you sure you want to delete this ?');" href="<?php echo base_url('dashboard/delete_package/'.$row->package_id); ?>"><i class="icon-file-pdf"></i> Delete</a></li>
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