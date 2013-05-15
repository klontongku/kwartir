<?php $this->load->view('admin/header'); ?>
					
					<h1>
						<?php echo $page; ?>
					</h1>
                    <p><a class="toggle-link" href="<?php echo base_url(); ?>kwadmin/addgallerydt/<?php echo $this->uri->segment(3); ?>"><i class="icon-plus"></i> Tambah Foto Gallery</a></p>
					<ul class="thumbnails">
						<?php foreach($gallery as $row){ ?>
						<li class="span3">
							
							<div class="thumbnail">
								<img src="<?php echo base_url(); ?>images/views/galleries/<?php echo $row->image; ?>" alt="" width="360">
								<div class="caption">
									<h5><?php echo $row->title; ?></h5>
									<p>
                                    </p><ul class="nav nav-list">
                                    	<?php if($img==$row->image){ ?>
                                    	<li>Image Primer</li>
                                    	<?php }else{  ?>
                                    	<li><a href="<?php echo base_url(); ?>kwadmin/setimgprimer/<?php echo $row->gallery_header_id; ?>/<?php echo $row->gallery_detail_id; ?>" title="Edit Foto Gallery" onclick="return confirm('Apakah anda yakin ingin menjadikan foto ini sebagai foto primer gallery ?');"><i class="icon-check"></i> Set Primer</a></li>
                         				<?php } ?>
                         				<li><a href="<?php echo base_url(); ?>kwadmin/deletegallerydt/<?php echo $row->gallery_header_id; ?>/<?php echo $row->gallery_detail_id; ?>" title="Delete Foto Gallery" onclick="return confirm('Apakah anda yakin ingin menghapus foto gallery ini ?');"><i class="icon-remove"></i> Delete</a></li>
                                    </ul>
                                    <p></p>
								</div>
							</div>
						
						</li>
						<?php } ?>
					</ul>
					<center>
                    <?php echo $pagination; ?>
                    </center>


<?php $this->load->view('admin/footer'); ?>