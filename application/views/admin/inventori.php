<?php $this->load->view('admin/header'); ?>

					<h1>
						Summary Inventori
					</h1>
					<div class="well summary">
						<ul>
							<li>
								<span class="count"><?php echo $kartu; ?></span> Kartu Anggota
							</li>
							<li>
								<span class="count"><?php echo $stok; ?></span> Stock Bulan Ini
							</li>
							<li class="last">
								<span class="count"><?php echo $stok-$kartu; ?></span> Sisa Kartu
							</li>
						</ul>
					</div>
					<a class="toggle-link" href="#new-project"><i class="icon-plus"></i> Settings</a>
					<form action="" method="post" id="new-project" class="form-horizontal">
						<fieldset>
							<legend>Settings Inventory</legend>

							<?php if(validation_errors()!=NULL){ ?>
							<div class="alert alert-error">
								 <button type="button" class="close" data-dismiss="alert">&times;</button>
			  						<?php echo validation_errors(); ?>
							</div>
							<?php } ?>

							
							<div class="control-group">
								<label class="control-label" for="select01">Quantity</label>
								<div class="controls">
									<input type="text" name="qty" class="input-xlarge" id="input01" placeholder="Cth: 1000">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="select01">Limit to Notif</label>
								<div class="controls">
									<input type="text" name="limit" class="input-xlarge" id="input01" placeholder="Cth: 300">
								</div>
							</div>
							<div class="form-actions">
								<button type="submit" class="btn btn-primary">Set</button>
							</div>
						</fieldset>
					</form>

<?php $this->load->view('admin/footer'); ?>
				