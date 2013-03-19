<section class="main container sbr clearfix">	
	<div class="breadcrumbs">
		<?php 
			echo addCrumb('Home', false, base_url());
			echo addCrumb('Contact', true);
		?>
	</div>
	
	<div class="nine columns">
		
		<h3>Send an Email</h3>
		
		<section id="contact">
			<?php echo form_open('contacts/', array('class' => 'comments-form', 'id' => 'contactform'));?>
				<p class="input-block">
					<?php 
						echo form_label('Nama <span class="required">*</span>', 'Nama');
						echo form_input(array(
							'class' => 'input-text',
							'name' => 'name',
							'id' => 'name',
							'value' => $this->form_validation->set_value('name'),
						));
						echo form_error('name'); 
					?>
				</p>
				<p class="input-block">
					<?php 
						echo form_label('Email <span class="required">*</span>', 'Email');
						echo form_input(array(
							'class' => 'input-text',
							'name' => 'email',
							'id' => 'email',
							'value' => $this->form_validation->set_value('email'),
						));
						echo form_error('email'); 
					?>
				</p>
				<p class="input-block">
					<?php 
						echo form_label('Pesan <span class="required">*</span>', 'Pesan');
						echo form_textarea(array(
							'class' => 'input-text',
							'name' => 'message',
							'id' => 'message',
							'rows' => 10,
							'cols' => 30,
							'value' => $this->form_validation->set_value('message'),
						));
						echo form_error('message');
					?>
				</p>
				<p class="input-block">
					<?php $this->load->view('elements/blocks/recaptcha', $captcha_code);?>
				</p>
				<p class="input-block">
					<?php 
					$attr = 'class = "button default submit-button"';
						echo form_submit('register', 'Register', $attr);
					?>
				</p>
			<?php echo form_close();?>
		</section>			
		
	</div>
	
	<div class="seven columns">
		
		<h3>Lokasi</h3>
		
		<span>
			Address:   &nbsp;&nbsp;&nbsp;&nbsp; 12 Street, Los Angeles, CA, 94101 <br />
			Phone:    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   +1 800 123 4567 <br />
			FAX:       &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;   +1 800 891 2345 <br />
			Email:      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; testmail@sitename.com 
		</span>
		
	</div>
</section>