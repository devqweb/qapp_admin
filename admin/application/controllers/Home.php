<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {

	############################################ FUNCTION CONSTRUCTOR #################################
	function __construct() {
		parent::__construct();
		// if(!$this->session->userdata('logged_in'))
		// {
		// 	redirect('login','refresh');
		// }

		// $this->load->model('Common_model');
		// $this->load->model('Manage_model');
		$this->load->helper(array("form", "url"));
		$this->load->model('Common_model');
		date_default_timezone_set('Asia/Qatar');
	}
	############################################ END OF FUNCTION CONSTRUCTOR ##########################

	############################################ COMMON VIEW PAGE #####################################
	public function CommonPage($page, $data) {
		$this->load->view('include/head');
		$this->load->view('include/leftSidebar');
		$this->load->view($page, $data);
		$this->load->view('include/footer');
	}
	############################################ END OF COMMON VIEW PAGE ##############################

	############################################ LOGOUT ###############################################
	public function logout() {
		session_destroy();
		redirect('home','refresh');
	}
	############################################ END OF LOGOUT ########################################
	
	############################################ HOME PAGE DHASHBOARD #################################
	public function home() {
		$this->CommonPage("home",'');
	}

	############################################ ADD NEW APP ##########################################
	public function new_app() {
		$data = [];
		$save_data = '';
		
		//INSERT NEW APP
		if(isset($_POST['submit'])) {
			$this->form_validation->set_error_delimiters('<div class="ci-form-error">', '</div>');
			$this->form_validation->set_rules('nameOfApp','<b>Name of the App</b>','trim|required');
			$this->form_validation->set_rules('companyName','<b>Company Name</b>','trim|required');
			$this->form_validation->set_rules('contactPerson','<b>Contact Person</b>','trim|required');
			$this->form_validation->set_rules('mobileNumber','<b>Mobile Number</b>','trim|required');
			$this->form_validation->set_rules('email','<b>E-Mail</b>','trim|required');
			$this->form_validation->set_rules('category','<b>Category</b>','trim|required');
			$this->form_validation->set_rules('tags','<b>Tags</b>','trim|required');
			$this->form_validation->set_rules('description','<b>Description</b>','trim|required');
			$this->form_validation->set_rules('rating','<b>Rating</b>','trim|required');
			$this->form_validation->set_rules('appIstalls','<b>Number of App Installs</b>','trim|required');
			$this->form_validation->set_rules('appsize','<b>Size of The App(MB)</b>','trim|required');
			$this->form_validation->set_rules('tnc','<b>Terms and Condition</b>','trim|required');
			$this->form_validation->set_rules('authorConfirm','<b>Authorization Confirmation</b>','trim|required');

			$english = ($this->input->post('english') == 1) ? 1 : 0;
			$arabic = ($this->input->post('arabic') == 1) ? 1 : 0;

			if($english == 0 && $arabic == 0) {
				$this->form_validation->set_rules('language','<b>Language</b>','trim|required');
			}
			if(empty($_FILES['icon']['name'])) {
				$this->form_validation->set_rules('icon', '<b>App Icon</b>', 'trim|required');
			}
			if(empty($_FILES['screenshots']['name'][0])) {
				$this->form_validation->set_rules('screenshots', '<b>Screenshots</b>', 'trim|required');
			}
			if($this->input->post('submit') == 'Add App') {
				$this->form_validation->set_rules('nameOfApp', '<b>Name of the App</b>', 'trim|required|is_unique[app.app_name]');
			}
			else {
				$this->form_validation->set_rules('nameOfApp', '<b>Name of the App</b>', 'trim|required');
			}
			
			if($this->form_validation->run()) {
				$screenshots = array();

				///////////////////////////////////// UPLOAD ICON ////////////////////////////////////////////
				if(isset($_FILES['icon']) && $_FILES['icon']['name'] != '') {
					$icon_name = $this->Common_model->image_upload('./upload/app_icon/', 'icon');
				}

				///////////////////////////////////// INSERT APP DETAILS /////////////////////////////////////
				if($icon_name != '') {
					$nameOfApp = $this->input->post('nameOfApp');
					$companyName = $this->input->post('companyName');
					$contactPerson = $this->input->post('contactPerson');
					$mobileNumber = $this->input->post('mobileNumber');
					$whatsapp = $this->input->post('whatsapp');
					$email = $this->input->post('email');
					$category = $this->input->post('category');
					$dateOfLastUpdate = $this->input->post('dateOfLastUpdate');
					$tags = $this->input->post('tags');
					$description = $this->input->post('description');
					$videoLink = $this->input->post('videoLink');
					$androidLink = $this->input->post('androidLink');
					$iosLink = $this->input->post('iosLink');
					$instaLink = $this->input->post('instaLink');
					$fbLink = $this->input->post('fbLink');
					$website = $this->input->post('website');
					$rating = $this->input->post('rating');
					$appIstalls = $this->input->post('appIstalls');
					$appsize = $this->input->post('appsize');
					$icon = $this->input->post('icon');
					$tnc = ($this->input->post('tnc') == 1) ? 1 : 0;
					$authorConfirm = ($this->input->post('authorConfirm') == 1) ? 1 : 0;

					$values = array('app_name' => $nameOfApp,
									'company_name' => $companyName,
									'contact_person' => $contactPerson,
									'mobile' => $mobileNumber,
									'whatsapp' => $whatsapp,
									'email'	=> $email,
									'category' => $category,
									'last_update' => $dateOfLastUpdate,
									'tags' => $tags,
									'description' => $description,
									'video_link' => $videoLink,
									'android_link' => $androidLink,
									'ios_link' => $iosLink,
									'instagram_link' => $instaLink,
									'facebook_link'	=> $fbLink,
									'website' => $website,
									'app_rating' => $rating,
									'app_installs' => $appIstalls,
									'app_size' => $appsize,
									'english' => $english,
									'arabic' => $arabic,
									'app_icon' => $icon_name,
									't_c' => $tnc,
									'a_c' => $authorConfirm);

					$save_data = $this->Common_model->common_insert('app', $values);

					if($save_data) {
						///////////////////////////////////// UPLAD SCREENSHOTS //////////////////////////////////////
						$screenshots = array();
						if(isset($_FILES['screenshots']) && !empty($_FILES['screenshots']['name'])) {
							$files = $_FILES;
							$total_screenshots = count($_FILES['screenshots']['name']);
							for($i = 0; $i < $total_screenshots; $i++) {
								$_FILES['screenshots']['name'] = $files['screenshots']['name'][$i];
								$_FILES['screenshots']['type'] = $files['screenshots']['type'][$i];
								$_FILES['screenshots']['tmp_name'] = $files['screenshots']['tmp_name'][$i];
								$_FILES['screenshots']['error'] = $files['screenshots']['error'][$i];
								$_FILES['screenshots']['size'] = $files['screenshots']['size'][$i];

								$screenshot_name = $this->Common_model->image_upload('./upload/app_screenshots/', 'screenshots');
								
								if($screenshot_name != '') {
									//////////////////////////////// INSERT SCREENSHOT IN DATABSE ////////////////////////////////
									$screenshots[] = array('app_id'=>$save_data, 'image'=>$screenshot_name);
								}
							}
							
							if(!empty($screenshots)) {
								$upload_status = $this->Common_model->common_batch_insert('screenshots', $screenshots);
								if($upload_status) {
									$data['save_status'] = 1;
									$data['status_msg'] = "<strong>Success!</strong> App has been added.";
									$data['status_class'] = "alert-success";
								}
								else {
									$data['save_status'] = 0;
									$data['status_msg'] = "<strong>Error!</strong> App added, but Screenshots failed to upload.";
									$data['status_class'] = "alert-warning";
								}
							}
							else {
								$data['save_status'] = 0;
								$data['status_msg'] = "<strong>Error!</strong> App added, but Screenshots failed to upload.";
								$data['status_class'] = "alert-warning";
							}
						}
					}
					else {
						$data['save_status'] = 0;
						$data['status_msg'] = "<strong>Failed!</strong> App not added.";
						$data['status_class'] = "alert-danger";	
					}
				}
				else {
					$data['save_status'] = 0;
					$data['status_msg'] = "<strong>Failed!</strong> App not added.";
					$data['status_class'] = "alert-danger";	
				}
			}
		}
		
		//$data['id'] = $save_data;
		//$this->CommonPage("new_home_slider", $data);

		$id = array('cat_id', 'name');
		$data['category'] = $this->Common_model->common_select($id, 'category', array());
		$data['id'] = $save_data;
		//print_r($data);
		$this->CommonPage("new_app", $data);
	}

	############################################ MANAGE APPS ##########################################
	public function manage_app() {
		///////////////////////////////////SELECT RECORDS FROM APP///////////////////////////////////////
		$data['app_data'] = $this->Common_model->common_select(array(), 'app', array());
		$this->CommonPage("manage_app", $data);
	}

	############################################ ADD NEW CATEGORY #####################################
	public function new_category() {
		////////////////////////////////// INSERT / UPDATE FUNCTION //////////////////////////////////
		$data = [];
		$save_data = '';

		if(isset($_POST['submit'])) {
			$this->form_validation->set_error_delimiters('<div class="ci-form-error">', '</div>');
			$this->form_validation->set_rules('dsOrder','<b>Order in Drag Slider</b>','trim|required');

			if(empty($_FILES['catIcon']['name'])) {
				$this->form_validation->set_rules('catIcon', '<b>Category Icon</b>', 'trim|required');
			}
			
			if($this->input->post('submit') =='Add Category') {
				$this->form_validation->set_rules('catName','<b>Category Name</b>','trim|required|is_unique[category.name]');
				//$this->form_validation->set_rules('cat_id','"Category Name"','trim');
			}
			else {
				$this->form_validation->set_rules('catName','<b>Category Name</b>','trim|required');
				//$this->form_validation->set_rules('cat_id','"Category Name"','trim|required');
			}

			if($this->form_validation->run()) {
				
				if(isset($_FILES['catIcon']) && $_FILES['catIcon']['name']!='')
				{
					$cat_name = $this->input->post('catName');
					$slider_order = $this->input->post('dsOrder');
					$submit = $this->input->post('submit');
					$id = array('cat_id', 'order_in_slider');
					$val = array('order_in_slider'=>$slider_order);

					$image_name = $this->Common_model->image_upload('./upload/category_img/','catIcon');

					if($image_name != '') {
						$max_order = $this->Common_model->common_select_max('order_in_slider', '', 'category');
						//print_r($max_order);
						//$max_value = $max_order['order_in_slider'][0]->order_in_slider;
						
						///////////////////////INCREASE EXISTING ORDER TO 1 IF ORDER NUMBER ALREADY EXIST/////////////////
						if($max_order['order_in_slider']) {
							while($max_order['order_in_slider'] >= $slider_order) {
								$increase = $max_order['order_in_slider']+1;
								$old_order = array('order_in_slider' => $max_order['order_in_slider']);
								$newValues = array('order_in_slider' => $increase);
								$this->Common_model->common_update('category', $newValues, $old_order);
								$max_order['order_in_slider']--;
							}
						}

						/////////////////////////////////////INSERT NEW CATEGORY///////////////////////////////////////
						$values = array('name' => $cat_name, 'order_in_slider' => $slider_order, 'image' => $image_name);
						$save_data = $this->Common_model->common_insert('category', $values);

						if($save_data) {
							$data['save_status'] = 1;
							$data['status_msg'] = "<strong>Success!</strong> Category has been added.";
							$data['status_class'] = "alert-success";
						}
						else {
							$data['save_status'] = 0;
							$data['status_msg'] = "<strong>Error!</strong> Category not added.";
							$data['status_class'] = "alert-danger";
						}
					}
					else {
						$data['save_status'] = 0;
						$data['status_msg'] = "<strong>Error!</strong> Category not added.";
						$data['status_class'] = "alert-danger";
					}					
				}
			}
		}
		# END OF INSERT / UPDATE FUNCTION
		$data['order_in_slider'] = $this->Common_model->common_select_max('order_in_slider', '', 'category');
		$data['id'] = $save_data;
		//print_r($data);
		$this->CommonPage("new_category", $data);
	}
	############################################ END OF ADD NEW CATEGORY ##############################
	

	############################################ MANGAGE CATEGORIES ###################################
	public function manage_category() {		
		//////////////////////////////////SELECT RECORDS FROM CATEGORY///////////////////////////////////
		$data['cat_data'] = $this->Common_model->common_select('*', 'category', array());
		$this->CommonPage("manage_category", $data);
	}

	############################################ ADD NEW HOME SLIDER ##################################	
	public function new_home_slider() {
		$data = [];
		$save_data = '';

		if(isset($_POST['submit'])) {

			$this->form_validation->set_error_delimiters('<div class="ci-form-error">', '</div>');
			$this->form_validation->set_rules('title', '<b>Slider Title</b>', 'trim|required');
			$this->form_validation->set_rules('des', '<b>Description</b>', 'trim|required');
			
			if(empty($_FILES['slider_img']['name'])) {
				$this->form_validation->set_rules('slider_img', '<b>Image</b>', 'trim|required');
			}

			if($this->input->post('submit') == 'Add To Home Slider') {
				$this->form_validation->set_rules('btn_link', '<b>Button Link</b>', 'trim|required|is_unique[home_slider.button_link]');
				//$this->form_validation->set_rules('home_slider_id','"Button Link"','trim|required');
			}
			else {
				$this->form_validation->set_rules('btn_link','<b>Button Link</b>','trim|required');
				//$this->form_validation->set_rules('home_slider_id','"Button Link"','trim|required');
			}
		
			if($this->form_validation->run()) {
				if(isset($_FILES['slider_img']) && $_FILES['slider_img']['name'] != '') {
					$title = $this->input->post('title');
					$des = $this->input->post('des');
					$btn_link = $this->input->post('btn_link');
					$order_slider = $this->input->post('order_slider');
					$submit = $this->input->post('submit');

					$id = array('home_slider_id', 'order_slider');
					$val = array('order_slider'=>$order_slider);

					$image_name = $this->Common_model->image_upload('./upload/home_slider_img/','slider_img');

					if($image_name != '') {
						$max_order['order_slider'] = $this->Common_model->common_select_max('order_slider', '', 'home_slider');
						$max_value = $max_order['order_slider'][0]->order_slider;
						
						///////////////////////INCREASE EXISTING ORDER TO 1 IF ORDER NUMBER ALREADY EXIST/////////////////
						if($max_value) {
							while($max_value >= $order_slider) {
								$my_cat = array('order_slider' => $max_value);
								$newValues = array('order_slider' => ($max_value+1));
								$this->Common_model->common_update('home_slider', $newValues, $my_cat);
								$max_value--;
							}
						}

						///////////////////////////////////// INSERT NEW HOME SLIDER ///////////////////////////////////
						$values = array('title' => $title,
										'description' => $des,
										'button_link' => $btn_link,
										'order_slider' => $order_slider,
										'image_name' => $image_name);

						$save_data;// = $this->Common_model->common_insert("home_slider", $values);

						if($save_data) {
							$data['save_status'] = 1;
							$data['status_msg'] = "<strong>Success!</strong> Home Slider has been added.";
							$data['status_class'] = "alert-success";
						}
						else {
							$data['save_status'] = 0;
							$data['status_msg'] = "<strong>Error!</strong> Home Slider not added.";
							$data['status_class'] = "alert-danger";
						}
					}
					else {
						$data['save_status'] = 0;
						$data['status_msg'] = "<strong>Error!</strong> Home Slider not added.";
						$data['status_class'] = "alert-danger";
					}	
				}
			}
		}
		$data['order_slider'] = $this->Common_model->common_select_max('order_slider', '', 'home_slider');
		$data['id'] = $save_data;
		$this->CommonPage("new_home_slider", $data);
	}
	################################### END OF ADD NEW HOME SLIDER ####################################


	############################################ MANAGE HOME SLIDER ###################################
	public function manage_home_slider() {
		////////////////////////////////SELECT RECORDS FROM HOME SLIDER////////////////////////////////
		$data['home_slider_data'] = $this->Common_model->common_select('*', 'home_slider', array());
		$this->CommonPage("manage_home_slider", $data);
	}

	############################################ ADD NEW TRENDING BANNER ##############################
	public function new_trending_banner() {
		$data = [];
		$save_data = '';

		if(isset($_POST['submit'])) {
			$this->form_validation->set_error_delimiters('<div class="ci-form-error">', '</div>');
			
			if(empty($_FILES['banner_image']['name'])) {
				$this->form_validation->set_rules('banner_image', '<b>Banner Image</b>', 'trim|required');
				$this->form_validation->run();
			}

			if(isset($_FILES['banner_image']) && $_FILES['banner_image']['name'] != '') {
				$order_slider = $this->input->post('order_slider');
				$submit = $this->input->post('submit');

				$id = array('trending_id ', 'order_slider');
				$val = array('order_slider'=>$order_slider);

				$image_name = $this->Common_model->image_upload('./upload/trending_img/', 'banner_image');

				if($image_name != '') {
					$max_order['order_slider'] = $this->Common_model->common_select_max('order_slider', '', 'trending_banner');
					$max_value = $max_order['order_slider'][0]->order_slider;
					
					///////////////////////INCREASE EXISTING ORDER TO 1 IF ORDER NUMBER ALREADY EXIST/////////////////
					if($max_value) {
						while($max_value >= $order_slider) {
							$my_cat = array('order_slider' => $max_value);
							$newValues = array('order_slider' => ($max_value+1));
							$this->Common_model->common_update('trending_banner', $newValues, $my_cat);
							$max_value--;
						}
					}	
					
					///////////////////////////////////// INSERT NEW TRENDING SLIDER ////////////////////////////////
					$values = array('trending_img' => $image_name, 'order_slider' => $order_slider);

					$save_data = $this->Common_model->common_insert('trending_banner', $values);

					if($save_data) {
						$data['save_status'] = 1;
						$data['status_msg'] = "<strong>Success!</strong> Banner has been added to the Trending Slider.";
						$data['status_class'] = "alert-success";
					}
					else {
						$data['save_status'] = 0;
						$data['status_msg'] = "<strong>Error!</strong> Banner not added.";
						$data['status_class'] = "alert-danger";
					}
				}
				else {
					$data['save_status'] = 0;
					$data['status_msg'] = "<strong>Error!</strong> Banner not added.";
					$data['status_class'] = "alert-danger";
				}
			}			
		}
		$data['order_slider'] = $this->Common_model->common_select_max('order_slider', '', 'trending_banner');
		$data['id'] = $save_data;
		$this->CommonPage("new_trending_banner", $data);
	}

	############################################ MANAGE TRENDING BANNER ###############################
	public function manage_trending_banner() {
		///////////////////////////////SELECT RECORDS FROM TRENDING BANNER////////////////////////////////
		$data['trending_banner_data'] = $this->Common_model->common_select('*', 'trending_banner', array());
		$this->CommonPage("manage_trending_banner", $data);
	}
	
	############################################ MANAGE TRENDING BANNER ###############################

	#################################### GET RECORDS FROM CATEROGRY USING AJAX ########################	
	public function manage_category_ajax() {
		$cat_id = $this->input->post("cat_id");
		$table_name = $this->input->post("table");
		$data['response'] = 'success';
		$data['maximum_order'] = $this->Common_model->common_select_max_single_row('order_in_slider', '', 'category');
		$data['app_data'] = $this->Common_model->common_select_single_row(array(), $table_name, array('cat_id'=>$cat_id));
		echo json_encode($data);		
	}
	############################## END OF GET RECORDS FROM CATEROGRY USING AJAX #######################

	#################################### UPDATE CATEGORY FROM DATABSE USING AJAX ######################
	public function update_category_ajax() {
		$table_name = $this->input->post("table");
		$where = $this->input->post("id");
		$cat_id = $this->input->post("cat_id");
		$cat_name = $this->input->post("cat_name");
		$slider_order = $this->input->post("slider_order");
		$data['response'] = 'success';
		$update_status = "";
		$array = array('order_in_slider' => $slider_order);
		$get_order = $this->Common_model->common_select_single_row('order_in_slider', 'category', $array);
		
		///////////////////////////////SWAP ORDER NUMBER IF ALREADY EXIST/////////////////////////////////
		if(!empty($get_order) &&  $get_order['order_in_slider'] != '') {
			$array = array('cat_id'=>$cat_id);
			$old_cat_id = $this->Common_model->common_select_single_row('order_in_slider', 'category', $array);
			
			if($old_cat_id['order_in_slider'] < $slider_order) {				
				$old_record = array();
				for($i = $old_cat_id['order_in_slider']; $i <= $slider_order; $i++) {
					$where = array('order_in_slider' => $i);
					$x_data = $this->Common_model->common_select_single_row('cat_id', 'category', $where);
					if($x_data['cat_id']) {
						$old_record[$x_data['cat_id']] = $i-1;
					}
				}

				foreach($old_record as $key => $row) {
					$update_status = $this->Common_model->common_update($table_name, array('order_in_slider'=>$row), array('cat_id'=>$key));
				}
			}
			else if($old_cat_id['order_in_slider'] > $slider_order) {
				$old_record = array();
				for($i = $old_cat_id['order_in_slider']; $i >= $slider_order; $i--) {
					$where = array('order_in_slider' => $i);
					$x_data = $this->Common_model->common_select_single_row('cat_id', 'category', $where);
					if($x_data['cat_id']) {
						$old_record[$x_data['cat_id']] = $i+1;
					}
				}
				foreach($old_record as $key => $row) {
					$update_status = $this->Common_model->common_update($table_name, array('order_in_slider'=>$row), array('cat_id'=>$key));
				} 
			}
			else $update_status = true;
		}
		
		if($update_status) {
			$update_status = $this->Common_model->common_update($table_name, array('name'=>$cat_name, 'order_in_slider'=>$slider_order), array('cat_id'=>$cat_id));
			if($update_status) {
				$data['response'] = "success";				
				$table_data = "";
				$cat_data = $this->Common_model->common_select_single_row('*', 'category', array('cat_id'=>$cat_id));
				// print_r($cat_data);
				// die();
				$sr_num = 0;				
				$table_data .= '<th>'. ++$sr_num. '</th>';
				$table_data .= '<td>'. $cat_data['cat_id'] .'</td>';
				$table_data .= '<td><img src="./upload/category_img/'.$cat_data['image'].'"></td>';
				$table_data .= '<td>'. $cat_data['name'] .'</td>';
				$table_data .= '<td>'. $cat_data['order_in_slider'] .'</td>';
				$table_data .= '<td> </td>';
				$table_data .= '<td> </td>';
				$table_data .= '<td> </td>';
				$table_data .= '<td>
									<div class="btn-group">
										<button class="btn btn-info btn-sm btn-edit-category" type="button" onclick = my_cat_edit(this); title="Edit" data-cat-id="'.$cat_data['cat_id'].'"> <i class="mdi mdi-pencil"></i> </button>
										<button class="btn btn-sm btn-cancel display-none" type="button" title="Cancel Edit">
											<i class="fas fa-times"></i>
										</button>
										<button type="button" class="btn btn-sm btn-info dropdown-toggle dropdown-toggle-split btn-group-last" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="mdi mdi-chevron-down"></i>
										</button>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="#">Enable/Disable</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="#">Delete</a>
										</div>
									</div>
								</td>';
					
				$data['table_data'] = $table_data;
			} 
			else $data['response'] = "failed";
		}
		else {
			$data['response'] = "failed";
		}		
		echo json_encode($data);	
	}
	############################ END OF UPDATE CATEGORY FROM DATABSE USING AJAX ########################

	################################### GET RECORDS FROM HOME SLIDER USING AJAX ########################	
	public function manage_home_slider_ajax() {
		$slider_id = $this->input->post("slider_id");
		$table_name = $this->input->post("table");
		$data['response'] = 'success';
		$data['maximum_order'] = $this->Common_model->common_select_max_single_row('order_slider', '', 'home_slider');
		$data['app_data'] = $this->Common_model->common_select_single_row(array(), $table_name, array('home_slider_id '=>$slider_id));
		echo json_encode($data);		
	}
	############################## END OF GET RECORDS FROM HOME SLIDER USING AJAX ######################

	################################### UPDATE HOME SLIDER USING AJAX ##################################
	public function update_home_slider_ajax() {
		$table_name = $this->input->post("table");
		$where = $this->input->post("id");
		$home_slider_id = $this->input->post("slider_id");
		$title = $this->input->post("title");
		$description = $this->input->post("description");
		$btn_link = $this->input->post("btn_link");
		$slider_order = $this->input->post("slider_order");
		$data['response'] = 'success';
		$update_status = "";
		$array = array('order_slider' => $slider_order);
		$get_order = $this->Common_model->common_select_single_row('order_slider', 'home_slider', $array);
		
		///////////////////////////////SWAP ORDER NUMBER IF ALREADY EXIST/////////////////////////////////
		if(!empty($get_order) &&  $get_order['order_slider'] != '') {
			$array = array('home_slider_id'=>$home_slider_id);
			$old_home_slider_id = $this->Common_model->common_select_single_row('order_slider', 'home_slider', $array);
			
			if($old_home_slider_id['order_slider'] < $slider_order) {				
				$old_record = array();
				for($i = $old_home_slider_id['order_slider']; $i <= $slider_order; $i++) {
					$where = array('order_slider' => $i);
					$x_data = $this->Common_model->common_select_single_row('home_slider_id', 'home_slider', $where);
					if($x_data['home_slider_id']) {
						$old_record[$x_data['home_slider_id']] = $i-1;
					}
				}

				foreach($old_record as $key => $row) {
					$update_status = $this->Common_model->common_update($table_name, array('order_slider'=>$row), array('home_slider_id'=>$key));
				}
			}
			else if($old_home_slider_id['order_slider'] > $slider_order) {
				$old_record = array();
				for($i = $old_home_slider_id['order_slider']; $i >= $slider_order; $i--) {
					$where = array('order_slider' => $i);
					$x_data = $this->Common_model->common_select_single_row('home_slider_id', 'home_slider', $where);
					if($x_data['home_slider_id']) {
						$old_record[$x_data['home_slider_id']] = $i+1;
					}
				}
				foreach($old_record as $key => $row) {
					$update_status = $this->Common_model->common_update($table_name, array('order_slider'=>$row), array('home_slider_id'=>$key));
				} 
			}
			else $update_status = true;
		}
		
		if($update_status) {
			$update_status = $this->Common_model->common_update($table_name, array('title'=>$title, 'description'=>$description, 'button_link'=>$btn_link, 'order_slider'=>$slider_order), array('home_slider_id'=>$home_slider_id));
			if($update_status) $data['response'] = "success";
			else $data['response'] = "failed";
		}
		else {
			$data['response'] = "failed";
		}
		echo json_encode($data);	
	}
	############################### END OF UPDATE HOME SLIDER USING AJAX ###############################
}
?>