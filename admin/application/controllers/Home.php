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
			$this->form_validation->set_rules('nameOfApp','<b>Name of the App</b>','trim|required|is_unique[app.app_name]');
			$this->form_validation->set_rules('companyName','<b>Company Name</b>','trim|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('contactPerson','<b>Contact Person</b>','trim|required');
			$this->form_validation->set_rules('telcode_mobile','<b>Tel Code</b>','trim|required');
			$this->form_validation->set_rules('mobileNumber','<b>Mobile Number</b>','trim|required|is_natural');
			$this->form_validation->set_rules('email','<b>E-Mail</b>','trim|required|valid_email');
			$this->form_validation->set_rules('category','<b>Category</b>','trim|required');
			$this->form_validation->set_rules('tags','<b>Tags</b>','trim|required');
			$this->form_validation->set_rules('description','<b>Description</b>','trim|required');
			$this->form_validation->set_rules('rating','<b>Rating</b>','trim|required');
			$this->form_validation->set_rules('appIstalls','<b>Number of App Installs</b>','trim|required');
			$this->form_validation->set_rules('appsize','<b>Size of The App(MB)</b>','trim|required');
			$this->form_validation->set_rules('tnc','<b>Terms and Condition</b>','trim|required');
			$this->form_validation->set_rules('authorConfirm','<b>Authorization Confirmation</b>','trim|required');

			$telcode_whatsapp = $this->input->post('telcode_whatsapp');
			$whatsapp = $this->input->post('whatsapp');
			$english = ($this->input->post('english') == 1) ? 1 : 0;
			$arabic = ($this->input->post('arabic') == 1) ? 1 : 0;

			if($whatsapp != '' && $telcode_whatsapp == '') {
				$this->form_validation->set_rules('telcode_whatsapp','<b>WhatsApp Tel Code</b>','trim|required');
			}
			if($telcode_whatsapp != '' && $whatsapp == '') {
				$this->form_validation->set_rules('whatsapp','<b>Whatsapp Number</b>','trim|required');
			}
			if($english == 0 && $arabic == 0) {
				$this->form_validation->set_rules('language','<b>Language</b>','trim|required');
			}
			if(empty($_FILES['icon']['name'])) {
				$this->form_validation->set_rules('icon', '<b>App Icon</b>', 'trim|required');
			}
			if(empty($_FILES['screenshots']['name'][0])) {
				$this->form_validation->set_rules('screenshots', '<b>Screenshots</b>', 'trim|required');
			}
			// if($this->input->post('submit') == 'Add App') {
			// 	$this->form_validation->set_rules('nameOfApp', '<b>Name of the App</b>', 'trim|required|is_unique[app.app_name]|alpha');
			// }
			// else {
			// 	$this->form_validation->set_rules('nameOfApp', '<b>Name of the App</b>', 'trim|required');
			// }
			
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
					$telcode_mobile = $this->input->post('telcode_mobile');
					$mobileNumber = $this->input->post('mobileNumber');
					// $telcode_whatsapp = $this->input->post('telcode_whatsapp');
					// $whatsapp = $this->input->post('whatsapp');
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
									'telcode_mobile' => $telcode_mobile,
									'mobile' => $mobileNumber,
									'telcode_whatsapp' => $telcode_whatsapp,
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

		$fields = array('cat_id', 'name', 'enable_disable');
		$order_by = array('name', 'ASC');
		$data['category'] = $this->Common_model->common_select($fields, 'category', array(), $order_by);
		$data['id'] = $save_data;
		$this->CommonPage("new_app", $data);
	}


	############################################ MANAGE APPS ##########################################
	public function manage_app() {
		///////////////////////////////////SELECT RECORDS FROM APP///////////////////////////////////////
		$data['app_data'] = $this->Common_model->common_select(array(), 'app', array(), array());
		$this->CommonPage("manage_app", $data);
	}
	##################################### END OF MANAGE APPS ##########################################


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
		$data['cat_data'] = $this->Common_model->common_select('*', 'category', array(), array());
		$this->CommonPage("manage_category", $data);
	}
	##################################### END OF MANGAGE CATEGORIES ###################################


	############################################ ADD NEW HOME SLIDER ##################################	
	public function new_home_slider() {
		$data = [];
		$save_data = '';

		if(isset($_POST['submit'])) {

			$this->form_validation->set_error_delimiters('<div class="ci-form-error">', '</div>');
			$this->form_validation->set_rules('title', '<b>Slider Title</b>', 'trim|required');
			$this->form_validation->set_rules('des', '<b>Description</b>', 'trim|required');
			$this->form_validation->set_rules('btn_link','<b>Button Link</b>','trim|required');
			
			if(empty($_FILES['slider_img']['name'])) {
				$this->form_validation->set_rules('slider_img', '<b>Image</b>', 'trim|required');
			}

			// if($this->input->post('submit') == 'Add To Home Slider') {
			// 	$this->form_validation->set_rules('btn_link', '<b>Button Link</b>', 'trim|required|is_unique[home_slider.button_link]');
			// }
			// else {
			// 	$this->form_validation->set_rules('btn_link','<b>Button Link</b>','trim|required');
			// }
		
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
						$max_order = $this->Common_model->common_select_max('order_slider', '', 'home_slider');
						
						if($max_order['order_slider'] != '') {
							$max_value = $max_order['order_slider'];
							
							///////////////////////INCREASE EXISTING ORDER TO 1 IF ORDER NUMBER ALREADY EXIST/////////////////
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

						$save_data = $this->Common_model->common_insert("home_slider", $values);

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
		$data['home_slider_data'] = $this->Common_model->common_select('*', 'home_slider', array(), array());
		$this->CommonPage("manage_home_slider", $data);
	}
	##################################### END OF MANAGE HOME SLIDER ###################################


	##################################### ADD NEW TRENDING BANNER #####################################
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
					$max_order = $this->Common_model->common_select_max_single_row('order_slider', '', 'trending_banner');

					if(!empty($max_order)) {
						$max_value = $max_order['order_slider'];					
					
						///////////////////////INCREASE EXISTING ORDER TO 1 IF ORDER NUMBER ALREADY EXIST/////////////////						
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
	##################################### END OF ADD NEW TRENDING BANNER ##############################
	
	
	############################################ MANAGE TRENDING BANNER ###############################
	public function manage_trending_banner() {
		///////////////////////////////SELECT RECORDS FROM TRENDING BANNER////////////////////////////////
		$data['trending_banner_data'] = $this->Common_model->common_select('*', 'trending_banner', array(), array());
		$this->CommonPage("manage_trending_banner", $data);
	}	
	##################################### END OF MANAGE TRENDING BANNER ###############################


	#################################### ADD NEW SUBSCRIPTION #########################################
	public function new_subscription() {
		$data = [];
		$save_data = '';

		if(isset($_POST['submit'])) {
			$this->form_validation->set_error_delimiters('<div class="ci-form-error">', '</div>');
			$this->form_validation->set_rules('subName', '<b>Suscription Name</b>', 'trim|required');
			$this->form_validation->set_rules('numOfTags', '<b>Number of Tags</b>', 'trim|required|numeric');
			$this->form_validation->set_rules('featured', '<b>Featured Listing</b>', 'trim|required|numeric');
			$this->form_validation->set_rules('pricePerMonth', '<b>Price per month</b>', 'trim|required|numeric');
			
			if($this->form_validation->run()) {
				$subName = $this->input->post('subName');
				$numOfTags = $this->input->post('numOfTags');
				$featured = $this->input->post('featured');
				$pricePerMonth = $this->input->post('pricePerMonth');
				$submit = $this->input->post('submit');

				$values = array(
					'name' => $subName,
					'num_of_tags' => $numOfTags,
					'feature_listing' => $featured,
					'price' => $pricePerMonth
				);
				//////////////////////////////// INSERT NEW TRENDING SLIDER //////////////////////////////////
				$save_data = $this->Common_model->common_insert('subscription', $values);

				if($save_data) {
					$data['save_status'] = 1;
					$data['status_msg'] = "<strong>Success!</strong> Subscription has been created.";
					$data['status_class'] = "alert-success";
				}
				else {
					$data['save_status'] = 0;
					$data['status_msg'] = "<strong>Error!</strong> Subscription not created.";
					$data['status_class'] = "alert-danger";
				}
			}
		}
		//$data['order_slider'] = $this->Common_model->common_select_max('order_slider', '', 'trending_banner');
		$data['id'] = $save_data;
		$this->CommonPage("new_subscription", $data);
	}
	#################################### END OF ADD NEW SUBSCRIPTION ##################################


	#################################### GET RECORDS FROM CATEROGRY USING AJAX ########################	
	public function manage_category_ajax() {
		$cat_id = $this->input->post("cat_id");
		$table_name = $this->input->post("table");
		$data['response'] = 'success';
		$data['maximum_order'] = $this->Common_model->common_select_max_single_row('order_in_slider', '', 'category');
		$data['app_data'] = $this->Common_model->common_select_single_row(array(), $table_name, array('cat_id'=>$cat_id));
		//print_r($_POST);
		echo json_encode($data);		
	}
	############################## END OF GET RECORDS FROM CATEROGRY USING AJAX #######################


	######################## ENABLE/DISABLE RECORD FROM DATABSE USING AJAX ############################
	public function enable_disable_record_ajax() {
		$table_name = $this->input->post("table");
		$where = $this->input->post("id");
		$row_id = $this->input->post("row_id");
		$enable_disable = $this->input->post("enable_disable");
		$data['response'] = 'success';
		
		$update_status = $this->Common_model->common_update($table_name, array('enable_disable'=>$enable_disable), array($where=>$row_id));
		if($update_status) {
			$data['response'] = "success";
		}
		else $data['response'] = "failed";
		echo json_encode($data);
	}	
	##################### END OF ENABLE/DISABLE RECORDS FROM DATABSE USING AJAX #######################

	######################### Check if duplicate value exit or not ####################################
	public function check_duplicate_ajax() {
		$table = $this->input->post("table");
		$where = $this->input->post("field");
		$value = $this->input->post("value");
		$array = array($where => $value);		

		$check_duplicate = $this->Common_model->common_select_single_row('*', $table, $array);
		// print_r($_POST);
		// die();
		if(empty($check_duplicate)) {			
			$data['duplicate'] = 'no';
		}
		else {
			$data['duplicate'] = 'yes';
		}
		echo json_encode($data);
	}
	########################## End of Check if duplicate value exit or not ############################


	############################# UPDATE CATEGORY FROM DATABSE USING AJAX #############################
	public function update_category_ajax() {
		$table_name = $this->input->post("table");
		$where = $this->input->post("id");
		$cat_id = $this->input->post("cat_id");
		$cat_name = $this->input->post("cat_name");
		$slider_order = $this->input->post("slider_order");
		$sr_num = $this->input->post("sr_num");
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
				$table_data .= '<th>'.$sr_num. '</th>';
				$table_data .= '<td>'. $cat_data['cat_id'] .'</td>';
				$table_data .= '<td><img src="./upload/category_img/'.$cat_data['image'].'" class="data-img row-icon"></td>';
				$table_data .= '<td>'. $cat_data['name'] .'</td>';
				$table_data .= '<td>'. $cat_data['order_in_slider'] .'</td>';
				$table_data .= '<td> </td>';
				$table_data .= '<td> </td>';
				$table_data .= '<td> </td>';
				$table_data .= '<td>
									<div class="btn-group">
										<button class="btn btn-info btn-sm btn-edit-category" type="button" title="Edit" data-sr-num="'.$sr_num.'" data-row-id="'.$cat_data['cat_id'].'" onclick = my_cat_edit(this);>
											<i class="mdi mdi-pencil"></i>
										</button>
										<button class="btn btn-sm btn-cancel display-none" type="button" title="Cancel Edit">
											<i class="fas fa-times"></i>
										</button>
										<button type="button" class="btn btn-sm btn-info dropdown-toggle dropdown-toggle-split btn-group-last" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="mdi mdi-chevron-down"></i>
										</button>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="#" data-enable-disable="'.$cat_data['enable_disable'].'" onclick = my_cat_enable_disable(this);>Enable/Disable</a>
											<a class="dropdown-item app-status" href="#" data-cat-id="'.$cat_data['cat_id'].'" data-table-name="category" data-table-id-field="cat_id" data-table-image-field="image" data-img-path="./upload/category_img/" data-toggle="modal" data-target="#change_image" onclick = change_image_data(this);>Change Icon</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="#" data-cat-id="'.$cat_data['cat_id'].'" data-table-name="category" data-table-id-field="cat_id" data-order-field="order_in_slider" data-table-image-field="image" data-img-path="./upload/category_img/" data-toggle="modal" data-target="#modal_confirm_category" onclick = confirm_modal(this); >Delete</a>
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

	
	
	#################################### DELETE FILE FROM THE FOLDER ###################################
	public function delete_file($folderPath, $image_field, $table_name, $array) {
		$old_image = $this->Common_model->common_select_single_row($image_field, $table_name, $array);
		if(!empty($old_image)) {
			if(file_exists($folderPath.$old_image[$image_field])) {
				return unlink($folderPath.$old_image[$image_field]);
			}
			else return false;
		}
	}
	################################ END OF DELETE FILE FROM THE FOLDER ################################



	############################ COMMON DELETE RECORD FROM DATABSE USING AJAX ##########################
	public function common_delete_ajax() {
		$table_name = $this->input->post("table");
		$where = $this->input->post("id");
		$record_id = $this->input->post("record_id");
		$order_field = $this->input->post("order_field");
		$image_field = $this->input->post("img_field");
		$app_screen_field = $this->input->post("app_screen_field");
		$folder_field = $this->input->post("folder_field");
		$app_screen_folder = $this->input->post("app_screen_folder");
		$data['response'] = '';		
		$array = array($where => $record_id);
		
		//////////////////////// Get deleted order and maximum order from the table /////////////////////
		if($order_field != '') {
			$get_order = $this->Common_model->common_select_single_row($order_field, $table_name, $array);
			$get_order2 = $this->Common_model->common_select_max_single_row($order_field, '', $table_name);
			
			$deleted_order = $get_order[$order_field];
			$max_order = $get_order2[$order_field];
		}

		////////////////////////////////// Delete image from the folder //////////////////////////////////////
		/* Only for the app delete (Delete app screens data form the folder and the databse) */
		if($app_screen_field != '' && $app_screen_folder != '') {
			$data['app_screen_data'] = $this->Common_model->common_select($app_screen_field, 'screenshots', $array, array());
			foreach($data['app_screen_data'] as $key) {
				unlink($app_screen_folder.$key->image);
			}
			$this->Common_model->common_delete('screenshots', array('app_id'=>$record_id));
		}

		/* Common delete file */
		$delete_file = $this->delete_file($folder_field, $image_field, $table_name, $array);
		////////////////////////////// End of Delete image from the folder ////////////////////////////////////

		$delete_status = $this->Common_model->common_delete($table_name, array($where=>$record_id));
		if($delete_status) {
			///////// Decrease order to 1 for all next records who comes later after deleted record ////////////
			if($order_field != '') {
				for($i = $deleted_order; $i < $max_order; $i++) {
					$this->Common_model->common_update($table_name, array($order_field=>$i), array($order_field=>$i+1));
				}
			}
			$data['response'] = "success";
		} 
		else $data['response'] = "failed";
		
		echo json_encode($data);
	}	
	######################## END OF COMMON DELETE RECORD FROM DATABSE USING AJAX #######################


	############################# CHANGE IMAGE FROM DATABSE USING AJAX #################################
	public function change_image_ajax() {
		$table_name = $this->input->post("table");
		$where = $this->input->post("id");
		$record_id = $this->input->post("record_id");
		$image_field = $this->input->post("image_field");
		$folderPath = $this->input->post("folderPath");
		$array = array($where => $record_id);
		$image_name = '';
		$data['response'] = '';


		////////////////////////////////// Get old image and delete it//////////////////////////////////////
		$delete_file = $this->delete_file($folderPath, $image_field, $table_name, $array);
		
		/////////////////////// Upload new image and update the record in the database//////////////////////		
		if(isset($_FILES['imageFile']) && $_FILES['imageFile']['name'] != '') {
			$image_name = $this->Common_model->image_upload($folderPath."/", 'imageFile');
		}		
		
		if($image_name != '') {
			$update_status = $this->Common_model->common_update($table_name, array($image_field=>$image_name), array($where=>$record_id));
			if($update_status) {
				$data['response'] = "success";					
				$data['image_name'] = $image_name;
			}
			else {
				$data['image_name'] = $image_name;
				$data['response'] = "failed";
			}	
		}
		else {
			$data['image_name'] = $image_name;
			$data['response'] = "failed";
		}		
		echo json_encode($data);		
	}
	############################ END OF CHANGE IMAGE FROM DATABSE USING AJAX ###########################


	################################### ADD NEW IMAGE USING AJAX #######################################
		public function add_new_image_ajax() {
			$table_name = $this->input->post("table");
			$where = $this->input->post("id");
			$record_id = $this->input->post("record_id");
			$image_field = $this->input->post("image_field");
			$folderPath = $this->input->post("folderPath");
			$array = array($where => $record_id);
			$image_name = '';
			$data['response'] = '';
			
			/////////////////////// Upload new image and update the record in the database//////////////////////
			$screenshots = array();
			if(isset($_FILES['imageFile']) && $_FILES['imageFile']['name'] != '') {
				$files = $_FILES;
				$total_screenshots = count($_FILES['imageFile']['name']);
				for($i = 0; $i < $total_screenshots; $i++) {
					$_FILES['imageFile']['name'] = $files['imageFile']['name'][$i];
					$_FILES['imageFile']['type'] = $files['imageFile']['type'][$i];
					$_FILES['imageFile']['tmp_name'] = $files['imageFile']['tmp_name'][$i];
					$_FILES['imageFile']['error'] = $files['imageFile']['error'][$i];
					$_FILES['imageFile']['size'] = $files['imageFile']['size'][$i];

					$screenshot_name = $this->Common_model->image_upload('./upload/app_screenshots/', 'imageFile');
					
					if($screenshot_name != '') {
						//////////////////////////////// INSERT SCREENSHOT IN DATABSE ////////////////////////////////
						$screenshots[] = array('app_id'=>$record_id, 'image'=>$screenshot_name);
					}
				}
				
				if(!empty($screenshots)) {
					$upload_status = $this->Common_model->common_batch_insert('screenshots', $screenshots);
					if($upload_status) {
						$data['response'] = "success";
						$data['app_screen_data'] = $screenshots;
					}
					else $data['response'] = "failed";
				}
				else $data['response'] = "failed";
			}
			echo json_encode($data);
		}
	################################ END OF ADD NEW IMAGE USING AJAX ###################################


	################################### GET RECORDS FROM APP USING AJAX ################################
	function manage_app_ajax() {
		$app_id = $this->input->post("app_id");
		$table_name = $this->input->post("table");
		$data['response'] = 'success';
		$fields = array('cat_id', 'name', 'enable_disable');
		$order_by = array('name', 'ASC');

		$data['app_data'] = $this->Common_model->common_select_single_row(array(), $table_name, array('app_id'=>$app_id));
		// $data['app_data']['tags'] = explode(',', $data['app_data']['tags']);
		$data['cat_data'] = $this->Common_model->common_select($fields, 'category', array(), $order_by);
		echo json_encode($data);
	}
	################################### GET RECORDS FROM APP USING AJAX ################################


	################################### GET RECORDS FROM APP USING AJAX ################################
	function manage_app_description_ajax() {
		$app_id = $this->input->post("app_id");
		$table_name = $this->input->post("table");
		$data['response'] = 'success';		
		$data['app_data'] = $this->Common_model->common_select_single_row(array(), $table_name, array('app_id'=>$app_id));
		if(!empty($data['app_data'])) $data['response'] = 'success';
		else $data['response'] = 'failed';
		echo json_encode($data);
	}
	################################### GET RECORDS FROM APP USING AJAX ################################


	############################ GET RECORDS FROM SCREENSHOTS USING AJAX ###############################
	function manage_app_screens_ajax() {
		$app_id = $this->input->post("app_id");
		$table_name = $this->input->post("table");
		$data['response'] = '';
		$data['app_screen_data'] = $this->Common_model->common_select('*', 'screenshots', array('app_id'=>$app_id), array());
		if(!empty($data['app_screen_data'])) $data['response'] = 'success';
		else $data['response'] = 'failed';
		echo json_encode($data);
	}
	############################## GET RECORDS FROM SCREENSHOTS USING AJAX #############################


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

	
	################################ GET RECORDS FROM TRENDING BANNER USING AJAX ########################	
	public function manage_trending_banner_ajax() {
		$banner_id = $this->input->post("banner_id");
		$table_name = $this->input->post("table");
		$data['response'] = 'success';
		$data['maximum_order'] = $this->Common_model->common_select_max_single_row('order_slider', '', 'trending_banner');
		$data['app_data'] = $this->Common_model->common_select_single_row(array(), $table_name, array('trending_id'=>$banner_id));
		echo json_encode($data);
	}
	########################## END OF GET RECORDS FROM TRENDING BANNER USING AJAX ######################


	################################### UPDATE HOME SLIDER USING AJAX ##################################
	public function update_home_slider_ajax() {
		$table_name = $this->input->post("table");
		$where = $this->input->post("id");
		$home_slider_id = $this->input->post("slider_id");
		$title = $this->input->post("slider_title");
		$description = $this->input->post("description");
		$btn_link = $this->input->post("slider_btn_link");
		$slider_order = $this->input->post("home_slider_order");
		$sr_num = $this->input->post("sr_num");
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
			if($update_status) {
				$data['response'] = "success";				
				$table_data = "";
				$get_data = $this->Common_model->common_select_single_row('*', 'home_slider', array('home_slider_id '=>$home_slider_id));				
				$table_data .= '<td>'.$sr_num.'</td>';
				$table_data .= '<td>'. $get_data['home_slider_id'] .'</td>';
				$table_data .= '<td>'. $get_data['title'] .'</td>';
				$table_data .= '<td><img src="./upload/home_slider_img/'.$get_data['image_name'].'" class="data-img row-icon"></td>';
				$table_data .= '<td>'. $get_data['order_slider'] .'</td>';
				$table_data .= '<td class="scroll-field">'. $get_data['description'] .'</td>';			
				$table_data .= '<td>
									<div class="btn-group">
										<button class="btn btn-info btn-sm btn-edit-category" type="button" title="Edit" data-sr-num="'.$sr_num.'" data-row-id="'.$get_data['home_slider_id'].'" onclick = my_home_slider_edit(this);>
											<i class="mdi mdi-pencil"></i>
										</button>

										<button class="btn btn-sm btn-cancel display-none" type="button" title="Cancel Edit">
											<i class="fas fa-times"></i>
										</button>

										<button type="button" class="btn btn-sm btn-info dropdown-toggle dropdown-toggle-split btn-group-last" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="mdi mdi-chevron-down"></i>
										</button>

										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="#" data-enable-disable="'.$get_data['enable_disable'].'" data-row-id="'.$get_data['home_slider_id'].'" data-table-name="home_slider" data-table-id-field="home_slider_id" onclick = my_cat_enable_disable(this);>Enable/Disable</a>

											<a class="dropdown-item app-status" href="#" data-cat-id="'.$get_data['home_slider_id'].'" data-table-name="home_slider" data-table-id-field="home_slider_id" data-table-image-field="image_name" data-img-path="./upload/home_slider_img/" data-toggle="modal" data-target="#change_image" onclick = change_image_data(this);>Change Image</a>

											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="#" data-cat-id="'.$get_data['home_slider_id'].'" data-table-name="home_slider" data-table-id-field="home_slider_id" data-order-field="order_in_slider" data-table-image-field="image_name" data-img-path="./upload/home_slider_img/" data-toggle="modal" data-target="#modal_confirm_category" onclick = confirm_modal(this); >Delete</a>
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
	############################### END OF UPDATE HOME SLIDER USING AJAX ###############################



	###################################### UPDATE APP USING AJAX #######################################
	public function update_app_ajax() {		
		$table_name = $this->input->post("table");
		$where = $this->input->post("id");
		$app_id = $this->input->post("app_id");
		$app_name = $this->input->post("app_name");
		$company_name = $this->input->post("company_name");
		$contact_person = $this->input->post("contact_person");
		$telcode_mobile = $this->input->post("telcode_mobile");
		$mobile = $this->input->post("mobile");
		$telcode_whatsapp = $this->input->post("telcode_whatsapp");
		$whatsapp = $this->input->post("whatsapp");
		$email = $this->input->post("email");
		$category = $this->input->post("category");
		$last_update = $this->input->post("last_update");
		$video_link = $this->input->post("video_link");
		$android_link = $this->input->post("android_link");
		$ios_link = $this->input->post("ios_link");
		$instagram_link = $this->input->post("instagram_link");
		$facebook_link = $this->input->post("facebook_link");
		$website = $this->input->post("website");
		$app_rating = $this->input->post("app_rating");
		$app_installs = $this->input->post("app_installs");
		$english = $this->input->post("english");
		$arabic = $this->input->post("arabic");
		$tags = $this->input->post("tags");
		$sr_num = $this->input->post("sr_num");
		$data['response'] = 'success';
		$update_status = "";
		
		$update_data = array('app_name' => $app_name,
							'company_name' => $company_name,
							'contact_person' => $contact_person,
							'telcode_mobile' => $telcode_mobile,
							'mobile' => $mobile,
							'telcode_whatsapp' => $telcode_whatsapp,
							'whatsapp' => $whatsapp,
							'email' => $email,
							'category' => $category,
							'last_update' => $last_update,
							'video_link' => $video_link,
							'android_link' => $android_link,
							'ios_link' => $ios_link,
							'instagram_link' => $instagram_link,
							'facebook_link' => $facebook_link,
							'website' => $website,
							'app_rating' => $app_rating,
							'app_installs' => $app_installs,
							'english' => $english,
							'arabic' => $arabic,
							'tags' => $tags						
						);
		
		$update_status = $this->Common_model->common_update($table_name, $update_data, array($where => $app_id));
		if($update_status) {
		 	$data['response'] = "success";
			$table_data = "";
			$get_data = $this->Common_model->common_select_single_row('*', $table_name, array($where => $app_id));

			if($get_data['promotion'] == 1) {
				$promotion = "bg-success text-white";
				$ed_operatoin = "disabled";
			} 
			else if($get_data['promotion'] == 2) {
				$promotion = "bg-warning text-dark";
				$ed_operatoin = "disabled";
			} 
			else if($get_data['promotion'] == 3) {
				$promotion = "bg-danger text-white";
				$ed_operatoin = "";
			}
			else {
				$promotion = "";
				$ed_operatoin = "";
			}
			
			$table_data .= '<td>'.$sr_num.'</td>';
			$table_data .= '<td>'. $get_data['app_id'] .'</td>';
			$table_data .= '<td>'. $get_data['app_name'] .'</td>';
			$table_data .= '<td><img src="./upload/app_icon/'.$get_data['app_icon'].'" class="data-img row-icon"></td>';
			$table_data .= '<td>'. $get_data['category'] .'</td>';
			$table_data .= '<td>'. $get_data['company_name'] .'</td>';
			$table_data .= '<td>'. $get_data['contact_person'] .'</td>';
			$table_data .= '<td>('. $get_data['telcode_mobile'] .') '.$get_data['mobile'].'</td>';
			$table_data .= '<td>('. $get_data['telcode_whatsapp'] .') '.$get_data['whatsapp'].'</td>';
			$table_data .= '<td>'. $get_data['email'] .'</td>';
			$table_data .= '<td class="scroll-field scroll-field-link">'. $get_data['android_link'] .'</td>';
			$table_data .= '<td class="scroll-field scroll-field-link">'. $get_data['ios_link'] .'</td>';
			$table_data .= '<td class="scroll-field scroll-field-link">'. $get_data['video_link'] .'</td>';
			$table_data .= '<td>'. $get_data['last_update'] .'</td>';
			$table_data .= '<td class="scroll-field">'. $get_data['tags'] .'</td>';
			$table_data .= '<td class="scroll-field single_refresh">'. $get_data['description'] .'</td>';
			$table_data .= '<td class="scroll-field scroll-field-link">'. $get_data['website'] .'</td>';
			$table_data .= '<td class="scroll-field scroll-field-link">'. $get_data['instagram_link'] .'</td>';
			$table_data .= '<td class="scroll-field scroll-field-link">'. $get_data['facebook_link'] .'</td>';
			$table_data .= '<td>'. $get_data['app_size'] .'</td>';
			$table_data .= '<td>'. $get_data['app_rating'] .'</td>';
			$table_data .= '<td>'. $get_data['app_installs'] .'</td>';

			if($get_data['english'] == 1) {
				$table_data .= '<td><i class="fas fa-check"></i></td>';
			}
			else {
				$table_data .= '<td><i class="fas fa-times"></i></td>';
			}
			if($get_data['arabic'] == 1) {
				$table_data .= '<td><i class="fas fa-check"></i></td>';
			}
			else {
				$table_data .= '<td><i class="fas fa-times"></i></td>';
			}
			if($get_data['t_c'] == 1) {
				$table_data .= '<td><i class="fas fa-check"></i></td>';
			}
			else {
				$table_data .= '<td><i class="fas fa-times"></i></td>';
			}
			if($get_data['a_c'] == 1) {
				$table_data .= '<td><i class="fas fa-check"></i></td>';
			}
			else {
				$table_data .= '<td><i class="fas fa-times"></i></td>';
			}			
			$table_data .= '<td>'. $get_data['datetime'] .'</td>';
			$table_data .= '<td>'. $get_data['details_update'] .'</td>';
			$table_data .= '<td>'. $get_data['added_by'] .'</td>';
			$table_data .= '<td>
								<div class="btn-group">
									<button class="btn btn-info btn-sm btn-edit-category" type="button" title="Edit" data-sr-num="'.$sr_num.'" data-row-id="'.$get_data['app_id'].'" onclick = my_app_edit(this);>
										<i class="mdi mdi-pencil"></i>
									</button>

									<button class="btn btn-sm btn-cancel display-none" type="button" title="Cancel Edit">
										<i class="fas fa-times"></i>
									</button>

									<button type="button" class="btn btn-sm btn-info dropdown-toggle dropdown-toggle-split btn-group-last" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="mdi mdi-chevron-down"></i>
									</button>

									<div class="dropdown-menu dropdown-menu-right text-align-right">

										<a class="dropdown-item '.$ed_operatoin.'" href="#" data-enable-disable = "'.$get_data['enable_disable'].'" data-row-id="'.$get_data['app_id'].'" data-table-name="app" data-table-id-field="app_id" onclick = enable_disable_data(this);>Enable/Disable</a>

										<a class="dropdown-item app-status" href="#" data-row-id="'.$get_data['app_id'].'" data-table-name="app" data-table-id-field="app_id" data-table-image-field="app_icon" data-img-path="./upload/app_icon/" data-toggle="modal" data-target="#change_image" onclick = change_image_data(this);>Change Icon</a>

										<a class="dropdown-item edit_des" href="#" onclick = my_app_edit_des(this); data-sr-num="'.$sr_num.'" data-row-id="'.$get_data['app_id'].'">
											Edit Description
										</a>

										<div class="dropdown-submenu">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
												<span class="caret"></span>
												<span class="nav-label">Screenshots</span>
											</a>
											<div class="dropdown-menu text-align-right">
												<a class="dropdown-item" href="#"data-row-id="'.$get_data['app_id'].'" data-table-name="screenshots" data-table-id-field="app_id" data-table-image-field="image" data-img-path="./upload/app_screenshots/" data-toggle="modal" data-target="#new_image" onclick = new_image_data(this);>Add New Screenshots</a>
												<a class="dropdown-item edit_screenshots" href="#">Edit Existing Screenshots</a>
											</div>
										</div>

										<a class="dropdown-item disabled" href="#">Add to Promotion</a> 
										<a class="dropdown-item disabled" href="#">Remove Promotion</a>
										
										<div class="dropdown-divider"></div>

										<a class="dropdown-item" href="#" data-row-id="'.$get_data['app_id'].'" data-table-name="app" data-table-id-field="app_id" data-order-field="" data-table-image-field="app_icon" data-img-path="./upload/app_icon/" data-toggle="modal" data-target="#modal_confirm_delete" onclick = confirm_modal_delete(this); >Delete</a>
									</div>
								</div>
							</td>';
				
			$data['table_data'] = $table_data;
		} 
		else $data['response'] = "failed";
		
		echo json_encode($data);	
	}
	################################## END OF UPDATE APP USING AJAX ####################################



	############################### END OF APP DESCRIPTION USING AJAX ##################################

	############################### END OF UPDATE APP DESCRIPTION AJAX #################################

	public function update_app_des_ajax() {
		$table_name = $this->input->post("table");
		$where = $this->input->post("id");
		$app_id = $this->input->post("app_id");
		$description = $this->input->post("description");
		$data['response'] = 'success';
		$update_status = "";
		$update_status = $this->Common_model->common_update($table_name, array('description'=>$description), array($where=>$app_id));

		if($update_status) {
			$data['response'] = 'success';
		}
		else $data['response'] = 'failed';
		echo json_encode($data);
	}
	
	################################ UPDATE TRENDING BANNER USING AJAX #################################
	public function update_trending_banner_ajax() {
		$table_name = $this->input->post("table");
		$where = $this->input->post("id");
		$bannerId = $this->input->post("banner_id");		
		$slider_order = $this->input->post("trending_slider_order");
		$sr_num = $this->input->post("sr_num");
		$data['response'] = 'success';
		$update_status = "";
		
		$array = array('order_slider' => $slider_order);
		$get_order = $this->Common_model->common_select_single_row('order_slider', 'trending_banner', $array);

		///////////////////////////////SWAP ORDER NUMBER IF ALREADY EXIST/////////////////////////////////
		if(!empty($get_order) &&  $get_order['order_slider'] != '') {
			
			$array = array('trending_id'=>$bannerId);
			$old_trending_id = $this->Common_model->common_select_single_row('order_slider', 'trending_banner', $array);
			
			if($old_trending_id['order_slider'] < $slider_order) {				
				$old_record = array();
				for($i = $old_trending_id['order_slider']; $i <= $slider_order; $i++) {
					$where = array('order_slider' => $i);
					$x_data = $this->Common_model->common_select_single_row('trending_id', 'trending_banner', $where);
					if($x_data['trending_id']) {
						$old_record[$x_data['trending_id']] = $i-1;
					}
				}

				foreach($old_record as $key => $get_data) {
					$update_status = $this->Common_model->common_update($table_name, array('order_slider'=>$get_data), array('trending_id'=>$key));
				}
			}
			else if($old_trending_id['order_slider'] > $slider_order) {
				$old_record = array();
				for($i = $old_trending_id['order_slider']; $i >= $slider_order; $i--) {
					$where = array('order_slider' => $i);
					$x_data = $this->Common_model->common_select_single_row('trending_id', 'trending_banner', $where);
					if($x_data['trending_id']) {
						$old_record[$x_data['trending_id']] = $i+1;
					}
				}
				foreach($old_record as $key => $get_data) {
					$update_status = $this->Common_model->common_update($table_name, array('order_slider'=>$get_data), array('trending_id'=>$key));
				} 
			}
			else $update_status = true;
		}
		
		if($update_status) {
			$update_status = $this->Common_model->common_update($table_name, array('order_slider'=>$slider_order), array('trending_id'=>$bannerId));
			if($update_status) {
				$data['response'] = "success";				
				$table_data = "";
				$get_data = $this->Common_model->common_select_single_row('*', 'trending_banner', array('trending_id'=>$bannerId));				
				
				$table_data .= '<td>'.$sr_num.'</td>';
				$table_data .= '<td>'. $get_data['trending_id'] .'</td>';
				$table_data .= '<td><img src="./upload/trending_img/'.$get_data['trending_img'].'" class="data-img row-icon"></td>';
				$table_data .= '<td>'. $get_data['order_slider'] .'</td>';
				$table_data .= '<td>
									<div class="btn-group">
										<button class="btn btn-info btn-sm btn-edit-category" data-sr-num="'.$sr_num.'" data-row-id="'.$get_data['trending_id'].'" onclick = my_trending_banner_edit(this); type="button" title="Edit">
											<i class="mdi mdi-pencil"></i>
										</button>

										<button class="btn btn-sm btn-cancel display-none" type="button" title="Cancel Edit">
											<i class="fas fa-times"></i>
										</button>
										
										<button type="button" class="btn btn-sm btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="mdi mdi-chevron-down"></i>
										</button>

										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item app-status" href="#"  data-enable-disable = "'.$get_data['enable_disable'].'" data-row-id="'.$get_data['trending_id'].'" data-table-name="trending_banner" data-table-id-field="trending_id" onclick = enable_disable_data(this);>Enable/Disable</a>

											<a class="dropdown-item app-status" href="#" data-row-id="'.$get_data['trending_id'].'" data-table-name="category" data-table-id-field="trending_id" data-table-image-field="image" data-img-path="./upload/category_img/" data-toggle="modal" data-target="#change_image" onclick = change_image_data(this);>Change Image</a>
											
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="#" data-row-id="'.$get_data['trending_id'].'" data-table-name="category" data-table-id-field="trending_id" data-order-field="order_in_slider" data-table-image-field="trending_img" data-img-path="./upload/trending_img/" data-toggle="modal" data-target="#modal_confirm_delete" onclick = confirm_modal_delete(this); >Delete</a>
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
	########################### END OF UPDATE TRENDING BANNER USING AJAX ###############################
}
?>