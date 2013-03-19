<section class="main container sbr clearfix">	
	<div class="breadcrumbs">
		<?php 
			echo addCrumb('Home', false, base_url());
			echo addCrumb('Log I', true);
		?>
	</div>	

	<div class="nine columns">
		
		<h3>Log In</h3>
		
		<section id="contact">
			<?php 
				echo form_open('users/login/', array(
					'class' => 'comments-form',
					'id' => 'contactform'
				));
			?>
				<p class="input-block">
					<?php
						echo form_label('E-mail', 'username');
						echo form_input(array(
							'class' => 'input-text',
							'name' => 'email',
							'id' => 'username',
							'value' => $this->form_validation->set_value('email'),
						));
						echo form_error('email');
					?>
				</p>
				<p class="input-block">
					<?php
						echo form_label('Password', 'password');
						echo form_password(array(
							'class' => 'input-text',
							'name' => 'password',
							'id' => 'password'
						));
						echo form_error('password');
					?>
				</p>
				<p class="input-block">
					<?php 
						$attr = 'class = "button default submit-button"';
						echo form_submit('login', 'Login', $attr).'<br />';
						echo anchor('users/forgot/', 'Lupa password ?', array('class' => 'lost_password'));
					?>
				</p>
				</p>
			<?php echo form_close();?>
		</section>			
		
	</div>
	<div class="seven columns">
		<?php $this->load->view('elements/sidebars/kwartir_address');?>
	</div>

</section>