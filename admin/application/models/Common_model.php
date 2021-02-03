<?php
class Common_model extends CI_Model {

	public function Set_Message($type,$message)
	{
		$_SESSION['MESSAGE'] = $data = '';

		if($type==1)
		{
			$data = '<div class="callout new-alert callout-success"><span>'.$message.'</span></div>';
		}
		elseif($type==2)
		{
			$data = '<div class="callout new-alert callout-danger"><span>'.$message.'</span></div>';
		}
		elseif($type==3)
		{
			$data = '<div class="callout new-alert callout-warning"><span>'.$message.'</span></div>';
		}

		$_SESSION['MESSAGE'] = $data;
	}

	public function View_message()
	{
		if(isset($_SESSION['MESSAGE']) && $_SESSION['MESSAGE']!='')
		{
			echo $_SESSION['MESSAGE'];
			$_SESSION['MESSAGE']='';
		}
	}

	public function date_format_changer($date)
	{
		$D1 = explode('/', $date);
		$date = $D1[2].'-'.$D1[1].'-'.$D1[0];
		return $date;
	}

	public function ip_address()
	{
		if(!empty($_SERVER['HTTP_CLIENT_IP']))
		{
			$ip = $_SERVER['HTTP_CLIENT_IP']; //check ip from share internet
		}
		elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
		{
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR']; //to check ip is pass from proxy
		}
		else
		{
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}

	public function sql_query($query)
	{
		$this->db->query($query);
	}

	//INSERT INTO DATABASE TABLE
	public function common_insert($table, $values)
	{
		//$values['ip'] = $this->ip_address();
		//$values['created_by'] = $this->session->userdata('logged_in')['users_id'];
		$this->db->insert($table, $values);
		return $this->db->insert_id();
	}

	public function common_batch_insert($table,$values)
	{
		return $this->db->insert_batch($table, $values);
	}

	public function common_update($table,$values,$where)
	{
		return $this->db->update($table, $values, $where);
		//echo $this->db->last_query();
	}

	
	############################################ COMMON DELETE ########################################
	public function common_delete($table, $where) {
		return $this->db->delete($table, $where);
	}
	####################################### END OF COMMON DELETE ######################################


	
	############################################ IMAGE UPLOAD #########################################
	public function image_upload($folder, $filename, $max_size, $max_width, $max_height)
	{
		$this->load->library('upload');
		$config['upload_path'] = $folder;
		$config['allowed_types'] = 'gif|jpg|png|jpeg|webp|svg';
		$config['max_size']      = $max_size;
		$config['max_width'] = $max_width;
		$config['max_height'] = $max_height;
		$config['encrypt_name'] = TRUE;
		$this->upload->initialize($config);

		$dataname = '';
		
		if(!$this->upload->do_upload($filename)) {
			//$error = array('error' => $this->upload->display_errors());
			return "over-size";
		}
		else {
			$data = $this->upload->data();
			$dataname = $data['file_name'];
			return $dataname;
		}
	}
	############################################ END OF IMAGE UPLOAD ##################################



	############################################ COMMON SELECT ########################################
	public function common_select($fields, $table, $where, $order_by) {
		$this->db->select($fields);
		$this->db->from($table);
		$this->db->where($where);
		if(!empty($order_by)) $this->db->order_by($order_by[0], $order_by[1]);
		$query = $this->db->get();
		return $query->result();
	}
	########################################## END OF COMMON SELECT ###################################

	####################################### COMMON SELECT MAX VALUE ###################################
	public function common_select_max($maxFiled, $myName, $table) {
		$this->db->select_max($maxFiled, $myName);
		$this->db->from($table);
		$query = $this->db->get();
		return $query->row_array();
	}
	################################## END OF COMMON SELECT MAX VALUE #################################

	#################################### COMMON SELECT SINGLE ROW #####################################
	public function common_select_single_row($fields, $table, $where) {
		$this->db->select($fields);
		$this->db->from($table);
		$this->db->where($where);
		$query = $this->db->get();
		return $query->row_array();
	}
	############################### END OF COMMON SELECT SINGLE ROW ###################################

	################################ COMMON SELECT SINGLE ROW MAX VALUE ###############################
	public function common_select_max_single_row($maxFiled, $myName, $table) {
		$this->db->select_max($maxFiled, $myName);
		$this->db->from($table);
		$query = $this->db->get();
		return $query->row_array();
	}
	########################### END OF COMMON SELECT SINGLE ROW MAX VALUE #############################
	
	################################### COMMON UPDATE SINGLE ROW ######################################
	public function common_update_single_row($table, $where, $id, $data) {
	// 	$data = array(
	// 		'title' => $title,
	// 		'name' => $name,
	// 		'date' => $date
	// );
	
	$this->db->where($where, $id);
	$this->db->update($table, $data);
	}
	############################### END OF COMMON UPDATE SINGLE ROW ###################################
}
?>