<section class="main container sbr clearfix">
	<div class="breadcrumbs">
		<?php 
			echo addCrumb('Home', false, base_url());
			echo addCrumb('Tentang Kami', true);
		?>		
	</div>
	<?php if($cms['image']):?>
	<div class="bordered">
		
		<figure class="add-border">
			<?php 
				$image = array(
                    'src' => ABOUT_US_PATH.$cms['image'],
                );
                echo img($image);
			?>
		</figure>
		
	</div>
	<?php endif;?>
	<div class="columns">
		<p><?php echo $cms['description']?></p>
	</div>
</section>