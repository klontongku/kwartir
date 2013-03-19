<section class="main container clearfix">	
	<div class="breadcrumbs">
		<?php 
			echo addCrumb('Home', false, base_url());
			echo addCrumb('Albums', true);
		?>
	</div>
	
	<section id="gallery" class="gallery">
		<?php 
			if(!empty($galleries)):
				foreach ($galleries as $key => $value):
		?>
				<article class="eight columns" data-categories="sermons people">
					<div class="project-thumb">
						<div class="bordered">
							<figure class="add-border">
								<?php
									$title = $value['title_gallery'];
									$link =  'galleries/detail/'.$value['gallery_header_id'].'/'.toSlug($title);
									
									$default = array('alt' => $title);

									if($value['title_gallery']){
				                        $default = array_merge($default, array('title' => $title));
				                    }
									$image_gallery = showImage(GALLERY_PATH, $value['photo_primer'], $default);

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
			<p><?php echo 'Galeri belum tersedia untuk saat ini'?></p>
		<?php endif;?>
	</section>
	<div class="paging"><?php echo $pagination; ?></div>
</section>