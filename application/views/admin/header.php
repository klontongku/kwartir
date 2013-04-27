<!DOCTYPE html>
<html lang="en-us">
<head>
	<title><?php echo $page; ?> - Kwartir Management System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/bootstrap-responsive.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/bootstyle.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/datepicker.css" rel="stylesheet">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.js"></script>
	
</head>
<body>
	
	<div class="navbar navbar-fixed-top">	
		<div class="navbar-inner">
			<div class="container navtop">			
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>			
				<a class="brand" href="index.html">Kwartir Cabang Bogor</a>			
								
			</div>
		</div>
	</div><!-- end navbar -->
	<div id="content">
		<div class="container">
			<div id="content-center" class="row-fluid">
				<div class="span12">
					<div class="row-fluid">					
						<div class="span2"><h2>Administrasi</h2>							
							<div class="sidebar-nav">
					            <ul class="nav nav-list">
					              <li class="nav-header">Anggota</li>
					              		<ul class="nav nav-list">
							              <li <?php if($nav==1){ echo 'class="active"'; }?>><a href="<?php echo base_url(); ?>kwadmin/userlist">List Anggota</a></li>
							              <li <?php if($nav==2){ echo 'class="active"'; }?>><a href="<?php echo base_url(); ?>kwadmin/addmember">Tambah Anggota</a></li> 
							              <li><a href="#">Statistik</a></li> 
					              		</ul>
					              <li class="nav-header">Kontent</li>
					              		<ul class="nav nav-list">
							              <li><a href="#">Kegiatan</a></li>
							              <li><a href="#">Banner</a></li>
							              <li><a href="#">Gallery</a></li>
							              <li><a href="#">Tentang Kami</a></li>
					              		</ul>
					            
							      <li class="nav-header">Laporan</li>
					              		<ul class="nav nav-list">
							              <li><a href="#">Log Aktivitas</a></li>
							              <li><a href="#"></a></li>
							            </ul>
					            </ul>
          					</div>
						</div>