<?php
include "header.php";
?>
<style>
    .invoice .content-section {
        height: 100%;
    }

    .invoice-inbox {
        height: 100%;
    }

    td,
    th,
    td>input {
        text-align: center;
    }
</style>
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="row invoice layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="doc-container">
                    <div class="invoice-container">
                        <div class="invoice-inbox ps">
                            <div class="new-invoice">
                                <div class="content-section  animated animatedFadeInUp fadeInUp">

                                    <div class="row inv--head-section">

                                        <div class="col-sm-6 col-12">
                                            <h3 class="in-heading text-white">INVOICE</h3>
                                        </div>
                                        <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                            <div class="company-info">
                                                <h5 class="inv-brand-name"><i class="fa fa-medkit"></i> Shop Name</h5>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row inv--detail-section">

                                        <div class="col-sm-7 align-self-center">
                                            <p class="inv-to">Invoice To</p>
                                        </div>

                                        <div class="col-sm-7 align-self-center">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="customer_name">Customer Name <span></span></label>
                                                    <input type="text" class="form-control" name="customer_name" id="customer_name" placeholder="Customer Name" autocomplete="off">
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                            <div class="form-group col-md-12">
                                                <label for="date">Date <span></span></label>
                                                <input type="text" class="form-control text-right" name="date" id="date" placeholder="Invoice Date" value="<?php echo date('d-m-Y'); ?>" autocomplete="off">
                                            </div>

                                        </div>

                                    </div>
                                    <div class="row inv--detail-section">
                                        <div class="col-sm-12 align-self-center">
                                            <div class="form-row">

                                                <div class="form-group col-md-12">
                                                    <label for="address">Address <span></span></label>
                                                    <input type="text" class="form-control" name="address" id="address" placeholder="Address" autocomplete="off">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <form>

                                        <div class="row inv--detail-section">
                                            <div class="col-sm-7 align-self-center mt-5">
                                                <p class="inv-to">Add Medicine</p>
                                            </div>

                                            <div class="col-sm-7 align-self-center">
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label for="customer_name">Medicine Name <span></span></label>
                                                        <input type="text" class="form-control" name="medicine_name" id="medicine_name" placeholder="Medicine Name" autocomplete="off">
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-sm-3 align-self-center  order-2">
                                                <div class="form-group col-md-12">
                                                    <label for="quantity">Quantity <span></span></label>
                                                    <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Quantity" value="" autocomplete="off">
                                                </div>

                                            </div>
                                            <div class="col-sm-2 align-self-center   order-2 mt-4">
                                                <div class="form-group col-md-12">
                                                    <button type="submit" class="btn btn-primary "><i class="fa fa-plus"></i> Add</button>
                                                </div>

                                            </div>

                                        </div>
                                    </form>

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
                                                        <tr>
                                                            <td></td>
                                                            <td>
                                                                <input type="text" class="form-control medicine_name" name="medicine_name[]" value="" placeholder="Medicine Name" list="browsers" autocomplete="off" />
                                                                <datalist id="browsers" class="browsers">
                                                                </datalist>
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control" id="qty" name="qty[]" value="" placeholder="Quantity" autocomplete="off" />
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control" id="qty" name="mrp[]" value="" placeholder="Unit Price" />
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control" id="total" name="total[]" value="" placeholder="Total" />
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0);" class="addCF"><i class="fa fa-plus-circle"></i></a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-sm-5 col-12 order-sm-0 order-1">
                                            <div class="inv--payment-info">
                                                <div class="row">
                                                    <div class="col-sm-12 col-12">
                                                        <h6 class=" inv-title">Payment Info:</h6>
                                                    </div>
                                                    <div class="col-sm-4 col-12">
                                                        <p class=" inv-subtitle">Bank Name: </p>
                                                    </div>
                                                    <div class="col-sm-8 col-12">
                                                        <p class="">Bank of America</p>
                                                    </div>
                                                    <div class="col-sm-4 col-12">
                                                        <p class=" inv-subtitle">Account Number : </p>
                                                    </div>
                                                    <div class="col-sm-8 col-12">
                                                        <p class="">1234567890</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-12 order-sm-1 order-0">
                                            <div class="inv--total-amounts text-sm-right">
                                                <div class="row">
                                                    <div class="col-sm-8 col-7">
                                                        <p class="">Sub Total: </p>
                                                    </div>
                                                    <div class="col-sm-4 col-5">
                                                        <p class="">$13300</p>
                                                    </div>
                                                    <div class="col-sm-8 col-7">
                                                        <p class="">Tax Amount: </p>
                                                    </div>
                                                    <div class="col-sm-4 col-5">
                                                        <p class="">$700</p>
                                                    </div>
                                                    <div class="col-sm-8 col-7">
                                                        <p class=" discount-rate">Discount : <span class="discount-percentage">5%</span> </p>
                                                    </div>
                                                    <div class="col-sm-4 col-5">
                                                        <p class="">$700</p>
                                                    </div>
                                                    <div class="col-sm-8 col-7 grand-total-title">
                                                        <h4 class="">Grand Total : </h4>
                                                    </div>
                                                    <div class="col-sm-4 col-5 grand-total-amount">
                                                        <h4 class="">$14000</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>


                    </div>

                </div>

            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>