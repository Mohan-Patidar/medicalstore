<?php
include "header.php";
$invoice_details = $conn->prepare("SELECT * FROM customer_invoice WHERE id='" . $_GET['id'] . "'");
$invoice_details->execute();
$updateRow = $invoice_details->fetch(PDO::FETCH_OBJ);
?>
<div id="content" class="main-content" data-value="new-invoice">
    <div class="layout-px-spacing">
        <div class="row invoice layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="doc-container">
                    <div class="invoice-container">
                        <div class="edit-invoice-inbox invoice-inbox ps">
                            <div class="new-invoice">
                                <div class="content-section  animated animatedFadeInUp fadeInUp">
                                    <div class="row inv--head-section">
                                        <div class="col-sm-6 col-12">
                                            <h3 class="in-heading text-white">EDIT INVOICE</h3>
                                        </div>
                                        <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                            <div class="company-info">
                                                <h5 class="inv-brand-name"><i class="fa fa-medkit"></i> <?php echo $row_user->name; ?></h5>
                                            </div>
                                        </div>
                                        <div class="col-sm-7 align-self-center">
                                            <p class="inv-to">Invoice To</p>
                                        </div>
                                        <div class="col-sm-7 align-self-center">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="customer_name">Customer Name <span></span></label>
                                                    <input type="text" class="form-control" name="customer_name" id="customer_name" value="<?php echo $updateRow->customer_name; ?>" autocomplete="off">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                            <p class="inv-created-date"><span class="inv-title">Invoice Date : </span> <span class="inv-date"><?php echo date("d M Y"); ?></span></p>


                                        </div>
                                    </div>
                                    <div class="row inv--detail-section">
                                        <div class="col-sm-12 align-self-center">
                                            <div class="form-row">

                                                <div class="form-group col-md-12">
                                                    <label for="address">Address <span></span></label>
                                                    <input type="text" class="form-control" name="customer_address" value="<?php echo $updateRow->customer_address; ?>" id="customer_address" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form id="update-invoice" method="post">
                                        <input type="hidden" name="table" value="customer_invoice">
                                        <input type="hidden" name="customer_name" value="<?php echo $updateRow->customer_name; ?>" id="c_name">
                                        <input type="hidden" name="customer_address" value="<?php echo $updateRow->customer_address; ?>" id="c_addr">
                                        <input type="hidden" name="id" value="<?php echo $updateRow->id; ?>">
                                        <div class="row inv--detail-section">
                                            <div class="col-sm-7 align-self-center mt-5">
                                                <p class="inv-to">Edit Medicine</p>
                                            </div>
                                            <div class="col-sm-7 align-self-center">
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label for="customer_name">Medicine Name <span></span></label>
                                                        <!-- <input type="text" class="form-control medicine_name" name="medicine_name"  list="browsers" value="<?php //echo $updateRow->medicine_name; 
                                                                                                                                                                ?>" id="medicine_name"  list="browsers" autocomplete="off">
                                                        <datalist id="browsers" class="browsers">
                                                        </datalist> -->
                                                        <div class="ui-widget">
                                                            <select id="combobox" class="browsers" name="medicine_name">
                                                                <?php
                                                                $medicine = $conn->prepare("SELECT * FROM medicine");
                                                                $medicine->execute();
                                                                $medicineList = array();
                                                                $count = $medicine->rowCount();
                                                                while ($row = $medicine->fetch(PDO::FETCH_OBJ)) {

                                                                ?>
                                                                    <option <?php if ($updateRow->medicine_name ==  $row->medicine_name) {
                                                                                echo 'selected';
                                                                            } ?> value="<?php echo $row->medicine_name; ?>"><?php echo $row->medicine_name; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 align-self-center  order-2">
                                                <div class="form-group col-md-12">
                                                    <label for="quantity">Quantity <span></span></label>
                                                    <input type="number" class="form-control" name="medicine_quantity" id="quantity" placeholder="Quantity" autocomplete="off">
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-2 align-self-center   order-2 mt-4">
                                                <div class="form-group col-md-12">
                                                    <input type="hidden" name="add">
                                                    <button type="submit" id="add-medicine" class="btn btn-primary "><i class="fa fa-plus"></i> Add</button>
                                                </div>
                                            </div>
                                           
                                            <div class="col-sm-2 align-self-center   order-2 mt-4">
                                                <div class="form-group col-md-12">
                                                    <input type="hidden" name="update">
                                                    <button type="submit" class="btn btn-primary ">update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form id="selected-medicine-form">
                                        <input type="hidden" name="c_name" id="c_name">
                                        <input type="hidden" name="c_email" id="c_email">
                                        <input type="hidden" name="c_mobile" id="c_mobile">
                                        <input type="hidden" name="c_address" id="c_address">
                                        <input type="hidden" name="medicine_id" id="medicine_id">
                                        <input type="hidden" name="customer_medicine_name" id="customer_medicine_name">
                                        <input type="hidden" name="customer_medicine_quantity" id="customer_medicine_quantity">
                                        <input type="hidden" name="customer_medicine_mrp" id="customer_medicine_mrp">
                                        <input type="hidden" name="customer_total_amount" id="customer_total_amount">
                                        <input type="hidden" name="sub_total" id="sub_total">
                                        <input type="hidden" name="grand_total" id="grand_total">
                                        <div class="row inv--product-table-section">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <table class="table" id="customFields">
                                                        <thead class="">
                                                            <tr>
                                                                <th>S.No</th>
                                                                <th>Description</th>
                                                                <th>Qty</th>
                                                                <th>Unit Price</th>
                                                                <th>Amount</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4" id="display-total" style="display:none">
                                            <div class="col-sm-5 col-12 order-sm-0 order-1">

                                            </div>
                                            <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                <div class="inv--total-amounts text-sm-right">
                                                    <div class="row">
                                                        <div class="col-sm-8 col-7">
                                                            <p class="">Sub Total: </p>
                                                        </div>
                                                        <div class="col-sm-4 col-5 text-left">
                                                            <p><i class="fa fa-rupee"></i> <span class="sub_total">0.00</span></p>
                                                        </div>

                                                        <div class="col-sm-8 col-7">
                                                            <p class=" discount-rate mt-2">Discount : <span class="discount-percentage"></span> </p>
                                                        </div>
                                                        <div class="col-sm-4 col-5">
                                                            <p class=""><input type="number" name="discount" id="discount" value="" class="form-control text-white" autocomplete="off" placeholder="Discount Amount"></p>
                                                        </div>
                                                        <div class="col-sm-8 col-7 grand-total-title">
                                                            <h4 class="text-white">Grand Total : </h4>
                                                        </div>
                                                        <div class="col-sm-4 col-5 grand-total-amount text-left">
                                                            <h4 class="text-white"><i class="fa fa-rupee"></i> <span class="grand_total">0.00</span></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <input type="hidden" name="submit">
                                                    <button type="submit" class="btn btn-primary ">Submit</button>
                                                </div>

                                            </div>

                                        </div>
                                    </form>

<?php include "footer.php"; ?>