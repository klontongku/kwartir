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
			<?php $this->load->view('elements/blocks/users/form_member', array('register' => true));?>
		</section>			
		
	</div>
	
	<div class="seven columns">
		<?php $this->load->view('elements/sidebars/kwartir_address');?>
	</div>
</section>
