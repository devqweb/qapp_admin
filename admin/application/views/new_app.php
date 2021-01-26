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
                                            <div class="">
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
                                                <?php echo form_open_multipart('new_app'); ?>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label class="col-form-label" for="nameOfApp">Name of the App <span class="text-danger"> <span class="text-danger">*</span></label>  
                                                            <input type="text" id="nameOfApp" name="nameOfApp" value="<?php echo ($id) ? "" : set_value('nameOfApp'); ?>" class="form-control" placeholder="Name of the App" autofocus>
                                                            <?php echo form_error('nameOfApp'); ?>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="col-form-label" for="companyName">Company Name <span class="text-danger">*</span></label>
                                                            <input type="text" id="companyName" name="companyName" value="<?php echo ($id) ? "" : set_value('companyName'); ?>" class="form-control" placeholder="Company Name">
                                                            <?php echo form_error('companyName'); ?>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="col-form-label" for="contactPerson">Contact Person <span class="text-danger">*</span></label>
                                                            <input type="text" id="contactPerson" name="contactPerson" value="<?php echo ($id) ? "" : set_value('contactPerson'); ?>" class="form-control" placeholder="Contact Person">
                                                            <?php echo form_error('contactPerson'); ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label class="col-form-label" for="mobileNumber">Mobile Number <span class="text-danger">*</span></label>
                                                            <div class="flex">
                                                                <div class="col-md-5 padding-0">                                                                    
                                                                    <input type="hidden" id="hidden_telcode_mobile" value="<?php echo ($id) ? "" : set_value('telcode_mobile'); ?>">
                                                                    <select id="telcode_mobile" name="telcode_mobile" class="form-control telCode">
                                                                        <option value=''>-- Tel code --</option>
                                                                        <script>
                                                                            for(i = 0; i < telObj.length; i++) {
                                                                                let country_name, dial_code, code;
                                                                                country_name = telObj[i]['name'];
                                                                                dial_code = telObj[i]['dial_code'];
                                                                                code = telObj[i]['code'];
                                                                                if(document.getElementById("hidden_telcode_mobile").value == dial_code) {
                                                                                    document.getElementById("telcode_mobile").innerHTML += "<option value='"+dial_code+"' selected>"+country_name+" ("+code+") "+dial_code+"</option>";    
                                                                                }
                                                                                else document.getElementById("telcode_mobile").innerHTML += "<option value='"+dial_code+"'>"+country_name+" ("+code+") "+dial_code+"</option>";
                                                                            }
                                                                        </script>
                                                                    </select>
                                                                    <?php echo form_error('telcode_mobile'); ?>
                                                                </div>
                                                                <div class="col-md-6 offset-md-1 padding-0">
                                                                    <input type="tel" id="mobileNumber" name="mobileNumber" value="<?php echo ($id) ? "" : set_value('mobileNumber'); ?>" class="form-control" placeholder="Mobile Number">
                                                                    <?php echo form_error('mobileNumber'); ?>
                                                                </div>                                                                
                                                            </div>                                                            
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label class="col-form-label" for="whatsapp">WhatsApp Number</label>
                                                            <div class="flex">
                                                                <div class="col-md-5 padding-0">
                                                                    <input type="hidden" id="hidden_telcode_whatsapp" value="<?php echo ($id) ? "" : set_value('telcode_whatsapp'); ?>">
                                                                    <select id="telcode_whatsapp" name="telcode_whatsapp" class="form-control telCode">
                                                                        <option value=''>-- Tel code --</option>
                                                                        <script>
                                                                            for(i = 0; i < telObj.length; i++) {
                                                                                let country_name, dial_code, code;
                                                                                country_name = telObj[i]['name'];
                                                                                dial_code = telObj[i]['dial_code'];
                                                                                code = telObj[i]['code'];
                                                                                if(document.getElementById("hidden_telcode_whatsapp").value == dial_code) {
                                                                                    document.getElementById("telcode_whatsapp").innerHTML += "<option value='"+dial_code+"' selected>"+country_name+" ("+code+") "+dial_code+"</option>";    
                                                                                }
                                                                                else document.getElementById("telcode_whatsapp").innerHTML += "<option value='"+dial_code+"'>"+country_name+" ("+code+") "+dial_code+"</option>";
                                                                            }
                                                                        </script>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6 offset-md-1 padding-0">
                                                                    <input type="tel" id="whatsappNumber" name="whatsapp" value="<?php echo ($id) ? "" : set_value('whatsapp'); ?>" class="form-control" placeholder="WhatsApp Number">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group col-md-4">
                                                            <label class="col-form-label" for="email">E-Mail <span class="text-danger">*</span></label>
                                                            <input type="email" name="email" id="email" value="<?php echo ($id) ? "" : set_value('email'); ?>" class="form-control" placeholder="E-Mail">
                                                            <?php echo form_error('email'); ?>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label class="col-form-label" for="category">Category of The App  <span class="text-danger">*</span></label>
                                                            <select class="form-control" id="category" name="category">
                                                                <option value="">-- Select Category --</option>                                                                
                                                                 <?php
                                                                    foreach($category as $row) {
                                                                        if($row->enable_disable == 1) {
                                                                            if(!$id && $row->cat_id == set_value('category')) {
                                                                                echo '<option value="'.$row->cat_id.'" selected>'.$row->name.'</option>';
                                                                                continue;
                                                                            }
                                                                            echo '<option value="'.$row->cat_id.'">'.$row->name.'</option>';
                                                                        }
                                                                    }
                                                                ?>
                                                            </select>
                                                            <?php echo form_error('category'); ?>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="col-form-label" for="dateOfLastUpdate">Date of Last Update</label>
                                                            <input type="date" id="dateOfLastUpdate" name="dateOfLastUpdate" value="<?php echo ($id) ? "" : set_value('dateOfLastUpdate'); ?>" class="form-control">
                                                            <?php echo form_error('dateOfLastUpdate'); ?>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="col-form-label" for="videoLink">Video Link</label>
                                                            <input type="url" id="videoLink" name="videoLink" value="<?php echo ($id) ? "" : set_value('videoLink'); ?>" class="form-control" placeholder="https://www.youtube.com/myvideo">
                                                            <?php echo form_error('videoLink'); ?>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label class="col-form-label" for="androidLink">Android Link</label>
                                                            <input type="url" id="androidLink" name="androidLink" value="<?php echo ($id) ? "" : set_value('androidLink'); ?>" class="form-control" placeholder="https://www.playstore.com/myapp">
                                                            <?php echo form_error('androidLink'); ?>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="col-form-label" for="iosLink">IOS Link</label>
                                                            <input type="url" id="iosLink" name="iosLink" value="<?php echo ($id) ? "" : set_value('iosLink'); ?>" class="form-control" placeholder="https://www.appstore.com/myapp">
                                                            <?php echo form_error('iosLink'); ?>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="col-form-label" for="instaLink">Instagram Link</label>
                                                            <input type="url" id="instaLink" name="instaLink" value="<?php echo ($id) ? "" : set_value('instaLink'); ?>" class="form-control" placeholder="https://www.instagram.com/myapp">
                                                            <?php echo form_error('instaLink'); ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label class="col-form-label" for="fbLink">Facebook Link</label>
                                                            <input type="url" id="fbLink" name="fbLink" value="<?php echo ($id) ? "" : set_value('fbLink'); ?>" class="form-control" placeholder="https://www.facebook.com/myapp">
                                                            <?php echo form_error('fbLink'); ?>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="col-form-label" for="website">Website</label>
                                                            <input type="url" id="website" name="website" value="<?php echo ($id) ? "" : set_value('website'); ?>" class="form-control" placeholder="https://www.myapp.com">
                                                            <?php echo form_error('website'); ?> 
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="col-form-label" for="rating">App Rating <span class="text-danger">*</span></label>
                                                            <input type="text" id="rating" name="rating" value="<?php echo ($id) ? "" : set_value('rating'); ?>" class="form-control" placeholder="3.5, 4.4, etc">
                                                            <?php echo form_error('rating'); ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label class="col-form-label" for="appIstalls">Number of App Installs <span class="text-danger">*</span></label>
                                                            <input type="number" id="appIstalls" name="appIstalls" value="<?php echo ($id) ? "" : set_value('appIstalls'); ?>" class="form-control" placeholder="Number of App Installs">
                                                            <?php echo form_error('appIstalls'); ?>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="col-form-label" for="appsize">Size of The App(MB) <span class="text-danger">*</span></label>
                                                            <input type="text" name="appsize" value="<?php echo ($id) ? "" : set_value('appsize'); ?>" id="appsize" class="form-control" placeholder="Size in MB">
                                                            <?php echo form_error('appsize'); ?>
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label class="col-form-label" for="appLanguage">Languages in the App  <span class="text-danger">*</span></label>
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
                                                        <div class="form-group col-md-12">
                                                            <label class="col-form-label" for="tags">Tags *</label>
                                                            <input type="text" class="form-control" name = "tags" value="<?php echo ($id) ? "" : set_value('tags'); ?>" data-role="tagsinput">
                                                            <?php echo form_error('tags'); ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="col-form-label" for="description">App Description*</label>
                                                            <textarea name="description" id="description" name="description" cols="30" rows="5" class="form-control" placeholder="App Description"><?php echo ($id) ? "" : set_value('description'); ?></textarea>
                                                            <?php echo form_error('description'); ?>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="icon">App Icon <span class="text-danger">*</span></label>
                                                            <input type="file" id="icon" name="icon" class="form-control">
                                                            <span>GIF/JPG/JPEG/PNG Only</span>
                                                            <?php echo form_error('icon'); ?>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label" for="screenshots">Screenshots <span class="text-danger">*</span></label>
                                                            <input type="file" id="screenshots" name="screenshots[]" multiple="multiple" class="form-control">
                                                            <span>GIF/JPG/JPEG/PNG Only</span>
                                                            <?php echo form_error('screenshots'); ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="col-md-6 checkbox checkbox-blue">
                                                            <span>
                                                                <input id="termsAndCondition" type="checkbox" name="tnc" value=1 data-parsley-multiple="group1">
                                                                <label for="termsAndCondition"> <strong>Terms and Condition</strong> <span class="text-danger">*</span> </label>
                                                            </span>
                                                            <p for="termsAndCondition">
                                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                                            </p>
                                                            <?php echo form_error('tnc')."<br/>";?>
                                                        </div>
                                                        <div class="col-md-6 checkbox checkbox-blue">
                                                            <span>
                                                                <input id="authorConfirm" type="checkbox" name="authorConfirm" value=1 data-parsley-multiple="group1">
                                                                <label for="authorConfirm"> <strong>Authorization Confirmation</strong> <span class="text-danger">*</span> </label>
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