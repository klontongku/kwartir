<?php $this->load->view('admin/header'); ?>

					<h1>
						<?php echo $page; ?>
					</h1>
					<form action="" method="post" id="edit-profile" class="form-horizontal">
						<fieldset>

				<?php if(validation_errors()!=NULL){ ?>
				<div class="alert alert-error">
					 <button type="button" class="close" data-dismiss="alert">&times;</button>
  						<?php echo validation_errors(); ?>
				</div>
				<?php } ?>

							<div class="control-group">
								<label class="control-row" for="textarea">Last Edit By :</label>
								<b><?php echo $name; ?></b>
							</div>

							<div class="control-group">
								<label class="control-row" for="textarea">Deskripsi</label>
									<?php

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

		?>
							</div>						
							<div class="form-actions">
								<button type="submit" class="btn btn-primary">Save</button>
							</div>
						</fieldset>
					</form>

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