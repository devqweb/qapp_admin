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
                                    <script src="<?php echo base_url("assets/js/jquery.min.js") ?>"></script>
                                    <?php
                                        $my_promo = '';
                                    ?>
                                    <form method="post" action="" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label class="col-form-label" for="promoType'+ count +'">Type of Promotion</label>
                                                <select id="promoType'+ count +'" name="promoType" class="form-control">
                                                    <option value="">-- Select Promo Type --</option>
                                                    <?php
                                                        foreach($promo_type as $key) {
                                                            echo '<option value="'.$key->promo_id.'">'.$key->type.'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>                                    
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label class="col-form-label" for="promoType'+ count +'">Available Date</label>
                                                <select id="promoType'+ count +'" name="promoType" class="form-control">
                                                    <option value="">-- Select Month --</option>
                                                    <?php
                                                        if(empty($app_of_the_month)) {
                                                            $curr_month = date('m',strtotime('+1 month'));
                                                            $x = 1;
                                                            for($i = $curr_month; $i <= 12; $i++) {
                                                                echo '<option value="'.date('F',strtotime('+'.$x.' month')).'">'.date('F',strtotime('+'.$x.' month')).'</option>';
                                                                $x++;
                                                            }
                                                            //echo date('M',strtotime('+1 month'));
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <input type = "button" name = "submit" id="confirm_request'+count+'" class="btn btn-success waves-effect waves-light btn-update-home-slider" value="Confirm">
                                                </a> &nbsp;&nbsp;&nbsp;
                                                <input type="reset" class="btn btn-danger" value="Cancel" data-dismiss="modal" aria-label="Close">
                                            </div>
                                        </div>
                                        
                                        <!-- <div class="flex justify-space-around mar-top-1rem">
                                            <button type="button" class="btn btn-primary my-btn-std" onclick = add_new_image_process();>Upload</button>
                                            <button type="button" class="btn btn-danger my-btn-std" onclick = clearFields(new_image);  data-dismiss="modal" aria-label="Close">Cancel</button>                            
                                        </div> -->
                                    </form>
                                    <!-- end row -->

                                </div> <!-- end card-box -->
                            </div><!-- end col -->
                        </div>
                        <!-- FORM FOR PROMTE APP -->

                        <!-- end row -->
                        
                    </div> <!-- container-fluid -->

                </div> <!-- content -->