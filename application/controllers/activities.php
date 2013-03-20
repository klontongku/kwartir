<?php	
	class Activities extends CI_Controller{
		public function __construct(){
	    	parent::__construct();
			$this->load->helper(array('common', 'image'));
			$this->load->model(array('Activity'));
			$this->load->library(array('pagination'));
	    }

	    function index($offset = false){
	    	$perpage = ACTIVITY_PAGINATION; //tentukan jumlah data per halaman
			$limit = array($perpage);

			if($offset){
				$merge = array($offset);
				$limit = array_merge($limit, $merge);
			}

			$condition = array(
				'where' => array(
	    			'activities.active' => 1
	    		),
	    		'order' => array(
	    			'activities.activity_id' => 'DESC'
	    		),
				'limit' => $limit
			);

			$count_condition = array(
				'where' => array(
	    			'activities.active' => 1
	    		),
			);

			$base_url =  base_url().'activities/index/';
          	$total_rows = $this->Activity->countAllResult($count_condition);

	        $config = $this->common->configPagination($base_url, $total_rows, $perpage);
	        //inisialisasi pagination dn config di atas

	        $this->pagination->initialize($config);
	        
	    	$activities = $this->Activity->select($condition);
	    	$data = array(
	    		'data_content' => array(
	    			'activities' => $activities,
	    			'pagination' => $this->pagination->create_links(),
	    		),
	    		'current_class' => 'activities',
	    		'content_for_layout' => 'activities/list_activity',
	    	);
	    	$this->load->view('layouts/default', $data);
	    }

	    function detail($id = false){
	    	if(!$id){
	    		$this->session->set_flashdata('error', 'kegiatan tidak ditemukan.');
	    		redirect('activities/');
	    	}else{
	    		$activities = $this->Activity->select(array(
	    			'where' => array(
	    				'activity_id' => $id
	    			)
	    		));
	    		if(!empty($activities)){
	    			$other_activity = $this->Activity->select(array(
		    			'where' => array(
		    				'activity_id <>' => $id
		    			),
		    			'order' => array(
		    				'activity_id' => 'DESC'
		    			),
		    			'limit' => array(5)
		    		));
	    			$activities = $activities[0];
			    	$data = array(
			    		'data_content' => array(
			    			'activities' => $activities,
			    			'other_activity' => $other_activity
			    		),
			    		'current_class' => 'activities',
			    		'content_for_layout' => 'activities/detail',
			    	);
			    	$this->load->view('layouts/default', $data);
	    		}else{
		    		$this->session->set_flashdata('error', 'kegiatan tidak ditemukan.');
		    		redirect('activities/');
	    		}
	    	}
	    }
	}
?>