<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
<meta content="en-us" http-equiv="Content-Language">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title><?php echo 'Klontongku.com'?></title>
<style type="text/css">
body {
	margin:0;
	padding:0;
	background-color:#cccccc;
	background:#cccccc;
}
</style>
</head>

<body bgcolor="#cccccc" link="#86ac3d" vlink="#86ac3d">
<!-- Start of main container -->
<table align="center" bgcolor="#cccccc" cellpadding="0" cellspacing="0" style="width: 100%; background:#cccccc; background-color:#cccccc; margin:0; padding:0 20px;">
	<tr>
		<td>
		<table align="center" cellpadding="0" cellspacing="0" style="width: 620px; border-collapse:collapse; text-align:left; font-family:Tahoma; font-weight:normal; font-size:12px; line-height:15pt; color:#444444; margin:0 auto;">
			<!-- Start of logo and top links -->
			<tr>
				<td valign="bottom" style="height:5px;margin:0;padding:20px 0 0 0;line-height:0;font-size:2px;"></td>
			</tr>
			<tr>
				<td style=" width:620px;" valign="top">
					<table cellpadding="0" cellspacing="0" style="width:100%; border-collapse:collapse;font-family:Tahoma; font-weight:normal; font-size:12px; line-height:15pt; color:#444444;" >
						<tr>
							<td bgcolor="#455C44" style="width: 320px; padding:10px 0 10px 20px; background:#455C44; background-color:#455C44; color:#ffffff;" valign="top">
								Customer Line: 021-9876543 
							</td>
							<td bgcolor="#455C44" style="width: 300px; padding:10px 20px 10px 20px; background:#455C44; background-color:#455C44; text-align:right; color:#ffffff;" valign="top">
							</td>
						</tr>
						<tr>
							<td bgcolor="#FFFFFF" style="width: 320px; padding:20px 0 15px 20px; background:#ffffff; background-color:#ffffff;" valign="middle">
								<p style="padding:0; margin:0; line-height:160%; font-size:18px;">
									<img alt="Fresh Newsletter" height="80" src="<?php echo base_url().'images/logo-versi2.png'?>" style="padding:0;border:0;" width="300">
								</p>
							</td>
							<td bgcolor="#FFFFFF" style="width: 300px; padding:20px 20px 15px 20px; background:#ffffff; background-color:#ffffff; text-align:center;" valign="middle">
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td valign="bottom" style="height:5px;margin:0;padding:20px 0 0 0;line-height:0;font-size:2px;"></td>
			</tr>
			<!-- Start of Second Content -->
			<tr>
				<td bgcolor="#FFFFFF" style="padding:10px 20px; background:#ffffff;background-color:#ffffff;" valign="top">
					<?php 
						if(empty($data_content)){
							$data_content = array();
						}
						$this->load->view('elements/emails/html/'.$content_for_layout, $data_content);
					?>
				</td>
			</tr>
			<!-- End of Second Content -->
			<!-- Start of Third Content -->
			<tr>
				<td valign="bottom" style="height:5px;margin:0;padding:20px 0 0 0;line-height:0;font-size:2px;"></td>
			</tr>
			<tr>
				<td bgcolor="#455C44" style="padding:0 20px 15px 20px; background-color:#455C44; background:#455C44;">
					<table cellpadding="0" cellspacing="0" style="width: 100%; border-collapse:collapse; font-family:Tahoma; font-weight:normal; font-size:12px; line-height:15pt; color:#FFFFFF;">
						<tr>
							<td style="padding:20px 0 0 0;" colspan="2">Copyright © 2012 Klontongku.com</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td valign="top" style="height:5px;margin:0;padding:0 0 20px 0;line-height:0;font-size:2px;"><img alt="" height="5" src="images/BottomBackground_Blue_2.png" vspace="0" style="border:0; padding:0; margin:0; line-height:0; display:block;" width="620"></td>
			</tr>
		</table>
		</td>
	</tr>
</table>
</body>
</html>