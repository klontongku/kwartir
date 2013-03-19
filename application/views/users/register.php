<section class="main container sbr clearfix">
	<div class="breadcrumbs">
		<?php 
			echo addCrumb('Home', false, base_url());
			echo addCrumb('Register', true);
		?>
	</div>
	
	<div class="nine columns">
		
		<h3>Register</h3>
		
		<section id="contact">
			<?php 
			echo form_open('users/register/', array(
				'class' => 'comments-form',
				'id' => 'contactform'
			));
				echo '<p class="input-block">';
					echo form_label('Nama <span class="required">*</span>', 'Nama');
					echo form_input(array(
						'class' => 'input-text',
						'name' => 'name',
						'id' => 'tname',
						'value' => $this->form_validation->set_value('name'),
					));
					echo form_error('name'); 
				echo '</p>';

				echo '<p class="input-block">';
					echo form_label('Password <span class="required">*</span>', 'Password');
					echo form_password(array(
						'class' => 'input-text',
						'name' => 'password',
						'id' => 'password',
					));
					echo form_error('password');
				echo '</p>';

				echo '<p class="input-block">';
					echo form_label('Konfirmasi password <span class="required">*</span>', 'Konfirmasi password');
					echo form_password(array(
						'class' => 'input-text',
						'name' => 're_password',
						'id' => 'reg_password2'
					));
					echo form_error('re_password');
				echo '</p>';

				echo '<p class="input-block">';
					echo form_label('Tempat Tanggal Lahir <span class="required">*</span>', 'Tempat Tanggal Lahir');
					echo form_dropdown('hometown',array(
							'' => '-Tempat-',
							'Jakarta' => 'Jakarta',
							'Bandung' => 'Bandung',
							'Surabaya' => 'Surabaya',
							'Semarang' => 'Semarang',
						),
						$this->form_validation->set_value('hometown')
					);
					echo form_input(array(
						'class' => 'birthday',
						'name' => 'birthday',
						'id' => 'birthday',
						'value' => $this->form_validation->set_value('birthday'),
					));
					echo form_error('gender');
				echo '</p>';

				echo '<p class="input-block">';
					echo form_label('Email <span class="required">*</span>', 'Email');
					echo form_input(array(
						'class' => 'input-text',
						'name' => 'email',
						'id' => 'reg_email',
						'value' => $this->form_validation->set_value('email'),
					));
					echo form_error('email');
				echo '</p>';

				echo '<p class="input-block">';
					echo form_label('Telepon <span class="required">*</span>', 'Telepon');
					echo form_input(array(
						'class' => 'input-text',
						'name' => 'phone',
						'id' => 'phone',
						'value' => $this->form_validation->set_value('phone'),
					));
					echo form_error('phone'); 
				echo '</p>';

				echo '<p class="input-block">';
					echo form_label('Jenis kelamin <span class="required">*</span>', 'Jenis kelamin');
					echo form_dropdown('gender',array(
							'' => '-Pilih-',
							'male' => 'pria',
							'female' => 'wanita'
						),
						$this->form_validation->set_value('gender'),
						'class = "input-select"'
					);
					echo form_error('gender');
				echo '</p>';

				echo '<p class="input-block">';
					echo form_label('Golongan Darah <span class="required">*</span>', 'Golongan Darah');
					echo form_dropdown('blood_type',array(
							'' => '-Pilih-',
							'A' => 'A',
							'B' => 'B',
							'AB' => 'AB',
							'O' => 'O',
						),
						$this->form_validation->set_value('blood_type'),
						'class = "input-select"'
					);
					echo form_error('blood_type');
				echo '</p>';

				echo '<p class="input-block">';
					echo form_label('Agama <span class="required">*</span>', 'Agama');
					echo form_dropdown('religius',array(
							'' => '-Pilih-',
							'Islam' => 'Islam',
							'Kristen' => 'Kristen',
							'Katolik' => 'Katolik',
							'Hindu' => 'Hindu',
							'Buddha' => 'Buddha',
							'Konghucu' => 'Konghucu',
						),
						$this->form_validation->set_value('religius'),
						'class = "input-select"'
					);
					echo form_error('religius');
				echo '</p>';

				echo '<p class="input-block">';
					echo form_label('Golongan <span class="required">*</span>', 'Golongan');
					echo form_dropdown('gugus_depan', array(
							'' => '-Pilih-',
							'00' => 'Mabiran',
							'01' => 'Andalan Ranting',
							'02' => 'Dewan Kerja Ranting',
							'03' => 'Pembina/Mabigus',
							'04' => 'Anggota',
						),
						$this->form_validation->set_value('gugus_depan'),
						'class = "input-select"'
					);
					echo form_error('gugus_depan');
				echo '</p>';

				echo '<p class="input-block">';
					echo form_label('Alamat <span class="required">*</span>', 'Alamat');
					echo form_textarea(array(
						'class' => 'input-text',
						'name' => 'address',
						'id' => 'reg_address',
						'rows' => 4,
						'cols' => 50,
						'value' => $this->form_validation->set_value('address'),
					));
					echo form_error('address');
				echo '</p>';

				echo '<p class="input-block">';
					echo form_label('Kwartir Ranting <span class="required">*</span>', 'Kwartir Ranting');
					echo form_input(array(
						'class' => 'input-text',
						'name' => 'kwartir_ranting',
						'id' => 'kwartir_ranting',
						'maxlength' => 2,
						'value' => $this->form_validation->set_value('kwartir_ranting'),
					));
					echo form_error('kwartir_ranting');
				echo '</p>';
				
				echo '<p class="input-block">';
					$this->load->view('elements/blocks/recaptcha', $captcha_code);
				echo '</p>';

				echo '<p class="input-block">';
					$attr = 'class = "button default submit-button"';
					echo form_submit('register', 'Register', $attr);
				echo '</p>';
		echo form_close();
		?>
		</section>			
		
	</div>
	
	<div class="seven columns">
		<?php $this->load->view('elements/sidebars/kwartir_address');?>
	</div>
</section>
