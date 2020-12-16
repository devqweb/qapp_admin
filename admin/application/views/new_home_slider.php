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
                                    <h4 class="header-title">Add New Homer Slider</h4>
                                    
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
                                                <?php echo form_open_multipart('new_home_slider');?>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="title">Title *</label>
                                                            <input type="text" id="title" name="title" value="<?php echo ($id) ? "" : set_value('title'); ?>" class="form-control" placeholder="Title" autofocus>
                                                            <?php echo form_error('title'); ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">                                                        
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="des">Description *</label>
                                                            <textarea id="des" name="des" class="form-control" placeholder="Description"><?php echo ($id) ? "" : set_value('des'); ?></textarea>
                                                            <?php echo form_error('des'); ?>
                                                        </div>                                                       
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="btn_link">Button Link *</label>
                                                            <input type="url" id="btn_link" name="btn_link" value="<?php echo ($id) ? "" : set_value('btn_link'); ?>" class="form-control" placeholder="http://www.myapp.com">
                                                                <?php echo form_error('btn_link'); ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="order_slider">Order in Slider *</label>                                                            
                                                            <?php
                                                                $largest = 0;
                                                                if(set_value('order_slider') != null && !isset($save_status)) $largest = set_value('order_slider');
                                                                else if(isset($save_status) && $save_status == 0)  {
                                                                    $largest = set_value('order_slider');
                                                                }
                                                                else $largest = $order_slider[0]->order_slider + 1;
                                                            ?>
                                                            <input type="number" id="order_slider" name = "order_slider" value="<?php echo $largest; ?>" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                        <label class="col-form-label" for="slider_img">Image *</label>
                                                            <input type="file" id="slider_img" name="slider_img" class="form-control">
                                                            <?php echo form_error('slider_img'); ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <input type="submit" name="submit" class="btn btn-success waves-effect waves-light" value="Add To Home Slider">&nbsp;&nbsp;&nbsp;
                                                            <input type="reset" class="btn btn-danger" value="Cancel">
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