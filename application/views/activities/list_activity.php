<section class="main container clearfix">	
	<div class="breadcrumbs">
		<?php 
			echo addCrumb('Home', false, base_url());
			echo addCrumb('Kegiatani', true);
		?>
	</div>
	
	<section id="portfolio-items" class="portfolio-items pl-col-3">

		<?php 
			if(!empty($activities)):
				foreach ($activities as $key => $value):
		?>
				<article class="one-third column" data-categories="sermons people">
					
					<div class="project-thumb">
						
						<div class="bordered">
							<figure class="add-border">
								<?php
									$title = $value['title'];
									$link =  'activities/detail/'.$value['activity_id'].'/'.toSlug($title);
									
									$default = array('alt' => $title);

									if($value['title']){
				                        $default = array_merge($default, array('title' => $title));
				                    }
									$image_gallery = showImage(ACTIVITY_PATH, $value['image'], $default);

				                    echo anchor($link, $image_gallery, array(
				                    	'class' => 'single-image'
				                    ));  
								?>
							</figure>
						</div>					
						
					</div>

					<div class="project-meta">

						<h4 class="title-item">
							<?php 
								echo anchor($link, $title);
							?>
						</h4>
						
						<p><?php echo word_limiter($value['description'], 31);?></p>
						
					</div>
				</article>
			<?php endforeach;?>
		<?php else:?>
			<p><?php echo 'Kegiatan belum tersedia untuk saat ini'?></p>
		<?php endif;?>
	</section>
	<div class="wp-pagenavi clearfix"><?php echo $pagination; ?></div>
</section>
