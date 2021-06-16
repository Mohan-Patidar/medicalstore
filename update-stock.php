<?php include "header.php"; ?>
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content" data-value="update-stock">
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
                                                <th>Quantity</th>
                                                <th>MRP/Pc.</th>
                                                <th>Price/Pc.</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $select = $conn->prepare("SELECT * FROM medicine WHERE status='Active' ORDER BY id DESC");
                                            if(isset($_GET['search'])){
                                                $search = $_GET['search'];
                                                $select = $conn->prepare("SELECT * FROM medicine WHERE status='Active' AND medicine_name LIKE '%$search%' ORDER BY id DESC");
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
                                                    <td><?php echo $row->quantity; ?></td>
                                                    <td><?php echo number_format($row->mrp, 2); ?></td>
                                                    <td><?php echo number_format($row->price, 2); ?></td>
                                                    <td><a href="javascript:void(0);" onclick="updateStock('<?php echo $row->id; ?>','<?php echo $row->medicine_name; ?>','<?php echo $row->batch_no; ?>','<?php echo $row->mrp; ?>','<?php echo $row->price; ?>');" class="btn btn-warning">Update</a></td>
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
        <!-- Update Stock Modal -->
        <div id="update_stock" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="max-width: 500px!important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Medicine Stock</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="update-stock-form">
                            <input type="hidden" name="table" id="table">
                            <input type="hidden" name="id" id="mid">
                            <input type="hidden" name="update_stock" value="update">
                            <div class="form-group">
                                <label>Medicine Name<span class="text-danger"></span></label>
                                <input type="text" readonly class="form-control" name="medicine_name" id="medicine_name">
                            </div>
                            <div class="form-group">
                                <label>Batch No.<span class="text-danger"></span></label>
                                <input type="readonly" class="form-control" name="batch_no" id="batch_no">
                            </div>
                            <div class="form-group">
                                <label>Quantity<span class="text-danger">*</span></label>
                                <input type="readonly" class="form-control" name="quantity" id="medicine_name">
                            </div>
                            <div class="form-group">
                                <label>MRP/Pc.<span class="text-danger">*</span></label>
                                <input type="readonly" class="form-control" name="mrp" id="mrp">
                            </div>
                            <div class="form-group">
                                <label>Price/Pc.<span class="text-danger">*</span></label>
                                <input type="readonly" class="form-control" name="price" id="price">
                            </div>

                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn" type="submit" name="update">Update</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                                    Close
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Update Stock Modal -->
    </div>
    <?php include "footer.php"; ?>