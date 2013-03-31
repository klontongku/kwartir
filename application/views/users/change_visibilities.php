<section class="main container sbr clearfix">	
	
	<div class="breadcrumbs">
		<?php 
			echo addCrumb('Home', false, base_url());
			echo addCrumb('Ganti visibilitas informasi', true);
		?>

	</div>
	
	<div class="nine columns">
		
		<h3>Ganti Visibiltas Informasi</h3>

		<p>Atur Informasi yang dapat dilihat oleh publik.</p>
		
		<section id="contact">
			<?php
				echo form_open('users/do_change_visibilities/', array(
					'id' => 'contactform'
				));

				echo '<p class="input-block">';
				echo form_label('No.Telepon', 'No.Telepon');
				echo form_dropdown('phone',array(
						'0' => 'sembunyikan',
						'1' => 'tampil',
					),
					$user['v_phone'],
					'class = "input-select"'
				);
				echo '</p>';
				echo form_label('Alamat', 'alamat');
				echo form_dropdown('address',array(
						'0' => 'sembunyikan',
						'1' => 'tampil',
					),
					$user['v_address'],
					'class = "input-select"'
				);
				echo '</p>';
				echo form_label('Email', 'email');
				echo form_dropdown('email',array(
						'0' => 'sembunyikan',
						'1' => 'tampil',
					),
					$user['v_email'],
					'class = "input-select"'
				);
				echo '</p>';
				$attr = 'class = "button default"';
				echo form_submit('submit', 'Submit', $attr);
			?>
		</section>		
	</div>
</section>
