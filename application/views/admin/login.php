
<!DOCTYPE html>
<html lang="en-us">
<head>
	<title>Login - Kwartir Management System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/bootstrap-responsive.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/bootstyle.css" rel="stylesheet">
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.js"></script>
</head>
 <style type="text/css">

      .form-signin {
      	color: #fff;
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 50px auto 20px;
        background-color: #C18B63;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
        text-align: center;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
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
		<form action="<?php echo base_url(); ?>kwadmin/login" method="post" class="form-signin">
        <h1 class="form-signin-heading ">Admin Login</h1>
        <input type="text" name="email" class="input-block-level" placeholder="Email address">
        <input type="password" name="password" class="input-block-level" placeholder="Password">
        <input class="btn btn-large btn-warning " type="submit" value="Sign in">
      </form>
      	
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
						
					</div><!-- end span6 -->
					<div class="span6 footer-address">
						<h2>Contact Us</h2>	
						<div class="footer-layer">
							<div class="footer-left">							
								<img src="<?php echo base_url(); ?>images/admin/icon-marker.png" alt="facebook" title="facebook">
							</div>
							<div class="footer-right">
								<p>795 Folsom Ave, Suite 600 San Francisco, CA 94107<br>Phone: (123) 456-7890<br>Fax: (123) 456-7890</p>
							</div>
						</div>
						<div class="footer-layer">
							<div class="footer-left">
								<img src="<?php echo base_url(); ?>images/admin/icon-email.png" alt="facebook" title="facebook">
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
	<?php if(isset($message)){ echo "<script>alert('".$message."');</script>"; } ?>
      	
</body>
</html>