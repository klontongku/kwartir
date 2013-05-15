<?php $this->load->view('admin/header'); ?>

					<h1>
						Tambah Gallery
					</h1>
					<?php echo form_open_multipart(''); ?>

			
						<fieldset>
							<legend>Gallery Baru</legend>

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
					

							<div class="control-group">
								<label class="control-label" for="textarea">Judul Gallery</label>
								<div class="controls">
									<input type="text" name="title" placeholder="input judul galeri" value="<?php 
										if($this->uri->segment(3)){ echo $title; }else{ echo set_value('title'); }
									?>">
								</div>
							</div>

							<?php if(!$this->uri->segment(3)){ ?>
                            <div class="control-group">
								<label class="control-label" for="fileInput">Photo Primer</label>
								<div class="controls">
									<input id="fileInput" name="upload" type="file">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="textarea">Nama Foto Primer</label>
								<div class="controls">
									<input type="text" name="ititle" placeholder="input judul foto pertama" value="<?php echo set_value('ititle'); ?>">
								</div>
							</div>
							<?php } ?>

							<div class="form-actions">
								<button type="submit" class="btn btn-primary">Save</button> 
							</div>
						</fieldset>
					</form>

<?php $this->load->view('admin/footer'); ?>