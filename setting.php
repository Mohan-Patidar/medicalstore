<?php include "header.php"; ?>
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content" data-value="settings">
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing" id="cancel-row">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

                <div class="widget-content widget-content-area br-6">
                    <div class="container">
                        <div class="form-row mt-4 text-center">
                            <div class="col-sm-6 col-12">
                                <label class="text-white">Set Notification</label>
                            </div>
                            <div class="col-sm-6 col-12">
                                <label class="switch s-icons s-outline s-outline-default mr-2">
                                    <input type="checkbox" id="set-notification" <?php if ($row_user->notification_status == 'Active') { ?>checked<?php } ?> value="<?php echo $row_user->notification_status; ?>">
                                    <span class="slider round"></span>
                                </label>
                            </div>

                        </div>
                        <div class="form-row mt-4 text-center">
                            <div class="col-sm-6 col-12">
                                <label class="text-white">Create Database Backup</label>
                            </div>
                            <div class="col-sm-6 col-12">
                                <a href="database-backup" class="btn btn-success">Backup</a>
                            </div>

                        </div>
                        <div class="form-row mt-4 text-center">
                            <div class="col-sm-6 col-12">
                                <label class="text-white">Restore Database</label>
                            </div>
                            <div class="col-sm-6 col-12">
                                <form id="restore-form" method="post" action="restore-backup" enctype="multipart/form-data">
                                <input type="hidden" name="restore">
                                    <input type="file" name="db_file" id="db_file" onchange="submitRestore();" style="display: none">
                                </form>
                                <a href="javascript:void(0);" class="btn btn-primary" id="restore">Restore</a>
                            </div>

                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>
    <?php include "footer.php"; ?>