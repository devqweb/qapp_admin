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
                                    <h4 class="header-title">Add New Trending Banner</h4>
                                    
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
                                                <?php echo form_open_multipart('new_trending_banner');?>                                                    
                                                    <div class="form-row">                                                        
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="order_slider">Order in Drag Slider <span class="text-danger">*</span></label>
                                                            <?php
                                                                $largest = 0;
                                                                if(set_value('order_slider') != null && !isset($save_status)) $largest = set_value('order_slider');
                                                                else if(isset($save_status) && $save_status == 0)  {
                                                                    $largest = set_value('order_slider');
                                                                }
                                                                else $largest = $order_slider['order_slider'] + 1;
                                                            ?>
                                                            <select id="order_slider" name="order_slider" class="form-control">
                                                                <?php
                                                                    for($i = 1; $i <= $order_slider['order_slider'] + 1; $i++) {
                                                                        if($i == $largest) echo "<option value='".$i."' selected>".$i."</option>";                                                                        
                                                                        else echo "<option value='".$i."'>".$i."</option>";
                                                                    }
                                                                ?>                                                                
                                                            </select>
                                                        </div>                                                       
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="banner_image">Banner Image <span class="text-danger">*</span></label>
                                                            <input type="file" id="banner_image" name="banner_image" class="form-control" placeholder="Category Icon">
                                                            <?php echo form_error('banner_image'); ?>
                                                            <span class="text-danger">GIF/JPG/JPEG/PNG Only, Max Size 1 MB, Dimention 660px X 454px</span>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-5">
                                                            <input type = "submit" name="submit" class="btn btn-primary waves-effect waves-light" value="Add Category">
                                                            &nbsp;&nbsp;&nbsp;
                                                            <input type="reset" name="reset" class="btn btn-danger" value="Cancel">
                                                        </div>
                                                    </div>
                                                <?php form_close(); ?>
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