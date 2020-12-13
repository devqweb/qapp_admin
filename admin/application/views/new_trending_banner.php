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
                                                <?php echo form_open_multipart('new_trending_banner');?>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="banner_image">Banner Image *</label>
                                                            <input type="file" id="banner_image" name="banner_image" class="form-control" placeholder="Category Icon">
                                                            <?php echo form_error('banner_image'); ?>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-row">                                                        
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="banner_Order">Order in Drag Slider *</label>
                                                            <input type="number" id="banner_Order" name="banner_Order" class="form-control" placeholder="Order in Drag Slider">
                                                            <?php echo form_error('banner_Order'); ?>
                                                        </div>                                                       
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-5">
                                                            <input type = "submit" name="submit"class="btn btn-primary waves-effect waves-light" value="Add Category">
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