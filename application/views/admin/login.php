<!DOCTYPE html>
<!--[if lt IE 7 ]><html lang="en" class="ie6 ielt7 ielt8 ielt9"><![endif]--><!--[if IE 7 ]><html lang="en" class="ie7 ielt8 ielt9"><![endif]--><!--[if IE 8 ]><html lang="en" class="ie8 ielt9"><![endif]--><!--[if IE 9 ]><html lang="en" class="ie9"> <![endif]--><!--[if (gt IE 9)|!(IE)]><!--> 
<html lang="en"><!--<![endif]--> 
	<head>
		<meta charset="utf-8">
		<title>Login - Scout Management Information System</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/bootstrap-responsive.css" rel="stylesheet">
	
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.js"></script>
		<link href="<?php echo base_url(); ?>css/site.css" rel="stylesheet">
		<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="span4 offset4 well">
					<h1>Please Login</h1>
					<legend>Scout Management Information System</legend>
		          	
		          	<?php if(isset($message)){ ?>
		          	<div class="alert alert-error">
		                <a class="close" data-dismiss="alert" href="#">×</a><?php echo $message; ?>
		            </div>
		            <?php } ?>
					
					<form action="<?php echo base_url(); ?>kwadmin/login" method="post" class="form-signin">
					<input type="text" id="email" class="span4" name="email" placeholder="Email">
					<input type="password" id="password" class="span4" name="password" placeholder="Password">
		            <label class="checkbox">
		            	<input type="checkbox" name="remember" value="1"> Remember Me
		            </label>
					<button type="submit" name="submit" class="btn btn-info btn-block">Sign in</button>
					</form>

				</div>
			</div>
		</div>
		
		<script src="<?php echo base_url(); ?>js/site.js"></script>
	</body>
</html>