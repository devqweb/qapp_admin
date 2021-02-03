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
                                    <h4 class="header-title">Calendar</h4>
                                    <script src="<?php echo base_url("assets/js/jquery.min.js") ?>"></script>
                                    
                                    <div class="row">
                                        <?php
                                            $data = array(
                                                3  => 'http://example.com/news/article/2006/06/03/',
                                                7  => 'http://example.com/news/article/2006/06/07/',
                                                13 => 'http://example.com/news/article/2006/06/13/',
                                                26 => 'http://example.com/news/article/2006/06/26/'
                                            );

                                            $prefs = array(
                                                'start_day'    => 'saturday',
                                                'month_type'   => 'long',
                                                'day_type'     => 'short'
                                            );
                                            $this->load->library('calendar', $prefs);
                                            echo $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4));
                                        ?>

                                    </div>
                                    <!-- end row -->

                                </div> <!-- end card-box -->
                            </div><!-- end col -->
                        </div>
                        <!-- FORM FOR ADD NEW APP -->

                        <!-- end row -->
                        
                    </div> <!-- container-fluid -->

                </div> <!-- content -->