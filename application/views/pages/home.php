<section class="container">	
	
	<section class="holder clearfix">
		
		<div class="one-third column">
			
			<div class="detailimg">
				
				<div class="bordered">
					<figure class="add-border">
						<a class="single-image picture-icon" rel="holder" href="images/full/01.jpg"><img src="images/temp/temp-img-1.jpg" alt="" /></a>
					</figure>
				</div>
				
				<h5>Kegiatan</h5>
				
				<p>
					Nullam sed nisi arcu condimentum varius. Etiam malesuada velit bibeum donec sit
					amet orci augue tristique eros amet risus.
				</p>
				<?php echo anchor('activities/', 'Learn more', array('class' => 'button default'));?>
				
			</div>
			
		</div>
		
		<div class="one-third column">
			
			<div class="detailimg">
				
				<div class="bordered">
					<figure class="add-border">
						<a class="single-image picture-icon" rel="holder" href="images/full/08.jpg"><img src="images/temp/temp-img-1.jpg" alt="" /></a>
					</figure>
				</div>
				
				<h5>Jadwal</h5>
				
				<p>
					Nullam sed nisi arcu condimentum varius. Etiam malesuada velit bibeum donec sit
					amet orci augue tristique eros amet risus.
				</p>
				<?php echo anchor('events/', 'Learn more', array('class' => 'button default'));?>
				
			</div>
			
		</div>
		
		<div class="one-third column">
			
			<div class="detailimg">
				
				<div class="bordered">
					<figure class="add-border">
						<a class="single-image picture-icon" rel="holder" href="images/full/02.jpg"><img src="images/temp/temp-img-1.jpg" alt="" /></a>
					</figure>
				</div>
				
				<h5>Gallery</h5>
				
				<p>
					Nullam sed nisi arcu condimentum varius. Etiam malesuada velit bibeum donec sit
					amet orci augue tristique eros amet risus.
				</p>
				
				<?php echo anchor('galleries/', 'Learn more', array('class' => 'button default'));?>
				
			</div>
			
		</div>
		
		<div class="clear"></div>

	</section>
	
	<section class="holder clearfix">
	<aside id="bottom-sidebar" class="clearfix">
		
		<div class="two-thirds column">
			
			<div class="widget widget_recent_entries">

				<h3 class="widget-title">Kegiatan Terbaru</h3>
				
				<ul>
					<?php 
						if(!empty($newest_activities)):
							foreach ($newest_activities as $key => $value):
					?>
					<li>
						<h6>
							<?php echo anchor('javascript:void(0)', $value['title']);?>
						</h6>
						<div class="bordered alignleft">
							<figure class="add-border">
								<?php
									$link =  'javascript:void(0)';
				                    $image_banner = array(
				                        'src' => ACTIVITY_PATH.$value['image'],
				                        'alt' => $value['title'],
				                        // 'width' => '74px',
				                        // 'height' => '64px'    
				                    );
				                    if($value['title']){
				                        $image_banner = array_merge($image_banner, array('title' => $value['title']));
				                    }
				                    echo anchor($link, img($image_banner), array(
				                    	'class' => 'single-image'
				                    ));  
								?>
							</figure>
						</div>		
						<p>
							<?php echo word_limiter($value['description'], 21);?>
						</p>
						<?php echo anchor($link, 'Read more', array('class' => 'button default'));?>
					</li>
					<?php
							endforeach;
						else:
					?>
					<li>
						<p><?php echo 'Kegiatan belum terssedia untuk saat ini'?></p>
					</li>
					<?php		
						endif;
					?>
				</ul>

			</div>				
			
		</div>

		<div class="one-third column">
			
			<div class="widget widget_upcoming_events">
				
				<h3 class="widget-title">Jadwal Terbaru</h3>
				
				<ul>
					<?php 
						if(!empty($newest_event)):
							foreach ($newest_event as $key => $value):
					?>
					<li>
						<div class="entry-meta">
							<span class="date"><?php echo customDate($value['from'], 'd');?></span>
							<span class="month"><?php echo customDate($value['from'], 'F');?></span>
						</div>
						
						<h6>
							<?php echo anchor('events/detail/'.$value['event_id'].'/'.toSlug($value['title']), $value['title']);?>
						</h6>
						<span class="place"><?php echo $value['location']?></span>
						<span class="time"><?php echo $value['clock']?></span>
					</li>
					<?php
							endforeach;
						else:
					?>
					<li>
						<p><?php echo 'Jadwal kegiatan belum terssedia untuk saat ini'?></p>
					</li>
					<?php		
						endif;
					?>
				</ul>
				
			</div>
			
		</div>

	</aside>
	</section>
	<?php if(!empty($newest_gallery)):?>
	<section class="holder clearfix">
			<h3 class="widget-title">Gallery Terbaru</h3>
				<ul id="bxslider" class="bxslidercontainer" >
					<?php foreach ($newest_gallery as $key => $value):?>
					<li>
						<?php 
							$link = 'galleries/detail/'.$value['gallery_header_id'].'/'.toSlug($value['title']);
							$image = showImage(GALLERY_PATH, $value['photo_primer']);
							echo anchor($link, $image, array(
								'class' => 'single-image picture-icon',
								// 'rel' => 'holder'
							));
						?>
						</li>
					<?php endforeach;?>
				</ul>
	</section>
	<?php endif;?>
</section>