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
                                <h4 class="mt-0 header-title">Manage Categories</h4>
                                    
                                    <div class="responsive-table-plugin">
                                        <div class="table-rep-plugin">
                                            <div class="table-responsive" data-pattern="priority-columns">
                                                <table id="responsive-datatable" class="table table-striped table-sm table-bordered table-bordered dt-responsive nowrap database-records">
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
                                                                echo '<tr>'; 
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
                                                                            <button class="btn btn-info btn-sm" type="button"> Edit </button>
                                                                            <button type="button" class="btn btn-sm btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <i class="mdi mdi-chevron-down"></i>
                                                                            </button>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <a class="dropdown-item" href="#">Enable/Disable</a>
                                                                                <div class="dropdown-divider"></div>
                                                                                <a class="dropdown-item" href="#">Delete</a>
                                                                            </div>
                                                                        </div>
                                                                      </td>';
                                                                echo '</tr>';
                                                            }
                                                        ?>
                                                    <!-- <tr>
                                                        <th>1</th>
                                                        <th>E-Commerse</th>
                                                        <td>1</td>
                                                        <td>500</td>
                                                        <td>150</td>
                                                        <td>350</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button class="btn btn-info btn-sm" type="button"> Edit </button>
                                                                <button type="button" class="btn btn-sm btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="mdi mdi-chevron-down"></i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#">Enable/Disable</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a class="dropdown-item" href="#">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>1</th>
                                                        <th>E-Commerse</th>
                                                        <td>1</td>
                                                        <td>500</td>
                                                        <td>150</td>
                                                        <td>350</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button class="btn btn-info btn-sm" type="button"> Edit </button>
                                                                <button type="button" class="btn btn-sm btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="mdi mdi-chevron-down"></i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#">Enable/Disable</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a class="dropdown-item" href="#">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>1</th>
                                                        <th>E-Commerse</th>
                                                        <td>1</td>
                                                        <td>500</td>
                                                        <td>150</td>
                                                        <td>350</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button class="btn btn-info btn-sm" type="button"> Edit </button>
                                                                <button type="button" class="btn btn-sm btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="mdi mdi-chevron-down"></i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#">Enable/Disable</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a class="dropdown-item" href="#">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>1</th>
                                                        <th>E-Commerse</th>
                                                        <td>1</td>
                                                        <td>500</td>
                                                        <td>150</td>
                                                        <td>350</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button class="btn btn-info btn-sm" type="button"> Edit </button>
                                                                <button type="button" class="btn btn-sm btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="mdi mdi-chevron-down"></i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#">Enable/Disable</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a class="dropdown-item" href="#">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>1</th>
                                                        <th>E-Commerse</th>
                                                        <td>1</td>
                                                        <td>500</td>
                                                        <td>150</td>
                                                        <td>350</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button class="btn btn-info btn-sm" type="button"> Edit </button>
                                                                <button type="button" class="btn btn-sm btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="mdi mdi-chevron-down"></i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#">Enable/Disable</a>
                                                                    <a class="dropdown-item" href="#">Remove Promotion</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a class="dropdown-item" href="#">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>1</th>
                                                        <th>E-Commerse</th>
                                                        <td>1</td>
                                                        <td>500</td>
                                                        <td>150</td>
                                                        <td>350</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button class="btn btn-info btn-sm" type="button"> Edit </button>
                                                                <button type="button" class="btn btn-sm btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="mdi mdi-chevron-down"></i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#">Enable/Disable</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a class="dropdown-item" href="#">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr> -->
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