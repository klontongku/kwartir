<?php 
if($register == true){
	echo form_open('users/register/', array(
		'class' => 'comments-form',
		'id' => 'contactform'
	));
}else{
	echo form_open_multipart('users/edit', array(
		'class' => 'comments-form',
		'id' => 'contactform'
	));
}
	echo '<p class="input-block">';
		echo form_label('Nama <span class="required">*</span>', 'Nama');
		echo form_input(array(
			'class' => 'input-text',
			'name' => 'name',
			'id' => 'tname',
			'value' => ($this->form_validation->set_value('name')) ? $this->form_validation->set_value('name') : ((!empty($user['name'])) ? $user['name'] : ''),
		));
		echo form_error('name'); 
	echo '</p>';

if($register == true){
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
}else{
	if(!empty($user['image'])){
		echo '<p class="input-block">';
		echo imageProfile($user, array('width' => '200', 'height' => '200', 'class' => 'left'));
		echo '</p>';
	}
	echo '<p class="input-block">';
	echo form_label('Foto <span class="required">*</span>', 'foto');
	echo form_upload('image');
	echo '</p>';
}
	
	echo '<p class="input-block">';
		echo form_label('Tempat Tanggal Lahir <span class="required">*</span>', 'Tempat Tanggal Lahir');
		echo form_dropdown('hometown',array(
				'' => '-Tempat-',
				'Jakarta' => 'Jakarta',
				'Bandung' => 'Bandung',
				'Surabaya' => 'Surabaya',
				'Semarang' => 'Semarang',
			),
			($this->form_validation->set_value('hometown')) ? $this->form_validation->set_value('hometown') : ((!empty($user['hometown'])) ? $user['hometown'] : '')
		);
		echo form_input(array(
			'class' => 'birthday',
			'name' => 'birthday',
			'id' => 'birthday',
			'value' => ($this->form_validation->set_value('birthday')) ? $this->form_validation->set_value('birthday') : ((!empty($user['birthday'])) ? $user['birthday'] : ''),
		));
		echo form_error('gender');
	echo '</p>';
if($register == true){
	echo '<p class="input-block">';
		echo form_label('Email <span class="required">*</span>', 'Email');
		echo form_input(array(
			'class' => 'input-text',
			'name' => 'email',
			'id' => 'reg_email',
			'value' => ($this->form_validation->set_value('email')) ? $this->form_validation->set_value('email') : ((!empty($user['email'])) ? $user['email'] : ''),
		));
		echo form_error('email');
	echo '</p>';
}
	echo '<p class="input-block">';
		echo form_label('Telepon <span class="required">*</span>', 'Telepon');
		echo form_input(array(
			'class' => 'input-text',
			'name' => 'phone',
			'id' => 'phone',
			'value' => ($this->form_validation->set_value('phone')) ? $this->form_validation->set_value('phone') : ((!empty($user['phone'])) ? $user['phone'] : ''),
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
			($this->form_validation->set_value('gender')) ? $this->form_validation->set_value('gender') : ((!empty($user['gender'])) ? $user['gender'] : ''),
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
			($this->form_validation->set_value('blood_type')) ? $this->form_validation->set_value('blood_type') : ((!empty($user['blood_type'])) ? $user['blood_type'] : ''),
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
			($this->form_validation->set_value('religius')) ? $this->form_validation->set_value('religius') : ((!empty($user['religius'])) ? $user['religius'] : ''),
			'class = "input-select"'
		);
		echo form_error('religius');
	echo '</p>';

	echo '<p class="input-block">';
		echo form_label('Golongan <span class="required">*</span>', 'Golongan');
		echo form_dropdown('gugus_depan',
			gugusDepan(),
			($this->form_validation->set_value('gugus_depan')) ? $this->form_validation->set_value('gugus_depan') : ((!empty($user['gugus_depan'])) ? $user['gugus_depan'] : ''),
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
			'cols' => 5,
			'value' => ($this->form_validation->set_value('address')) ? $this->form_validation->set_value('address') : ((!empty($user['address'])) ? $user['address'] : ''),
		));
		echo form_error('address');
	echo '</p>';

	echo '<p class="input-block">';
		echo form_label('Kwartir Ranting <span class="required">*</span>', 'Kwartir Ranting');
		echo form_input(array(
			'class' => 'input-text',
			'name' => 'kwartir_ranting',
			'id' => 'kwartir_ranting',
			'title' => 'Kwartir ranting 01 sampai 06',
			'maxlength' => 2,
			'value' => ($this->form_validation->set_value('kwartir_ranting')) ? $this->form_validation->set_value('kwartir_ranting') : ((!empty($user['kwartir_ranting'])) ? $user['kwartir_ranting'] : ''),
		));
		echo form_error('kwartir_ranting');
	echo '</p>';
	
	if($register == true){
		echo '<p class="input-block">';
			$this->load->view('elements/blocks/recaptcha', $captcha_code);
		echo '</p>';
	}

	echo '<p class="input-block">';
		$attr = 'class = "button default submit-button"';
		if($register == true){
			echo form_submit('register', 'Register', $attr);
		}else{
			echo form_submit('submit', 'Submit', $attr);
		}
	echo '</p>';
echo form_close();
?>