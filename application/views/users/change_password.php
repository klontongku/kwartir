<section class="main container sbr clearfix">	
	<div class="breadcrumbs">
		<?php 
			echo addCrumb('Home', false, base_url());
			echo addCrumb('Ganti password', true);
		?>
	</div>

	<div class="nine columns">
		
		<h3>Pergantian Kata Sandi</h3>

		<p>
			Untuk pergantian kata sandi, kami memerlukan kata sandi lama Anda sebagai konfirmasi untuk pergantian ke kata sandi baru. Isi kata sandi lama Anda dengan benar, dan kami akan mengganti kata sandi Anda dengan yang baru.
		</p>
		
		<section id="contact">
			<?php 
				echo form_open('users/do_change_password', array('id' => 'contactform'));

				echo '<p class="input-block">';
				echo form_label('Password Lama', 'password_lama');
				echo form_password(array(
					'class' => 'input-text',
					'name' => 'oldpassword',
					'id' => 'oldpassword',
					'value' => $this->form_validation->set_value('oldpassword'),
				));
				echo form_error('oldpassword');
				echo '</p>';

				echo '<p class="input-block">';
				echo form_label('Password Baru', 'password_baru');
				echo form_password(array(
					'class' => 'input-text',
					'name' => 'password',
					'id' => 'password',
					'value' => $this->form_validation->set_value('password'),
				));
				echo form_error('password');
				echo '</p>';

				echo '<p class="input-block">';
				echo form_label('Konfirmasi password baru', 'konfirmasi_password_baru');
				echo form_password(array(
					'class' => 'input-text',
					'name' => 'conf_password',
					'id' => 'conf_password',
					'value' => $this->form_validation->set_value('conf_password'),
				));
				echo form_error('conf_password');
				echo '</p>';

				$attr = 'class = "button default"';
				echo form_submit('submit', 'Submit', $attr).'<br />';
			?>
		</section>		
	</div>
</section>