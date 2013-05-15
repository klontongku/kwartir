<?php $this->load->view('admin/header'); ?>
					
					<h1>
						Gallery
					</h1>
                    <p><a class="toggle-link" href="<?php echo base_url(); ?>kwadmin/addgallery"><i class="icon-plus"></i> Tambah Gallery Baru</a></p>
					<ul class="thumbnails">
						<?php foreach($gallery as $row){ ?>
						<li class="span3">
							<a href="<?php echo base_url(); ?>kwadmin/gallerydt/<?php echo $row->gallery_header_id; ?>">
							<div class="thumbnail">
								<?php if($row->photo_primer == "" || $row->photo_primer == NULL){ ?>
								<img src="<?php echo base_url(); ?>images/views/galleries/error.jpg" alt="" width="360">
								<?php }else{  ?>
								<img src="<?php echo base_url(); ?>images/views/galleries/<?php echo $row->photo_primer; ?>" alt="" width="360">
								<?php } ?>
								<div class="caption">
									<h5><?php echo $row->title_gallery; ?></h5>
									<p>
                                    </p><ul class="nav nav-list">
                                    	<li><a href="<?php echo base_url(); ?>kwadmin/editgallery/<?php echo $row->gallery_header_id; ?>" title="Edit Gallery"><i class="icon-edit"></i> Edit</a></li>
                         				<li><a href="<?php echo base_url(); ?>kwadmin/deletegallery/<?php echo $row->gallery_header_id; ?>" title="Delete Gallery" onclick="return confirm('Apakah anda yakin ingin menghapus gallery ini ?');"><i class="icon-remove"></i> Delete</a></li>
                                    </ul>
                                    <p></p>
								</div>
							</div>
						</a>
						</li>
						<?php } ?>
					</ul>
					<center>
                    <?php echo $pagination; ?>
                    </center>


<?php $this->load->view('admin/footer'); ?>