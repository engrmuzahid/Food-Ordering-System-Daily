
<div class="panel panel-flat">
        <div class="panel-heading">
            <h2 class="panel-title">Order Filter</h2>
        </div>
        <div class="panel-body">
            <div class="order-filter-group">
                <div class="row">
                    <form action="<?php echo base_url('Admin/filtering_order'); ?>" id="search_order" method="POST">
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="delivery_address" class="form-control">
                                      <option value="">Search By Address</option>
                                      <?php foreach ($delivery_address as $row) { ?>
                                        <option
                                            value="<?php echo $row->city; ?>">
                                                <?php echo $row->city; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="delivery_date" class="form-control">
                                    <option value="">Search By Day</option>
                                    <option value="<?php echo  date("Y-m-d", strtotime("-1 day",strtotime("NOW"))); ?>">Yesterday (<?php echo  date("d-F-Y", strtotime("-1 day",strtotime("NOW"))); ?>)</option>
                                    <option value="<?php echo  date("Y-m-d", strtotime("NOW")); ?>">Today <?php echo  date(" (d-F-Y)", strtotime("NOW")); ?></option>
                                    <option value="<?php echo  date("Y-m-d", strtotime("next saturday")); ?>">Saturday (<?php echo  date("d-F-Y", strtotime("next saturday")); ?>)</option>
                                    <option value="<?php echo  date("Y-m-d", strtotime("next sunday")); ?>">Sunday (<?php echo  date("d-F-Y", strtotime("next sunday")); ?>)</option>
                                    <option value="<?php echo  date("Y-m-d", strtotime("next monday")); ?>">Monday (<?php echo  date("d-F-Y", strtotime("next monday")); ?>)</option>
                                    <option value="<?php echo  date("Y-m-d", strtotime("next tuesday")); ?>">Tuesday (<?php echo  date("d-F-Y", strtotime("next tuesday")); ?>)</option>
                                    <option value="<?php echo  date("Y-m-d", strtotime("next wednesday")); ?>">Wednesday (<?php echo  date("d-F-Y", strtotime("next wednesday")); ?>)</option>
                                    <option value="<?php echo  date("Y-m-d", strtotime("next thursday")); ?>">Thursday (<?php echo  date("d-F-Y", strtotime("next thursday")); ?>)</option>
                                    <option value="<?php echo  date("Y-m-d", strtotime("next friday")); ?>">Friday (<?php echo  date("d-F-Y", strtotime("next friday")); ?>)</option>

                                </select>
                              </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <select class="form-control"  name="payment_method" >
                                    <option value="">Search By Payment Method</option>
                                    <option value="cash"> CASH </option>
                                    <option value="stripe"> CARD</option> 
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <button type="button" id="searchOrderBtn" class="btn btn-success">Filter Order</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="orderListing"></div>
        </div>
    </div>

    <script type="text/javascript">

        function loadList() {
            $("#orderListing").html("");
            var url = '<?php echo base_url('Admin/filtering_order'); ?>';
            var data = $("#search_order").serialize();
            $.post(url, data, function (resp) {
                    $("#orderListing").html(resp);
            });
        }

        $(document).ready(function () {
            loadList();
            $("#searchOrderBtn").click(function (e) {
                e.preventDefault();
                loadList();
            });
            //$("#datepickerField").datepicker();

        });

    </script>
