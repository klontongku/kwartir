<?php $current = 'current-menu-item';?>
<nav id="navigation" class="navigation clearfix">
	<ul class="clearfix">
		<li <?php echo (isset($current_class) && $current_class == 'home') ? 'class="'.$current.'"' : '';?>>
			<?php echo anchor(base_url(), 'Home');?>
		</li>
		<li <?php echo (isset($current_class) && $current_class == 'about_us') ? 'class="'.$current.'"' : '';?>>
			<?php echo anchor('pages/about_us', 'Tentang Kami');?>
		</li>
		<li <?php echo (isset($current_class) && $current_class == 'activities') ? 'class="'.$current.'"' : '';?>>
			<?php echo anchor('activities/', 'Kegiatan');?>
		</li>
		<li <?php echo (isset($current_class) && $current_class == 'galleries') ? 'class="'.$current.'"' : '';?>>
			<?php echo anchor('galleries/', 'Galeri');?>
		</li>
		<li <?php echo (isset($current_class) && $current_class == 'events') ? 'class="'.$current.'"' : '';?>>
			<?php echo anchor('events/', 'Jadwal');?>
		</li>
		<li <?php echo (isset($current_class) && $current_class == 'contact') ? 'class="'.$current.'"' : '';?>>
			<?php echo anchor('users/contact', 'Kontak');?>
		</li>
		<?php if($this->session->userdata('logged_in')):?>
			<li <?php echo (isset($current_class) && $current_class == 'account') ? 'class="'.$current.'"' : '';?>>
				<?php echo anchor('users/account/'.$this->session->userdata('id').'/'.$this->common->toSlug($this->session->userdata('full_name')), 'Account');?>
					<ul>
						<li><?php echo anchor('users/edit', 'Edit Profil');?></li>
						<li><?php echo anchor('users/change_password', 'Ganti Password');?></li>
						<li><?php echo anchor('users/edit_visibility', 'Ganti Visibilitas Informasi');?></li>
						<li><?php echo anchor('users/yellow_pages', 'Yellow Pages');?></li>
					</ul>
			</li>
			<li><?php echo anchor('users/logout', 'Logout');?></li>
		<?php endif;?>

		<?php if(!$this->session->userdata('logged_in')):?>
			<li <?php echo (isset($current_class) && $current_class == 'register') ? 'class="'.$current.'"' : '';?>>
				<?php echo anchor('users/register', 'Register');?>
			</li>
			<li <?php echo (isset($current_class) && $current_class == 'login') ? 'class="'.$current.'"' : '';?>>
				<?php echo anchor('users/login', 'Log In');?>
			</li>
		<?php endif?>
	</ul>
</nav>