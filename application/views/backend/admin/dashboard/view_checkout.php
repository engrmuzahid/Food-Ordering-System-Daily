<div class="panel-heading">
	<br><br>
    <h5 class="panel-title">Full Order List</h5>
    <a style="margin-left: 90%" href="<?php echo base_url('dashboard/checkout') ?>" class="btn btn-primary"><span>Order List</span></a>
    <br><br>
</div>
<?php 
    $total=0;
    $total_item=0;
 ?>
<?php 
$cart = (array) json_decode($final_orders->cart_items);
for ($i = 0; $i < count($cart); $i ++) {
		$package_items=$cart[$i]->package_items;
     	$package_name=$cart[$i]->package_name; 
     	$package_price=$cart[$i]->package_price;
     	$qty=$cart[$i]->qty;
        $total_item+=$qty;
        $total+=($qty*$package_price);
    }
 ?>
 <table class="table table-bordered table-dark">
    <thead>
        <tr>
            <th>Package Name</th>                
            <th>Package Items</th>                
            <th>Quantity</th>                
            <th>Total Price</th>                
        </tr>
    </thead>
    <tbody>
    	<tr>
    		<td><?php echo $package_name; ?></td>
    		<td>
                <?php
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
                ?>
    		</td>
    		<td><?php echo $total_item; ?></td>
    		<td><?php echo $total; ?></td>
    	</tr>
    </tbody>
</table>	