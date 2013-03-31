<section class="main container sbr clearfix">
	<div class="breadcrumbs">
		<?php 
			echo addCrumb('Home', false, base_url());
			echo addCrumb('Edit Profil', true);
		?>
	</div>
	
	<div class="nine columns">
		
		<h3>Edit Profil</h3>
		
		<section id="contact">
			<?php $this->load->view('elements/blocks/users/form_member', array('register' => false));?>
		</section>			
		
	</div>
</section>
