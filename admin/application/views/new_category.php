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
                        
                        <!-- FORM FOR ADD NEW CATEGORY -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="header-title">Add New Category</h4>
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
                                                
                                                <?php echo form_open_multipart('new_category');?>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="catName">Category Name *</label>    
                                                            <input type="text" id="catName" name = "catName" value="<?php echo ($id) ? "" : set_value('catName'); ?>" class="form-control" placeholder="Category Name" autofocus>
                                                            <?php echo form_error('catName'); ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">                                                        
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="dsOrder">Order in Drag Slider</label>
                                                            <?php
                                                                $largest = 0;
                                                                if(set_value('dsOrder') != null && !isset($save_status)) $largest = set_value('dsOrder');
                                                                else if(isset($save_status) && $save_status == 0)  {
                                                                    $largest = set_value('dsOrder');
                                                                }
                                                                else  $largest = $order_in_slider['order_in_slider'] + 1;
                                                            ?>                                                            
                                                            <select class="form-control" id="dsOrder" name = "dsOrder">
                                                                <?php
                                                                    for($i = 1; $i <= $order_in_slider['order_in_slider']+1; $i++) {
                                                                        if($i == $largest) echo "<option value='".$i."' selected>".$i."</option>";                                                                        
                                                                        else echo "<option value='".$i."'>".$i."</option>";
                                                                    }
                                                                ?>
                                                            </select>
                                                            <?php echo form_error('dsOrder'); ?>
                                                        </div>                                                       
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="catIcon">Category Icon *</label>
                                                            <input type="file" id="catIcon" name = "catIcon" class="form-control" placeholder="Category Icon">
                                                            <?php echo form_error('catIcon'); ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-5">
                                                            <input type = "submit" name = "submit" class="btn btn-primary waves-effect waves-light" value="Add Category">
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
                        <!-- FORM FOR ADD NEW APP -->

                        <!-- end row -->
                        
                    </div> <!-- container-fluid -->

                </div> <!-- content -->