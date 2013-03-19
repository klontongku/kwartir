<?php	
	class Events extends CI_Controller{
		public function __construct(){
	    	parent::__construct();
			$this->load->helper(array('common', 'image'));
			$this->load->model(array('Event', 'Activity'));
			$this->load->library(array('pagination'));
	    }

	    function index($offset = false){
	    	$perpage = EVENT_PAGINATION; //tentukan jumlah data per halaman
			$limit = array($perpage);

			if($offset){
				$merge = array($offset);
				$limit = array_merge($limit, $merge);
			}

			$condition = array(
				'where' => array(
	    			'events.active' => 1
	    		),
	    		'order' => array(
	    			'events.event_id' => 'DESC'
	    		),
				'limit' => $limit
			);

			$count_condition = array(
				'where' => array(
	    			'events.active' => 1
	    		),
			);

			$base_url =  base_url().'events/index/';
          	$total_rows = $this->Event->countAllResult($count_condition);

	        $config = $this->common->configPagination($base_url, $total_rows, $perpage);
	        //inisialisasi pagination dn config di atas

	        $this->pagination->initialize($config);
	        
	    	$events = $this->Event->select($condition);

	    	$newest_activities = $this->Activity->select(array(
	    		'where' => array(
	    			'activities.active' => 1
	    		),
	    		'order' => array(
	    			'activities.activity_id' => 'DESC'
	    		),
	    		'limit' => array(3)
	    	));

	    	$data = array(
	    		'data_content' => array(
	    			'events' => $events,
	    			'newest_activities' => $newest_activities,
	    			'pagination' => $this->pagination->create_links(),
	    		),
	    		'current_class' => 'events',
	    		'content_for_layout' => 'events/list_events',
	    	);
	    	$this->load->view('layouts/default', $data);
	    }
	}
?>