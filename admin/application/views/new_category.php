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
                                    
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-2">
                                                <?php echo form_open_multipart('new_category');?>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="catName">Category Name *</label>    
                                                            <input type="text" id="catName" name = "catName" class="form-control" placeholder="Category Name" autofocus>
                                                            <?php echo form_error('catName'); ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">                                                        
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="dsOrder">Order in Drag Slider *</label>
                                                            <input type="number" id="dsOrder" name = "dsOrder" class="form-control" placeholder="Order in Drag Slider">
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