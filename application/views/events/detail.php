<section class="main container clearfix">	
	<div class="breadcrumbs">
		<ul>
			<?php 
				echo addCrumb('Home', false, base_url());
				echo addCrumb('Events', false, 'events/');
				echo addCrumb($events['title'], true);
			?>
		</ul>

	</div>
	<section id="content" class="ten columns">
		
		<article class="entry event">
			<div class="entry-meta">
				
				<span class="date"><?php echo customDate($events['from'], 'd');?></span>
				<span class="month"><?php echo customDate($events['from'], 'F');?></span>

			</div>

			<div class="entry-body">
				
				<div class="entry-title">

					<h2 class="title"><?php echo $events['title'];?></h2>
					
					<span class="e-date"><b><?php printf('%s - %s',customDate($events['from'], 'F d, Y'), customDate($events['to'], 'F d, Y'));?></b>
						<strong><?php echo $events['clock'];?></strong>
					</span> 
					<span class="place"><?php printf('<b>Tempat: </b>%s', $events['location'])?></span>
					
				</div>		
				
			</div>

			<div class="nine columns offset-by-one alpha omega">

				<p><?php echo $events['event_description'];?></p>					

			</div>

		</article>
		
	</section>
	
	<?php if(!empty($other_events)):?>
	<aside id="sidebar" class="one-third column">
		
		<div class="widget widget_popular_posts">
			
			<h3 class="widget-title">Kegiatan Lainnya</h3>
			
			<ul>
				<?php 
					foreach ($other_events as $key => $value):
						$link = 'events/detail/'.$value['event_id'].'/'.toSlug($value['title']);
				?>
					<li>
						<div class="bordered alignleft">
							<div class="entry-meta">
								<span class="date"><?php echo customDate($events['from'], 'd');?></span>
								<span class="month"><?php echo customDate($events['from'], 'F');?></span>
							</div>
						</div>						
						<h6>
							<?php echo anchor($link, $value['title']);?>
						</h6>
						<div class="entry-meta"><?php echo customDate($events['from'], 'F, d');?></div>
					</li>
				<?php endforeach;?>
			</ul>
			
		</div>

	</aside>
	<?php endif?>
</section>