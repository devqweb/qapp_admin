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
                        
                        <!-- FORM FOR PROMOTE APP -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="header-title">Promote App</h4>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="col-form-label" for="promoType'+ count +'">Type of Promotion</label>
                                            <div class="flex">
                                                <select id="myPromoType" name="promoType" class="form-control">
                                                    <option value="">-- Select Promo Type --</option>
                                                    <?php
                                                        // foreach($promo_type as $key) {
                                                        //     echo '<option value="'.$key->promo_id.'">'.$key->type.'</option>';
                                                        // }
                                                    ?>
                                                    <option value="app_of_the_month">App of the month</option>
                                                    <option value="app_of_the_week">App of the week</option>
                                                    <option value="banner_1">Banner 1</option>
                                                    <option value="banner_2">Banner 2</option>
                                                    <option value="promo_home_slider">Home Slider</option>
                                                </select>
                                                <div class="form-group col-md-2">
                                                    <input type = "button" name = "submit" id="btn-getAvailability" class="btn btn-primary waves-effect waves-light" value="Search Availability">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="alert alert-dismissible fade show col-md-6 update-status display-none" role="alert"></div>
                                        </div>
                                    </div>

                                    <div id="availability_area" class=" display-none">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label class="col-form-label" for="availability_box">Available Date</label>
                                                <div class="flex">
                                                    <select id="availability_box" name="availability_box" class="form-control">
                                                        <option value="">-- Select Month --</option>                                                
                                                    </select>
                                                    <div class="form-group col-md-2">
                                                        <input type = "button" name = "submit" id="confirm_request'+count+'" class="btn btn-success waves-effect waves-light btn-update-home-slider" value="Confirm Availability">
                                                        </a>
                                                    </div>
                                                </div>                                                
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        $("#btn-getAvailability").click(function(){
                                            let myPromoType = $("#myPromoType").val();
                                            if(myPromoType == '') {
                                                $("#myPromoType").parent().next().toggleClass("display-none");
                                                $("#myPromoType").parent().next().html("Please select Type of Promotion");
                                            }
                                            else {
                                                $.ajax({
                                                    url: "http://localhost/qapp/admin/get_promo_availability_ajax",
                                                    method: 'POST',
                                                    dataType: 'json',
                                                    data: { table: myPromoType },
                                                    success:function(res) {
                                                        if(res.response == 'success') {
                                                            // $(myRow).toggleClass("bg-dark-blur text-white");
                                                            // $(myRow).find(".app-status").attr("data-enable-disable", row_status);
                                                            //console.log(res.availability);
                                                            $("#availability_area").toggleClass("display-none");
                                                            for(let i = 0; i < res.availability.length; i++) {
                                                                $("#availability_box").append("<option value='"+res.availability[i]+"'>"+res.availability[i]+"</option>");
                                                            }
                                                        }
                                                        else {
                                                            alert("Oops! opertion failed");
                                                        }
                                                    }
                                                });
                                            }
                                        });
                                    </script>
                                        
                                        <!-- <div class="flex justify-space-around mar-top-1rem">
                                            <button type="button" class="btn btn-primary my-btn-std" onclick = add_new_image_process();>Upload</button>
                                            <button type="button" class="btn btn-danger my-btn-std" onclick = clearFields(new_image);  data-dismiss="modal" aria-label="Close">Cancel</button>                            
                                        </div> -->
                                    
                                    <!-- end row -->

                                </div> <!-- end card-box -->
                            </div><!-- end col -->
                        </div>
                        <!-- FORM FOR PROMTE APP -->

                        <!-- end row -->
                        
                    </div> <!-- container-fluid -->

                </div> <!-- content -->