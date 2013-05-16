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
	    		'layout_js' => array(
	                'jquery.isotope.min',
	    		)
	    	);
	    	$this->load->view('layouts/default', $data);
	    }

	    function detail($id = false, $offset = false){
	    	if(!$id){
	    		$this->session->set_flashdata('error', 'galleri tidak ditemukan.');
	    		redirect('galleries/');
	    	}else{
	    		$cek_header = $this->Gallery->select(array(
	    			'where' => array(
	    				'gallery_header_id' => $id
	    			)
	    		));
	    		if(!empty($cek_header)){
	    			$cek_header = $cek_header[0];
	    			$perpage = 12; //tentukan jumlah data per halaman
					$limit = array($perpage);

					if($offset){
						$merge = array($offset);
						$limit = array_merge($limit, $merge);
					}

					$condition = array(
						'where' => array(
			    			'gallery_detail.active' => 1
			    		),
			    		'order' => array(
			    			'gallery_detail.gallery_detail_id' => 'ASC'
			    		),
						'limit' => $limit
					);

					$count_condition = array(
						'where' => array(
			    			'gallery_detail.active' => 1
			    		),
					);

					$base_url =  base_url().'galleries/detail/'.$id;
		          	$total_rows = $this->Gallery->countAllResult($count_condition, 'gallery_detail');

			        $config = $this->common->configPagination($base_url, $total_rows, $perpage);
			        //inisialisasi pagination dn config di atas

			        $this->pagination->initialize($config);
			        
			    	$galleries = $this->Gallery->select($condition, 'gallery_detail');
			    	$data = array(
			    		'data_content' => array(
			    			'galleries' => $galleries,
			    			'pagination' => $this->pagination->create_links(),
			    		),
			    		'current_class' => 'galleries',
			    		'data_header' => $cek_header,
			    		'content_for_layout' => 'galleries/detail',
			    		'layout_css' => array(
			    			'jquery.fancybox', 
			    			'rs-plugin/css/settings'
			    		),
			    		'layout_js' => array(
			    			'modernizr.custom',
			    			'rs-plugin/js/jquery.themepunch.plugins.min',
			    			'respond.min',
			    			'rs-plugin/js/jquery.themepunch.plugins.min',
			    			'rs-plugin/js/jquery.themepunch.revolution.min',
			    			'jquery.easing.1.3',
			    			'jquery.cycle.all.min',
			    			'mediaelement-and-player.min',
			    			'jquery.fancybox',
			                'custom'
			    		)
			    	);
			    	$this->load->view('layouts/default', $data);
	    		}else{
		    		$this->session->set_flashdata('error', 'galleri tidak ditemukan.');
		    		redirect('galleries/');
	    		}
	    	}
	    }
	}
?>