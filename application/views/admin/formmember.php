<?php $this->load->view('admin/header'); ?>	
					<h1>
						 <?php if($this->uri->segment(3)){ echo "Edit Anggota"; }else{ echo "Tambah Anggota"; } ?>
					</h1>

					<?php echo form_open_multipart('',array('class'=>'form-horizontal')); ?>
						<fieldset>
							<?php if(!$this->uri->segment(3)){ echo "<legend>Anggota Baru</legend>"; }
							else{ echo "<legend>Anggota #".$this->uri->segment(3)."</legend>"; 
									//data member
								foreach($detail as $row){
									$name = $row->name;
									$role = $row->role_id;
									$home = $row->hometown;
									$dob = $row->birthday;
									$email = $row->email;
									$gender = $row->gender;
									$blood = $row->blood_type;
									$religion = $row->religius;
									$address = $row->address;
									$nip = $row->NIP;
									$phone = $row->phone;
									$depan = $row->gugus_depan;
									$ranting = $row->kwartir_ranting;
									$active = $row->active;
									$image = $row->image;
									$modified = $row->modified;
								}
						} ?>
							
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
									<label class="control-label">NIP</label>
									<div class="controls"><b><?php echo $nip; ?></b></div>
				</div>

				<div class="control-group">
									<label class="control-label">Foto</label>
									<div class="controls"><img src="<?php echo base_url(); ?>images/views/users/<?php echo $image; ?>?v=<?php echo microtime(); ?>"></b></div>
				</div>

				<div class="control-group">
									<label class="control-label">Terakhir dibuat/diubah</label>
									<div class="controls"><b><?php echo date("d F Y",strtotime($modified)); ?></b></div>
				</div>
				<?php } ?> 	

							<div class="control-group">
								<label class="control-label" for="input01">Name</label>
								<div class="controls">
									<?php

			$data = array(

               		'id' => 'name',
					'name' => 'name',
					'placeholder' => 'input nama'
			   		);

			if($this->uri->segment(3)){
				$data['value'] = $name;
			}else{
				$data['value'] = set_value('name');
			}

            echo form_input($data);
            //echo form_error('name');
		?>
								</div>
							</div>
                            <div class="control-group">
								<?php if($this->uri->segment(3)){ ?>
									<label class="control-label">Ganti Password Baru <small>(kosongkan jika tidak mau ubah)</small></label>
									<?php }else{  ?>
									<label class="control-label">Password Baru </label>
									<?php } ?>
									<div class="controls"><?php

			$data = array(
               		'id' => 'pass',
					'name' => 'pass',
					'placeholder' => 'input password baru'
			   		);

            echo form_password($data);
           
		?>
								</div>
							</div>
                              <div class="control-group">
								<label class="control-label" for="input01">Konfirmasi Password <?php if($this->uri->segment(3)){ echo "<small>(kosongkan jika tidak mau ubah)</small>"; } ?></label>
								<div class="controls">
									<?php

			$data = array(
               		'id' => 'cpass',
					'name' => 'cpass',
					'placeholder' => 'input lagi password baru'
			   		);

            echo form_password($data);

		?>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="input01">Tempat Tanggal Lahir</label>
                                <div class="controls">
								<?php

			$data = array(
               		'id' => 'home',
					'name' => 'home',
					'placeholder' => 'input tempat lahir'
			   		);

			if($this->uri->segment(3)){
				$data['value'] = $home;
			}else{
				$data['value'] = set_value('home');
			}

            echo form_input($data);
            //echo form_error('home');
		?>

							<?php

			$data = array(
               		'id' => 'dp1',
					'name' => 'dob',
					'placeholder' => 'input tanggal lahir'
			   		);

			if($this->uri->segment(3)){
				$data['value'] = $dob;
			}else{
				$data['value'] = set_value('dob');
			}

            echo form_input($data);
            //echo form_error('dob');
		?>
								
                                </div>
							</div>
							<div class="control-group">
								<label class="control-label" for="input01">Email</label>
								<div class="controls">
									<?php

			$data = array(
               		'id' => 'email',
					'name' => 'email',
					'placeholder' => 'input email'
			   		);

			if($this->uri->segment(3)){
				$data['value'] = $email;
				$data['disabled'] = 'disabled';
			}else{
				$data['value'] = set_value('email');
			}

            echo form_input($data);
            //echo form_error('email');
		?>
								</div>
							</div>
                            <div class="control-group">
								<label class="control-label" for="input01">Telp</label>
								<div class="controls">
									<?php

			$data = array(
               		'id' => 'phone',
					'name' => 'phone',
					'placeholder' => 'input no. telpon'
			   		);

			if($this->uri->segment(3)){
				$data['value'] = $phone;
			}else{
				$data['value'] = set_value('phone');
			}

            echo form_input($data);
            //echo form_error('phone');
		?>
								</div>
							</div>
                            <div class="control-group">
								<label class="control-label" for="input01">Jenis Kelamin</label>
								<div class="controls">
									<?php

			$data = array(
     'name'        => 'gender',
     'id'          => 'gender',
     'value'       => 'male',
     );

			if($this->uri->segment(3) && $gender=="male"){
				$data['checked'] = TRUE;
			}else{
				$data['checked'] = TRUE;
			}

            echo form_radio($data)." Pria";

            $data = array(
     'name'        => 'gender',
     'id'          => 'gender',
     'value'       => 'female',
     'style'       => 'margin-left:10px',
     );

			if($this->uri->segment(3) && $gender=="female"){
				$data['checked'] = TRUE;
			}

            echo form_radio($data)." Wanita";
		?>
								</div>
							</div>
                            <div class="control-group">
								<label class="control-label" for="input01">Golongan Darah</label>
								<div class="controls">
									<?php
			$options = array('A'=>'A','B'=>'B','AB'=>'AB','O'=>'O');

			if($this->uri->segment(3)){
				echo form_dropdown('blood', $options, $blood);

			}else{
				echo form_dropdown('blood', $options);
			}
		?>
								</div>
							</div>
                            <div class="control-group">
								<label class="control-label" for="input01">Agama</label>
								<div class="controls">
									<?php
			$options = array('Islam'=>'Islam','Kristen'=>'Kristen','Katolik'=>'Katolik','Budha'=>'Budha',
				'Hindu'=>'Hindu','Lainnya'=>'Lainnya');

			if($this->uri->segment(3)){
				echo form_dropdown('religion', $options, $religion);

			}else{
				echo form_dropdown('religion', $options);
			}
		?>
								</div>
							</div>
                            <div class="control-group">
								<label class="control-label" for="input01">Golongan</label>
								<div class="controls"><b>
									<?php
								if($this->uri->segment(3)){

									switch($depan){
										case '00': echo "Mabiran"; break;
										case '01': echo "Andalan Ranting"; break;
										case '02': echo "Dewan Kerja Ranting"; break;
										case '03': echo "Pembina / Mabigus"; break;
										case '04': echo "Anggota"; break;
									}
								}else{
			$options = array('00'=>'Mabiran','01'=>'Andalan Ranting','02'=>'Dewan Kerja Ranting','03'=>'Pembina / Mabigus',
				'04'=>'Anggota');

			if($this->uri->segment(3)){
				echo form_dropdown('depan', $options, $depan, array('disabled' => 'disabled'));

			}else{
				echo form_dropdown('depan', $options);
			}

		}
		?></b>
						</div>
							</div>					
							<div class="control-group">
								<label class="control-label" for="textarea">Alamat</label>
								<div class="controls">
									<?php

			$data = array(
               		'id' => 'address',
					'name' => 'address',
					'rows' => 3,
					'placeholder' => 'input alamat'
			   		);

			if($this->uri->segment(3)){
				$data['value'] = $address;
			}else{
				$data['value'] = set_value('address');
			}

            echo form_textarea($data);
            //echo form_error('address');
		?>
								</div>
							</div>
                             <div class="control-group">
								<label class="control-label" for="input01">Kwartir Ranting</label>
								<div class="controls">
									<?php

			$data = array(
               		'id' => 'ranting',
					'name' => 'ranting',
					'placeholder' => 'input no. kwartir ranting'
			   		);

			if($this->uri->segment(3)){
				$data['value'] = $ranting;
				$data['disabled'] = "disabled";
			}else{
				$data['value'] = set_value('ranting');
			}

            echo form_input($data);
            //echo form_error('ranting');
		?>
								</div>
							</div>
                            <div class="control-group">
								<label class="control-label" for="fileInput">Photo</label>
								<div class="controls">
									<?php

			$data = array(
               		'id' => 'upload',
					'name' => 'upload',
			   		);

            echo form_upload($data);
            ?>
								</div>
							</div>						
							<div class="form-actions">
								<button type="submit" class="btn btn-primary">Save</button> <a href="<?php echo base_url(); ?>kwadmin/userlist" class="btn" >Cancel</a>
							</div>
						</fieldset>
					</form>
				</div>

				<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-datepicker.js"></script>
 <script>
			  $(document).ready(function(){
			  		$('#dp1').datepicker({
						format: 'yyyy-mm-dd'
					});
			  });
			  </script>

<?php $this->load->view('admin/footer'); ?>	