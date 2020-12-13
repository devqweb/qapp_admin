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

	############################################ FORM ADD NEW APP #####################################
	public function add_new_app() {
		$this->CommonPage("add_app", '');
	}

	############################################ MANAGE APPS ##########################################
	public function manage_app() {
		$this->CommonPage("manage_app", "");
	}

	############################################ ADD NEW CATEGORY #####################################
	public function new_category() {
		
		# INSERT / UPDATE FUNCTION
		if(isset($_POST['submit']))
		{
			$this->form_validation->set_error_delimiters('<div class="ci-form-error">', '</div>');
			$this->form_validation->set_rules('dsOrder','"Order in Drag Slider"','trim|required');

			if(empty($_FILES['catIcon']['name'])) {
				$this->form_validation->set_rules('catIcon', 'Category Icon', 'trim|required');
			}
			
			if($this->input->post('submit') =='Add Category')
			{
				$this->form_validation->set_rules('catName','"Category Name"','trim|required|is_unique[category.name]');
				//$this->form_validation->set_rules('cat_id','"Category Name"','trim');
			}
			else
			{
				$this->form_validation->set_rules('catName','"Category Name"','trim|required');
				//$this->form_validation->set_rules('cat_id','"Category Name"','trim|required');
			}

			if($this->form_validation->run())
			{
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
			$this->form_validation->set_rules('title', '"Slider Title"', 'trim|required');
			$this->form_validation->set_rules('des', '"Description"', 'trim|required');
			
			if(empty($_FILES['slider_img']['name'])) {
				$this->form_validation->set_rules('slider_img', '"Image"', 'trim|required');
			}

			if($this->input->post('submit') == 'Add To Home Slider') {
				$this->form_validation->set_rules('btn_link', '"Button Link"', 'trim|required|is_unique[home_slider.button_link]');
				//$this->form_validation->set_rules('home_slider_id','"Button Link"','trim|required');
			}
			else {
				$this->form_validation->set_rules('btn_link','"Button Link"','trim|required');
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