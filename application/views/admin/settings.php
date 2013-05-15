<?php $this->load->view('admin/header'); ?>
					<h1>
						Settings
					</h1>
					<?php
					foreach($setting as $row){
						$phone = $row->v_phone;
						$address = $row->v_address;
						$email = $row->v_email;
					}
					?>
					<p>Atur informasi apa saja yang dilihat oleh public</p>
							<form action="" method="post" class="form-vertical">								
								<div class="control-group">
									<label class="control-label">No. Telepon</label>
									<div class="controls">
										<select name="phone" class="input-medium">
										  <option value="0">Disembunyikan</option>
										  <option value="1" <?php if($phone==1){ echo 'selected="selected"'; }?>>Tampilkan</option>
										</select>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Email</label>
									<div class="controls">
										<select name="email" class="input-medium">
										  <option value="0">Disembunyikan</option>
										  <option value="1" <?php if($email==1){ echo 'selected="selected"'; }?>>Tampilkan</option>
										</select>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label">Alamat</label>
									<div class="controls">
										<select name="address" class="input-medium">
										  <option value="0">Disembunyikan</option>
										  <option value="1" <?php if($address==1){ echo 'selected="selected"'; }?>>Tampilkan</option>
										</select>
									</div>
								</div>
								<div class="control-group">
									<div class="control">
										<button type="submit" class="btn btn-info">Ganti Visibilitas Informasi</button>
								</div>
								</div>					
							</form>
<?php $this->load->view('admin/footer'); ?>