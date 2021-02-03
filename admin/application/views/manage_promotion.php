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
                                <h4 class="mt-0 header-title">Manage Promotion</h4>
                                    
                                    <div class="responsive-table-plugin">
                                        <div class="table-rep-plugin">
                                            <div class="table-responsive" data-pattern="priority-columns">
                                                <table id="responsive-datatable" class="table table-striped table-sm table-bordered table-bordered dt-responsive nowrap database-records">
                                                    <thead class="thead-dark">
                                                    <tr>
                                                        <th data-priority="1">#</th>
                                                        <th data-priority="1">Promotion ID</th>
                                                        <th data-priority="1">Type</th>
                                                        <th data-priority="1">Preview</th>
                                                        <th data-priority="1">Validity</th>
                                                        <th data-priority="1">Price (QR)</th>
                                                        <th data-priority="1">Description</th>
                                                        <th data-priority="1">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $sr_num = 0;
                                                        foreach($table_data as $row) {
                                                            if($row->enable_disable == 0)
                                                                    echo '<tr class="record-row bg-dark-blur text-white">';
                                                                else
                                                                    echo '<tr class="record-row">';
                                                            
                                                                echo '<th>'. ++$sr_num. '</th>';
                                                                echo '<td>'. $row->promo_id .'</td>';
                                                                echo '<td>'. $row->type .'</td>';
                                                                echo '<td><img src="./upload/promotion/'.$row->image.'" class="data-img row-icon" data-toggle="modal" data-target="#view_image_modal"></td>';
                                                                echo '<td>'. $row->validity .'</td>';
                                                                echo '<td>'. $row->price .'</td>';
                                                                echo '<td class="scroll-field textArea">'. $row->description .'</td>';
                                                                echo '<td>
                                                                        <div class="btn-group">
                                                                            <button class="btn btn-info btn-sm btn-edit" type="button" data-sr-num="'.$sr_num.'" data-row-id="'.$row->promo_id.'" onclick = my_promotion_edit(this);>
                                                                                <i class="mdi mdi-pencil"></i>
                                                                            </button>

                                                                            <button class="btn btn-sm btn-cancel display-none" type="button" title="Cancel Edit">
                                                                                <i class="fas fa-times"></i>
                                                                            </button>

                                                                            <button type="button" class="btn btn-sm btn-info dropdown-toggle dropdown-toggle-split btn-group-last" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <i class="mdi mdi-chevron-down"></i>
                                                                            </button>

                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <a class="dropdown-item app-status" href="#" data-enable-disable = "'.$row->enable_disable.'" data-row-id="'.$row->promo_id.'" data-table-name="promotion" data-table-id-field="promo_id" onclick = enable_disable_data(this);>Enable/Disable</a>

                                                                                <a class="dropdown-item app-status" href="#" data-row-id="'.$row->promo_id.'" data-table-name="promotion" data-table-id-field="promo_id" data-table-image-field="image" data-img-path="./upload/promotion/" data-img-type="promo_img" data-toggle="modal" data-target="#change_image" onclick = change_image_data(this);>Change Preview Image</a>

                                                                                <a class="dropdown-item edit_des" href="#" onclick = my_des_edit(this); data-sr-num="'.$sr_num.'" data-row-id="'.$row->promo_id.'" data-table-name="promotion" data-table-id-field="promo_id">
                                                                                    Edit Description
                                                                                </a>
                                                                                
                                                                                <div class="dropdown-divider"></div>
                                                                                <a class="dropdown-item" href="#" data-row-id="'.$row->promo_id.'" data-table-name="promotion" data-table-id-field="promo_id" data-order-field="" data-table-image-field="image" data-img-path="./upload/promotion/" data-toggle="modal" data-target="#modal_confirm_delete" onclick = confirm_modal_delete(this); >Delete</a>
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