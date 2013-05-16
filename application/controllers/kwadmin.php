<?php

class KWAdmin extends CI_Controller{
		
		public function __construct(){
	    	parent::__construct();
			$this->load->helper(array('common','cookie'));
			$this->load->model(array('Admin'));
			$this->load->library(array('form_validation', 'pagination','userlib'));
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
					$remember = $this->input->post('remember');
					if($remember=="") $remember = 0;
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

						$logtxt = $kwuser." (#".$kwid.") melakukan login";
						$insert = array('description_log'=>$logtxt,'created'=>date("Y-m-d H:i:s"));
						$this->Admin->insertdata("logs",$insert);

						//set cookie
						if($remember==1) $timelimit = time() + 1209600;
						else $timelimit = 0;

						$this->input->set_cookie("kwid",$kwid,$timelimit);
						$this->input->set_cookie("kwuser",$kwuser,$timelimit);
						$this->input->set_cookie("kwrole",$kwrole,$timelimit);

						redirect('kwadmin/dashboard');
					}

				}
	    	}
	    	$this->load->view('admin/login',$data);
	    }

	    public function dashboard()
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }
	    	$data['nav'] = 1;
	    	$data['page'] = "Dashboard";

	    	$data['total'] = count($this->Admin->getmembers("","",0,0));
	    	$data['thismonth'] = count($this->Admin->getmembersthismonth(date('m')));
	    	$data['reactive'] = count($this->Admin->getreactivemembers());
	    	$data['printed'] = count($this->Admin->getallprintedcard());
	    	$data['latest'] = $this->Admin->getmembers("","",0,5);

	    	$this->load->view('admin/dashboard',$data);
	    }

	    public function userlist()
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }
	    	$data['nav'] = 2;
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
	    	$data['nav'] = 2;
	    	$data['page'] = "Data Anggota #".$id;
	    	$member = $this->Admin->getmemberdetail($id);
	    	foreach($member as $row){
	    		$data['name'] = $row->name;
	    		$data['nip'] = $row->NIP;
	    		$data['dob'] = $row->birthday;
	    		$data['hometown'] = $row->hometown;
	    		$data['email'] = $row->email;
	    		$data['gender'] = $row->gender;
	    		$data['depan'] = $row->gugus_depan;
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
	    	
	    	$this->load->library('form_validation');
	    	if($_POST){
	    		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
 				$this->form_validation->set_rules('home', 'Hometown', 'trim|required|xss_clean');
 				$this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
 				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
 				
 				$this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
 				$this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|numeric');
 				$this->form_validation->set_rules('ranting', 'Kwartir Ranting', 'trim|required|numeric|max_length[2]');
 				
 				$this->form_validation->set_rules('pass', 'Password', 'required|matches[cpass]');
 				$this->form_validation->set_rules('cpass', 'Password Confirmation', 'required');

 				if ($this->form_validation->run() == FALSE)
				{
					
				}
				else
				{
					$email = $this->input->post('email');
					$cek = $this->Admin->checkemail($email);
					if($cek==0)
					{
						//proses image
						$config['upload_path'] = 'images/views/users/';
						//mkdir($config['upload_path'], 0777);
						$config['allowed_types'] = 'jpg|png';
						$config['max_width']  = '256';
						$config['max_height']  = '256';
						$config['encrypt_name'] = TRUE;
						$this->load->library('upload', $config);
							
						if (!$this->upload->do_upload("upload")){
							$data['error'] = strip_tags($this->upload->display_errors());
						}else{
							$uploadData = $this->upload->data();
							$filename = $uploadData['file_name'];
							$filetype = $uploadData['image_type'];

							//insert semua data
							$name = $this->input->post('name');
							$home = $this->input->post('home');
							$dob = $this->input->post('dob');
							$gender = $this->input->post('gender');
							$blood = $this->input->post('blood');
							$religion = $this->input->post('religion');
							$address = $this->input->post('address');
							$phone = $this->input->post('phone');
							$ranting = $this->input->post('ranting');
							$depan = $this->input->post('depan');
							$pass = $this->input->post('pass');
							$NIP = $this->userlib->createNIP($ranting,$depan);

							//insert users
							$insert = array('name'=>$name,'birthday'=>$dob,'hometown'=>strtoupper($home),'email'=>$email,
								'gender'=>$gender,'blood_type'=>$blood,'role_id'=>1,'religius'=>$religion,'address'=>$address,'NIP'=>$NIP,
								'phone'=>$phone,'gugus_depan'=>$depan,'kwartir_ranting'=>$ranting,'password'=>md5($pass),'status'=>1,
								'active'=>1,'image'=>$filename,'created'=>date('Y-m-d H:i:s'),'modified'=>date('Y-m-d H:i:s'));
							$userid = $this->Admin->insertid('users',$insert);

							//insert visibilities
							$insert = array('user_id'=>$userid,'v_phone'=>1,'v_address'=>1,'v_email'=>1);
							$this->Admin->insertdata('profile_visibilities',$insert);

							//insert log
							$logtxt = $this->input->cookie('kwuser',TRUE)." (#".$this->input->cookie('kwid',TRUE).") melakukan insert member bernama '".$name."'";
							$insert = array('description_log'=>$logtxt,'created'=>date("Y-m-d H:i:s"));
							$this->Admin->insertdata("logs",$insert);

							$this->session->set_flashdata('message', "Member Baru Sukses Didaftarkan");
							redirect('kwadmin/userlist');
						}
					}
					else
					{
						$data['error'] = "Your Email has been Registered before, Please Use Another Email";
					}
		    	}
		    }

	    	$data['nav'] = 3;
	    	$data['page'] = "Tambah Anggota";
	    	$this->load->view('admin/formmember',$data);
	    }

	    public function editmember($id)
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }

	    	$data['detail'] = $this->Admin->getmemberdetail($id);
	    	foreach($data['detail'] as $row){
	    		$image = $row->image;
	    	}


	    	$this->load->library('form_validation');
	    	if($_POST){
	    		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
 				$this->form_validation->set_rules('home', 'Hometown', 'trim|required|xss_clean');
 				$this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
 				
 				$this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
 				$this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|numeric');
 				
 				if($this->input->post('pass')){
 					$this->form_validation->set_rules('pass', 'Password', 'required|matches[cpass]');
 					$this->form_validation->set_rules('cpass', 'Password Confirmation', 'required');
 				}

 				if ($this->form_validation->run() == FALSE)
				{
					
				}
				else
				{
					
						$status=0;
						//proses image
						$config['upload_path'] = 'images/views/users/';
						//mkdir($config['upload_path'], 0777);
						$config['allowed_types'] = 'jpg|png';
						$config['max_width']  = '256';
						$config['max_height']  = '256';
						$config['encrypt_name'] = TRUE;
						$this->load->library('upload', $config);

						if (!$this->upload->do_upload("upload")){
							if($_FILES['upload']['error']!=4){
								$data['error'] = strip_tags($this->upload->display_errors());
							}
							else
							{
								$status = 1;
							}
						}else{
							//upload gambar
							$status = 1;
							$uploadData = $this->upload->data();
							$filename = $uploadData['file_name'];
							rename($config['upload_path'].$filename, $config['upload_path'].$image);
						}

						if($status==1){
							//insert semua data
							$name = $this->input->post('name');
							$home = $this->input->post('home');
							$dob = $this->input->post('dob');
							$gender = $this->input->post('gender');
							$blood = $this->input->post('blood');
							$religion = $this->input->post('religion');
							$address = $this->input->post('address');
							$phone = $this->input->post('phone');
							//$ranting = $this->input->post('ranting');
							//$depan = $this->input->post('depan');
							$pass = $this->input->post('pass');
	
							//$NIP = ""
							

							//simpan data
							$update = array('name'=>$name,'birthday'=>$dob,'hometown'=>strtoupper($home),
								'gender'=>$gender,'blood_type'=>$blood,'religius'=>$religion,'address'=>$address,
								'phone'=>$phone,'modified'=>date('Y-m-d H:i:s'));
							if ($this->input->post('pass')) {
								$update['password'] = md5($pass);
							}

							$this->Admin->updatemember($id,$update);

							$logtxt = $this->input->cookie('kwuser',TRUE)." (#".$this->input->cookie('kwid',TRUE).") melakukan edit member bernama '".$name."' (#".$id.")";
							$insert = array('description_log'=>$logtxt,'created'=>date("Y-m-d H:i:s"));
							$this->Admin->insertdata("logs",$insert);

							$this->session->set_flashdata('message', "Data member berhasil diedit");
							redirect('kwadmin/memberview/'.$id);
						}

				}
	    	}

	    	$data['nav'] = 1;
	    	$data['page'] = "Ubah Data Anggota";
	    	$this->load->view('admin/formmember',$data);
	    }

	    public function deletemember($id)
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }
	    	$update = array('deleted'=>1);
	    	$this->Admin->updatemember($id,$update);

	    	$logtxt = $this->input->cookie('kwuser',TRUE)." (#".$this->input->cookie('kwid',TRUE).") melakukan hapus member berID #".$id;
			$insert = array('description_log'=>$logtxt,'created'=>date("Y-m-d H:i:s"));
			$this->Admin->insertdata("logs",$insert);

			$this->session->set_flashdata('message', "Member #".$id." berhasil dihapus");
			redirect('kwadmin/userlist');
	    }

	    public function resetpass($id)
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }
	    	$update = array('password'=>md5('123456'));
	    	$this->Admin->updatemember($id,$update);

	    	$logtxt = $this->input->cookie('kwuser',TRUE)." (#".$this->input->cookie('kwid',TRUE).") melakukan reset password member berID #".$id;
			$insert = array('description_log'=>$logtxt,'created'=>date("Y-m-d H:i:s"));
			$this->Admin->insertdata("logs",$insert);

			$this->session->set_flashdata('message', "Password Member berhasil di-reset");
			redirect('kwadmin/userlist');
	    }

	    public function reactive($id)
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }
	    	$update = array('status'=>1,'active'=>1);
	    	$this->Admin->updatemember($id,$update);

	    	$logtxt = $this->input->cookie('kwuser',TRUE)." (#".$this->input->cookie('kwid',TRUE).") melakukan reactive member berID #".$id;
			$insert = array('description_log'=>$logtxt,'created'=>date("Y-m-d H:i:s"));
			$this->Admin->insertdata("logs",$insert);

			$this->session->set_flashdata('message', "Member berhasil di-reactive");
			redirect('kwadmin/userlist');
	    }

	    public function promotemember($id)
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }
	    	$update = array('role_id'=>2);
	    	$this->Admin->updatemember($id,$update);
	    	
	    	$logtxt = $this->input->cookie('kwuser',TRUE)." (#".$this->input->cookie('kwid',TRUE).") mempromosikan member berID #".$id." menjadi pegawai";
			$insert = array('description_log'=>$logtxt,'created'=>date("Y-m-d H:i:s"));
			$this->Admin->insertdata("logs",$insert);

			$this->session->set_flashdata('message', "Member berhasil dipromosikan menjadi pegawai");
			redirect('kwadmin/userlist');
	    }

	    public function unpromotemember($id)
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }
	    	$update = array('role_id'=>1);
	    	$this->Admin->updatemember($id,$update);
	    	
	    	$logtxt = $this->input->cookie('kwuser',TRUE)." (#".$this->input->cookie('kwid',TRUE).") menurunkan member berID #".$id." dari pegawai kembali jadi member";
			$insert = array('description_log'=>$logtxt,'created'=>date("Y-m-d H:i:s"));
			$this->Admin->insertdata("logs",$insert);

			$this->session->set_flashdata('message', "Member berhasil diubah kembali menjadi user");
			redirect('kwadmin/userlist');
	    }

	    public function setprinted($id)
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }
	    	//getlast print
	    	$lastprint = $this->Admin->getlastprint($id);
	    	//insert statusprinted
	    	$insert = array('user_id'=>$id,'user_printer_id'=>$this->input->cookie('kwid',TRUE),'created'=>date('Y-m-d H:i:s'),'last_print'=>$lastprint);
	    	$this->Admin->insertdata('status_prints',$insert);

	    	//insert log
	    	$logtxt = $this->input->cookie('kwuser',TRUE)." (#".$this->input->cookie('kwid',TRUE).") mengeset status print member berID #".$id;
			$insert = array('description_log'=>$logtxt,'created'=>date("Y-m-d H:i:s"));
			$this->Admin->insertdata("logs",$insert);

			$this->session->set_flashdata('message', "Status Member Sudah Menjadi Tercetak");
			redirect('kwadmin/memberview/'.$id);
	    }

	    public function settaken($id)
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }
	    	$insert = array('user_id'=>$id,'pegawai_id'=>$this->input->cookie('kwid',TRUE),'created_date'=>date('Y-m-d H:i:s'));
	    	$this->Admin->insertdata('getcard',$insert);

	    	//insert log
	    	$logtxt = $this->input->cookie('kwuser',TRUE)." (#".$this->input->cookie('kwid',TRUE).") mengeset status kartu terambil oleh member berID #".$id;
			$insert = array('description_log'=>$logtxt,'created'=>date("Y-m-d H:i:s"));
			$this->Admin->insertdata("logs",$insert);

			$this->session->set_flashdata('message', "Status Member Sudah Menjadi Terambil");
			redirect('kwadmin/memberview/'.$id);
	    }

	    public function frontprint($id)
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }
	    	$detail = $this->Admin->getmemberdetail($id);
	    	foreach($detail as $row){
	    		$data['name'] = $row->name;
	    		$data['nip'] = $row->NIP;
	    		$data['home'] = $row->hometown;
	    		$data['dob'] = date("d M Y",strtotime($row->birthday));
	    		$data['address'] = $row->address;
	    		$data['religion'] = $row->religius;
	    		$data['depan'] = $row->gugus_depan;
	    		$data['ranting'] = $row->kwartir_ranting;
	    		$data['blood'] = $row->blood_type;
	    		$data['image'] = $row->image;
	    	}
	    	
	    	$this->load->view('admin/frontprint',$data);
	    }

	    public function backprint($id)
	    {
	    	//if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }
	    	$this->load->view('admin/backprint');
	    }

	    public function statistics(){
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }
	    	$data['nav'] = 4;
	    	$data['page'] = "Statistik Anggota";

	    	if($this->input->get('year')){ 
	    		$data['year'] = $this->input->get('year'); 
	    	}else{
	    		$data['year'] = date('Y');
	    	}
	    	$data['kartu'] = array();
	    	$data['member'] = array();

	    	for($i=1;$i<=12;$i++)
	    	{
	    		$tempcard = $this->Admin->getmonthlystatistic('status_prints',$i,$data['year']);
	    		array_push($data['kartu'],$tempcard);
	    		$tempmember = $this->Admin->getmonthlystatistic('users',$i,$data['year']);
	    		array_push($data['member'],$tempmember);
	    	}

	    	$this->load->view('admin/statistics',$data);
	    }

	    public function kegiatan()
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }

	    	$this->load->library('pagination');
	    	$keyword = $this->input->get("keyword");
	    	
	    	$data['activities'] = $this->Admin->getactivities($keyword,0,0);
	    	$data['jml'] = count($data['activities']);
	    	if($this->input->get("keyword")){
				$config['base_url'] = base_url()."kwadmin/kegiatan/?keyword=".$keyword;
			}else{
				$config['base_url'] = base_url()."kwadmin/kegiatan/?p=";
			}

			$config['total_rows'] = count($data['activities']);
			$config['per_page'] = 6; 
			$config['page_query_string'] = TRUE ;	

			if($this->input->get("per_page"))
			{
				$data['activities'] = $this->Admin->getactivities($keyword,$this->input->get("per_page"),$config["per_page"]);
			}
			else
			{
				$data['activities'] = $this->Admin->getactivities($keyword,0,$config["per_page"]);
			}

			$data['editor'] = array();
			foreach($data['activities'] as $row){
				$tempnama = $this->Admin->getmembername($row->flag_modified);
				array_push($data['editor'],$tempnama);
			}

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

	    	$data['nav'] = 5;
	    	$data['page'] = "Daftar Kegiatan";
	    	$this->load->view('admin/kegiatan',$data);
	    }

	    public function addactivity()
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }

	    	$this->load->library('form_validation');
	    	if($_POST){
	    		$this->form_validation->set_rules('title', 'Activity Title', 'trim|required|xss_clean');
	    		$this->form_validation->set_rules('desc', 'Activity Description', 'trim|required|xss_clean');

	    		if ($this->form_validation->run() == FALSE)
				{
					
				}
				else
				{
					//proses image
					$config['upload_path'] = 'images/views/activity/';
					//mkdir($config['upload_path'], 0777);
					$config['allowed_types'] = 'jpg|png';
					$config['max_width']  = '600';
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload', $config);
					
					$status = 0;	
					if (!$this->upload->do_upload("upload")){
						//$data['error'] = strip_tags($this->upload->display_errors());
						if($_FILES['upload']['error']!=4){
							$data['error'] = strip_tags($this->upload->display_errors());
						}else{
							$status = 1;
							$filename = "error.jpg";
						}
					}else{
						$status = 1;
						$uploadData = $this->upload->data();
						$filename = $uploadData['file_name'];
						$filetype = $uploadData['image_type'];
					}

					if($status == 1){
						//insert semua data
						$title = $this->input->post('title');
						$desc = $this->input->post('desc');

						$insert = array('title'=>$title,'description'=>$desc,'user_id'=>$this->input->cookie('kwid',TRUE),
								'flag_modified'=>$this->input->cookie('kwid',TRUE),'image'=>$filename,'active'=>1,
								'created'=>date('Y-m-d H:i:s'),'modified'=>date('Y-m-d H:i:s'));
						$this->Admin->insertdata('activities',$insert);

						$logtxt = $this->input->cookie('kwuser',TRUE)." (#".$this->input->cookie('kwid',TRUE).") melakukan tambah kegiatan berjudul '".$title."'";
						$insert = array('description_log'=>$logtxt,'created'=>date("Y-m-d H:i:s"));
						$this->Admin->insertdata("logs",$insert);

						$this->session->set_flashdata('message', "Kegiatan Baru Sukses Ditambahkan");
						redirect('kwadmin/kegiatan');
					}

				}
	    	}

	    	$data['nav'] = 5;
	    	$data['page'] = "Tambah Kegiatan";
	    	$this->load->view('admin/formkegiatan',$data);
	    }

	    public function editactivity($id)
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }
	    	$data['detail'] = $this->Admin->getactivitydetail($id);
	    	foreach($data['detail'] as $row){
	    		$image = $row->image;
	    	}

	    	$this->load->library('form_validation');
	    	if($_POST)
	    	{
	    		$this->form_validation->set_rules('title', 'Activity Title', 'trim|required|xss_clean');
	    		$this->form_validation->set_rules('desc', 'Activity Description', 'trim|required|xss_clean');

	    		if ($this->form_validation->run() == FALSE)
				{
					
				}
				else
				{
					//proses image
					$config['upload_path'] = 'images/views/activity/';
					//mkdir($config['upload_path'], 0777);
					$config['allowed_types'] = 'jpg|png';
					$config['max_width']  = '600';
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload', $config);
					
					$status = 0;	
					if (!$this->upload->do_upload("upload")){
						//$data['error'] = strip_tags($this->upload->display_errors());
						if($_FILES['upload']['error']!=4){
							$data['error'] = strip_tags($this->upload->display_errors());
						}else{
							$status = 1;
						}
					}else{
						$status = 1;
						$uploadData = $this->upload->data();
						$filename = $uploadData['file_name'];
						$filetype = $uploadData['image_type'];
						rename($config['upload_path'].$filename, $config['upload_path'].$image);
					}

					if($status == 1){
						//insert semua data
						$title = $this->input->post('title');
						$desc = $this->input->post('desc');
						$active = $this->input->post('active');
						if($active=="") $active=0;

						$update = array('title'=>$title,'description'=>$desc,'flag_modified'=>$this->input->cookie('kwid',TRUE),
							'active'=>$active,'modified'=>date('Y-m-d H:i:s'));
						$this->Admin->updateactivity($id,$update);

						$logtxt = $this->input->cookie('kwuser',TRUE)." (#".$this->input->cookie('kwid',TRUE).") melakukan edit kegiatan berjudul '".$title."'";
						$insert = array('description_log'=>$logtxt,'created'=>date("Y-m-d H:i:s"));
						$this->Admin->insertdata("logs",$insert);

						$this->session->set_flashdata('message', "Kegiatan Sukses Diubah");
						redirect('kwadmin/kegiatan');
					}
				}
	    		
	    	}

	    	$data['nav'] = 5;
	    	$data['page'] = "Ubah Data Kegiatan";
	    	$this->load->view('admin/formkegiatan',$data);
	    }

	    public function deleteactivity($id)
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }
	    	$this->Admin->deleteactivity($id);

	    	$logtxt = $this->input->cookie('kwuser',TRUE)." (#".$this->input->cookie('kwid',TRUE).") melakukan hapus kegiatan berID #".$id;
			$insert = array('description_log'=>$logtxt,'created'=>date("Y-m-d H:i:s"));
			$this->Admin->insertdata("logs",$insert);

			$this->session->set_flashdata('message', "Kegiatan #".$id." berhasil dihapus");
			redirect('kwadmin/kegiatan');
	    }

	    public function banner()
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }
	    	
	    	$data['banners'] = $this->Admin->getbanners();

	    	$data['nav'] = 6;
	    	$data['page'] = "Daftar Banner";
	    	$this->load->view('admin/banner',$data);
	    }

	    public function addbanner()
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }

	    	$this->load->library('form_validation');
	    	if($_POST)
	    	{
	    		$this->form_validation->set_rules('title', 'Banner Title', 'trim|required|xss_clean');
	    		if ($this->form_validation->run() == FALSE)
				{
					
				}
				else
				{
					//proses image
					$config['upload_path'] = 'images/views/banners/';
					//mkdir($config['upload_path'], 0777);
					$config['allowed_types'] = 'jpg|png';
					$config['max_width']  = '1200';
					$config['max_height']  = '350';
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload', $config);

					if (!$this->upload->do_upload("upload")){
						$data['error'] = strip_tags($this->upload->display_errors());
					}else{
						$uploadData = $this->upload->data();
						$filename = $uploadData['file_name'];
						$filetype = $uploadData['image_type'];

						//insert db
						$title = $this->input->post('title');
						$insert = array('image'=>$filename,'title'=>$title,'created'=>date('Y-m-d H:i:s'),'modified'=>date('Y-m-d H:i:s'));
						$this->Admin->insertdata('banners',$insert);

						$logtxt = $this->input->cookie('kwuser',TRUE)." (#".$this->input->cookie('kwid',TRUE).") melakukan tambah banner";
						$insert = array('description_log'=>$logtxt,'created'=>date("Y-m-d H:i:s"));
						$this->Admin->insertdata("logs",$insert);

						$this->session->set_flashdata('message', "Banner berhasil ditambahkan");
						redirect('kwadmin/banner');
					}

					
				}
	    	}

	    	$data['nav'] = 6;
	    	$data['page'] = "Tambah Banner";
	    	$this->load->view('admin/formbanner',$data);
	    }

	    public function deletebanner($id)
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }
	    	$this->Admin->deletebanner($id);

	    	$logtxt = $this->input->cookie('kwuser',TRUE)." (#".$this->input->cookie('kwid',TRUE).") melakukan hapus banner berID #".$id;
			$insert = array('description_log'=>$logtxt,'created'=>date("Y-m-d H:i:s"));
			$this->Admin->insertdata("logs",$insert);

			$this->session->set_flashdata('message', "Banner #".$id." berhasil dihapus");
			redirect('kwadmin/banner');
	    }

	    public function gallery()
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }
	    	$data['nav'] = 7;
	    	$data['page'] = "Gallery";

	    	$this->load->library('pagination');
	    	$data['gallery'] = $this->Admin->getallhdgallery(0,0);
	    	$config['base_url'] = base_url()."kwadmin/gallery/?p=";

	    	$config['total_rows'] = count($data['gallery']);
			$config['per_page'] = 6; 
			$config['page_query_string'] = TRUE ;	

			if($this->input->get("per_page"))
			{
				$data['gallery'] = $this->Admin->getallhdgallery($this->input->get("per_page"),$config["per_page"]);
			}
			else
			{
				$data['gallery'] = $this->Admin->getallhdgallery(0,$config["per_page"]);
			}

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

	    	$this->load->view('admin/gallery',$data);
	    }

	    public function addgallery(){
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }
	    	$data['nav'] = 7;
	    	$data['page'] = "Add Gallery";

	    	$this->load->library('form_validation');
	    	if($_POST)
	    	{
	    		$this->form_validation->set_rules('title', 'Gallery Title', 'trim|required|xss_clean');
	    		$this->form_validation->set_rules('ititle', 'First Photo Title', 'trim|required|xss_clean');
	    		if ($this->form_validation->run() == FALSE)
				{
					
				}
				else
				{
					//proses image
					$config['upload_path'] = 'images/views/galleries/';
					//mkdir($config['upload_path'], 0777);
					$config['allowed_types'] = 'jpg|png';
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload', $config);

					if (!$this->upload->do_upload("upload")){
						$data['error'] = strip_tags($this->upload->display_errors());
					}else{
						$uploadData = $this->upload->data();
						$filename = $uploadData['file_name'];
						$filetype = $uploadData['image_type'];

						//insert gallery header
						$title = $this->input->post('title');
						$ititle = $this->input->post('ititle');
						$insert = array('title_gallery'=>$title,'photo_primer'=>$filename,'active_header'=>1,'created'=>date('Y-m-d H:i:s'));
						$lastid = $this->Admin->insertid('gallery_headers',$insert);

						//insert 1 foto ke gallery detail
						$insert = array('gallery_header_id'=>$lastid,'title'=>$ititle,'image'=>$filename,'active'=>1,'created'=>date('Y-m-d H:i:s'));
						$this->Admin->insertdata('gallery_detail',$insert);

						//insert log
						$logtxt = $this->input->cookie('kwuser',TRUE)." (#".$this->input->cookie('kwid',TRUE).") menambah gallery baru '".$title."'";
						$insert = array('description_log'=>$logtxt,'created'=>date("Y-m-d H:i:s"));
						$this->Admin->insertdata("logs",$insert);

						$this->session->set_flashdata('message', "Gallery berhasil ditambah");
						redirect('kwadmin/gallery');
					}
				}
			}

	    	$this->load->view('admin/formgalleryhd',$data);
	    }

	    public function editgallery($id)
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }
	    	$data['nav'] = 7;
	    	$data['page'] = "Edit Gallery";
	    	$gallery = $this->Admin->getgalleryhddetail($id);
	    	foreach($gallery as $row){
	    		$data['title'] = $row->title_gallery;
	    	}

	    	$this->load->library('form_validation');
	    	if($_POST)
	    	{
	    		$this->form_validation->set_rules('title', 'Gallery Title', 'trim|required|xss_clean');
	    		if ($this->form_validation->run() == FALSE)
				{
					
				}
				else
				{
					//update data
					$title = $this->input->post('title');
					$update = array('title_gallery'=>$title);
					$this->Admin->updategalleryhd($id,$update);

					//update log
					$logtxt = $this->input->cookie('kwuser',TRUE)." (#".$this->input->cookie('kwid',TRUE).") menambah gallery #".$id;
					$insert = array('description_log'=>$logtxt,'created'=>date("Y-m-d H:i:s"));
					$this->Admin->insertdata("logs",$insert);

					$this->session->set_flashdata('message', "Gallery berhasil diubah");
					redirect('kwadmin/gallery');
				}
			}
	    	$this->load->view('admin/formgalleryhd',$data);
	    }

	    public function deletegallery($id)
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }
	    	//delete gallery
	    	$this->Admin->deletegalleryhd($id);

	    	//insert log
	    	$logtxt = $this->input->cookie('kwuser',TRUE)." (#".$this->input->cookie('kwid',TRUE).") menghapus gallery #".$id;
			$insert = array('description_log'=>$logtxt,'created'=>date("Y-m-d H:i:s"));
			$this->Admin->insertdata("logs",$insert);

			$this->session->set_flashdata('message', "Gallery berhasil dihapus");
			redirect('kwadmin/gallery');
	    }

	    public function deletegallerydt($gid,$id)
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }
	    	//delete gallery
	    	$this->Admin->deletegallerydt($id);

	    	//update gallery image primer to null
	    	$update = array('photo_primer'=>"");
	    	$this->Admin->updategalleryhd($gid,$update);

	    	//insert log
	    	$logtxt = $this->input->cookie('kwuser',TRUE)." (#".$this->input->cookie('kwid',TRUE).") menghapus foto gallery #".$id;
			$insert = array('description_log'=>$logtxt,'created'=>date("Y-m-d H:i:s"));
			$this->Admin->insertdata("logs",$insert);

			$this->session->set_flashdata('message', "Foto Gallery berhasil dihapus");
			redirect('kwadmin/gallerydt/'.$gid);
	    }

	    public function gallerydt($id)
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }
	    	$data['nav'] = 7;
	    	$gallery = $this->Admin->getgalleryhddetail($id);
	    	foreach($gallery as $row){
	    		$data['title'] = $row->title_gallery;
	    		$data['img'] = $row->photo_primer;
	    	}
	    	$data['page'] = $data['title']." Gallery";

	    	$this->load->library('pagination');
	    	$data['gallery'] = $this->Admin->getalldtgallery($id,0,0);
	    	$config['base_url'] = base_url()."kwadmin/gallerydt/".$id."?p=";

	    	$config['total_rows'] = count($data['gallery']);
			$config['per_page'] = 6; 
			$config['page_query_string'] = TRUE ;	

			if($this->input->get("per_page"))
			{
				$data['gallery'] = $this->Admin->getalldtgallery($id,$this->input->get("per_page"),$config["per_page"]);
			}
			else
			{
				$data['gallery'] = $this->Admin->getalldtgallery($id,0,$config["per_page"]);
			}

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

	    	$this->load->view('admin/gallerydt',$data);
	    }

	    public function addgallerydt($id)
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }
	    	$data['nav'] = 7;
	    	$data['page'] = "Add Gallery Photo";

	    	$this->load->library('form_validation');
	    	if($_POST)
	    	{
	    		$this->form_validation->set_rules('title', 'Gallery Title', 'trim|required|xss_clean');
	    		if ($this->form_validation->run() == FALSE)
				{
					
				}
				else
				{
					//proses image
					$config['upload_path'] = 'images/views/galleries/';
					//mkdir($config['upload_path'], 0777);
					$config['allowed_types'] = 'jpg|png';
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload', $config);

					if (!$this->upload->do_upload("upload")){
						$data['error'] = strip_tags($this->upload->display_errors());
					}else{
						$uploadData = $this->upload->data();
						$filename = $uploadData['file_name'];
						$filetype = $uploadData['image_type'];

						//insert foto baru
						$title = $this->input->post('title');
						$insert = array('gallery_header_id'=>$id,'title'=>$title,'image'=>$filename,'active'=>1,'created'=>date("Y-m-d H:i:s"));
						$this->Admin->insertdata('gallery_detail',$insert);

						//insert log
				    	$logtxt = $this->input->cookie('kwuser',TRUE)." (#".$this->input->cookie('kwid',TRUE).") berhasil menambah foto di gallery #".$id;
						$insert = array('description_log'=>$logtxt,'created'=>date("Y-m-d H:i:s"));
						$this->Admin->insertdata("logs",$insert);

						$this->session->set_flashdata('message', "Foto gallery berhasil ditambahkan");
						redirect('kwadmin/gallerydt/'.$id);
					}
				}
			}

	    	$this->load->view('admin/formgallerydt',$data);
	    }

	    public function setimgprimer($gid,$id)
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }
	    	//get detail gbr
	    	$temp = $this->Admin->getdtgallerydetail($id);
	    	foreach($temp as $row){
	    		$image = $row->image; 
	    	}

	    	//update status primer
	    	$update = array('photo_primer'=>$image);
	    	$this->Admin->updategalleryhd($gid,$update);

	    	//update log
	    	$logtxt = $this->input->cookie('kwuser',TRUE)." (#".$this->input->cookie('kwid',TRUE).") berhasil mengubah foto primer di gallery #".$gid;
			$insert = array('description_log'=>$logtxt,'created'=>date("Y-m-d H:i:s"));
			$this->Admin->insertdata("logs",$insert);

			$this->session->set_flashdata('message', "Foto Primer gallery berhasil diubah");
			redirect('kwadmin/gallerydt/'.$gid);
	    }

	    public function pagecontent($id)
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }
	    	$data['detail'] = $this->Admin->getpagecontent($id);
	    	foreach($data['detail'] as $row){
	    		$data['desc'] = $row->description;
	    		$data['name'] = $this->Admin->getmembername($row->user_id);
	    	}

	    	if($id==1){
	    		$data['nav'] = 8;
	    		$data['page'] = "About Us";
	    	}else if($id==2){ 
	    		$data['nav'] = 9;
	    		$data['page'] = "Koperasi";
	    	}

	    	$this->load->library('form_validation');
	    	if($_POST){
	    		$this->form_validation->set_rules('desc', 'Description', 'trim|required|xss_clean');
	    		if ($this->form_validation->run() == FALSE)
				{
					
				}
				else
				{
					$desc = $this->input->post('desc');
					$update = array('description'=>$desc,'user_id'=>$this->input->cookie("kwid",TRUE));
					$this->Admin->updatepage($id,$update);

					$logtxt = $this->input->cookie('kwuser',TRUE)." (#".$this->input->cookie('kwid',TRUE).") mengubah konten ".$data['page'];
					$insert = array('description_log'=>$logtxt,'created'=>date("Y-m-d H:i:s"));
					$this->Admin->insertdata("logs",$insert);

					$this->session->set_flashdata('message',  $data['page']." berhasil diubah");
					redirect('kwadmin/pagecontent/'.$id);
				}
	    	}

	    	$this->load->view('admin/formpage',$data);
	    }

	    public function logs()
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }

	    	$this->load->library('pagination');
	    	$dari = $this->input->get("dari");
	    	$sampai = $this->input->get("sampai");
	    	
	    	$data['log'] = $this->Admin->getlogs($dari,$sampai,0,0);
	    	
	    	if($this->input->get("dari")){
				$config['base_url'] = base_url()."kwadmin/logs/?dari=".$dari."&sampai=".$sampai;
			}else{
				$config['base_url'] = base_url()."kwadmin/logs/?p=";
			}

			$config['total_rows'] = count($data['log']);
			$config['per_page'] = 10; 
			$config['page_query_string'] = TRUE ;	

			if($this->input->get("per_page"))
			{
				$data['log'] = $this->Admin->getlogs($dari,$sampai,$this->input->get("per_page"),$config["per_page"]);
			}
			else
			{
				$data['log'] = $this->Admin->getlogs($dari,$sampai,0,$config["per_page"]);
			}

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

	    	$data['nav'] = 10;
	    	$data['page'] = "Log Aktivitas";

	    	$this->load->view('admin/log',$data);
	    }

	    public function inventories()
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }
	    	$data['nav'] = 11;
	    	$data['page'] = "Inventori";

	    	$this->load->library('form_validation');
	    	if($_POST){
	    		$this->form_validation->set_rules('qty', 'Quantity', 'trim|required|xss_clean|numeric');
	    		$this->form_validation->set_rules('limit', 'Limit to Notify', 'trim|required|xss_clean|numeric');
	    		if ($this->form_validation->run() == FALSE)
				{
					
				}
				else
				{
					$qty = $this->input->post('qty');
					$limit = $this->input->post('limit');

					$update = array('qty'=>$qty,'limit_to_notif'=>$limit);
					$this->Admin->updateinventories(1,$update);

					$logtxt = $this->input->cookie('kwuser',TRUE)." (#".$this->input->cookie('kwid',TRUE).") meng-update jumlah inventory";
					$insert = array('description_log'=>$logtxt,'created'=>date("Y-m-d H:i:s"));
					$this->Admin->insertdata("logs",$insert);

					$this->session->set_flashdata('message', "Inventory berhasil diubah");
					redirect('kwadmin/inventories');

				}
	    	}

	    	$data['kartu'] = count($this->Admin->getallprintedcard());
	    	$data['stok'] = $this->Admin->getqtystock();

	    	$this->load->view('admin/inventori',$data);	
	    }

	    public function exportdata()
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }
	    	$data['nav'] = 12;
	    	$data['page'] = "Export Data";

	    	$this->load->view('admin/export',$data);	
	    }

	    public function exportexcel($type)
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }
	    	if($type=="member"){ $table = "users"; }else{ $table = "logs"; }
	    	$from = "";
	    	$till = "";
	    	if($this->input->get("from")){
	    		$from = $this->input->get("from");
	    		$till = $this->input->get("till");	
	    	}
	    	$data['data'] = $this->Admin->getdatabydate($table,$from,$till);
	    	$this->load->view('admin/excel',$data);
	    }

	    public function profile()
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }
	    	$data['nav'] = 13;
	    	$data['page'] = "My Profile";

	    	$id = $this->input->cookie('kwid',TRUE);
	    	$data['detail'] = $this->Admin->getmemberdetail($id);
	    	foreach($data['detail'] as $row){
	    		$image = $row->image;
	    	}

	    	$this->load->library('form_validation');
	    	if($_POST){
	    		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
	    		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
	    		$this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean|numeric');
	    		$this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');

	    		if($this->input->post('oldpass')!="" || $this->input->post('newpass')!="" || $this->input->post('cnewpass')!=""){
	    			$this->form_validation->set_rules('oldpass', 'Old Password', 'required');
	    			$this->form_validation->set_rules('newpass', 'Password', 'required|matches[cnewpass]');
 					$this->form_validation->set_rules('cnewpass', 'Password Confirmation', 'required');
	    		}

	    		if ($this->form_validation->run() == FALSE)
				{
					
				}
				else
				{
					$email = $this->input->post('email');
					$cekemail = $this->Admin->checkemail1($this->input->cookie('kwid',TRUE),$email);
					if($cekemail>0){
						$data['error'] = "This Email has been used by another user";
					}else{
						
						$status = 0;
						if($this->input->post('oldpass')!=""){
							$oldpass = md5($this->input->post('oldpass'));
							$cekpass = $this->Admin->checksignin($email,$oldpass);
							
							if($cekpass==0){
								$data['error'] = "Wrong Old Password";
							}else{
								$update['password'] = md5($this->input->post('newpass'));
								$status = 1;
							}
						}
						else
						{
							$status = 1;
						}

						if($status == 1){
							$status1 = 0;
							$config['upload_path'] = 'images/views/users/';
							//mkdir($config['upload_path'], 0777);
							$config['allowed_types'] = 'jpg|png';
							$config['max_width']  = '256';
							$config['max_height']  = '256';
							$config['encrypt_name'] = TRUE;
							$this->load->library('upload', $config);

							if (!$this->upload->do_upload("image")){
								if($_FILES['image']['error']!=4){
									$data['error'] = strip_tags($this->upload->display_errors());
								}
								else
								{
									$status1 = 1;
								}
							}else{
								//upload gambar
								$status1 = 1;
								$uploadData = $this->upload->data();
								$filename = $uploadData['file_name'];
								rename($config['upload_path'].$filename, $config['upload_path'].$image);
							}
							
							if($status1==1){
								//insert semua data
								$name = $this->input->post('name');
								$phone = $this->input->post('phone');
								$address = $this->input->post('address');

								$logtxt = $this->input->cookie('kwuser',TRUE)." (#".$this->input->cookie('kwid',TRUE).") melakukan ubah profil";
								$insert = array('description_log'=>$logtxt,'created'=>date("Y-m-d H:i:s"));
								$this->Admin->insertdata("logs",$insert);

								$update = array('name'=>$name,'email'=>$email,'phone'=>$phone,'address'=>$address);
								$this->Admin->updatemember($this->input->cookie('kwid',TRUE),$update);
								$this->session->set_flashdata('message', "profil berhasil diubah");
								redirect('kwadmin/profile');

							}
						}
						//end
					}

	    		}
	    	}

	    	$this->load->view('admin/profile',$data);
	    }

	    public function settings()
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }
	    	
	    	if($_POST){
	    		$phone = $this->input->post('phone');
	    		$email = $this->input->post('email');
	    		$address = $this->input->post('address');

	    		//update visibilities
	    		$update = array('v_phone'=>$phone,'v_address'=>$address,'v_email'=>$email);
	    		$this->Admin->updatevisibilities($this->input->cookie('kwid',TRUE),$update);

	    		//insert log
	    		$logtxt = $this->input->cookie('kwuser',TRUE)." (#".$this->input->cookie('kwid',TRUE).") melakukan ubah setting";
				$insert = array('description_log'=>$logtxt,'created'=>date("Y-m-d H:i:s"));
				$this->Admin->insertdata("logs",$insert);

				$this->session->set_flashdata('message', "Setting profil berhasil diubah");
				redirect('kwadmin/settings');
	    	}

	    	$data['nav'] = 14;
	    	$data['setting'] = $this->Admin->getvisibilities($this->input->cookie("kwid",TRUE));
	    	$data['page'] = "Settings";
	    	$this->load->view('admin/settings',$data);
	    }

	    public function help()
	    {
	    	if(!$this->input->cookie("kwid",TRUE)){ redirect('kwadmin'); }
	    	$data['nav'] = 15;
	    	$data['page'] = "Help";
	    	$this->load->view('admin/help',$data);
	    }

	    public function logout()
	    {
	    	$logtxt = $this->input->cookie('kwuser',TRUE)." (#".$this->input->cookie('kwid',TRUE).") melakukan logout";
			$insert = array('description_log'=>$logtxt,'created'=>date("Y-m-d H:i:s"));
			$this->Admin->insertdata("logs",$insert);

	    	delete_cookie("kwid");
	    	delete_cookie("kwuser");
	    	delete_cookie("kwrole");

	    	redirect("kwadmin");
	    }

}

?>