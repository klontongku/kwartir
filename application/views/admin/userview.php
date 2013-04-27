<?php $this->load->view('admin/header'); ?>

<div class="span10 contact">
							<ul class="breadcrumb">
							  <li><a href="#">Admin Page</a> <span class="divider">/</span></li>
							  <li><a href="#">Pengguna</a></li>
							</ul>
							<h2>Member #<?php echo $this->uri->segment(3); ?></h2>
							<p><?php if($image=="" || $image==NULL){ 
										if($gender=="male"){
								?>
								<img src="<?php echo base_url(); ?>images/views/users/male.png">
								<?php 	}else{ ?>
								<img src="<?php echo base_url(); ?>images/views/users/female.png">
								<?php 
										}
									}else{  ?>
								<img src="<?php echo base_url(); ?>images/views/users/<?php echo $image; ?>">
								<?php } ?>
							</p>
														
								<div class="control-group">
									<label class="control-label">Nama :</label>
									<div class="controls"><b><?php echo $name; ?></b></div>
								</div>
								<div class="control-group">
									<label class="control-label">NIP :</label>
									<div class="controls"><b><?php echo $nip; ?></b></div>
								</div>
								<div class="control-group">
									<label class="control-label">Tempat Tanggal Lahir :</label>
									<div class="controls"><b><?php echo $hometown.", ".date('d/m/Y', strtotime($dob)); ?></b></div>
								</div>

								<div class="control-group">
									<label class="control-label">Email :</label>
									<div class="controls"><b><?php echo $email; ?></b></div>
								</div>
								<div class="control-group">
									<label class="control-label">Gender :</label>
									<div class="controls"><b><?php if($gender=="male") echo "Pria"; else echo "Wanita"; ?></b></div>
								</div>
								<div class="control-group">
									<label class="control-label">Golongan Darah :</label>
									<div class="controls"><b><?php echo $blood; ?></b></div>
								</div>
								<div class="control-group">
									<label class="control-label">Agama :</label>
									<div class="controls"><b><?php echo $agama; ?></b></div>
								</div>
								<div class="control-group">
									<label class="control-label">Alamat :</label>
									<div class="controls"><b><?php echo $address; ?></b></div>
								</div>
								<div class="control-group">
									<label class="control-label">Telepon :</label>
									<div class="controls"><b><?php echo $phone; ?></b></div>
								</div>
								<div class="control-group">
									<label class="control-label">Aktif :</label>
									<div class="controls"><b><?php if($active==1) echo "Ya"; else echo "Belum"; ?></b></div>
								</div>

								<div class="control-group">
									<label class="control-label">Status Print :</label>
									<div class="controls">
										<b><?php if($printed==0){ echo "Belum"; }else{ echo "Sudah"; }?></b>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Status Diambil :</label>
									<div class="controls">
										<b><?php if($taken==0){ echo "Belum"; }else{ echo "Sudah"; }?></b>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label">Terdaftar Sejak :</label>
									<div class="controls"><b><?php echo date('d/m/Y', strtotime($created)); ?></b></div>
								</div>
								<div class="control-group">
									<div class="control">
										<a href="#" class="btn btn-info">Print Depan</a>
										<a href="#" class="btn btn-info">Print Belakang</a>
										<a href="#" class="btn btn-info">Set Tercetak</a>	
										<a href="#" class="btn btn-info">Set Terambil</a>
								</div>
								</div>					
							
						</div>

						</div><!-- end row-fluid -->					
				</div><!-- end span12 -->
			</div><!-- end row-fluid -->
		</div><!-- end container -->
	</div>

<?php $this->load->view('admin/footer'); ?>