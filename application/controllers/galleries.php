<?php	
	class Galleries extends CI_Controller{
		public function __construct(){
	    	parent::__construct();
			$this->load->helper(array('common', 'image'));
			$this->load->model(array('Gallery'));
			$this->load->library(array('pagination'));
	    }

	    function index($offset = false){
	    	$perpage = GALLERY_PAGINATION; //tentukan jumlah data per halaman
			$limit = array($perpage);

			if($offset){
				$merge = array($offset);
				$limit = array_merge($limit, $merge);
			}

			$condition = array(
				'where' => array(
	    			'gallery_headers.active_header' => 1
	    		),
	    		'order' => array(
	    			'gallery_headers.gallery_header_id' => 'DESC'
	    		),
				'limit' => $limit
			);

			$count_condition = array(
				'where' => array(
	    			'gallery_headers.active_header' => 1
	    		),
			);

			$base_url =  base_url().'galleries/index/';
          	$total_rows = $this->Gallery->countAllResult($count_condition);

	        $config = $this->common->configPagination($base_url, $total_rows, $perpage);
	        //inisialisasi pagination dn config di atas

	        $this->pagination->initialize($config);
	        
	    	$galleries = $this->Gallery->select($condition);
	    	$data = array(
	    		'data_content' => array(
	    			'galleries' => $galleries,
	    			'pagination' => $this->pagination->create_links(),
	    		),
	    		'current_class' => 'galleries',
	    		'content_for_layout' => 'galleries/list_gallery',
	    	);
	    	$this->load->view('layouts/default', $data);
	    }
	}
?>