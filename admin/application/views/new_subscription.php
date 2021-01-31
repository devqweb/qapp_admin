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
                        
                        <!-- FORM FOR CREATE NEW SUBSCRIPTION -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="header-title">Create New Subscription</h4>
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
                                                
                                                <?php echo form_open_multipart('new_subscription');?>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="subName">Subscriptoin Name <span class="text-danger">*</span></label>    
                                                            <input type="text" id="subName" name = "subName" value="<?php echo ($id) ? "" : set_value('subName'); ?>" class="form-control" placeholder="Subscription Name" autofocus>
                                                            <?php echo form_error('subName'); ?>
                                                            <div class="required_error ci-form-error text-align-left bold-500"></div>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="numOfTags">Numebr of Tags <span class="text-danger">*</span></label>
                                                            <input type="number" min="1" id="numOfTags" name = "numOfTags" value="<?php echo ($id) ? "" : set_value('numOfTags'); ?>" class="form-control my-field-natural" placeholder="Number of Tags up to">
                                                            <?php echo form_error('numOfTags'); ?>
                                                            <div class="required_error ci-form-error text-align-left bold-500"></div>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="">Featured Listing <span class="text-danger">*</span></label>
                                                            <div class="col-md-2 flex justify-space-between pd-left-right-0">
                                                                <?php
                                                                    $featured = ($id) ? 0 : set_value('featured');
                                                                ?>
                                                                <span>
                                                                    <input type="radio" id="featured_yes" name = "featured" value=1 class="" <?php if($featured == 1) echo "checked"; ?>>
                                                                    <label for="featured_yes">Yes</label>
                                                                </span>
                                                                <span>
                                                                    <input type="radio" id="featured_no" name = "featured" value=-1 class="" <?php if($featured == -1) echo "checked"; else echo ""; ?>>
                                                                    <label for="featured_no">No</label><br>
                                                                </span>
                                                            </div>
                                                            <?php echo form_error('featured'); ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="pricePerMonth">Price per month (Qatari Riyal) <span class="text-danger">*</span></label>
                                                            <input type="number" min="0" id="pricePerMonth" name = "pricePerMonth" value="<?php echo ($id) ? "" : set_value('pricePerMonth'); ?>" class="form-control my-field-natural" placeholder="Price per month">
                                                            <?php echo form_error('pricePerMonth'); ?>
                                                            <div class="required_error ci-form-error text-align-left bold-500"></div>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-5">
                                                            <input type = "submit" name = "submit" class="btn btn-primary waves-effect waves-light" value="Create Subscription">
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
                        <!-- FORM FOR CREATE NEW SUBSCRIPTON -->

                        <!-- end row -->
                        
                    </div> <!-- container-fluid -->

                </div> <!-- content -->