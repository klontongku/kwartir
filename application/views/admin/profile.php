<?php $this->load->view('admin/header'); ?>
					<h1>
						Edit Your Profile
					</h1>

					<?php
					foreach($detail as $row){
						$nip = $row->NIP;
						$name = $row->name;
						$email = $row->email;
						$roleid = $row->role_id;
						$address = $row->address;
						$image = $row->image;
						$phone = $row->phone;
					}

					switch($roleid){
						case 1: $role = "User"; break;
						case 2: $role = "Pegawai"; break;
						case 3: $role = "Admin"; break;
					}
					?>

					<form action="" method="post" enctype='multipart/form-data' id="edit-profile" class="form-horizontal">
						<fieldset>
							<legend>Your Profile</legend>

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
								<label class="control-label" for="optionsCheckbox">Image</label>
								<div class="controls">
									<?php if($image=="" || $image==NULL){ echo "-"; }else{ ?>
									<img src="<?php echo base_url(); ?>images/views/users/<?php echo $image; ?>?v=<?php echo microtime(); ?>">
									<?php } ?>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="input01">NIP</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="input01" value="<?php echo $nip; ?>" readonly="">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="input01">Name</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="input01" name="name" value="<?php echo $name; ?>">
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="input01">Role</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="input01" value="<?php echo $role; ?>" readonly="">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="fileInput">Photo</label>
								<div class="controls">
									<input class="input-file" name="image" id="fileInput" type="file">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="input01">Email</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="input01" name="email" value="<?php echo $email; ?>">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="input01">Phone</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="input01" name="phone" value="<?php echo $phone; ?>">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="textarea">Alamat</label>
								<div class="controls">
									<textarea name="address" class="input-xlarge" id="textarea" rows="4"><?php echo $address; ?></textarea>
								</div>
							</div>

							<legend>Change Password (optional)</legend>
							
							<div class="control-group">
								<label class="control-label" for="input01">Password Lama</label>
								<div class="controls">
									<input type="password" class="input-xlarge" id="input01" name="oldpass">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="input01">Password Baru</label>
								<div class="controls">
									<input type="password" class="input-xlarge" id="input01" name="newpass">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="input01">Konfirmasi Password Baru</label>
								<div class="controls">
									<input type="password" class="input-xlarge" id="input01" name="cnewpass">
								</div>
							</div>						

							<div class="form-actions">
								<button type="submit" class="btn btn-primary">Save</button>
							</div>

						</fieldset>
					</form>
<?php $this->load->view('admin/footer'); ?>