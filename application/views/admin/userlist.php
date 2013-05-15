<?php $this->load->view('admin/header'); ?>	
					<h1>
						List Anggota
					</h1>
                    <form class="form-horizontal" action="" method="get">
							<div class="input-prepend">
  								<select class="input-small" name="type">
										  <option value="name" <?php if($this->input->get('type')=="name") echo 'selected="selected"'; ?>>Nama</option>
										  <option value="nip" <?php if($this->input->get('type')=="nip") echo 'selected="selected"'; ?>>NIP</option>
										  <option value="add" <?php if($this->input->get('type')=="add") echo 'selected="selected"'; ?>>Alamat</option>
										  <option value="telp" <?php if($this->input->get('type')=="telp") echo 'selected="selected"'; ?>>Telp</option>
										  <!--<option value="gol">Golongan</option>-->
								</select>
								
								  <input  name="keyword" type="text" <?php if($this->input->get('keyword')) echo 'value="'.$this->input->get('keyword').'"'; ?> placeholder="Cari">
								
								  <button type="submit" class="btn btn-info">Search</button>
							</div>
					</form>

					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>
									NIP
								</th>
								<th>
									Nama
								</th>
								<th>
									Alamat
								</th>
                                <th>
									Telp
								</th>
								<th>
									Printed
								</th>
								<th>
									Taken
								</th>
                                <th>
									Active
								</th>
                                <th>
									Action
								</th>
							</tr>
						</thead>
						<tbody>
							
							<?php 
									  $i =0;
									  foreach($members as $row){ ?>
							<tr>
								<td>
									<?php echo $row->NIP; ?>
								</td>
								<td>
									<?php echo $row->name; ?>
								</td>
								<td>
									<?php echo $row->address; ?>
								</td>
                                <td>
									<?php echo $row->phone; ?>
								</td>
								<td>
									<center><?php if($printed[$i]==1){ echo '<i class="icon-ok"></i>'; }else{ echo '<i class="icon-minus"></i>'; }?></center>
								</td>
                                <td>
									<center><?php if($taken[$i]==1){ echo '<i class="icon-ok"></i>'; }else{ echo '<i class="icon-minus"></i>'; }?></center>
								</td>
                                <td>
									<center><?php if($row->active==1){ echo '<i class="icon-ok"></i>'; }else{ echo '<i class="icon-minus"></i>'; } ?></center>
								</td>
                                <td width="100">
									<ul class="nav btn-navbar">
										<?php if($this->input->cookie("kwrole",TRUE)>1){ ?>
                                    	<li><a href="<?php echo base_url(); ?>kwadmin/editmember/<?php echo $row->id; ?>" title="Edit Anggota"><i class="icon-edit"></i> Edit</a></li>
										<li><a href="<?php echo base_url(); ?>kwadmin/resetpass/<?php echo $row->id; ?>" title="Reset Password" onclick="return confirm('Apakah anda yakin ingin me-reset password member ini ?');"><i class="icon-repeat"></i> Reset</a></li>
										<li><a href="<?php echo base_url(); ?>kwadmin/memberview/<?php echo $row->id; ?>" title="View Anggota"><i class="icon-eye-open"></i> View</a></li>
										<?php if($row->active==0){ ?>
										<li><a href="<?php echo base_url(); ?>kwadmin/reactive/<?php echo $row->id; ?>" title="Reactive Anggota" onclick="return confirm('Apakah anda yakin ingin mengaktifkan kembali member ini ?');"><i class="icon-retweet"></i> Reactive</a></li>
										<?php } 
											}

											if($this->input->cookie("kwrole",TRUE)>2){
												if($row->role_id==1){
										?>
										<li><a href="<?php echo base_url(); ?>kwadmin/promotemember/<?php echo $row->id; ?>" title="Set Pegawai" onclick="return confirm('Apakah anda yakin ingin mempromosikan member ini ke pegawai ?');"><i class="icon-chevron-up"></i> Promote</a></li>
                         				<?php 	}else{ ?>
                         				<li><a href="<?php echo base_url(); ?>kwadmin/unpromotemember/<?php echo $row->id; ?>" title="Unset Pegawai" onclick="return confirm('Apakah anda yakin ingin menurunkan member ini ke ke user ?');"><i class="icon-chevron-down"></i> Un-Promote</a></li>
                         				<?php  } ?>
                         				<li><a href="<?php echo base_url(); ?>kwadmin/deletemember/<?php echo $row->id; ?>" title="Delete Anggota" onclick="return confirm('Apakah anda yakin ingin menghapus member ini ?');"><i class="icon-remove"></i> Delete</a></li>
                                    	<?php } ?>
                                    </ul>
								</td>
							</tr>
							<?php 
									  	$i++;
									} ?>
							</tbody>
					</table>

					<?php if(isset($pagination)){ ?>
                    <center>
                    	<?php echo $pagination; ?>
                    </center>
                    <?php } ?>

                    <div class="toggle-link">Total : <?php echo $jml; ?> Anggota</div>
					
				</div>

<?php $this->load->view('admin/footer'); ?>	