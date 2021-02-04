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
                                    
                                    <form method="post" action="" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label class="col-form-label" for="promoType'+ count +'">Promotion Type</label>
                                                <select id="promoType'+ count +'" name="promoType" class="form-control">
                                                    <option value="">-- Select --</option>
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
                                                <label class="col-form-label" for="promoType'+ count +'">Start Date</label>
                                                <?php
                                                    $prefs = array(
                                                        'month_type'   => 'long',
                                                        'day_type'     => 'short',
                                                        'show_next_prev'  => TRUE
                                                    );
                                            
                                                    $prefs['template'] = '
                                                                        {table_open}<table border="0" cellpadding="0" cellspacing="0" class="table table-bordered">{/table_open}
                                            
                                                                        {heading_row_start}<tr>{/heading_row_start}
                                            
                                                                        {heading_previous_cell}<th><h3><a href="{previous_url}" class="flex align-items-center"><i class="fas fa-angle-double-left"></i>&nbsp; Prev</a></h3></th>{/heading_previous_cell}
                                                                        {heading_title_cell}<th colspan="{colspan}"><h3 class="color-brand">{heading}</h3></th>{/heading_title_cell}
                                                                        {heading_next_cell}<th><h3><a href="{next_url}" class="flex align-items-center">Next &nbsp;<i class="fas fa-angle-double-right"></i></a></h3></th>{/heading_next_cell}
                                            
                                                                        {heading_row_end}</tr>{/heading_row_end}
                                            
                                                                        {week_row_start}<tr>{/week_row_start}
                                                                        {week_day_cell}<td class="font-18px font-dark bold-500">{week_day}</td>{/week_day_cell}
                                                                        {week_row_end}</tr>{/week_row_end}
                                            
                                                                        {cal_row_start}<tr>{/cal_row_start}
                                                                        {cal_cell_start}<td class="font-18px">{/cal_cell_start}
                                                                        {cal_cell_start_today}<td >{/cal_cell_start_today}
                                                                        {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}
                                            
                                                                        {cal_cell_content}<a href="{content}">{day}</a>{/cal_cell_content}
                                                                        {cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}
                                            
                                                                        {cal_cell_no_content}{day}{/cal_cell_no_content}
                                                                        {cal_cell_no_content_today}<div class="highlight color-brand font-18px">{day}</div>{/cal_cell_no_content_today}
                                            
                                                                        {cal_cell_blank}&nbsp;{/cal_cell_blank}
                                            
                                                                        {cal_cell_other}{day}{/cal_cel_other}
                                            
                                                                        {cal_cell_end}</td>{/cal_cell_end}
                                                                        {cal_cell_end_today}</td>{/cal_cell_end_today}
                                                                        {cal_cell_end_other}</td>{/cal_cell_end_other}
                                                                        {cal_row_end}</tr>{/cal_row_end}
                                            
                                                                        {table_close}</table>{/table_close}
                                                                ';
                                            
                                                    $this->load->library('calendar', $prefs);
                                                    echo $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4)); 
                                                ?>
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