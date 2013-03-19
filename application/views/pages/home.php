<section class="container">	
	<aside id="bottom-sidebar" class="clearfix">
		<div class="one-third column">
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
				                        'width' => '74px',
				                        'height' => '64px'    
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
				<h3 class="widget-title">Jadwal Kegiatan</h3>
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