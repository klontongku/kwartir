<section class="main container sbr clearfix">	
	<div class="breadcrumbs">
		<?php 
			echo addCrumb('Home', false, base_url());
			echo addCrumb('Events', true);
		?>
	</div>

	<section id="content" class="ten columns">
		<?php 
		if(!empty($events)):
			foreach ($events as $key => $value):
				$link = 'events/detail/'.$value['event_id'].'/'.toSlug($value['title']);
		?>
				<article class="entry event">
					<div class="entry-meta">
						<span class="date"><?php echo customDate($value['from'], 'd');?></span>
						<span class="month"><?php echo customDate($value['from'], 'M');?></span>
					</div>

					<div class="entry-body">
						<div class="entry-title">
							<h2 class="title">
								<?php echo anchor($link, $value['title']);?>
							</h2>
							
							<span class="e-date"><b><?php printf('%s - %s', customDate($value['from'], 'F d, Y'), customDate($value['to'], 'F d, Y'))?></b>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
								<strong><?php echo $value['clock']?></strong>
							</span>
							<span class="place"><?php printf('<b>Tempat: </b>%s', $value['location'])?></span>
							
						</div>				

						<p><?php echo word_limiter($value['event_description'], 31);?></p>
						<?php echo anchor($link, 'Event Details', array('class' => 'button default small'));?>

					</div>

				</article>
			<?php endforeach;?>
		<?php else:?>
			<p><?php echo 'Event belum tersedia untuk saat ini';?></p>
		<?php endif;?>
	</section>
	
	<?php if(!empty($newest_activities)):?>
	<aside id="sidebar" class="one-third column">
		
		<div class="widget widget_popular_posts">
			
			<h3 class="widget-title">Kegiatan Terbaru</h3>
			
			<ul>
				<?php foreach ($newest_activities as $key => $value):?>
					<li>
						<div class="bordered alignleft">
							<figure class="add-border">
								<?php
									$image = showImage(EVENT_PATH, $value['image'], array('title' => $value['title']));
									$link =  'activities/detail/'.$value['activity_id'].'/'.toSlug($value['title']);
									echo anchor($link, $image, array('class' => 'single-image'));
								?>
							</figure>
						</div>						
						<h6><?php echo anchor($link, $value['title']);?></h6>
						<div class="entry-meta"><?php echo customDate($value['created']);?></div>
					</li>
				<?php endforeach;?>
			</ul>
			
		</div>
	</aside>
	<?php endif;?>
</section>