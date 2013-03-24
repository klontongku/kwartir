<section class="main container sbr clearfix">		
	<div class="breadcrumbs">
		<?php 
			echo addCrumb('Home', false, base_url());
			echo addCrumb('Lupa password', true);
		?>
	</div>
	
	<div class="nine columns">
		
		<h3>Lupa Password</h3>
		
		<section id="contact">
			<?php 
				echo form_open(current_url(), array(
					'class' => 'comments-form',
					'id' => 'contactform'
				));
				echo '<p class="input-block">';
				echo form_label('Email', 'Email', array('class' => 'left'));
				echo form_input(array(
					// 'class' => 'input-text for_reset',
					'name' => 'email',
					'id' => 'email',
					'value' => $this->form_validation->set_value('email'),
				));
				echo form_error('email');
				echo '</p>';
				echo '<p class="input-block">';
				$attr = 'class = "button default"';
				echo form_submit('reset_password', 'reset password', $attr);
				echo '</p>';
				echo form_close();
			?>		
		</section>

	</div>
	<div class="seven columns">
		<?php $this->load->view('elements/sidebars/kwartir_address');?>		
	</div>

</section>