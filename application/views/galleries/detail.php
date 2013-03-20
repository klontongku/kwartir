<section class="main container clearfix">	
	<div class="breadcrumbs">
		<ul>
			<?php 
				echo addCrumb('Home', false, base_url());
				echo addCrumb('Albums', false, 'galleries/');
				echo addCrumb($data_header['title_gallery'], true);
			?>
		</ul>
	</div>
	
	<section id="gallery" class="gallery">
		<?php 
			if(!empty($galleries)):
				foreach ($galleries as $key => $value):
		?>
				<article class="four columns" data-categories="sermons people">
					
					<div class="project-thumb">
						
						<div class="bordered">
							<figure class="add-border">
								<?php
									$title = ($value['title']) ? $value['title'] :'';
									$link =  GALLERY_PATH.$value['image'];
									
									$default = array('alt' => $title);

									if($value['title']){
				                        $default = array_merge($default, array('title' => $title));
				                    }
									$image_gallery = showImage(GALLERY_PATH, $value['image'], $default);

				                    echo anchor($link, $image_gallery, array(
				                    	'class' => 'single-image picture-icon',
				                    	'title' => $title,
				                    	'rel' => 'gallery'
				                    ));  
								?>
							</figure>
						</div>
					</div>
				</article>
			<?php endforeach;?>
		<?php else:?>
			<p><?php echo 'Kegiatan belum tersedia untuk saat ini'?></p>
		<?php endif;?>
	</section>
	<div class="wp-pagenavi clearfix"><?php echo $pagination; ?></div>
</section>