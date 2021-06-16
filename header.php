<?php
session_start();
include "conn.php";
date_default_timezone_set("Asia/Kolkata");
$notification_date = date('d-m-Y');
if (!isset($_SESSION['idadmin'])) {
    header("location:login");
}
$user = $conn->prepare("SELECT * FROM admin_login WHERE admin_id='" . $_SESSION['idadmin'] . "'");
$user->execute();
$row_user = $user->fetch(PDO::FETCH_OBJ);
$medicine_notification = $conn->prepare("SELECT * FROM medicine WHERE status='Active' AND notification_status='Active' AND quantity<=notification_quantity");
$medicine_notification->execute();
$count_notification = $medicine_notification->rowCount();

$stock_medicine = $conn->prepare("SELECT * FROM medicine WHERE status='Active'");
$stock_medicine->execute();
$total_stock = $stock_medicine->rowCount();
$total_tab = 0;
$total_cap = 0;
$total_syp = 0;
$total_inj = 0;
$total_other = 0;
$total_tab_amount = 0;
$total_cap_amount = 0;
$total_syp_amount = 0;
$total_inj_amount = 0;
$total_other_amount = 0;
$total_stock_amount = 0;
while ($row_stock = $stock_medicine->fetch(PDO::FETCH_OBJ)) {
    $total_stock_amount += $row_stock->quantity * $row_stock->mrp;
    if ($row_stock->medicine_type == 'Tab') {
        $total_tab += 1;
        $total_tab_amount += $row_stock->quantity * $row_stock->mrp;
    }
    if ($row_stock->medicine_type == 'Cap') {
        $total_cap += 1;
        $total_cap_amount += $row_stock->quantity * $row_stock->mrp;
    }
    if ($row_stock->medicine_type == 'Syp') {
        $total_syp += 1;
        $total_syp_amount += $row_stock->quantity * $row_stock->mrp;
    }
    if ($row_stock->medicine_type == 'Inj') {
        $total_inj += 1;
        $total_inj_amount += $row_stock->quantity * $row_stock->mrp;
    }
    if ($row_stock->medicine_type == 'Other') {
        $total_other += 1;
        $total_other_amount += $row_stock->quantity * $row_stock->mrp;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Medical Shop </title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="assets/css/dashboard/dash_2.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
    <!-- END PAGE LEVEL CUSTOM STYLES -->

   
  
    <link href="assets/css/apps/invoice.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	

  <style>
  body {
	font-family: Arial, Helvetica, sans-serif;
}

table {
	font-size: 1em;
}

.ui-draggable, .ui-droppable {
	background-position: top;
}

.custom-combobox {
		position: relative;
		display: inline-block;
	}
	.custom-combobox-toggle {
		position: absolute;
		top: 0;
		bottom: 0;
		margin-left: -1px;
		padding: 0;
	}
	.custom-combobox-input {
		margin: 0;
		padding: 5px 10px;
	}
  </style>



</head>

<body class="alt-menu sidebar-noneoverflow">





    <!--  BEGIN NAVBAR  -->
    <div class="header-container">
        <header class="header navbar navbar-expand-sm">

            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg></a>

            <div class="nav-logo align-self-center">
                <a class="navbar-brand" href="./"><img alt="logo" src="assets/img/logo.png"></a>
            </div>

            <ul class="navbar-item flex-row mr-auto">
                <li class="nav-item align-self-center search-animated">
                    <form class="form-inline search-full form-inline search" action="update-stock" role="search">
                        <div class="search-bar">
                            <input type="text" name="search" class="form-control search-form-control  ml-lg-auto" placeholder="Search..." autocomplete="off" value="<?php if (isset($_GET['search'])) { echo $_GET['search']; } ?>">
                        </div>
                    </form>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search toggle-search">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </li>
            </ul>

            <ul class="navbar-item flex-row nav-dropdowns">
                <li class="nav-item dropdown notification-dropdown" style="display:<?php if ($row_user->notification_status != 'Active') { ?>none<?php } ?>">
<a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown" data-toggle="<?php if($count_notification>0){ ?>dropdown<?php } ?>" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg><span class="badge badge-success"><?php echo $count_notification; ?></span>
                    </a>
                    <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="notificationDropdown">
                        <div class="notification-scroll">
                            <?php
                            while ($row_notification = $medicine_notification->fetch(PDO::FETCH_OBJ)) {

                            ?>
                                <div class="dropdown-item">
                                    <div class="media server-log">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server">
                                            <rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect>
                                            <rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect>
                                            <line x1="6" y1="6" x2="6" y2="6"></line>
                                            <line x1="6" y1="18" x2="6" y2="18"></line>
                                        </svg>
                                        <div class="media-body">
                                            <a href="edit-medicine?mid=<?php echo $row_notification->id; ?>">
                                                <div class="data-info">

                                                    <h6 class=""><?php echo $row_notification->medicine_name; ?></h6>
                                                    <p class="">Quantity: <?php echo $row_notification->quantity; ?></p>
                                                </div>
                                            </a>
                                            <div class="icon-status">
                                                <a href="edit-medicine?mid=<?php echo $row_notification->id; ?>">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                                                        <polyline points="20 6 9 17 4 12"></polyline>
                                                    </svg>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown user-profile-dropdown order-lg-0 order-1">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="user-profile-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media">
                            <?php if ($row_user->image == '') { ?>
                                <img alt="Profile Image" class="img-fluid" src="assets/img/dummy-profile.jpg">
                            <?php } else { ?>
                                <img alt="Profile Image" class="img-fluid" src="uploads/<?php echo $row_user->image; ?>">
                            <?php } ?>
                            <div class="media-body align-self-center">
                                <h6><span>Hi,</span> <?php echo $row_user->name; ?></h6>
                            </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </a>
                    <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="user-profile-dropdown">
                        <div class="">
                            <div class="dropdown-item">
                                <a class="" href="profile"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg> My Profile</a>
                            </div>
                            <div class="dropdown-item">
                                <a class="" href="logout"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg> Sign Out</a>
                            </div>
                        </div>
                    </div>

                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN TOPBAR  -->
        <div class="topbar-nav header navbar" role="banner">
            <nav id="topbar" class="">
                <ul class="navbar-nav theme-brand flex-row  text-center">
                    <li class="nav-item theme-logo">
                        <a href="./">
                            <img src="assets/img/logo.png" class="navbar-logo" alt="logo">
                        </a>
                    </li>
                </ul>

                <ul class="list-unstyled menu-categories" id="topAccordion">

                    <li class="menu single-menu dashboard">
                        <a href="./" class="dropdown-toggle autodroprown">
                            <div class="">
                                <span><i class="fa fa-home"></i> Dashboard</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu single-menu billing">
                        <a href="invoice-list" aria-expanded="false" class="dropdown-toggle">
                            <div class="">

                                <span><i class="fa fa-rupee"></i> Billing</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="billing" data-parent="#topAccordion">
                            <li class="new-invoice">
                                <a href="new-invoice"> New Invoice </a>
                            </li>
                            <li class="invoice-list">
                                <a href="invoice-list"> Invoice List</a>
                            </li>

                        </ul>
                    </li>

                    <li class="menu single-menu stock-review">
                        <a href="stock-review" class="dropdown-toggle">
                            <div class="">

                                <span><i class="fa fa-star-o"></i> Stock Review</span>
                            </div>
                        </a>
                    </li>


                    <li class="menu single-menu medicine ">
                        <a href="manage-medicine" class="dropdown-toggle">
                            <div class="">

                                <span><i class="fa fa-ambulance"></i> Medicine</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="uiKit" data-parent="#topAccordion">
                            <li class="add-medicine">
                                <a href="add-medicine"> Add Medicine </a>
                            </li>
                            <li class="manage-medicine">
                                <a href="manage-medicine"> Manage Medicine </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu single-menu update-stock">
                        <a href="update-stock" class="dropdown-toggle">
                            <div class="">
                                <span><i class="fa fa-pencil"></i> Update Stock</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu single-menu settings">
                        <a href="setting" class="dropdown-toggle">
                            <div class="">

                                <span><i class="fa fa-gear"></i> Settings</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </a>
                    </li>
                    <li class="menu single-menu add-customer">
                    <a href="customer.php" class="dropdown-toggle">
                            <div class="">
                                <span><i class="fa fa-user"></i>Customer</span>
                            </div>
                           
                        </a>
                        <ul class="collapse submenu list-unstyled" id="uiKit" data-parent="#topAccordion">
                            <li class="">
                            <a href="#" class=""  data-toggle="modal" data-target="#exampleModalCenter">
                         <span><i class=""></i> Add Customer</span></a>
                            </li>
                            <li class="">
                                <a href="customerlist.php">Customer list </a>
                            </li>
                        </ul>
                    </li>


        
            </nav>
        </div>
        <!--  END TOPBAR  -->

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content p-5">
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLongTitle">Add Customer</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form method="Post" action="addcustomer" id="newModalForm"> 
                                <input type="hidden" name="uid">
                                <label>Name</label>
                                <input type="text" name="name" id="name"></br>
                                
                                <label>Last Name</label>
                                <input type="text" name="lname" id="lname"></br>

                                <label>Contact no.</label>
                                <input type="text" name="phone" id="phone"></br>

                                <label>Address</label>
                                <input type="text" name="address" id="address"></br>

                                <button type="submit" name="submit" class="cstm-button">Add</button></br>
                            </form>
                            </div>
                            <div class="modal-footer justify-content-start">
                        
                            </div>
                        </div>
                    </div>
                </div>