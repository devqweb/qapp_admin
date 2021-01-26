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
                                <h4 class="mt-0 header-title">Manage Apps</h4>                                    
                                    <div class="responsive-table-plugin">
                                        <div class="table-rep-plugin">
                                            <div class="table-responsive" data-pattern="priority-columns">
                                                <table id="responsive-datatable" class="table table-striped table-sm table-bordered table-bordered dt-responsive nowrap database-records">
                                                    <thead class="thead-dark">
                                                    <tr>
                                                        <th data-priority="1">#</th>
                                                        <th data-priority="2">App ID</th>
                                                        <th data-priority="3">App Name</th>                                                        
                                                        <th data-priority="4">App Logo</th>
                                                        <th data-priority="5">Category</th>
                                                        <th data-priority="6">Company</th>
                                                        <th data-priority="7">Person Name</th>
                                                        <th data-priority="8">Mobile</th>
                                                        <th data-priority="9">WhatsApp</th>
                                                        <th data-priority="10">E-Mail</th>
                                                        <th data-priority="11">Android</th>
                                                        <th data-priority="12">IOS</th>
                                                        <th data-priority="14">Video Link</th>
                                                        <th data-priority="15">Last Update</th>
                                                        <th data-priority="16">Tags</th>
                                                        <th data-priority="17">Description</th>
                                                        <th data-priority="18">Website</th>
                                                        <th data-priority="19">Instagram</th>
                                                        <th data-priority="20">Facebook</th>
                                                        <th data-priority="21">Size</th>
                                                        <th data-priority="22">Rating</th>
                                                        <th data-priority="23">Installs</th>
                                                        <th data-priority="24">English</th>
                                                        <th data-priority="25">Arabic</th>
                                                        <th data-priority="26">T&C</th>
                                                        <th data-priority="27">AC</th>
                                                        <th data-priority="28">Added On</th>
                                                        <th data-priority="29">Update On</th>
                                                        <th data-priority="30">Added By</th>
                                                        <th data-priority="13">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $sr_num = 0;
                                                        foreach($app_data as $row) {                                                            
                                                            if($row->promotion == 1) {
                                                                $promotion = "bg-success text-white";
                                                                $ed_operatoin = "disabled";
                                                            } 
                                                            else if($row->promotion == 2) {
                                                                $promotion = "bg-warning text-dark";
                                                                $ed_operatoin = "disabled";
                                                            } 
                                                            else if($row->promotion == 3) {
                                                                $promotion = "bg-danger text-white";
                                                                $ed_operatoin = "";
                                                            }
                                                            else {
                                                                $promotion = "";
                                                                $ed_operatoin = "";
                                                            }
                                                            if($row->enable_disable == 0) {
                                                                echo '<tr class="record-row bg-dark-blur text-white '.$promotion.'">';    
                                                            }
                                                            else echo '<tr class="record-row '.$promotion.'">';
                                                                echo '<th>'. ++$sr_num. '</th>';
                                                                echo '<td>'. $row->app_id .'</td>';
                                                                echo '<td>'. $row->app_name .'</td>';
                                                                echo '<td><img src="./upload/app_icon/'.$row->app_icon.'" class="data-img row-icon"></td>';
                                                                echo '<td>'. $row->category.'</td>';
                                                                echo '<td>'. $row->company_name .'</td>';
                                                                echo '<td>'. $row->contact_person	 .'</td>';
                                                                echo '<td>('. $row->telcode_mobile .') ' .$row->mobile.'</td>';
                                                                echo '<td>('. $row->telcode_whatsapp .') '.$row->whatsapp.'</td>';
                                                                echo '<td>'. $row->email .'</td>';
                                                                echo '<td class="scroll-field scroll-field-link">'. $row->android_link .'</td>';
                                                                echo '<td class="scroll-field scroll-field-link">'. $row->ios_link .'</td>';
                                                                echo '<td class="scroll-field scroll-field-link">'. $row->video_link .'</td>';
                                                                echo '<td>'. $row->last_update .'</td>';
                                                                echo '<td class="scroll-field">'. $row->tags .'</td>';
                                                                echo '<td class="scroll-field single_refresh">'. $row->description .'</td>';
                                                                echo '<td class="scroll-field scroll-field-link">'. $row->website .'</td>';
                                                                echo '<td class="scroll-field scroll-field-link">'. $row->instagram_link .'</td>';
                                                                echo '<td class="scroll-field scroll-field-link">'. $row->facebook_link .'</td>';
                                                                echo '<td>'. $row->app_size .'</td>';
                                                                echo '<td>'. $row->app_rating .'</td>';
                                                                echo '<td>'. $row->app_installs .'</td>';
                                                                if($row->english == 1) {
                                                                    echo '<td><i class="fas fa-check"></i></td>';
                                                                }
                                                                else {
                                                                    echo '<td><i class="fas fa-times"></i></td>';
                                                                }
                                                                if($row->arabic == 1) {
                                                                    echo '<td><i class="fas fa-check"></i></td>';
                                                                }
                                                                else {
                                                                    echo '<td><i class="fas fa-times"></i></td>';
                                                                }
                                                                if($row->t_c == 1) {
                                                                    echo '<td><i class="fas fa-check"></i></td>';
                                                                }
                                                                else {
                                                                    echo '<td><i class="fas fa-times"></i></td>';
                                                                }
                                                                if($row->a_c == 1) {
                                                                    echo '<td><i class="fas fa-check"></i></td>';
                                                                }
                                                                else {
                                                                    echo '<td><i class="fas fa-times"></i></td>';
                                                                }
                                                                echo '<td>'. $row->datetime .'</td>';
                                                                echo '<td>'. $row->details_update .'</td>';                                                                
                                                                echo '<td>'. $row->added_by .'</td>';
                                                                echo '<td>
                                                                        <div class="btn-group">
                                                                            <button class="btn btn-info btn-sm btn-edit" type="button" title="Edit" onclick = my_app_edit(this); data-sr-num="'.$sr_num.'" data-row-id="'.$row->app_id.'">
                                                                                <i class="mdi mdi-pencil"></i>
                                                                            </button>

                                                                            <button class="btn btn-sm btn-cancel display-none" type="button" title="Cancel Edit">
                                                                                <i class="fas fa-times"></i>
                                                                            </button>

                                                                            <button type="button" class="btn btn-sm btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="More Action">
                                                                                <i class="mdi mdi-chevron-down"></i>
                                                                            </button>

                                                                            <div class="dropdown-menu dropdown-menu-right text-align-right">
                                                                                <a class="dropdown-item" href="#">Details</a>
                                                                                
                                                                                <a class="dropdown-item '.$ed_operatoin.'" href="#" data-enable-disable = "'.$row->enable_disable.'" data-row-id="'.$row->app_id.'" data-table-name="app" data-table-id-field="app_id" onclick = enable_disable_data(this);>Enable/Disable</a>

                                                                                <a class="dropdown-item app-status" href="#" data-row-id="'.$row->app_id.'" data-table-name="app" data-table-id-field="app_id" data-table-image-field="app_icon" data-img-path="./upload/app_icon/" data-toggle="modal" data-target="#change_image" onclick = change_image_data(this);>Change Icon</a>

                                                                                <a class="dropdown-item edit_des" href="#" onclick = my_app_edit_des(this); data-sr-num="'.$sr_num.'" data-row-id="'.$row->app_id.'">
                                                                                    Edit Description
                                                                                </a>

                                                                                <a class="dropdown-item edit_screenshots" href="#" onclick = my_app_edit_screenshots(this); data-row-id="'.$row->app_id.'"> App Screens </a>
                                                                                
                                                                                <a class="dropdown-item disabled" href="#">Add to Promotion</a> 
                                                                                <a class="dropdown-item disabled" href="#">Remove Promotion</a>
                                                                                
                                                                                <div class="dropdown-divider"></div>

                                                                                <a class="dropdown-item" href="#" data-row-id="'.$row->app_id.'" data-table-name="app" data-table-id-field="app_id" data-order-field="" data-table-image-field="app_icon" data-img-path="./upload/app_icon/" data-toggle="modal" data-target="#modal_confirm_delete" onclick = confirm_modal_delete(this); >Delete</a>
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