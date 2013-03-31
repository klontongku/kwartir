<section class="main container sbr clearfix">	
	
	<div class="breadcrumbs">

		<a title="Home" href="index.html">Home</a>
		<span>Yellow Pages</span>

	</div>

	<aside id="sidebar" class="one-third column">
		
		<div class="widget widget_search">
			<?php
				echo form_open('users/yellow_pages', array('id' => 'searchform', 'method' => 'get'));
			?>				
				<fieldset>
					<?php 
						echo form_input(array(
							'name' => 'keyword',
							'value' => (!empty($keyword)) ? $keyword : '',
						));
						echo form_button(array(
							'type' => 'submit', 
							'title' => 'Search',
						));
					?>
				</fieldset>
			<?php echo form_close();?>	
			
		</div>
	</aside>
	<h1>Yellow Pages</h1>	
	<p>
		Temukan teman atau anggota yang tergabung dalam kwartir cabang kota bogor
	</p>
	
	<?php 
		if(!empty($users)):
			foreach ($users as $key => $value):
	?>
	<div class="twelve columns">
		
		<h4><?php echo $value['name']?></h4>
		
		<p>
			<table class="table table-striped">
              <tr>
			  	<td width="17%">NIP</td>
			  	<td><?php echo $value['NIP']?></td>
			  	<td>Telp</td>
			  	<td><?php echo ($value['v_phone'] == 1) ? $value['phone'] : ' - ';?></td>
			  </tr>
			  <tr>
			  	<td>Golongan</td>
			    <td>
			    	<?php 
			    		$gugus_depan = gugusDepan();
			    		echo $gugus_depan[$value['gugus_depan']];
			    	?>
			   	</td>
			  	<td>Email</td>
			  	<td><?php echo ($value['v_email'] == 1) ? $value['email'] : ' - ';?></td>
			  </tr>
			  <tr>
			  	<td>Tempat Tanggal Lahir</td>
			    <td><?php echo $value['hometown'].', '.customDate($value['birthday'])?></td>
			    <td>Alamat</td>
			    <td><?php echo ($value['v_address'] == 1) ? $value['address'] : ' - ';?></td>
			  </tr>
			</table>
		</p>
		
	</div>
	<div class="four columns">
		
		<div class="bordered">
			<figure class="add-border">
				<?php echo imageProfile($value, array('width' => '200', 'height' => '200', 'class' => 'left')); ?>
			</figure>
		</div>
		
	</div>
	<?php 
			endforeach;
		else:
			echo '<p>data tidak tersedia untuk saat ini</p>';
		endif;
	?>
	<div class="wp-pagenavi clearfix"><?php echo $pagination; ?></div>
</section>	