<?php	
class Pages extends CI_Controller{
	public function __construct(){
    	parent::__construct();
		$this->load->helper(array('common', 'image'));
		$this->load->model(array('Activity', 'Event', 'Cms'));
		// $this->load->library(array('common'));
    }

    function index(){
    	$this->home();
    }

    function home(){
    	$newest_activities = $this->Activity->select(array(
    		'where' => array(
    			'activities.active' => 1
    		),
    		'order' => array(
    			'activities.activity_id' => 'DESC'
    		),
    		'limit' => array(3)
    	));
    	$newest_event = $this->Event->select(array(
    		'where' => array(
    			'active' => 1
    		),
    		'order' => array(
    			'events.event_id' => 'DESC'
    		),
    		'limit' => array(3)
    	));
    	$data = array(
    		'data_content' => array(
    			'newest_activities' => $newest_activities,
    			'newest_event' => $newest_event
    		),
    		'_banner' => true,
    		'content_for_layout' => 'pages/home',
            'current_class' => 'home',
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
    }

    function about_us(){
    	$cms = $this->Cms->select();
    	$cms = $cms[0];
    	$data = array(
    		'data_content' => array(
    			'cms' => $cms,
    		),
    		'content_for_layout' => 'pages/about_us',
            'current_class' => 'about_us'
    	);
    	$this->load->view('layouts/default', $data);
    }
}
?>