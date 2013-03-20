<section class="main container sbr clearfix">	
	<div class="breadcrumbs">
		<ul>
			 <?php 
				echo addCrumb('Home', false, base_url());
				echo addCrumb('Kegiatan', false, 'activities/');
				echo addCrumb($activities['title'], true);
			?>
		</ul>
	</div>

	<section id="content" class="ten columns">
			
		<div class="bordered">
			<figure class="add-border">
				<?php echo showImage(ACTIVITY_PATH, $activities['image'], array('alt' => $activities['title']));?>
			</figure>
		</div>
		<h1><?php echo $activities['title']?></h1>
		<p><?php echo $activities['description']?></p>
	</section>

	<?php if(!empty($other_events)):?>
	<aside id="sidebar" class="one-third column">
		
		<div class="widget widget_popular_posts">
			
			<h3 class="widget-title">Kegiatan Lainnya</h3>
			
			<ul>
				<?php 
					foreach ($other_events as $key => $value):
						$link = 'activities/detail/'.$value['activity_id'].'/'.toSlug($value['title']);
				?>
				<li>
					<div class="bordered alignleft">
						<figure class="add-border">
							<?php
								$image = showImage(ACTIVITY_PATH, $value['image'], array('alt' => $value['title']));
								echo anchor($link, $image, array(
									'class' => 'single-image'
								));
							?>
						</figure>
					</div>
					<h6><?php echo anchor($link, $value['title']);?></h6>
					<div class="entry-meta"><?php echo customDate($events['created'], 'F, d Y');?></div>
				</li>
				<?php endforeach;?>
			</ul>
		</div>
	</aside>
	<?php endif;?>
</section>