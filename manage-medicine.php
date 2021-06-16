<?php include "header.php"; ?>
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content" data-value="manage-medicine">
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing" id="cancel-row">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
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
                                        $select = $conn->prepare("SELECT * FROM medicine ORDER BY id DESC");
                                        $select->execute();
                                        $i=0;
                                        while($row = $select->fetch(PDO::FETCH_OBJ))
                                        {
                                        ?>
                                            <tr role="row">
                                                <td class="sorting_1"><?php echo $i=$i+1; ?></td>
                                                <td><?php echo $row->medicine_name; ?></td>
                                                <td><?php echo $row->batch_no; ?></td>
                                                <td><?php echo $row->medicine_type; ?></td>
                                                <td><?php echo $row->other_type_description; ?></td>
                                                <td><?php echo number_format($row->mrp,2); ?></td>
                                                <td><?php echo number_format($row->price,2); ?></td>
                                                <td><?php echo date("M",strtotime($row->month)); ?>-<?php echo $row->year; ?></td>
                                                <td><?php echo $row->quantity; ?></td>
                                                <td><?php echo $row->notification_quantity; ?></td>
                                                <td><?php echo $row->pharmacy; ?></td>
                                                <td>
                                                    <?php
                                                    if($row->status=='Active'){
                                                    ?>
                                                    <a href="javascript:void(0);" onclick="updateStatus(<?php echo $row->id; ?>,'medicine','<?php echo $row->status; ?>');" title="Status" class="text-success"><i class="fa fa-arrow-up"></i></a>  &nbsp;
                                                    <?php 
                                                    }else{
                                                       ?>
                                                       <a href="javascript:void(0);" onclick="updateStatus(<?php echo $row->id; ?>,'medicine','<?php echo $row->status; ?>');" title="Status" class="text-danger"><i class="fa fa-arrow-down"></i></a>  &nbsp;
                                                       <?php 
                                                    }
                                                    ?> 

                                                    <a href="edit-medicine?mid=<?php echo $row->id; ?>" title="Edit" class="text-warning"><i class="fa fa-pencil"></i></a> &nbsp; 
                                                    
                                                    <a href="javascript:void(0);" class="text-red" onclick="deleteData(<?php echo $row->id; ?>,'medicine');" title="Delete"><i class="fa fa-trash"></i></a></td>
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