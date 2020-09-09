<?php if (empty($orders)): ?>
    <h3 class="danger padding-lg"> There are no order.</h3>
<?php else: ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
    <style type="text/css">
        thead {
            background: #4CAF50;
            color: #fff;
            text-transform: uppercase;
        }
        table#PackagelistingTable {
            font-size: 16px;
        }
        .card.text-white.bg-primary.mb-3 {
            float: left;
            margin: 5px;
            height: 100px;
        }
    </style>
    <table id="PackagelistingTable" class="table table-bordered table-success">
        <thead>
            <tr>
                <!--<th>Customer Name</th>-->
                <th>Packages</th>
                <th>Customer Details </th>
                <th>Delivery Information </th>
            </tr>
        </thead>
        <tbody> <?php $_option_array = array();
    foreach ($orders as $row) :
        ?>
                <tr>
                    <td><b><?php echo $row->qty; ?> x <?php echo $row->package_name; ?> Package </b> <br/>
                        <?php
                        $package_items = (array) json_decode($row->package_details);
                        $inc = 1;

                        foreach ($package_items as $item) {

                            //echo $item->name;
                            $has_option = $item->has_option;
                            if (strtolower($has_option) == "yes") {
                                if ($inc++ > 1) {
                                    echo ", ";
                                }
                                $option = $item->name . " With " . $item->option_name;
                                $_option = str_replace(" ", "_", $option);
                                if (array_key_exists($_option, $_option_array)) {
                                    $_option_array[$_option] += 1;
                                } else {
                                    $_option_array[$_option] = 1;
                                }

                                echo $option;
                            }
                        }
                        ?>

                    </td>
                    <td><b><?php echo $row->f_name; ?> <?php echo $row->l_name; ?></b> <br/><?php echo $row->phone; ?> <br/><?php echo $row->email; ?></td>
                    <td><?php echo $row->payment_method == "stripe" ? "Card" : "Cash"; ?> Order <br/><?php echo date("d-F-Y", strtotime($row->delivery_date)); ?> <br/><?php echo $row->delivery_address; ?></td> 
                </tr>
    <?php endforeach; ?>

        </tbody>
    </table>
    <?php foreach ($_option_array as $key => $_optionList): ?>
        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;padding: 10px 25px;">
            <div class="card-body">
                <h5 class="card-title"><?php echo sprintf( '%02d', $_optionList ); ?></h5>

            </div>
              <div class="card-header"><?php echo str_replace("_", " ", $key) ?></div>
          
        </div>
    <?php endforeach; ?>
    <script type="text/javascript">

        $(document).ready(function () {
            $('#PackagelistingTable').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'print',
                        text: 'Print',
                        exportOptions: {
                            stripHtml: false
                        }
                    }, {
                        extend: 'pdf',
                        text: 'Save PDF',
                        exportOptions: {
                            stripNewlines: false
                        }}, {
                        extend: 'excel',
                        text: 'Excel',
                        exportOptions: {
                            stripNewlines: false
                        }
                    }
                ],
                "searching": true
            });


        });

    </script>
<?php endif; ?>