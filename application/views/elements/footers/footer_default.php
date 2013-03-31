<footer id="footer">
	<div class="container clearfix">
		<div class="four columns">
			<div class="widget widget_text">
				<h3 class="widget-title">Kwartir Cabang Bogor</h3>
				<div class="textwidget">
					<p>
						Mollis malesuada primis in faucibus luctus ultrces posuere cubilia nis velit porttitor euismod 
						pharetra interetiam laoreet gitis placerat magna sit amet massa posuere pretium. 
					</p>
				</div>
			</div>
			<div class="widget widget_contacts">
				
				<div class="vcard">
					<span class="contact street-address">Address: 12 Street, Los Angeles, CA, 94101</span>
					<span class="contact tel">Phone:  +1 800 123 4567</span>
					<span class="contact email">E-mail: testmail@sitename.com</span>						
				</div><!--/ .vcard-->
				
			</div><!--/ .widget-->
			
		   <div class="widget widget_social">
			   
				<ul class="social-icons clearfix">
					<li class="twitter"><a href="#">Twitter<span></span></a></li>
					<li class="facebook"><a href="#">Facebook<span></span></a></li>
					<li class="dribble"><a href="#">Dribble<span></span></a></li>
					<li class="vimeo"><a href="#">Vimeo<span></span></a></li>
					<li class="rss"><a href="#">Rss<span></span></a></li>
				</ul><!--/ .social-icons-->				   
			   
		   </div><!--/ .widget-->
		
		</div><!--/ .four-->
		
		<div class="four columns">
			
			<div class="widget widget_recent_entries">

				<h3 class="widget-title">Twitter</h3>
				<div id="jstwitter"></div>
			</div><!--/ .widget-->				
			
		</div><!--/ .four-->
		
		<div class="four columns">
			
			<div class="widget widget_nav_menu">

				<h3 class="widget-title">Site Map</h3>

				<ul>
					<li>
						<?php echo anchor(base_url(), 'Home');?>
					</li>
					<li>
						<?php echo anchor('pages/about_us', 'Tentang Kami');?>
					</li>
					<li>
						<?php echo anchor('activities/', 'Kegiatan');?>
					</li>
					<li>
						<?php echo anchor('galleries/', 'Galeri');?>
					</li>
					<li>
						<?php echo anchor('events/', 'Jadwal');?>
					</li>
					<li>
						<?php echo anchor('users/contact', 'Kontak');?>
				</ul>

			</div><!--/ .widget-->				
			
		</div><!--/ .four-->
		
		<?php if($this->session->userdata('logged_in') == false):?>
		<div class="four columns">
			
			<div class="widget widget_contact_form">

				<h3 class="widget-title">Log In</h3>
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
							$attr = 'class = "button default"';
							echo form_submit('login', 'Login', $attr).'<br />';
							echo anchor('users/forgot/', 'Lupa password ?', array('class' => 'lost_password'));
						?>
					</p>
					</p>
				<?php echo form_close();?>
			</div>
		</div>
		<?php endif;?>		
	</div>
	
</footer>