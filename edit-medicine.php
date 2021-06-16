<?php
include "header.php";
$updateSelect = $conn->prepare("SELECT * FROM medicine WHERE id='" . $_GET['mid'] . "'");
$updateSelect->execute();
$updateRow = $updateSelect->fetch(PDO::FETCH_OBJ);
?>
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content" data-value="edit-medicine">
    <div class="layout-px-spacing">

        <div class="container mt-5">


            <form method="post" id="medicine-form" action="add-db">
                <input type="hidden" name="table" value="medicine">
                <input type="hidden" name="id" value="<?php echo $updateRow->id; ?>">
                <div class="form-row mb-4">
                    <div class="form-group col-md-12">
                        <label for="medicine_name">Medicine Name <span>*</span></label>
                        <input type="text" class="form-control" name="medicine_name" id="medicine_name" placeholder="Medicine Name" autocomplete="off" value="<?php echo $updateRow->medicine_name; ?>">
                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="form-group col-md-4">
                        <label for="batch_no">Batch No. <span>*</span></label>
                        <input type="number" class="form-control" name="batch_no" id="batch_no" placeholder="Batch No." autocomplete="off" value="<?php echo $updateRow->batch_no; ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="quantity">Quantity <span>*</span></label>
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity" autocomplete="off" value="<?php echo $updateRow->quantity; ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="notification_quantity">Notification Quantity <span>*</span></label>
                        <input type="number" class="form-control" id="notification_quantity" name="notification_quantity" placeholder="Notification Quantity" autocomplete="off" value="<?php echo $updateRow->notification_quantity; ?>">
                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="form-group col-md-6">
                        <label for="medicine_type">Medicine Type <span>*</span></label>
                        <div class="n-chk">
                            <label class="new-control new-radio radio-primary">
                                <input type="radio" class="new-control-input" name="medicine_type" value="Tab" autocomplete="off" <?php if ($updateRow->medicine_type == "Tab") { ?>checked<?php } ?>>
                                <span class="new-control-indicator"></span>Tab
                            </label>
                            <label class="new-control new-radio radio-primary">
                                <input type="radio" class="new-control-input" name="medicine_type" value="Cap" autocomplete="off" <?php if ($updateRow->medicine_type == "Cap") { ?>checked<?php } ?>>
                                <span class="new-control-indicator"></span>Cap
                            </label>
                            <label class="new-control new-radio radio-primary">
                                <input type="radio" class="new-control-input" name="medicine_type" value="Syp" autocomplete="off" <?php if ($updateRow->medicine_type == "Syp") { ?>checked<?php } ?>>
                                <span class="new-control-indicator"></span>Syp
                            </label>
                            <label class="new-control new-radio radio-primary">
                                <input type="radio" class="new-control-input" name="medicine_type" value="Inj" autocomplete="off" <?php if ($updateRow->medicine_type == "Inj") { ?>checked<?php } ?>>
                                <span class="new-control-indicator"></span>Inj
                            </label>
                            <label class="new-control new-radio radio-primary">
                                <input type="radio" class="new-control-input" name="medicine_type" value="Other" autocomplete="off" <?php if ($updateRow->medicine_type == "Other") { ?>checked<?php } ?>>
                                <span class="new-control-indicator"></span>Other
                            </label>
                            <div for="medicine_type" generated="true" class="help-inline"></div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div id="other-description" style="display:<?php if ($updateRow->medicine_type != "Other") { ?>none<?php } ?>">
                            <label for="medicine_type">Other Description <span>*</span></label>
                            <input type="text" class="form-control" id="other_type_description" name="other_type_description" placeholder="Description" autocomplete="off" value="<?php echo $updateRow->other_type_description; ?>">
                        </div>
                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="form-group col-md-6">
                        <label for="mrp">MRP/Pc <span>*</span></label>
                        <input type="number" class="form-control" name="mrp" id="mrp" placeholder="MRP/Pc." step="any" autocomplete="off" value="<?php echo $updateRow->mrp; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="price">Price <span>*</span></label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Price" step="any" autocomplete="off" value="<?php echo $updateRow->price; ?>">
                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="form-group col-md-6">
                        <label for="expiry">Expiry <span>*</span></label>
                        <div class="n-chk">
                            <label>
                                <select class="form-control" name="month" id="month">
                                    <?php
                                    for ($i = 0; $i < 12; $i++) {
                                        $month = date("F", strtotime("January +$i months"));
                                    ?>
                                        <option value="<?php echo $month; ?>" <?php if ($updateRow->month == $month) { ?>selected<?php } ?>><?php echo $month; ?></option>
                                    <?php } ?>
                                </select>
                            </label>
                            <label>
                                <input type="number" class="form-control" name="year" id="year" placeholder="Year" value="<?php echo $updateRow->year; ?>" autocomplete="off">

                            </label>
                            <div for="year" generated="true" class="help-inline"></div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="pharmacy">Pharmacy <span></span></label>
                        <input type="text" class="form-control" id="pharmacy" name="pharmacy" placeholder="Pharmacy" value="<?php echo $updateRow->pharmacy; ?>" autocomplete="off">
                    </div>
                </div>
                <input name="update" type="hidden">
                <button type="submit" class="btn btn-primary mt-3">Sumbit</button>
                <a href="manage-medicine" class="btn btn-default mt-3">Cancel</a>
            </form>

        </div>
    </div>
    <?php include "footer.php"; ?>