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
		$this->db->insert_batch($table, $values);
	}

	public function common_update($table,$values,$where)
	{
		$this->db->update($table, $values, $where);
	}

	public function common_delete($table,$where)
	{
		$this->db->delete($table,$where);
	}

	############################################ IMAGE UPLOAD #########################################
	public function image_upload($folder, $filename)
	{
		$this->load->library('upload');
		$config['upload_path'] = $folder;
		$config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
		$config['encrypt_name'] = TRUE;
		$this->upload->initialize($config);

		$dataname = '';
		if(!$this->upload->do_upload($filename))
		{
			return $dataname;
		}
		else
		{
			$data = $this->upload->data();
			$dataname = $data['file_name'];
			return $dataname;
		}
	}
	############################################ END OF IMAGE UPLOAD ##################################

}
?>