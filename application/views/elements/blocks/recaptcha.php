<?php
	echo form_label('ReCaptcha <span class="required">*</span>', 'ReCaptcha');
	echo form_input(array(
		'class' => 'input-text captcha-style',
		'name' => 'captcha',
		'id' => 'captcha',
	));
	echo form_error('captcha');
	echo '<br>';
	echo $captcha_code['image'];
?>