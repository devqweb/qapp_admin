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

                        <!-- FORM FOR ADD NEW APP -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="header-title">Add New App</h4>
                                    
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-2">
                                                <?php echo form_open_multipart('new_app'); ?>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="nameOfApp">Name of the App</label>    
                                                            <input type="text" id="nameOfApp" name="nameOfApp" class="form-control" placeholder="Name of the App" autofocus>
                                                            <?php echo form_error(''); ?>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="companyName">Company Name</label>
                                                            <input type="text" id="companyName" name="companyName" class="form-control" placeholder="Company Name">
                                                            <?php echo form_error(''); ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">                                                        
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="contactPerson">Contact Person</label>
                                                            <input type="text" id="contactPerson" name="contactPerson" class="form-control" placeholder="Contact Person">
                                                            <?php echo form_error(''); ?>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="mobileNumber">Mobile Number</label>
                                                            <input type="mobile" id="mobileNumber" name="mobileNumber" class="form-control" placeholder="Mobile Number">
                                                            <?php echo form_error(''); ?>
                                                        </div>                                                        
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="whatsapp">WhatsApp Number</label>
                                                            <input type="mobile" id="whatsapp" name="whatsapp" class="form-control" placeholder="87456321">
                                                            <?php echo form_error(''); ?>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="email">E-Mail</label>
                                                            <input type="email" name="email" id="email" class="form-control" placeholder="E-Mail">
                                                            <?php echo form_error(''); ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="category">Category of The App</label>
                                                            <select class="form-control" name="category" id="category">
                                                                <option value="E-Commerse">E-Commerse</option>
                                                                <option value="Fitness">Fitness</option>
                                                                <option value="Restaurant">Restaurant</option>
                                                                <option value="News">News</option>
                                                            </select>
                                                            <?php echo form_error(''); ?>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="dateOfLastUpdate">Date of Last Update</label>
                                                            <input type="date" id="dateOfLastUpdate" name="dateOfLastUpdate" class="form-control">
                                                            <?php echo form_error(''); ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <label class="col-form-label" for="tags">Tags</label>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name = "tags" data-role="tagsinput">
                                                            <?php echo form_error(''); ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="col-form-label" for="description">App Description</label>
                                                            <textarea name="description" id="description" name="description" cols="30" rows="5" class="form-control" placeholder="App Description"></textarea>
                                                            <?php echo form_error(''); ?>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="videoLink">Video Link</label>
                                                            <input type="url" id="videoLink" name="videoLink" class="form-control" placeholder="https://www.youtube.com/myvideo">
                                                            <?php echo form_error(''); ?>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="androidLink">Android Link</label>
                                                            <input type="url" id="androidLink" name="androidLink" class="form-control" placeholder="https://www.playstore.com/myapp">
                                                            <?php echo form_error(''); ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="iosLink">IOS Link</label>
                                                            <input type="url" id="iosLink" name="iosLink" class="form-control" placeholder="https://www.appstore.com/myapp">
                                                            <?php echo form_error(''); ?>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="instaLink">Instagram Link</label>
                                                            <input type="url" id="instaLink" name="instaLink" class="form-control" placeholder="https://www.instagram.com/myapp">
                                                            <?php echo form_error(''); ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="fbLink">Facebook Link</label>
                                                            <input type="url" id="fbLink" name="fbLink" class="form-control" placeholder="https://www.facebook.com/myapp">
                                                            <?php echo form_error(''); ?>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="website">Website</label>
                                                            <input type="url" id="website" name="website" class="form-control" placeholder="https://www.myapp.com">
                                                            <?php echo form_error(''); ?> 
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="rating">App Rating</label>
                                                            <input type="text" id="rating" name="rating" class="form-control" placeholder="3.5, 4.4, etc">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="appIstalls">Number of App Installs</label>
                                                            <input type="number" id="appIstalls" name="appIstalls" class="form-control" placeholder="Number of App Installs">
                                                            <?php echo form_error(''); ?>
                                                        </div>                                                      
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="appsize">Size of The App(MB)</label>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <input type="number" name="appsize" id="appsize" class="form-control" placeholder="Size in MB">
                                                                    <?php echo form_error(''); ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="appLanguage">Languages in the App</label>
                                                            <div class="col-md-6 checkbox checkbox-blue">
                                                                <span>
                                                                    <input id="english" name="english" type="checkbox" data-parsley-multiple="group1">
                                                                    <label for="english"> English </label>
                                                                </span>&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <span>
                                                                    <input id="arabic" name="arabic" type="checkbox" data-parsley-multiple="group1">
                                                                    <label for="arabic"> Arabic </label>
                                                                </span>
                                                            </div>
                                                            <?php echo form_error(''); ?>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="icon">App Icon</label>
                                                            <input type="file" id="icon" name="icon" class="form-control">
                                                            <?php echo form_error(''); ?>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="screenshots">Screenshots</label>
                                                            <input type="file" id="screenshots" name="screenshots" multiple id="screenshots" class="form-control">
                                                            <?php echo form_error(''); ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="col-md-12 checkbox checkbox-blue">
                                                            <span>
                                                                <input id="termsAndCondition" type="checkbox" name="tnc" data-parsley-multiple="group1">
                                                                <label for="termsAndCondition"> <strong>Terms and Condition</strong> </label>
                                                            </span>
                                                            <p for="termsAndCondition">
                                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                                            </p>
                                                            
                                                        </div>
                                                        <div class="col-md-12 checkbox checkbox-blue">
                                                            <span>
                                                                <input id="authorConfirm" type="checkbox" name="authorConfirm" data-parsley-multiple="group1">
                                                                <label for="authorConfirm"> <strong>Authorization Confirmation</strong> </label>
                                                            </span>
                                                            <p for="termsAndCondition">
                                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                                            </p>
                                                            
                                                        </div>
                                                        <?php echo form_error(''); ?>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-5">
                                                            <input type="submit" name="submit" value="Add App" class="btn btn-success waves-effect waves-light">
                                                            &nbsp;&nbsp;&nbsp;
                                                            <a href="" class="btn btn-secondary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-xl">
                                                                Save and Mobile Preview
                                                            </a> &nbsp;&nbsp;&nbsp;
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