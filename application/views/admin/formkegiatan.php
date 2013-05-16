<?php $this->load->view('admin/header'); ?>


				<?php if($this->uri->segment(3)){ ?>
				<h1>Ubah Data Kegiatan</h1>
				<?php 
					//data member
					foreach($detail as $row){
						$title = $row->title;
						$desc = $row->description;
						$image = $row->image;
						$active = $row->active;
						$created = $row->created;
						$modified = $row->modified;
					}
								
				}else{ ?>
				<h1>Tambah Kegiatan</h1>
				<?php } ?>
							

				<?php echo form_open_multipart(''); ?>

				<?php if($this->uri->segment(3)){ ?>
				<legend>Ubah Data Kegiatan</legend>
				<?php }else{ ?>
				<legend>Tambah Kegiatan Baru</legend>
				<?php } ?>

				<?php if(validation_errors()!=NULL){ ?>
				<div class="alert alert-error">
					 <button type="button" class="close" data-dismiss="alert">&times;</button>
  						<?php echo validation_errors(); ?>
				</div>
				<?php } ?>

				<?php if(isset($error)){ ?>
				<div class="alert alert-error">
					 <button type="button" class="close" data-dismiss="alert">&times;</button>
  						<?php echo $error; ?>
				</div>
				<?php } ?>

				<?php if($this->uri->segment(3)){ ?>
				<div class="control-group">
									<label class="control-label">Active :</label>
									<div class="controls"><input type="checkbox" name="active" value="1" <?php if($active==1){ echo 'checked="checked"'; } ?>></div>
				</div>

				<div class="control-group">
									<label class="control-label">Foto :</label>
									<div class="controls"><img src="<?php echo base_url(); ?>images/views/activity/<?php echo $image; ?>?v=<?php echo microtime(); ?>" width="500"></b></div>
				</div>

				<div class="control-group">
									<label class="control-label">Dibuat pada :</label>
									<div class="controls"><b><?php echo date("d F Y, H:i",strtotime($created)); ?></b></div>
				</div>

				<div class="control-group">
									<label class="control-label">Terakhir diubah :</label>
									<div class="controls"><b><?php echo date("d F Y, H:i",strtotime($modified)); ?></b></div>
				</div>
				<?php } ?>

				<div class="control-group">
									<label class="control-label">Judul :</label>
									<div class="controls"><?php

			$data = array(
               		'id' => 'title',
					'name' => 'title',
					'placeholder' => 'input judul'
			   		);

			if($this->uri->segment(3)){
				$data['value'] = $title;
			}else{
				$data['value'] = set_value('title');
			}

            echo form_input($data);
            //echo form_error('name');
		?></div>
								</div>

								<div class="control-group">
									<label class="control-label">Deskripsi :</label>
									<div class="controls"><?php

			$data = array(
               		'id' => 'textarea_wysiwyg',
               		'class' => 'mceSimple',
					'name' => 'desc',
					'rows' => 12,
					'cols' => 60,
			   		);

			if($this->uri->segment(3)){
				$data['value'] = $desc;
			}else{
				$data['value'] = set_value('desc');
			}

            echo form_textarea($data);
            //echo form_error('desc');

		?></div>
								</div>

					<div class="control-group">
									<label class="control-label">Upload Image (max lebar 600px) :</label>
									<div class="controls"><?php

			$data = array(
               		'id' => 'upload',
					'name' => 'upload',
			   		);

            echo form_upload($data);
            ?></div>
								</div>

								<div class="control-group">
									<div class="control">
										<button type="submit" class="btn btn-info">Submit</button>
								</div>
								</div>
								<?php echo form_close(); ?>					
							
						</div>

						</div><!-- end row-fluid -->					
				</div><!-- end span12 -->
			</div><!-- end row-fluid -->
		</div><!-- end container -->
	</div>
<script type="text/javascript" src="<?php echo base_url(); ?>js/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
	<script type="text/javascript">

tinyMCE.init({
        mode : "textareas",
        theme : "advanced",
        editor_selector : "mceSimple"
});



tinyMCE.init({
        mode : "textareas",
        theme : "advanced",
        editor_selector : "mceAdvanced"
});

</script>

<?php $this->load->view('admin/footer'); ?>