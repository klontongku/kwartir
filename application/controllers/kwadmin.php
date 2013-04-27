<?php

class KWAdmin extends CI_Controller{
		
		public function __construct(){
	    	parent::__construct();
			$this->load->helper(array('common'));
			$this->load->model(array('Admin'));
			$this->load->library(array('form_validation', 'pagination'));
	    }

	    public function index(){
	    	if($this->input->cookie("kwid",TRUE)){ 
	    		redirect('kwadmin/userlist'); 
	    	}else{
	    		redirect('kwadmin/login');
	    	}
	    }

	    public function login()
	    {
	    	if($this->input->cookie("kwid",TRUE)){ redirect('admin/userlist'); }
	    	
	    	$data=array();
	    	if($_POST){
	    		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
 				$this->form_validation->set_rules('password', 'Password', 'trim|required');

 				//validasi form login
 				if ($this->form_validation->run() == FALSE)
				{
					$data['message'] = str_replace("\n"," ",strip_tags(validation_errors()));
				}
				else
				{
					//validasi benar
					$email = $this->input->post('email');
					$pass = $this->input->post('password');
					$check = $this->Admin->checksignin($email,$pass);
					if(count($check) == 0){
						//database cek salah
						$data['message'] = "Wrong Email and Password";
					}else{
						//database semua benar
						foreach($check as $row){
							$kwid = $row->id;
							$kwuser = $row->name;
							$kwrole = $row->role_id;
						}
						//set cookie
						$this->input->set_cookie("kwid",$kwid,0);
						$this->input->set_cookie("kwuser",$kwuser,0);
						$this->input->set_cookie("kwrole",$kwrole,0);

						redirect('kwadmin/userlist');
					}

				}
	    	}
	    	$this->load->view('admin/login',$data);
	    }

	    public function userlist()
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }
	    	$data['nav'] = 1;
	    	$data['page'] = "List Anggota";

	    	$this->load->library('pagination');
	    	$keyword = $this->input->get("keyword");
			$type = $this->input->get("type");
	    	
	    	$data['members'] = $this->Admin->getmembers($keyword,$type,0,0);
	    	$data['jml'] = count($data['members']);
	    	if($this->input->get("type")){
				$config['base_url'] = base_url()."kwadmin/userlist/?type=".$type."&keyword=".$keyword;
			}else{
				$config['base_url'] = base_url()."kwadmin/userlist/?p=";
			}

			$config['total_rows'] = count($data['members']);
			$config['per_page'] = 6; 
			$config['page_query_string'] = TRUE ;	

			if($this->input->get("per_page"))
			{
				$data['members'] = $this->Admin->getmembers($keyword,$type,$this->input->get("per_page"),$config["per_page"]);
			}
			else
			{
				$data['members'] = $this->Admin->getmembers($keyword,$type,0,$config["per_page"]);
			}

			//get taken atau print status
			$tempid = array();
			foreach($data['members'] as $row){
				array_push($tempid,$row->id);
			}

			$data['printed'] = $this->Admin->checkprintstatus($tempid);
			$data['taken'] = $this->Admin->checktakenstatus($tempid);

			$config['full_tag_open'] = '<div class="pagination pagination-centered"><ul>';
			$config['full_tag_close'] = "</ul></div>";
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';

			$this->pagination->initialize($config); 
			$data['pagination'] = $this->pagination->create_links();

	    	$this->load->view('admin/userlist',$data);
	    }

	    public function memberview($id)
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }
	    	$data['nav'] = 1;
	    	$data['page'] = "Data Anggota #".$id;
	    	$member = $this->Admin->getmemberdetail($id);
	    	foreach($member as $row){
	    		$data['name'] = $row->name;
	    		$data['nip'] = $row->NIP;
	    		$data['dob'] = $row->birthday;
	    		$data['hometown'] = $row->hometown;
	    		$data['email'] = $row->email;
	    		$data['gender'] = $row->gender;
	    		$data['blood'] = $row->blood_type;
	    		$data['agama'] = $row->religius;
	    		$data['address'] = $row->address;
	    		$data['phone'] = $row->phone;
	    		$data['active'] = $row->active;
	    		$data['created'] = $row->created;
	    		$data['image'] = $row->image;
	    	}
	    	$data['printed'] = count($this->Admin->getprintbyID($id));
	    	$data['taken'] = count($this->Admin->gettakenbyID($id));
	    	$this->load->view('admin/userview',$data);
	    }

	    public function addmember()
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }
	    	$data['nav'] = 2;
	    	$data['page'] = "Tambah Anggota";
	    	$this->load->view('admin/formmember',$data);
	    }

}

?>