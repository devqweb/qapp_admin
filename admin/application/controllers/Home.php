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
			$this->form_validation->set_rules('english','<b>English</b>','trim|required');
			$this->form_validation->set_rules('arabic','<b>Arabic</b>','trim|required');
			$this->form_validation->set_rules('tnc','<b>Terms and Condition</b>','trim|required');
			$this->form_validation->set_rules('authorConfirm','<b>Authorization Confirmation</b>','trim|required');

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
					$english = ($this->input->post('english') == 1) ? 1 : 0;
					$arabic = ($this->input->post('arabic') == 1) ? 1 : 0;
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

					$app_id = $this->Common_model->common_insert('app', $values);

					if($app_id) {
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
									$screenshots[] = array('app_id'=>$app_id, 'image'=>$screenshot_name);
								}
							}
							
							if(!empty($screenshots)) {
								$this->Common_model->common_batch_insert('screenshots', $screenshots);
							}
							else {
								echo "screenshots not uploaded.";
							}
						}
					}
					else {
						echo "app not added";	
					}
				}
				else {
					echo "app not added";
				}
			}
		}
		$id = array('cat_id', 'name');
		$data['category'] = $this->Common_model->common_select($id, 'category', array());
		//print_r($data);
		$this->CommonPage("new_app", $data);
	}

	############################################ MANAGE APPS ##########################################
	public function manage_app() {
		$this->CommonPage("manage_app", "");
	}

	############################################ ADD NEW CATEGORY #####################################
	public function new_category() {
		
		////////////////////////////////// INSERT / UPDATE FUNCTION //////////////////////////////////
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
					$image_name = $this->Common_model->image_upload('./upload/category_img/','catIcon');
					if($image_name!='')
					{
						$cat_name = $this->input->post('catName');
						$slider_order = $this->input->post('dsOrder');
						$submit = $this->input->post('submit');

						$values = array('name' => $cat_name, 'oder_in_slider' => $slider_order, 'image' => $image_name);
						$save_data = $this->Common_model->common_insert('category', $values);
						//echo $save_category;
					}
					else {
						echo "failed";
					}
				}

			}
			//print_r($_FILES);
			//die('test');
		}
		# END OF INSERT / UPDATE FUNCTION
			
		$this->CommonPage("new_category", "");
	}
	############################################ END OF ADD NEW CATEGORY ##############################
	

	############################################ MANGAGE CATEGORIES ###################################
	public function manage_category() {
		$this->CommonPage("manage_category", "");
	}

	############################################ ADD NEW HOME SLIDER ##################################	
	public function new_home_slider() {
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
					$image_name = $this->Common_model->image_upload('./upload/home_slider_img/','slider_img');
					if($image_name != '') {
						$title = $this->input->post('title');
						$des = $this->input->post('des');
						$btn_link = $this->input->post('btn_link');
						$order_slider = $this->input->post('order_slider');
						
						$values = array('title' => $title,
										'description' => $des,
										'button_link' => $btn_link,
										'order_slider' => $order_slider,
										'image_name' => $image_name);

						$save_data = $this->Common_model->common_insert("home_slider", $values);

						if($save_data) {
							echo "successful";
						}
						else {
							echo "failed";
						}
					}
				}
			}
		}
		$this->CommonPage("new_home_slider", "");
	}
	############################################ END OF ADD NEW HOME SLIDER ###########################


	############################################ MANAGE HOME SLIDER ###################################
	public function manage_home_slider() {
		$this->CommonPage("manage_home_slider", "");
	}

	############################################ ADD NEW TRENDING BANNER ##############################
	public function new_trending_banner() {
		if(isset($_POST['submit'])) {
			$this->form_validation->set_error_delimiters('<div class="ci-form-error">', '</div>');
			
			if(empty($_FILES['banner_image']['name'])) {
				$this->form_validation->set_rules('banner_image', '"Banner Image"', 'trim|required');
			}			
			else {
				if(isset($_FILES['banner_image']) && $_FILES['banner_image']['name'] != '') {
					$image_name = $this->Common_model->image_upload('./upload/trending_img/', 'banner_image');
					if($image_name != '') {
						$banner_Order = $this->input->post('banner_Order');

						$values = array('trending_img' => $image_name, 'order_slider' => $banner_Order);

						$save_data = $this->Common_model->common_insert('trending_banner', $values);

						if($save_data) {
							echo "successful";
						}
						else {
							echo "failed";
						}
					}
				} 
			}
		}
		$this->CommonPage("new_trending_banner", "");
	}

	############################################ MANAGE TRENDING BANNER ###############################
	public function manage_trending_banner() {
		$this->CommonPage("manage_trending_banner", "");
	}
	




}
?>