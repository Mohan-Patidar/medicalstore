<?php
include "header.php";
$invoice = $conn->prepare("SELECT * FROM customer_invoice WHERE status='Active' ORDER BY id DESC");
$invoice->execute();
$count_invoice = $invoice->rowCount();
?>
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content" data-value="invoice-list">
    <div class="layout-px-spacing">

        <div class="row invoice layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="app-hamburger-container">
                    <div class="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu chat-menu d-xl-none">
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg></div>
                </div>
                <div class="doc-container">
                    <div class="tab-title">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="search">
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                                <ul class="nav nav-pills inv-list-container d-block ps ps--active-y" id="pills-tab" role="tablist">
                                    <?php
                                    if($count_invoice>0){
                                    while ($row_invoice = $invoice->fetch(PDO::FETCH_OBJ)) {
                                    ?>
                                        <li class="nav-item">
                                            <div class="nav-link list-actions" id="invoice-<?php echo $row_invoice->id; ?>" data-invoice-id="<?php echo $row_invoice->id; ?>">
                                                <div class="f-m-body">
                                                    <div class="f-head">
                                                        <i class="fa fa-rupee"></i>
                                                    </div>
                                                    <div class="f-body">
                                                        <p class="invoice-number">Invoice #<?php echo $row_invoice->id; ?></p>
                                                        <p class="invoice-customer-name"><span>To:</span> <?php echo $row_invoice->customer_name; ?></p>
                                                        <p class="invoice-generated-date">Date: <?php echo date("d M Y", strtotime($row_invoice->created_at)); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        
                                    <?php
                                    }}else{
                                        ?>
                                        <div class="f-body text-center">
                                        <p>No data available!</p>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="invoice-container">
                        <div class="invoice-inbox ps">

                            <div class="inv-not-selected">
                                <p>Open an invoice from the list.</p>
                            </div>

                            <div class="invoice-header-section">
                                <h4 class="inv-number"></h4>
                                <a href="new-invoice" class="btn btn-primary">New Invoice</a>
                             
                                <a href="" id="edit-invoice" class="btn btn-primary">Edit Invoice</a>

                                <a href="javascript:void(0);" id="delete-invoice" class="btn btn-danger">Delete Invoice</a>
                                <div class="invoice-action">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer action-print" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                        <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                                        <rect x="6" y="14" width="12" height="8"></rect>
                                    </svg>
                                </div>
                            </div>



                            <div id="ct" class="">
                                <?php
                                $invoice_details = $conn->prepare("SELECT * FROM customer_invoice WHERE status='Active'");
                                $invoice_details->execute();
                                while ($row = $invoice_details->fetch(PDO::FETCH_OBJ)) {
                                ?>
                                 
                                    <div class="invoice-<?php echo $row->id; ?>">
                                        <div class="content-section  animated animatedFadeInUp fadeInUp">

                                            <div class="row inv--head-section">

                                                <div class="col-sm-6 col-12">
                                                    <h3 class="in-heading text-white">INVOICE</h3>
                                                </div>
                                                <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                    <div class="company-info">
                                                        
                                                        <h5 class="inv-brand-name"><i class="fa fa-medkit"></i> <?php echo $row_user->name; ?></h5>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row inv--detail-section">

                                                <div class="col-sm-7 align-self-center">
                                                    <p class="inv-to">Invoice To</p>
                                                </div>
                                                

                                                <div class="col-sm-7 align-self-center">
                                                    <p class="inv-customer-name"><?php echo $row->customer_name; ?></p>
                                                    <p class="inv-street-addr"><?php echo $row->customer_address; ?></p>
                                                    <p class="inv-email-address"><?php echo $row->customer_email; ?></p>
                                                </div>
                                                <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                                    <p class="inv-list-number"><span class="inv-title">Invoice Number : </span> <span class="inv-number"><?php echo $row->id; ?></span></p>
                                                    <p class="inv-created-date"><span class="inv-title">Invoice Date : </span> <span class="inv-date"><?php echo date("d M Y",strtotime($row->created_at)); ?></span></p>
                                                </div>
                                            </div>

                                            <div class="row inv--product-table-section">
                                                <div class="col-12">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead class="">
                                                                <tr>
                                                                    <th scope="col">S.No</th>
                                                                    <th scope="col">Description</th>
                                                                    <th class="text-right" scope="col">Qty</th>
                                                                    <th class="text-right" scope="col">Unit Price</th>
                                                                    <th class="text-right" scope="col">Amount</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            $medicine_id = explode(",",$row->medicine_id);
                                                            $medicine_name = explode(",",$row->medicine_name);
                                                            $medicine_quantity = explode(",",$row->medicine_quantity);
                                                            $medicine_mrp = explode(",",$row->medicine_mrp);
                                                            $total_amount = explode(",",$row->total_amount);
                                                            $srn=0;
                                                            for($i=0; $i<count($medicine_id); $i++){
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $srn = $srn+1; ?></td>
                                                                    <td><?php echo $medicine_name[$i]; ?></td>
                                                                    <td class="text-right"><?php echo $medicine_quantity[$i]; ?></td>
                                                                    <td class="text-right"><i class="fa fa-rupee"></i> <?php echo number_format($medicine_mrp[$i],2); ?></td>
                                                                    <td class="text-right"><i class="fa fa-rupee"></i> <?php echo number_format($total_amount[$i],2); ?></td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                   
                                                </div>
                                                <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                    <div class="inv--total-amounts text-sm-right">
                                                        <div class="row">
                                                            <div class="col-sm-8 col-7">
                                                                <p class="">Sub Total: </p>
                                                            </div>
                                                            <div class="col-sm-4 col-5">
                                                                <p class=""><i class="fa fa-rupee"></i> <?php echo number_format($row->sub_total,2); ?></p>
                                                            </div>
                                                            
                                                            <div class="col-sm-8 col-7">
                                                                <p class=" discount-rate">Discount : </p>
                                                            </div>
                                                            <div class="col-sm-4 col-5">
                                                                <p class=""><i class="fa fa-rupee"></i> <?php echo number_format($row->discount,2); ?></p>
                                                            </div>
                                                            <div class="col-sm-8 col-7 grand-total-title">
                                                                <h4 class="text-white">Grand Total : </h4>
                                                            </div>
                                                            <div class="col-sm-4 col-5 grand-total-amount">
                                                                <h4 class="text-white"><i class="fa fa-rupee"></i> <?php echo number_format($row->grand_total,2); ?></h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>