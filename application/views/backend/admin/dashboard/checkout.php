
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h2 class="panel-title">Order List</h2>
            <?php echo $this->session->flashdata('msg'); ?>
            <br>
        </div>
        <div class="panel-body">
            <table id="listing" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Serial</th>
                    <th>Full Name</th>
                    <th>Order Time </th>
                    <th>Delivery Address</th>
                    <th>Status</th>
                    <th>Total Amount</th>             
                    <th>Paid Amount</th>             
                    <th>Due Amount</th>            
                    <th style="width: 15%">Action</th>            
                </tr>
               </thead>
               <tbody>
                   <?php
                    if($checkout_settings)
                    {
                        $Serial=0;
                        foreach ($checkout_settings as $row) 
                            { 
                                $Serial++; ?>
                                <tr>
                                    <?php $id=$row->id;?>
                                    <td><?=$Serial?></td>
                                    <td><?=$row->f_name." ".$row->l_name?></td>
                                    <td><?=$row->order_time ?></td>
                                    <td><?=$row->delivery_address ?></td>
                                    <td><?=$row->order_status ?></td>
                                    <td><?=$row->total_amount ?></td>
                                    <td><?=$row->paid_amount ?></td>
                                    <td><?=$row->due_amount ?></td>
                                    <td >
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?php echo $row->id;?>">View</button>
                                        <button type="button" class="btn btn-success"><a href="<?php echo base_url('dashboard/edit_checkout/'.$row->id);?>" style="color: #fff;">Edit</a></button>
                                        <!-- <button type="button" class="btn btn-success"><a href="<?php echo base_url('dashboard/view_checkout/'.$row->id);?>" style="color: #fff;">View</a></button> -->
                                    </td>
                                </tr>
                           <div id="myModal<?php echo $row->id ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 style="border-bottom: 5px solid green;text-align: center;" class="modal-title">Order Details</h1>
                                        </div>
                                        <div class="modal-body">
                                        <?php
                                        echo "Customer Name: ".$row->f_name." ".$row->l_name."<br>";
                                        echo "Address: ".$row->delivery_address."<br>";
                                        echo "Mobile Number:".$row->phone."<br>";
                                        ?>
                                        <h1 style="border-bottom: 5px solid green;text-align: left;">Product List</h1>
                                        <?php
                                        $total=0;
                                        //echo $id;
                                        $total_item=0;
                                        $data['item_option']=$this->db->get('item_option');
                                        $this->db->select('final_orders.*,customer.f_name,customer.l_name');
                                        $this->db->from('final_orders');
                                        $this->db->join('customer', 'customer.id = final_orders.customer_id');
                                        $this->db->where('final_orders.id',$id);
                                        $final_orders= $this->db->get()->row();
                                        ?>
                                         <?php
                                            $cart =(array)json_decode($final_orders->cart_items);
                                            for ($i = 0; $i < count($cart); $i++) 
                                            {
                                                $j=$i+'1';
                                                ?>

                                                <?php
                                                
                                                if(array_key_exists('package_items', $cart[$i])) {
                                                    $package_items=$cart[$i]->package_items;
                                                } else { 
                                                    $package_items='';
                                                }
                                                
                                                $package_name=$cart[$i]->package_name; 
                                                $package_price=$cart[$i]->package_price;
                                                $qty=$cart[$i]->qty;
                                                $total_item+=$qty;
                                                $total+=($qty*$package_price);

                                                echo "<h4>".$qty." x ".$package_name."</h4>";
                                                echo "Price:- &pound;".number_format($package_price,2)."<br>";
                                                echo "<b>Items:</b>"."<br>";
                                                
                                                if(!empty($package_items)) {
                                                    $inc = 1;
                                                    foreach ($package_items as $item) {
                                                        if($inc++ >1){
                                                            echo ", ";
                                                        }
                                                        echo $item->name;
                                                        $has_option = $item->has_option;
                                                        if(strtolower($has_option) =="yes")
                                                        {
                                                            echo " With ".$item->option_name;
                                                        }

                                                    }
                                                }
                                                
                                            }

                                          
                                        ?>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         <?php 
                            } 
                    }
                    ?> 
                    
               </tbody>
           </table>
        </div>
    </div>
