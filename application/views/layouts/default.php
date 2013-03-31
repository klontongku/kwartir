<!DOCTYPE html>
<!--[if IE 7]>					<html class="ie7 no-js" lang="en">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if IE 9]>					<html class="ie9 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->
<head>
	<link href='http://fonts.googleapis.com/css?family=Over+the+Rainbow|Open+Sans:300,400,400italic,600,700|Arimo|Oswald|Lato|Ubuntu' rel='stylesheet' type='text/css'>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php
    	$meta = array(
	        array('name' => 'robots', 'content' => 'no-cache'),
	        array('name' => 'description', 'content' => ((isset($meta_description)) ? urldecode(strip_tags($meta_description)) : SITE_DESCRIPTION)),
	        array('name' => 'keywords', 'content' => ((isset($meta_keyword)) ? $meta_keyword.', '.SITE_NAME : SITE_NAME)),
	        array('name' => 'robots', 'content' => 'no-cache'),
	        array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
	    );

		echo meta($meta); 
    ?>
    <?php 

		echo link_tag(array(
			'href' => 'css/skeleton.css',
			'rel' => 'stylesheet',
			'id' => 'main-css',
			'type' => 'text/css',
			'media' => 'all'
		));
		echo link_tag(array(
			'href' => 'css/style.css',
			'rel' => 'stylesheet',
			'id' => 'style-css',
			'type' => 'text/css',
			'media' => 'all'
		));
		echo link_tag(array(
			'href' => 'css/mediaelementplayer.css',
			'rel' => 'stylesheet',
			'id' => 'mediaelementplayer-css',
			'type' => 'text/css',
		));
		echo link_tag(array(
			'href' => 'css/custom.css',
			'rel' => 'stylesheet',
			'id' => 'custom-css',
			'type' => 'text/css',
		));
		echo link_tag(array(
			'href' => 'css/jquery-ui.css',
			'rel' => 'stylesheet',
			'id' => 'jquery-ui-css',
			'type' => 'text/css',
		));

	?>
	<title><?php echo (!empty($title_for_layout)) ? $title_for_layout : 'Kwartir Bogor'?></title>
	<?php
		if(!empty($layout_css)){
			foreach ($layout_css as $value_css) {
				echo link_tag(array(
					'href' => 'css/'.$value_css.'.css',
					'rel' => 'stylesheet',
					'type' => 'text/css'
				));
			}
		}
	?>
	
	<script type='text/javascript' src='<?php echo base_url();?>js/jquery.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url();?>js/custom.js'></script>
	<script type='text/javascript' src='<?php echo base_url();?>js/modernizr.custom.js'></script>
	<script type='text/javascript' src='<?php echo base_url();?>js/rs-plugin/js/jquery.themepunch.plugins.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url();?>js/respond.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url();?>js/rs-plugin/js/jquery.themepunch.plugins.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url();?>js/rs-plugin/js/jquery.themepunch.revolution.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url();?>js/jquery.easing.1.3.js'></script>
	<script type='text/javascript' src='<?php echo base_url();?>js/jquery.cycle.all.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url();?>js/mediaelement-and-player.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url();?>js/jquery.fancybox.js'></script>

	<?php
		if(!empty($layout_js)){
			foreach ($layout_js as $value_js) {
				echo '<script type="text/javascript" src="'.base_url().'js/'.$value_js.'.js"></script>';
			}
		}
	?>
	<link rel="shortcut" href="images/favicon.ico" />
</head>
<body class="color-1 h-style-1 text-1">
	
	<header id="header">
		<div class="container">	
			
			<?php 
				echo anchor(base_url(), '<h1>Kwartir Cabang Bogor</h1>', array('id' =>'logo'));
			?>
			<div class="clear"></div>
			<?php $this->load->view('elements/headers/navigation');?>
			
		</div>
	</header>
	
	<div id="notif">
		<?php if($this->session->flashdata('success')):?>
        <p class='notification success hideit'> <?php echo $this->session->flashdata('success')?> </p>
        <?php endif?>

        <?php if($this->session->flashdata('error')):?>
        <p class='notification failure hideit'> <?php echo $this->session->flashdata('error')?> </p>
        <?php endif?>

        <?php if($this->session->flashdata('info')):?>
        <p class='notification information hideit'> <?php echo $this->session->flashdata('info')?> </p>
        <?php endif?>

        <?php if($this->session->flashdata('warning')):?>
        <p class='notification warning hideit'> <?php echo $this->session->flashdata('warning')?> </p>
        <?php endif?> 		
	</div>

	<?php
		if(isset($_banner) && $_banner == true){
			$this->load->view('elements/blocks/pages/banner');
		}
	?>	
		
	
	<?php 
		if(empty($data_content)){
			$data_content = array();
		}
		$this->load->view($content_for_layout, $data_content);
	?>

	<?php $this->load->view('elements/footers/footer_default');?>
	
	<footer id="bottom-footer" class="clearfix">
		<div class="container">
			<div class="copyright"><?php printf('Copyright © %s', date('Y'))?></div>
		</div>
	</footer>
</body>
</html>
