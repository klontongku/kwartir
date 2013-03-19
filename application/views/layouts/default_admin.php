<!DOCTYPE html>
<html lang="en-us">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php 

		echo link_tag(array(
			'href' => 'css/bootstrap.css',
			'rel' => 'stylesheet',
			'id' => 'main-css',
			'type' => 'text/css',
			'media' => 'all'
		));
		echo link_tag(array(
			'href' => 'css/bootstrap-responsive.css',
			'rel' => 'stylesheet',
			'id' => 'bootstrap-responsive-css',
			'type' => 'text/css',
			'media' => 'all'
		));
		echo link_tag(array(
			'href' => 'css/bootstyle.css',
			'rel' => 'stylesheet',
			'id' => 'prettyp-css',
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
	<script type='text/javascript' src='<?php echo base_url();?>js/bootstrap.js'></script>	

	<?php
		if(!empty($layout_js)){
			foreach ($layout_js as $value_js) {
				echo '<script type="text/javascript" src="'.base_url().'js/'.$value_js.'.js"></script>';
			}
		}
	?>
</head>
<body>
	
	<?php 
		// $this->load->view('elements/blocks/admin_top_navigation');
	?>
	<div id="content">
		<div class="container">
			<div id="content-center" class="row-fluid">
				<div class="span12">
					<div class="row-fluid">					
						<div class="span3"><h2>Pengaturan</h2>							
							<div class="sidebar-nav">
					            <ul class="nav nav-list">
					              <li><a href="#">Akun</a></li>
					              		<ul class="nav nav-list">
							              <li><a href="#">Edit Profil</a></li>
							              <li><a href="#">Ganti Email</a></li>
							              <li><a href="#">Ganti Visibilitas Informasi</a></li>
							              <li><a href="#">Ganti Photo</a></li>
					              		</ul>
					              <li><a href="#">Password</a></li>
					              <li><a href="#">Yellow Pages</a></li>
					              <li class="active"><a href="#">Pesan</a></li>
					              		<ul class="nav nav-list">
							              <li><a href="#">Buat Pesan</a></li>
							            </ul>
					            </ul>
          					</div><!--/.well -->
						</div>
						<div class="span9 contact">
							<h2>Pesan</h2>
							<table class="table table-bordered">
								<tr>
							    <td>Rachmat Setiawan</td>
							    <td>Pengenalan ID Card Baru</td>
							    <td>Tue, 5 March 2013</td>
							    <td><a href="#" class="btn btn-info">Buka</a> <a href="#" class="btn btn-danger">Hapus</a></td>
							  </tr>
							  	<tr>
							    <td>Rachmat Setiawan</td>
							    <td>Pengenalan ID Card Baru</td>
							    <td>Tue, 5 March 2013</td>
							    <td><a href="#" class="btn btn-info">Buka</a> <a href="#" class="btn btn-danger">Hapus</a></td>
							  </tr>
							  	<tr>
							    <td>Rachmat Setiawan</td>
							    <td>Pengenalan ID Card Baru</td>
							    <td>Tue, 5 March 2013</td>
							    <td><a href="#" class="btn btn-info">Buka</a> <a href="#" class="btn btn-danger">Hapus</a></td>
							  </tr>
							  	<tr>
							    <td>Rachmat Setiawan</td>
							    <td>Pengenalan ID Card Baru</td>
							    <td>Tue, 5 March 2013</td>
							    <td><a href="#" class="btn btn-info">Buka</a> <a href="#" class="btn btn-danger">Hapus</a></td>
							  </tr>
							</table>		
						</div>							
					</div><!-- end row-fluid -->					
				</div><!-- end span12 -->
			</div><!-- end row-fluid -->
		</div><!-- end container -->
	</div><!-- end content -->
	<div id="footer">
		<div class="container footer">
			<div class="row-fluid">
				<div class="span12 footer-space">
				<div class="row-fluid">
					<div class="span6">
						<h2>Kwartir Bogor</h2>	
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
						<div class="controls">
							<p class="footer-subscribe">Get updates by subscribe our Newsletter</p>
							<div class="input-append">
								<input class="span5" id="appendedInputButton" size="16" type="text" placeholder="Enter your email address..."><button class="btn" type="button">Subscribe</button>
							</div>
						</div>
					</div><!-- end span6 -->
					<div class="span6 footer-address">
						<h2>Contact Us</h2>	
						<div class="footer-layer">
							<div class="footer-left">							
								<img src="../img/icon-marker.png" alt="facebook" title="facebook">
							</div>
							<div class="footer-right">
								<p>795 Folsom Ave, Suite 600 San Francisco, CA 94107<br>Phone: (123) 456-7890<br>Fax: (123) 456-7890</p>
							</div>
						</div>
						<div class="footer-layer">
							<div class="footer-left">
								<img src="../img/icon-email.png" alt="facebook" title="facebook">
							</div>							
							<div class="footer-right">
								<p>email@kwartir.com</p> 
							</div>								
						</div>		
					</div><!-- end footer address -->	
					</div><!-- end row-fluid -->
				</div><!-- end span12 -->				
			</div><!-- end row-fluid -->
		</div><!-- end container -->		
	</div><!-- end footer -->	
	<div id="footer-copyright">
		<div class="container">Copyright 2013 Kwartir Bogor</div>
	</div>
	<script>$('.carousel').carousel({interval: 3000})</script>
</body>
</html>