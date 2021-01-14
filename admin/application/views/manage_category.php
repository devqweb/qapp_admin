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
                                <div class="card-box table-responsive" id="tabletest"> 
                                <h4 class="mt-0 header-title">Manage Categories</h4>
                                
                                    <div class="responsive-table-plugin">
                                        <div class="table-rep-plugin">
                                            <div class="table-responsive" data-pattern="priority-columns">
                                                <table id="responsive-datatable" class="table tabledit-edit-button table-striped table-sm table-bordered table-bordered dt-responsive nowrap database-records">
                                                    <thead class="thead-dark">
                                                    <tr>
                                                        <th>#</th>
                                                        <th data-priority="1">Category ID</th>
                                                        <th data-priority="1">Icon</th>
                                                        <th data-priority="1">Category Name and Icon</th>
                                                        <th data-priority="3">Order in Drag Slider</th>
                                                        <th data-priority="1"># Of Apps</th>
                                                        <th data-priority="4">Under Promotion</th>
                                                        <th data-priority="2">Over Promotion</th>
                                                        <th data-priority="1">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $sr_num = 0;
                                                            
                                                            foreach($cat_data as $row) {
                                                                if($row->enable_disable == 0)
                                                                    echo '<tr class="record-row my-danger">';
                                                                else
                                                                    echo '<tr class="record-row">';

                                                                echo '<th>'. ++$sr_num. '</th>';
                                                                echo '<td>'. $row->cat_id .'</td>';
                                                                echo '<td><img src="./upload/category_img/'.$row->image.'"></td>';
                                                                echo '<td>'. $row->name .'</td>';
                                                                echo '<td>'. $row->order_in_slider .'</td>';
                                                                echo '<td> </td>';
                                                                echo '<td> </td>';
                                                                echo '<td> </td>';
                                                                echo '<td>
                                                                        <div class="btn-group">
                                                                            <button class="btn btn-info btn-sm btn-edit-category" onclick = my_cat_edit(this); type="button" title="Edit" data-cat-id="'.$row->cat_id.'"> <i class="mdi mdi-pencil"></i> </button>
                                                                            <button class="btn btn-sm btn-cancel display-none" type="button" title="Cancel Edit">
                                                                                <i class="fas fa-times"></i>
                                                                            </button>
                                                                            <button type="button" class="btn btn-sm btn-info dropdown-toggle dropdown-toggle-split btn-group-last" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <i class="mdi mdi-chevron-down"></i>
                                                                            </button>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item app-status" href="#"  data-enable-disable = "'.$row->enable_disable.'" data-cat-id="'.$row->cat_id.'" onclick = my_cat_enable_disable(this);>Enable/Disable</a>
                                                                            <div class="dropdown-divider"></div>
                                                                                <a class="dropdown-item" href="#" data-cat-id="'.$row->cat_id.'" data-table-name="category" data-table-field="cat_id" data-toggle="modal" data-target="#modal_confirm_category" onclick = confirm_modal(this); >Delete</a>
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