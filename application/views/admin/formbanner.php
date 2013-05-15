<?php $this->load->view('admin/header'); ?>
					<h1>
						Tambah Banner
					</h1>
					<?php echo form_open_multipart(''); ?>

			
						<fieldset>
							<legend>Banner Baru</legend>

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
								<label class="control-label" for="textarea">Judul</label>
								<div class="controls">
									<input type="text" name="title" placeholder="input text banner"></textarea>
								</div>
							</div>
                            <div class="control-group">
								<label class="control-label" for="fileInput">Photo</label>
								<div class="controls">
									<input id="fileInput" name="upload" type="file">
								</div>
							</div>						
							<div class="form-actions">
								<button type="submit" class="btn btn-primary">Save</button> 
							</div>
						</fieldset>
					</form>
<?php $this->load->view('admin/footer'); ?>