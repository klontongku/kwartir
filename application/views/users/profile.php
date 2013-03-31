<section class="main container sbr clearfix">	
	<div class="breadcrumbs">
		<?php 
			echo addCrumb('Home', false, base_url());
			echo addCrumb('Account', true);
		?>
	</div>
	
	<div class="nine columns">
		
		<h3>Account Information</h3>
		<table class="table table-striped">
			<tr>
		    <td>NIP</td>
		    <td><?php echo $user['NIP']?></td>
		  </tr>
			<tr>
		    <td>Nama</td>
		    <td><?php echo $user['name']?></td>
		  </tr>
		  <tr>
		    <td width="40%">Tempat Tanggal Lahir</td>
		    <td><?php printf('%s, %s', $user['hometown'], $user['birthday'])?></td>
		  </tr>
		  <tr>
		    <td>Jenis Kelamin</td>
		    <td><?php echo $user['gender']?></td>
		  </tr>
		  <tr>
		    <td>Golongan Darah</td>
		    <td><?php echo $user['blood_type']?></td>
		  </tr>
		  <tr>
		    <td>Agama</td>
		    <td><?php echo $user['religius']?></td>
		  </tr>
		  <tr>
		    <td>Alamat</td>
		    <td><?php echo $user['address']?></td>
		  </tr>
		  <tr>
		    <td>Golongan</td>
		    <td>
		    	<?php 
		    		$position = gugusDepan();
		    		echo $position[$user['gugus_depan']];
		    	?>
		   	</td>
		  </tr>
		</table>					
		
	</div>

	<div class="three columns">
		<?php echo imageProfile($user, array('width' => '200', 'height' => '200', 'class' => 'left')); ?>
	</div>

</section>
