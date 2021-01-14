                <!-- Footer links start-->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                               2016 - 2020 &copy; Adminto theme by <a href="">Coderthemes</a> 
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right footer-links d-none d-sm-block">
                                    <a href="javascript:void(0);">About Us</a>
                                    <a href="javascript:void(0);">Help</a>
                                    <a href="javascript:void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- Footer links end-->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
            
        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div class="rightbar-title">
                <a href="javascript:void(0);" class="right-bar-toggle float-right">
                    <i class="mdi mdi-close"></i>
                </a>
                <h4 class="font-16 m-0 text-white">Theme Customizer</h4>
            </div>
            <div class="slimscroll-menu">

                <div class="p-3">
                    <div class="alert alert-warning" role="alert">
                        <strong>Customize </strong> the overall color scheme, layout, etc.
                    </div>
                    <div class="mb-2">
                        <img src="assets/images/layouts/light.png" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                        <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="assets/images/layouts/dark.png" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" 
                            data-appStyle="assets/css/app-dark.min.css" />
                        <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="assets/images/layouts/rtl.png" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css" />
                        <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="assets/images/layouts/dark-rtl.png" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-5">
                        <input type="checkbox" class="custom-control-input theme-choice" id="dark-rtl-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" 
                            data-appStyle="assets/css/app-dark-rtl.min.css" />
                        <label class="custom-control-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
                    </div>

                    <a href="https://1.envato.market/k0YEM" class="btn btn-danger btn-block mt-3" target="_blank"><i class="mdi mdi-download mr-1"></i> Download Now</a>
                </div>
            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <a href="javascript:void(0);" class="right-bar-toggle demos-show-btn">
            <i class="mdi mdi-cog-outline mdi-spin"></i> &nbsp;Choose Demos
        </a>

        <!------------------COMMON CONFIRMATION FOR DELETE RECORD----------------------->
        <div class="modal fade modal-dialog" tabindex="-1" id="modal_confirm_category">
            <div class="modal-dialog">
                <div class="modal-content confirmation-box">                        
                    <div class="modal-body col-md-8 mx-auto flex align-items-center justify-content-center text-align-center">
                        <input type="hidden" name="id" value="" id="hidden_delete_id">
                        <input type="hidden" name="table" value="" id="hidden_table_name">
                        <input type="hidden" name="field" value="" id="hidden_field_name">
                        <div class="full-width">
                            <h1>Are you sure?</h1>
                            <p>You won't be able to revert this!</p>
                            <div class="flex justify-space-between">
                                <button type="button" class="btn btn-primary my-btn-std" onclick = delete_record(); data-dismiss="modal">Yes I'm</button>
                                <button type="button" class="btn btn-danger my-btn-std"  data-dismiss="modal" aria-label="Close">No I'm not</button>
                            </div>
                        </div>                            
                    </div>
                </div>
            </div>
        </div>
        <!---------------ENF OF COMMON CONFIRMATION FOR DELETE RECORD------------------>

        <!------------------COMMON SUCCESS BOX FOR DELETE RECORD----------------------->
        <div class="modal fade modal-dialog" tabindex="-1" id="success_delete">
            <div class="modal-dialog">
                <div class="modal-content confirmation-box">                        
                    <div class="modal-body col-md-8 mx-auto flex align-items-center justify-content-center text-align-center">
                        <input type="hidden" name="id" value="" id="hidden_delete_id">
                        <input type="hidden" name="table" value="" id="hidden_table_name">
                        <input type="hidden" name="field" value="" id="hidden_field_name">
                        <div class="full-width">
                            <i class="fas fa-check acknowleg-big-icon"></i>
                            <h1>Deleted</h1>
                            <p class="padding-bottom-1rem">Your record has been deleted.</p>
                            <div class="flex justify-space-between">
                                <button type="button" class="btn btn-primary my-btn-std"  data-dismiss="modal" aria-label="Close">OK</button>                            
                            </div>
                        </div>                            
                    </div>
                </div>
            </div>
        </div>
        <!------------ENF OF COMMON COMMON SUCCESS BOX FOR DELETE RECORD---------------->

        <!------------------COMMON FAILED BOX FOR DELETE RECORD----------------------->
        <div class="modal fade modal-dialog" tabindex="-1" id="failed_box">
            <div class="modal-dialog">
                <div class="modal-content confirmation-box">                        
                    <div class="modal-body col-md-8 mx-auto flex align-items-center justify-content-center text-align-center">
                        <input type="hidden" name="id" value="" id="hidden_delete_id">
                        <input type="hidden" name="table" value="" id="hidden_table_name">
                        <input type="hidden" name="field" value="" id="hidden_field_name">
                        <div class="full-width">
                            <i class="fas fa-times acknowleg-big-icon"></i>
                            <h1>Failed!</h1>
                            <p class="padding-bottom-1rem">Oops operation failed.</p>
                            <div class="flex justify-space-between">
                                <button type="button" class="btn btn-primary my-btn-std"  data-dismiss="modal" aria-label="Close">OK</button>                            
                            </div>
                        </div>                            
                    </div>
                </div>
            </div>
        </div>
        <!------------ENF OF COMMON COMMON FAILED BOX FOR DELETE RECORD---------------->

        <!-- Vendor js -->
        <script src="<?php echo base_url("assets/js/vendor.min.js") ?>"></script>

        <!-- knob plugin -->
        <script src="<?php echo base_url("assets/libs/jquery-knob/jquery.knob.min.js")?>"></script>

        <!--Morris Chart-->
        <script src="<?php echo base_url("assets/libs/morris-js/morris.min.js") ?>"></script>
        <script src="<?php echo base_url("assets/libs/raphael/raphael.min.js") ?>"></script>

        <!-- Dashboard init js-->
        <script src="<?php echo base_url("assets/js/pages/dashboard.init.js") ?>"></script>

        <!-- Responsive Table js -->
        <script src="<?php echo base_url("assets/libs/rwd-table/rwd-table.min.js") ?>"></script>

        <!-- Plugins Js -->
        <script src="assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
        <!-- <script src="assets/libs/switchery/switchery.min.js"></script>
        <script src="assets/libs/multiselect/jquery.multi-select.js"></script> -->
        <!-- <script src="assets/libs/jquery-quicksearch/jquery.quicksearch.min.js"></script> -->

        <!-- third party js -->
        <script src="<?php echo base_url("assets/libs/datatables/jquery.dataTables.min.js")?>"></script>
        <script src="<?php echo base_url("assets/libs/datatables/dataTables.bootstrap4.js")?>"></script>
        <script src="<?php echo base_url("assets/libs/datatables/dataTables.responsive.min.js")?>"></script>
        <script src="<?php echo base_url("assets/libs/datatables/responsive.bootstrap4.min.js")?>"></script>
        <script src="<?php echo base_url("assets/libs/datatables/dataTables.buttons.min.js")?>"></script>
        <script src="<?php echo base_url("assets/libs/datatables/buttons.bootstrap4.min.js")?>"></script>
        <script src="<?php echo base_url("assets/libs/datatables/buttons.html5.min.js")?>"></script>
        <script src="<?php echo base_url("assets/libs/datatables/buttons.flash.min.js")?>"></script>
        <script src="<?php echo base_url("assets/libs/datatables/buttons.print.min.js")?>"></script>
        <script src="<?php echo base_url("assets/libs/datatables/dataTables.keyTable.min.js")?>"></script>
        <script src="<?php echo base_url("assets/libs/datatables/dataTables.select.min.js")?>"></script>
        <script src="<?php echo base_url("assets/libs/pdfmake/pdfmake.min.js")?>"></script>
        <script src="<?php echo base_url("assets/libs/pdfmake/vfs_fonts.js")?>"></script>
        <!-- third party js ends -->

        <!-- Datatables init -->
        <script src="<?php echo base_url("assets/js/pages/datatables.init.js")?>"></script>

        <!-- Init js -->
        <script src="<?php echo base_url("assets/js/pages/responsive-table.init.js") ?>"></script>

        <!-- App js -->
        <script src="<?php echo base_url("assets/js/app.min.js") ?>"></script>
        
    </body>
</html>