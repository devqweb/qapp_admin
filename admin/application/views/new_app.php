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
                                                            <label class="col-form-label" for="nameOfApp">Name of the App*</label>    
                                                            <input type="text" id="nameOfApp" name="nameOfApp" value="<?php echo set_value('nameOfApp'); ?>" class="form-control" placeholder="Name of the App" autofocus>
                                                            <?php echo form_error('nameOfApp'); ?>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="companyName">Company Name*</label>
                                                            <input type="text" id="companyName" name="companyName" value="<?php echo set_value('companyName'); ?>" class="form-control" placeholder="Company Name">
                                                            <?php echo form_error('companyName'); ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">                                                        
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="contactPerson">Contact Person*</label>
                                                            <input type="text" id="contactPerson" name="contactPerson" value="<?php echo set_value('contactPerson'); ?>" class="form-control" placeholder="Contact Person">
                                                            <?php echo form_error('contactPerson'); ?>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="mobileNumber">Mobile Number*</label>
                                                            <input type="mobile" id="mobileNumber" name="mobileNumber" value="<?php echo set_value('mobileNumber'); ?>" class="form-control" placeholder="Mobile Number">
                                                            <?php echo form_error('mobileNumber'); ?>
                                                        </div>                                                        
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="whatsapp">WhatsApp Number</label>
                                                            <input type="mobile" id="whatsapp" name="whatsapp" value="<?php echo set_value('whatsapp'); ?>" class="form-control" placeholder="WhatsApp Number">
                                                            <?php echo form_error('whatsapp'); ?>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="email">E-Mail*</label>
                                                            <input type="email" name="email" id="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="E-Mail">
                                                            <?php echo form_error('email'); ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="category">Category of The App</label>
                                                            <select class="form-control" id="category" name="category">
                                                                <option value="">-- Select Category--</option>
                                                                 <?php 
                                                                    foreach($category as $row) { 
                                                                        echo '<option value="'.$row->cat_id.'">'.$row->name.'</option>';
                                                                    }
                                                                ?>
                                                            </select>
                                                            <?php
                                                                // $js = 'class="form-control"';
                                                                // $options = array();
                                                                // foreach($category as $row) {
                                                                //     echo $row->cat_id.", ".$row->name;
                                                                // }
                                                                
                                                                // echo form_dropdown('category', $options, 'large', $js);
                                                                
                                                            ?>
                                                            
                                                            
                                                            <?php //echo form_error('category'); ?>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="dateOfLastUpdate">Date of Last Update</label>
                                                            <input type="date" id="dateOfLastUpdate" name="dateOfLastUpdate" value="<?php echo set_value('dateOfLastUpdate'); ?>" class="form-control">
                                                            <?php echo form_error('dateOfLastUpdate'); ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <label class="col-form-label" for="tags">Tags</label>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name = "tags" value="<?php echo set_value('tags'); ?>" data-role="tagsinput">
                                                            <?php echo form_error('tags'); ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="col-form-label" for="description">App Description*</label>
                                                            <textarea name="description" id="description" name="description" cols="30" rows="5" class="form-control" placeholder="App Description"><?php echo set_value('description'); ?></textarea>
                                                            <?php echo form_error('description'); ?>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="videoLink">Video Link</label>
                                                            <input type="url" id="videoLink" name="videoLink" value="<?php echo set_value('videoLink'); ?>" class="form-control" placeholder="https://www.youtube.com/myvideo">
                                                            <?php echo form_error('videoLink'); ?>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="androidLink">Android Link</label>
                                                            <input type="url" id="androidLink" name="androidLink" value="<?php echo set_value('androidLink'); ?>" class="form-control" placeholder="https://www.playstore.com/myapp">
                                                            <?php echo form_error('androidLink'); ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="iosLink">IOS Link</label>
                                                            <input type="url" id="iosLink" name="iosLink" value="<?php echo set_value('iosLink'); ?>" class="form-control" placeholder="https://www.appstore.com/myapp">
                                                            <?php echo form_error('iosLink'); ?>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="instaLink">Instagram Link</label>
                                                            <input type="url" id="instaLink" name="instaLink" value="<?php echo set_value('instaLink'); ?>" class="form-control" placeholder="https://www.instagram.com/myapp">
                                                            <?php echo form_error('instaLink'); ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="fbLink">Facebook Link</label>
                                                            <input type="url" id="fbLink" name="fbLink" value="<?php echo set_value('fbLink'); ?>" class="form-control" placeholder="https://www.facebook.com/myapp">
                                                            <?php echo form_error('fbLink'); ?>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="website">Website</label>
                                                            <input type="url" id="website" name="website" value="<?php echo set_value('website'); ?>" class="form-control" placeholder="https://www.myapp.com">
                                                            <?php echo form_error('website'); ?> 
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="rating">App Rating*</label>
                                                            <input type="text" id="rating" name="rating" value="<?php echo set_value('rating'); ?>" class="form-control" placeholder="3.5, 4.4, etc">
                                                            <?php echo form_error('rating'); ?>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="appIstalls">Number of App Installs*</label>
                                                            <input type="number" id="appIstalls" name="appIstalls" value="<?php echo set_value('appIstalls'); ?>" class="form-control" placeholder="Number of App Installs">
                                                            <?php echo form_error('appIstalls'); ?>
                                                        </div>                                                      
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="appsize">Size of The App(MB)*</label>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <input type="text" name="appsize" value="<?php echo set_value('appsize'); ?>" id="appsize" class="form-control" placeholder="Size in MB">
                                                                </div>
                                                            </div>
                                                            <?php echo form_error('appsize'); ?>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="appLanguage">Languages in the App</label>
                                                            <div class="col-md-6 checkbox checkbox-blue">
                                                                <span>
                                                                    <input id="english" name="english" value=1 type="checkbox" data-parsley-multiple="group1">
                                                                    <label for="english"> English </label>
                                                                </span>&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <span>
                                                                    <input id="arabic" name="arabic" value=1 type="checkbox" data-parsley-multiple="group1">
                                                                    <label for="arabic"> Arabic </label>
                                                                </span>
                                                            </div>
                                                            <?php echo form_error('language'); ?>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="icon">App Icon*</label>
                                                            <input type="file" id="icon" name="icon" class="form-control">
                                                            <?php echo form_error('icon'); ?>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="screenshots">Screenshots*</label>
                                                            <input type="file" id="screenshots" name="screenshots[]" multiple="multiple" class="form-control">
                                                            <?php echo form_error('screenshots'); ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="col-md-12 checkbox checkbox-blue">
                                                            <span>
                                                                <input id="termsAndCondition" type="checkbox" name="tnc" value=1 data-parsley-multiple="group1">
                                                                <label for="termsAndCondition"> <strong>Terms and Condition</strong> </label>
                                                            </span>
                                                            <p for="termsAndCondition">
                                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                                            </p>
                                                            <?php echo form_error('tnc')."<br/>";?>
                                                        </div>
                                                        <div class="col-md-12 checkbox checkbox-blue">
                                                            <span>
                                                                <input id="authorConfirm" type="checkbox" name="authorConfirm" value=1 data-parsley-multiple="group1">
                                                                <label for="authorConfirm"> <strong>Authorization Confirmation</strong> </label>
                                                            </span>
                                                            <p for="termsAndCondition">
                                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                                            </p>
                                                            <?php echo form_error('authorConfirm')."<br/>";?>
                                                        </div>
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