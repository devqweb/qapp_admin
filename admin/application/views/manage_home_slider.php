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

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box table-responsive">
                                <h4 class="mt-0 header-title">Manage Home Slider</h4>
                                    
                                    <div class="responsive-table-plugin">
                                        <div class="table-rep-plugin">
                                            <div class="table-responsive" data-pattern="priority-columns">
                                                <table id="responsive-datatable" class="table table-striped table-sm table-bordered table-bordered dt-responsive nowrap database-records">
                                                    <thead class="thead-dark">
                                                    <tr>
                                                        <th data-priority="1">#</th>
                                                        <th data-priority="1">Slider ID</th>
                                                        <th data-priority="1">Title</th>
                                                        <th data-priority="1">Image</th>
                                                        <th data-priority="1">Order in Slider</th>
                                                        <th data-priority="1">Description</th>
                                                        <th data-priority="0">Button Link</th>                                                        
                                                        <th data-priority="1">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $sr_num = 0;
                                                        foreach($home_slider_data as $row) {
                                                            if($row->enable_disable == 0)
                                                                    echo '<tr class="record-row bg-dark-blur text-white">';
                                                                else
                                                                    echo '<tr class="record-row">';
                                                            
                                                                echo '<th>'. ++$sr_num. '</th>';
                                                                echo '<td>'. $row->home_slider_id .'</td>';
                                                                echo '<td>'. $row->title .'</td>';
                                                                echo '<td><img src="./upload/home_slider_img/'.$row->image_name.'" class="data-img"></td>';
                                                                echo '<td>'. $row->order_slider .'</td>';
                                                                echo '<td class="scroll-field">'. $row->description .'</td>';
                                                                echo '<td class="scroll-field">'. $row->button_link .'</td>';
                                                                echo '<td>
                                                                        <div class="btn-group">
                                                                            <button class="btn btn-info btn-sm btn-edit-home-slider" type="button" data-sr-num="'.$sr_num.'" data-row-id="'.$row->home_slider_id.'" onclick = my_home_slider_edit(this);>
                                                                                <i class="mdi mdi-pencil"></i>
                                                                            </button>

                                                                            <button class="btn btn-sm btn-cancel display-none" type="button" title="Cancel Edit">
                                                                                <i class="fas fa-times"></i>
                                                                            </button>

                                                                            <button type="button" class="btn btn-sm btn-info dropdown-toggle dropdown-toggle-split btn-group-last" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <i class="mdi mdi-chevron-down"></i>
                                                                            </button>

                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <a class="dropdown-item app-status" href="#" data-enable-disable = "'.$row->enable_disable.'" data-row-id="'.$row->home_slider_id.'" data-table-name="home_slider" data-table-id-field="home_slider_id" onclick = enable_disable_data(this);>Enable/Disable</a>

                                                                                <a class="dropdown-item app-status" href="#" data-row-id="'.$row->home_slider_id.'" data-table-name="home_slider" data-table-id-field="home_slider_id" data-table-image-field="image_name" data-img-path="./upload/home_slider_img" data-toggle="modal" data-target="#change_image" onclick = change_image_data(this);>Change Image</a>
                                                                                
                                                                                <div class="dropdown-divider"></div>
                                                                                <a class="dropdown-item" href="#" data-row-id="'.$row->home_slider_id.'" data-table-name="home_slider" data-table-id-field="home_slider_id" data-order-field="order_slider" data-toggle="modal" data-target="#modal_confirm_delete" onclick = confirm_modal_delete(this); >Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </td>';
                                                            echo '</tr>';
                                                        }
                                                    ?>                                                    
                                                    </tbody>
                                                </table>
                                            </div>
    
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container-fluid -->

                </div> <!-- content -->