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
                                                     
                                                       <?php echo $row_invoice->customer_name; ?>
                                                        
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