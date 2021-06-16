<?php include "header.php"; ?>

<!--  BEGIN CONTENT PART  -->
<div id="content" class="main-content" data-value="dashboard">
    <div class="layout-px-spacing mt-5">
        <div class="row layout-top-spacing">

            <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                        <div class="widget widget-account-invoice-two">
                            <div class="widget-content">
                                <div class="account-box">
                                    <div class="info">
                                        <h5 class="stock-header">Total Tablet Stock</h5>
                                        
                                    </div>
                                    <div class="info">
                                        <h5 class="">Items:</h5>
                                        <p class="inv-balance"><?php echo $total_tab; ?></p>
                                        <h5 class="">Amount:</h5>
                                        <p class="inv-balance"><i class="fa fa-rupee"></i> <?php echo number_format($total_tab_amount,2); ?></p>
                                    </div>
                                    <div class="acc-action">
                                        <div class="">
                                            <a href="add-medicine"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                                </svg></a>
                                            
                                        </div>
                                        <a href="manage-medicine">Update</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                        <div class="widget widget-account-invoice-two">
                            <div class="widget-content">
                                <div class="account-box">
                                    <div class="info">
                                        <h5 class="stock-header">Total Capsule Stock</h5>
                                        
                                    </div>
                                    <div class="info">
                                        <h5 class="">Items:</h5>
                                        <p class="inv-balance"><?php echo $total_cap; ?></p>
                                        <h5 class="">Amount:</h5>
                                        <p class="inv-balance"><i class="fa fa-rupee"></i> <?php echo number_format($total_cap_amount,2); ?></p>
                                    </div>
                                    <div class="acc-action">
                                        <div class="">
                                            <a href="add-medicine"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                                </svg></a>
                                            
                                        </div>
                                        <a href="manage-medicine">Update</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                        <div class="widget widget-account-invoice-two">
                            <div class="widget-content">
                                <div class="account-box">
                                    <div class="info">
                                        <h5 class="stock-header">Total Syrup Stock</h5>
                                        
                                    </div>
                                    <div class="info">
                                        <h5 class="">Items:</h5>
                                        <p class="inv-balance"><?php echo $total_syp; ?></p>
                                        <h5 class="">Amount:</h5>
                                        <p class="inv-balance"><i class="fa fa-rupee"></i> <?php echo number_format($total_syp_amount,2); ?></p>
                                    </div>
                                    <div class="acc-action">
                                        <div class="">
                                            <a href="add-medicine"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                                </svg></a>
                                            
                                        </div>
                                        <a href="manage-medicine">Update</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                        <div class="widget widget-account-invoice-two">
                            <div class="widget-content">
                                <div class="account-box">
                                    <div class="info">
                                        <h5 class="stock-header">Total Injection Stock</h5>
                                        
                                    </div>
                                    <div class="info">
                                        <h5 class="">Items:</h5>
                                        <p class="inv-balance"><?php echo $total_inj; ?></p>
                                        <h5 class="">Amount:</h5>
                                        <p class="inv-balance"><i class="fa fa-rupee"></i> <?php echo number_format($total_inj_amount,2); ?></p>
                                    </div>
                                    <div class="acc-action">
                                        <div class="">
                                            <a href="add-medicine"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                                </svg></a>
                                            
                                        </div>
                                        <a href="manage-medicine">Update</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                        <div class="widget widget-account-invoice-two">
                            <div class="widget-content">
                                <div class="account-box">
                                    <div class="info">
                                        <h5 class="stock-header">Total Other Stock</h5>
                                        
                                    </div>
                                    <div class="info">
                                        <h5 class="">Items:</h5>
                                        <p class="inv-balance"><?php echo $total_other; ?></p>
                                        <h5 class="">Amount:</h5>
                                        <p class="inv-balance"><i class="fa fa-rupee"></i> <?php echo number_format($total_other_amount,2); ?></p>
                                    </div>
                                    <div class="acc-action">
                                        <div class="">
                                            <a href="add-medicine"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                                </svg></a>
                                            
                                        </div>
                                        <a href="manage-medicine">Update</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                        <div class="widget widget-account-invoice-two">
                            <div class="widget-content">
                                <div class="account-box">
                                    <div class="info">
                                        <h5 class="stock-header">Total Stock</h5>
                                        
                                    </div>
                                    <div class="info">
                                        <h5 class="">Items:</h5>
                                        <p class="inv-balance"><?php echo $total_stock; ?></p>
                                        <h5 class="">Amount:</h5>
                                        <p class="inv-balance"><i class="fa fa-rupee"></i> <?php echo number_format($total_stock_amount,2); ?></p>
                                    </div>
                                    <div class="acc-action">
                                        <div class="">
                                        <a href="stock-review">Review</a>
                                            
                                        </div>
                                        <a href="manage-medicine">Manage</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-activity-three" style="display:<?php if ($row_user->notification_status != 'Active') { ?>none<?php } ?>">

                    <div class="widget-heading">
                        <h5 class="">Notifications</h5>
                    </div>

                    <div class="widget-content">

                        <div class="mt-container mx-auto">
                            <div class="timeline-line">
                                <?php
                                $medicine_notif = $conn->prepare("SELECT * FROM medicine WHERE status='Active' AND notification_status='Active' AND quantity<=notification_quantity");
                                $medicine_notif->execute();
                                $count_notif = $medicine_notif->rowCount();
                                if($count_notif>0){
                                while ($row_notif = $medicine_notif->fetch(PDO::FETCH_OBJ)) {

                                ?>
                                    <div class="item-timeline timeline-new">
                                        <div class="t-dot">
                                            <div class="t-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                                                    <polyline points="20 6 9 17 4 12"></polyline>
                                                </svg></div>
                                        </div>
                                        <div class="t-content">
                                            <a href="edit-medicine?mid=<?php echo $row_notif->id; ?>">
                                                <div class="t-uppercontent">
                                                    <h5><?php echo $row_notif->medicine_name; ?></h5>
                                                </div>
                                                <p><span>Remaining Qunatity:</span> <?php echo $row_notif->quantity; ?></p>
                                            </a>
                                        </div>
                                    </div>
                                <?php
                                }


                                }else{
                                    ?>
                                    <div class="item-timeline timeline-new">
                                    <p> No data available!</p>
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