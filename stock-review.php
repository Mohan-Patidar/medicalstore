<?php include "header.php"; ?>
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content" data-value="stock-review">
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing" id="cancel-row">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

                <div class="widget-content widget-content-area br-6">
                    <div class="container">
                        <div class="form-row mt-4">
                            <form id="filter-form">
                                <div class="form-group col-md-12">
                                    <label for="medicine_type">Medicine Filter :</label>
                                    <div class="n-chk mt-2">
                                        <label class="new-control new-checkbox checkbox-primary">
                                            <input type="radio" name="stock_filter" class="new-control-input" value="All" <?php if (isset($_GET['stock_filter']) && $_GET['stock_filter'] == 'All') { ?>checked <?php }else{ ?>checked<?php } ?>>&nbsp;
                                            <span class="new-control-indicator"></span>All Stock
                                        </label>
                                        <label class="new-control new-checkbox checkbox-primary">
                                            <input type="radio" name="stock_filter" class="new-control-input" value="<?php echo date("F-Y", strtotime("-1 months", strtotime(date("F-Y")))); ?>" <?php if (isset($_GET['stock_filter']) && $_GET['stock_filter'] == date("F-Y", strtotime("-1 months", strtotime(date("F-Y"))))) { ?>checked <?php } ?>>&nbsp;
                                            <span class="new-control-indicator"></span>Expired
                                        </label>
                                        <label class="new-control new-checkbox checkbox-primary">
                                            <input type="radio" name="stock_filter" class="new-control-input" value="<?php echo date("F-Y", strtotime("+0 months", strtotime(date("F-Y")))); ?>" <?php if (isset($_GET['stock_filter']) && $_GET['stock_filter'] == date("F-Y", strtotime("+0 months", strtotime(date("F-Y"))))) { ?>checked <?php } ?>>&nbsp;
                                            <span class="new-control-indicator"></span>Expiring this month
                                        </label>
                                        <label class="new-control new-checkbox checkbox-primary">
                                            <input type="radio" name="stock_filter" class="new-control-input" value="<?php echo date("F-Y", strtotime("+1 months", strtotime(date("F-Y")))); ?>" <?php if (isset($_GET['stock_filter']) && $_GET['stock_filter'] == date("F-Y", strtotime("+1 months", strtotime(date("F-Y"))))) { ?>checked <?php } ?>>&nbsp;
                                            <span class="new-control-indicator"></span>Expiring in next month
                                        </label>
                                        <label class="new-control new-checkbox checkbox-primary">
                                            <input type="radio" name="stock_filter" class="new-control-input" value="<?php echo date("F-Y", strtotime("+2 months", strtotime(date("F-Y")))); ?>" <?php if (isset($_GET['stock_filter']) && $_GET['stock_filter'] == date("F-Y", strtotime("+2 months", strtotime(date("F-Y"))))) { ?>checked <?php } ?>>&nbsp;
                                            <span class="new-control-indicator"></span>Expiring in next 2 month
                                        </label>
                                        <label class="new-control new-checkbox checkbox-primary">
                                            <input type="radio" name="stock_filter" class="new-control-input" value="<?php echo date("F-Y", strtotime("+3 months", strtotime(date("F-Y")))); ?>" <?php if (isset($_GET['stock_filter']) && $_GET['stock_filter'] == date("F-Y", strtotime("+3 months", strtotime(date("F-Y"))))) { ?>checked <?php } ?>>&nbsp;
                                            <span class="new-control-indicator"></span>Expiring in next 3 month
                                        </label>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                    <div class="table-responsive mb-4 mt-4">

                        <div id="html5-extension_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">

                            <div class="row">
                                <div class="col-md-12">
                                    <table id="html5-extension" class="table table-hover non-hover dataTable no-footer" style="width: 100%;" role="grid" aria-describedby="html5-extension_info">
                                        <thead>
                                            <tr role="row">
                                                <th>S.No.</th>
                                                <th>Medicine Name</th>
                                                <th>Batch No.</th>
                                                <th>Type</th>
                                                <th>Type Des.</th>
                                                <th>MRP/Pc.</th>
                                                <th>Price/Pc.</th>
                                                <th>Expiry</th>
                                                <th>Qty.</th>
                                                <th>Alert Qty.</th>
                                                <th>Pharmacy</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $select = $conn->prepare("SELECT * FROM medicine WHERE status='Active' ORDER BY id DESC");
                                            if(isset($_GET['stock_filter']) && $_GET['stock_filter']!='All'){
                                                $expiry = explode("-",$_GET['stock_filter']);
                                                $select = $conn->prepare("SELECT * FROM medicine WHERE month='".$expiry[0]."' AND year='".$expiry[1]."' AND status='Active' ORDER BY id DESC");
                                            }
                                            $select->execute();
                                            $i = 0;
                                            while ($row = $select->fetch(PDO::FETCH_OBJ)) {
                                            ?>
                                                <tr role="row">
                                                    <td class="sorting_1"><?php echo $i = $i + 1; ?></td>
                                                    <td><?php echo $row->medicine_name; ?></td>
                                                    <td><?php echo $row->batch_no; ?></td>
                                                    <td><?php echo $row->medicine_type; ?></td>
                                                    <td><?php echo $row->other_type_description; ?></td>
                                                    <td><?php echo $row->mrp; ?></td>
                                                    <td><?php echo $row->price; ?></td>
                                                    <td><?php echo date("M", strtotime($row->month)); ?>-<?php echo $row->year; ?></td>
                                                    <td><?php echo $row->quantity; ?></td>
                                                    <td><?php echo $row->notification_quantity; ?></td>
                                                    <td><?php echo $row->pharmacy; ?></td>
                                                    <td><a href="edit-medicine?mid=<?php echo $row->id; ?>" title="Edit"><i class="fa fa-pencil"></i></a> &nbsp; &nbsp;<a href="javascript:void(0);" onclick="deleteData(<?php echo $row->id; ?>,'medicine');" title="Delete"><i class="fa fa-trash"></i></a></td>
                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php include "footer.php"; ?>