<!DOCTYPE html>
<!--[if lt IE 7 ]><html lang="en" class="ie6 ielt7 ielt8 ielt9"><![endif]--><!--[if IE 7 ]><html lang="en" class="ie7 ielt8 ielt9"><![endif]--><!--[if IE 8 ]><html lang="en" class="ie8 ielt9"><![endif]--><!--[if IE 9 ]><html lang="en" class="ie9"> <![endif]--><!--[if (gt IE 9)|!(IE)]><!--> 
<html lang="en"><!--<![endif]--> 
	<head>
		<meta charset="utf-8">
		<title><?php echo $page; ?> - Scout Management Information System</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/bootstrap-responsive.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/site.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/datepicker.css" rel="stylesheet">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/site.js"></script>
		<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	</head>
	<body>
		<div class="container">
			<div class="navbar">
				<div class="navbar-inner">
					<div class="container">
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="#">SCMIS</a>
						<div class="nav-collapse">
							<ul class="nav">
								<li <?php if($nav==1){ echo 'class="active"'; }?>>
									<a href="<?php echo base_url(); ?>kwadmin/dashboard">Dashboard</a>
								</li>
								<li <?php if($nav==14){ echo 'class="active"'; }?>>
									<a href="<?php echo base_url(); ?>kwadmin/settings">Account Settings</a>
								</li>
								<li <?php if($nav==15){ echo 'class="active"'; }?>>
									<a href="<?php echo base_url(); ?>kwadmin/help">Help</a>
								</li>
							</ul>
							<ul class="nav pull-right">
								<li>
									<a href="<?php echo base_url(); ?>kwadmin/profile"><?php echo $this->input->cookie('kwuser',TRUE); ?></a>
								</li>
								<li>
									<a href="<?php echo base_url(); ?>kwadmin/logout">Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="span3">
					<div class="well" style="padding: 8px 0;">
						<ul class="nav nav-list">
							<li class="nav-header">
								Management Anggota
							</li>
                            <li <?php if($nav==1){ echo 'class="active"'; }?>>
								<a href="<?php echo base_url(); ?>kwadmin/dashboard"><i class="icon-home"></i> Dashboard</a>
							</li>
							<li <?php if($nav==2){ echo 'class="active"'; }?>>
								<a href="<?php echo base_url(); ?>kwadmin/userlist"><i class="icon-file"></i> List Anggota</a>
							</li>
							<li <?php if($nav==3){ echo 'class="active"'; }?>>
								<a href="<?php echo base_url(); ?>kwadmin/addmember"><i class="icon-plus-sign"></i>Tambah Anggota</a>
							</li>
							<li <?php if($nav==4){ echo 'class="active"'; }?>>
								<a href="<?php echo base_url(); ?>kwadmin/statistics"><i class="icon-check"></i> Statistik</a>
							</li>
                            <li class="nav-header">
								Kontent
							</li>
							<li <?php if($nav==5){ echo 'class="active"'; }?>>
								<a href="<?php echo base_url(); ?>kwadmin/kegiatan"><i class="icon-calendar"></i> Kegiatan</a>
							</li>
							<li <?php if($nav==6){ echo 'class="active"'; }?>>
								<a href="<?php echo base_url(); ?>kwadmin/banner"><i class="icon-pencil"></i> Banner</a>
							</li>
							<li <?php if($nav==7){ echo 'class="active"'; }?>>
								<a href="<?php echo base_url(); ?>kwadmin/gallery"><i class="icon-picture"></i> Gallery</a>
							</li>
                            <li <?php if($nav==8){ echo 'class="active"'; }?>>
								<a href="<?php echo base_url(); ?>kwadmin/pagecontent/1"><i class="icon-list-alt"></i> Tentang Kami</a>
							</li>
                            <li <?php if($nav==9){ echo 'class="active"'; }?>>
								<a href="<?php echo base_url(); ?>kwadmin/pagecontent/2"><i class="icon-list-alt"></i> Koperasi</a>
							</li>

							<?php if($this->input->cookie('kwrole',TRUE)==3){ ?>
                            <li class="nav-header">
								Laporan
							</li>
							<li <?php if($nav==10){ echo 'class="active"'; }?>>
								<a href="<?php echo base_url(); ?>kwadmin/logs"><i class="icon-time"></i> Log Aktivitas</a>
							</li>
							<li <?php if($nav==11){ echo 'class="active"'; }?>>
								<a href="<?php echo base_url(); ?>kwadmin/inventories"><i class="icon-bookmark"></i> Inventori</a>
							</li>
                            <li <?php if($nav==12){ echo 'class="active"'; }?>>
								<a href="<?php echo base_url(); ?>kwadmin/exportdata"><i class="icon-print"></i> Eksport Data</a>
							</li>
							<?php } ?>

							<li class="nav-header">
								Your Account
							</li>
							<li <?php if($nav==13){ echo 'class="active"'; }?>>
								<a href="<?php echo base_url(); ?>kwadmin/profile"><i class="icon-user"></i> Profile</a>
							</li>
							<li <?php if($nav==14){ echo 'class="active"'; }?>>
								<a href="<?php echo base_url(); ?>kwadmin/settings"><i class="icon-cog"></i> Settings</a>
							</li>
							<li <?php if($nav==15){ echo 'class="active"'; }?>>
								<a href="<?php echo base_url(); ?>kwadmin/help"><i class="icon-info-sign"></i> Help</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="span9">