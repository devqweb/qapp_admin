<!-- header start-->

<!--header end-->

            <!-- ========== Left Sidebar Start ========== -->
            
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- FORM FOR CREATE NEW PROMOTION -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="header-title">Create New Promotion</h4>
                                    <script src="<?php echo base_url("assets/js/jquery.min.js") ?>"></script>
                                    
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-2">
                                                <div class="save-status">
                                                    <?php
                                                        if(isset($save_status)) {
                                                            echo '<div id="form-alert" class="alert '.$status_class.' alert-dismissible fade show col-md-6" role="alert">';
                                                                echo $status_msg;
                                                                echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>';
                                                            echo '</div>';
                                                            
                                                            echo '   <script>
                                                                        $(document).ready(function() {
                                                                            $("#form-alert").fadeTo(2000, 500).slideUp(1000);
                                                                        });
                                                                    </script>';
                                                        }
                                                    ?>
                                                </div>
                                                
                                                <?php echo form_open_multipart('new_promotion');?>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="promoType">Prmotion Type <span class="text-danger">*</span></label>    
                                                            <input type="text" id="promoType" name = "promoType" onchange=clearError(this); onpaste=clearError(this); onkeypress=clearError(this); value="<?php echo ($id) ? "" : set_value('promoType'); ?>" class="form-control" placeholder="Subscription Name" autofocus>
                                                            <?php echo form_error('promoType'); ?>
                                                            <div class="required_error ci-form-error text-align-left bold-500"></div>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="validity">Validity (Days) <span class="text-danger">*</span></label>
                                                            <input type="number" min="1" id="validity" name = "validity" onchange=clearError(this); onpaste=clearError(this); onkeypress=clearError(this); value="<?php echo ($id) ? "" : set_value('validity'); ?>" class="form-control my-field-natural" placeholder="Number of Tags up to">
                                                            <?php echo form_error('validity'); ?>
                                                            <div class="required_error ci-form-error text-align-left bold-500"></div>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="price">Price (Qatari Riyal) <span class="text-danger">*</span></label>
                                                            <input type="number" min="0" id="price" name = "price" onchange=clearError(this); onpaste=clearError(this); onkeypress=clearError(this); value="<?php echo ($id) ? "" : set_value('price'); ?>" class="form-control my-field-natural" placeholder="Price per month">
                                                            <?php echo form_error('price'); ?>
                                                            <div class="required_error ci-form-error text-align-left bold-500"></div>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                        <label class="col-form-label" for="description">Description <span class="text-danger">*</span></label>
                                                            <textarea name="description" id="description" name="description" onchange=clearError(this); onpaste=clearError(this); onkeypress=clearError(this); cols="30" rows="5" class="form-control" placeholder="App Description" onchange=clearError(this); onpaste=clearError(this); onkeypress=clearError(this);><?php echo ($id) ? "" : set_value('description'); ?></textarea>
                                                            <?php echo form_error('description'); ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="image">Preview Image <span class="text-danger">*</span></label>
                                                            <input type="file" id="image" name="image" class="form-control" onchange=clearError(this);>
                                                            <?php echo form_error('image'); ?>
                                                            <span class="text-danger">GIF/JPG/JPEG/PNG Only, Max Size 2 MB, Max Dimention 2000px X 2000px</span>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-5">
                                                            <input type = "submit" name = "submit" class="btn btn-primary waves-effect waves-light" value="Create Promotion">
                                                            </a> &nbsp;&nbsp;&nbsp;
                                                            <input type="reset" class="btn btn-danger" value="Cancel">
                                                        </div>
                                                    </div>
                                                <?php echo form_close();?>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- end row -->

                                </div> <!-- end card-box -->
                            </div><!-- end col -->
                        </div>
                        <!-- FORM FOR CREATE NEW PROMOTION -->

                        <!-- end row -->
                        
                    </div> <!-- container-fluid -->

                </div> <!-- content -->