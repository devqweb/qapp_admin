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
                                <h4 class="mt-0 header-title">Responsive example</h4>
                                    <p class="text-muted font-14 mb-3">
                                        Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.
                                    </p>

                                    <div class="responsive-table-plugin">
                                        <div class="table-rep-plugin">
                                            <div class="table-responsive" data-pattern="priority-columns">
                                                <table id="responsive-datatable" class="table table-striped table-sm table-bordered table-bordered dt-responsive nowrap database-records">
                                                    <thead class="thead-dark">
                                                    <tr>
                                                        <th>#</th>
                                                        <th data-priority="1">App ID</th>
                                                        <th data-priority="2">App Name</th>
                                                        <th data-priority=3>Added By</th>
                                                        <th data-priority="4">App Logo</th>
                                                        <th data-priority="5">Category</th>
                                                        <th data-priority="6">Company</th>
                                                        <th data-priority="7">Person Name</th>
                                                        <th data-priority="8">Mobile</th>
                                                        <th data-priority="9">WhatsApp</th>
                                                        <th data-priority="10">E-Mail</th>
                                                        <th data-priority="12">Android</th>
                                                        <th data-priority="13">IOS</th>
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
                                                        <th data-priority="12">Action</th>
                                                        
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $sr_num = 0;
                                                        foreach($app_data as $row) {
                                                            
                                                            if($row->promotion == 1) $promotion = "under-promotion";
                                                            else if($row->promotion == 2) $promotion = "promotion-going-expire";
                                                            else if($row->promotion == 3) $promotion = "promotion-expired";
                                                            else $promotion = "";
                                                            
                                                            echo '<tr class="'.$promotion.'">';
                                                                echo '<th>'. ++$sr_num. '</th>';
                                                                echo '<td>'. $row->app_id .'</td>';
                                                                echo '<td>'. $row->app_name .'</td>';
                                                                echo '<td>'. $row->added_by .'</td>';
                                                                echo '<td><img src="./upload/app_icon/'.$row->app_icon.'"></td>';
                                                                echo '<td>'. $row->category  .'</td>';
                                                                echo '<td>'. $row->company_name .'</td>';
                                                                echo '<td>'. $row->contact_person	 .'</td>';
                                                                echo '<td>'. $row->mobile .'</td>';
                                                                echo '<td>'. $row->whatsapp .'</td>';
                                                                echo '<td>'. $row->email .'</td>';
                                                                echo '<td class="scroll-field scroll-field-link">'. $row->android_link .'</td>';
                                                                echo '<td class="scroll-field scroll-field-link">'. $row->ios_link .'</td>';
                                                                echo '<td class="scroll-field scroll-field-link">'. $row->video_link .'</td>';
                                                                echo '<td class="scroll-field scroll-field-link">'. $row->last_update .'</td>';
                                                                echo '<td>'. $row->tags .'</td>';
                                                                echo '<td class="scroll-field">'. $row->description .'</td>';
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
                                                                echo '<td>
                                                                        <div class="btn-group">
                                                                            <button class="btn btn-info btn-sm" type="button" title="Edit"> <i class="mdi mdi-pencil"></i> </button>
                                                                            <button type="button" class="btn btn-sm btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="More Action">
                                                                            <i class="mdi mdi-chevron-down"></i>
                                                                            </button>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <a class="dropdown-item" href="#">Details</a>
                                                                                <a class="dropdown-item" href="#">Enable/Disable</a>
                                                                                <a class="dropdown-item" href="#">Remove Promotion</a>
                                                                                <a class="dropdown-item" href="#">Add To Promotion</a>
                                                                                <div class="dropdown-divider"></div>
                                                                                <a class="dropdown-item" href="#">Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </td>';
                                                            echo '</tr>';
                                                        }
                                                    ?>
                                                    <!-- <tr>
                                                        <td>1</td>
                                                        <th>AMZN <span class="co-name">Google Inc.</span></th>
                                                        <td>597.74</td>
                                                        <td>12:12PM</td>
                                                        <td>14.81 (2.54%)</td>
                                                        <td>582.93</td>
                                                        <td>597.95</td>
                                                        <td>597.73 x 100</td>
                                                        <td>597.91 x 300</td>
                                                        <td>731.10</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button class="btn btn-info btn-sm" type="button"> Edit </button>
                                                                <button type="button" class="btn btn-sm btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="mdi mdi-chevron-down"></i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#">Details</a>
                                                                    <a class="dropdown-item" href="#">Enable/Disable</a>
                                                                    <a class="dropdown-item" href="#">Remove Promotion</a>
                                                                    <a class="dropdown-item" href="#">Add To Promotion</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a class="dropdown-item" href="#">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <th>GOOG <span class="co-name">Google Inc.</span></th>
                                                        <td>597.74</td>
                                                        <td>12:12PM</td>
                                                        <td>14.81 (2.54%)</td>
                                                        <td>582.93</td>
                                                        <td>597.95</td>
                                                        <td>597.73 x 100</td>
                                                        <td>597.91 x 300</td>
                                                        <td>731.10</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button class="btn btn-info btn-sm" type="button"> Edit </button>
                                                                <button type="button" class="btn btn-sm btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="mdi mdi-chevron-down"></i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#">Details</a>
                                                                    <a class="dropdown-item" href="#">Enable/Disable</a>
                                                                    <a class="dropdown-item" href="#">Remove Promotion</a>
                                                                    <a class="dropdown-item" href="#">Add To Promotion</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a class="dropdown-item" href="#">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <th>GOOG <span class="co-name">Google Inc.</span></th>
                                                        <td>597.74</td>
                                                        <td>12:12PM</td>
                                                        <td>14.81 (2.54%)</td>
                                                        <td>582.93</td>
                                                        <td>597.95</td>
                                                        <td>597.73 x 100</td>
                                                        <td>597.91 x 300</td>
                                                        <td>731.10</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button class="btn btn-info btn-sm" type="button"> Edit </button>
                                                                <button type="button" class="btn btn-sm btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="mdi mdi-chevron-down"></i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#">Details</a>
                                                                    <a class="dropdown-item" href="#">Enable/Disable</a>
                                                                    <a class="dropdown-item" href="#">Remove Promotion</a>
                                                                    <a class="dropdown-item" href="#">Add To Promotion</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a class="dropdown-item" href="#">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <th>GOOG <span class="co-name">Google Inc.</span></th>
                                                        <td>597.74</td>
                                                        <td>12:12PM</td>
                                                        <td>14.81 (2.54%)</td>
                                                        <td>582.93</td>
                                                        <td>597.95</td>
                                                        <td>597.73 x 100</td>
                                                        <td>597.91 x 300</td>
                                                        <td>731.10</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button class="btn btn-info btn-sm" type="button"> Edit </button>
                                                                <button type="button" class="btn btn-sm btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="mdi mdi-chevron-down"></i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#">Details</a>
                                                                    <a class="dropdown-item" href="#">Enable/Disable</a>
                                                                    <a class="dropdown-item" href="#">Remove Promotion</a>
                                                                    <a class="dropdown-item" href="#">Add To Promotion</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a class="dropdown-item" href="#">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <th>GOOG <span class="co-name">Google Inc.</span></th>
                                                        <td>597.74</td>
                                                        <td>12:12PM</td>
                                                        <td>14.81 (2.54%)</td>
                                                        <td>582.93</td>
                                                        <td>597.95</td>
                                                        <td>597.73 x 100</td>
                                                        <td>597.91 x 300</td>
                                                        <td>731.10</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button class="btn btn-info btn-sm" type="button"> Edit </button>
                                                                <button type="button" class="btn btn-sm btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="mdi mdi-chevron-down"></i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#">Details</a>
                                                                    <a class="dropdown-item" href="#">Enable/Disable</a>
                                                                    <a class="dropdown-item" href="#">Remove Promotion</a>
                                                                    <a class="dropdown-item" href="#">Add To Promotion</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a class="dropdown-item" href="#">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <th>GOOG <span class="co-name">Google Inc.</span></th>
                                                        <td>597.74</td>
                                                        <td>12:12PM</td>
                                                        <td>14.81 (2.54%)</td>
                                                        <td>582.93</td>
                                                        <td>597.95</td>
                                                        <td>597.73 x 100</td>
                                                        <td>597.91 x 300</td>
                                                        <td>731.10</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button class="btn btn-info btn-sm" type="button"> Edit </button>
                                                                <button type="button" class="btn btn-sm btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="mdi mdi-chevron-down"></i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#">Details</a>
                                                                    <a class="dropdown-item" href="#">Enable/Disable</a>
                                                                    <a class="dropdown-item" href="#">Remove Promotion</a>
                                                                    <a class="dropdown-item" href="#">Add To Promotion</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a class="dropdown-item" href="#">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <th>GOOG <span class="co-name">Google Inc.</span></th>
                                                        <td>597.74</td>
                                                        <td>12:12PM</td>
                                                        <td>14.81 (2.54%)</td>
                                                        <td>582.93</td>
                                                        <td>597.95</td>
                                                        <td>597.73 x 100</td>
                                                        <td>597.91 x 300</td>
                                                        <td>731.10</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button class="btn btn-info btn-sm" type="button"> Edit </button>
                                                                <button type="button" class="btn btn-sm btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="mdi mdi-chevron-down"></i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#">Details</a>
                                                                    <a class="dropdown-item" href="#">Enable/Disable</a>
                                                                    <a class="dropdown-item" href="#">Remove Promotion</a>
                                                                    <a class="dropdown-item" href="#">Add To Promotion</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a class="dropdown-item" href="#">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <th>GOOG <span class="co-name">Google Inc.</span></th>
                                                        <td>597.74</td>
                                                        <td>12:12PM</td>
                                                        <td>14.81 (2.54%)</td>
                                                        <td>582.93</td>
                                                        <td>597.95</td>
                                                        <td>597.73 x 100</td>
                                                        <td>597.91 x 300</td>
                                                        <td>731.10</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button class="btn btn-info btn-sm" type="button"> Edit </button>
                                                                <button type="button" class="btn btn-sm btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="mdi mdi-chevron-down"></i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#">Details</a>
                                                                    <a class="dropdown-item" href="#">Enable/Disable</a>
                                                                    <a class="dropdown-item" href="#">Remove Promotion</a>
                                                                    <a class="dropdown-item" href="#">Add To Promotion</a>
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