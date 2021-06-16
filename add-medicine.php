<?php include "header.php"; ?>
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content" data-value="add-medicine">
    <div class="layout-px-spacing">

        <div class="container mt-5">


            <form method="post" id="medicine-form" action="add-db">
                <input type="hidden" name="table" value="medicine">
                <input type="hidden" name="notification_view_date" value="<?php echo $notification_date; ?>">
                <div class="form-row mb-4">
                    <div class="form-group col-md-12">
                        <label for="medicine_name">Medicine Name <span>*</span></label>
                        <input type="text" class="form-control" name="medicine_name" id="medicine_name" placeholder="Medicine Name" autocomplete="off">
                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="form-group col-md-4">
                        <label for="batch_no">Batch No. <span>*</span></label>
                        <input type="text" class="form-control" name="batch_no" id="batch_no" placeholder="Batch No."  autocomplete="off">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="quantity">Quantity <span>*</span></label>
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity"  autocomplete="off" >
                    </div>
                    <div class="form-group col-md-4">
                        <label for="notification_quantity">Notification Quantity <span>*</span></label>
                        <input type="number" class="form-control" id="notification_quantity" name="notification_quantity" placeholder="Notification Quantity"  autocomplete="off">
                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="form-group col-md-6">
                        <label for="medicine_type">Medicine Type <span>*</span></label>
                        <div class="n-chk">
                            <label class="new-control new-radio radio-primary">
                                <input type="radio" class="new-control-input" name="medicine_type" value="Tab"  autocomplete="off">
                                <span class="new-control-indicator"></span>Tab
                            </label>
                            <label class="new-control new-radio radio-primary">
                                <input type="radio" class="new-control-input" name="medicine_type" value="Cap"  autocomplete="off">
                                <span class="new-control-indicator"></span>Cap
                            </label>
                            <label class="new-control new-radio radio-primary">
                                <input type="radio" class="new-control-input" name="medicine_type" value="Syp"  autocomplete="off">
                                <span class="new-control-indicator"></span>Syp
                            </label>
                            <label class="new-control new-radio radio-primary">
                                <input type="radio" class="new-control-input" name="medicine_type" value="Inj"  autocomplete="off">
                                <span class="new-control-indicator"></span>Inj
                            </label>
                            <label class="new-control new-radio radio-primary">
                                <input type="radio" class="new-control-input" name="medicine_type" value="Other"  autocomplete="off">
                                <span class="new-control-indicator"></span>Other
                            </label>
                            <div for="medicine_type" generated="true" class="help-inline"></div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div id="other-description" style="display:none">
                            <label for="medicine_type">Other Description <span>*</span></label>
                            <input type="text" class="form-control" id="other_type_description" name="other_type_description" placeholder="Description"  autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="form-group col-md-6">
                        <label for="mrp">MRP/Pc <span>*</span></label>
                        <input type="number" class="form-control" name="mrp" id="mrp" placeholder="MRP/Pc." step="any"  autocomplete="off">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="price">Price <span>*</span></label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Price" step="any"  autocomplete="off">
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
                                        <option value="<?php echo $month; ?>" <?php if($month==date("F")){ ?>selected<?php } ?>><?php echo $month; ?></option>
                                    <?php } ?>
                                </select>
                            </label>
                            <label>
                                <input type="number" class="form-control" name="year" id="year" placeholder="Year" value="<?php echo date("Y"); ?>"  autocomplete="off">

                            </label>
                            <div for="year" generated="true" class="help-inline"></div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="pharmacy">Pharmacy <span></span></label>
                        <input type="text" class="form-control" id="pharmacy" name="pharmacy" placeholder="Pharmacy" autocomplete="off">
                    </div>
                </div>
                <input name="submit" type="hidden">
                
                <button type="submit" class="btn btn-primary mt-3">Sumbit</button>
                <a href="./" class="btn btn-default mt-3">Cancel</a>
            </form>

        </div>
    </div>
    <?php include "footer.php"; ?>