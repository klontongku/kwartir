<?php $this->load->view('admin/header'); ?>

						<div class="span10 contact">
							<ul class="breadcrumb">
							  <li><a href="#">Admin Page</a> <span class="divider">/</span></li>
							  <li><a href="#">List Anggota</a></li>
							</ul>
							<h2>List Anggota</h2>
							<form class="form-horizontal" action="" method="get">
							<div class="input-prepend">
  								<select class="input-small" name="type">
										  <option value="name" <?php if($this->input->get('type')=="name") echo 'selected="selected"'; ?>>Nama</option>
										  <option value="nip" <?php if($this->input->get('type')=="nip") echo 'selected="selected"'; ?>>NIP</option>
										  <option value="add" <?php if($this->input->get('type')=="add") echo 'selected="selected"'; ?>>Alamat</option>
										  <option value="telp" <?php if($this->input->get('type')=="telp") echo 'selected="selected"'; ?>>Telp</option>
										  <!--<option value="gol">Golongan</option>-->
								</select>
								  <input class="span6 search-query" name="keyword" type="text" <?php if($this->input->get('keyword')) echo 'value="'.$this->input->get('keyword').'"'; ?> placeholder="Cari">
								  <button type="submit" class="btn btn-info">Search</button>
							</div>
							</form>
							<div class="row-fluid">
								<table class="table table-bordered">
					             	<tr>
									    <th>No</th>
									    <th>NIP</th>
									    <th>Nama</th>
									    <th>Alamat</th>
									    <!--<th>Golongan</th>-->
									    <th>Telp</th>
									    <th>Printed</th>
									    <th>Taken</th>
									    <th>Aktif</th>
									    <th>Action</th>
									  </tr>

									  <?php 
									  $i =0;
									  foreach($members as $row){ ?>
									  <tr>
									    <td><?php echo $row->id; ?></td>
									    <td><?php echo $row->NIP; ?></td>
									    <td><?php echo $row->name; ?></td>
									    
									    <td><?php echo $row->address; ?></td>
									    
									    <!--<td></td>-->
									    <td><?php echo $row->phone; ?></td>
									    <td><?php if($printed[$i]==1){ echo '<i class="icon-ok"></i>'; }else{ echo '<i class="icon-minus"></i>'; }?></td>
									    <td><?php if($taken[$i]==1){ echo '<i class="icon-ok"></i>'; }else{ echo '<i class="icon-minus"></i>'; }?></td>
									    <td><?php if($row->active==1){ echo '<i class="icon-ok"></i>'; }else{ echo '<i class="icon-minus"></i>'; } ?></td>
									    <td width="10%"><div class="span1">
									    	<a href="#" class="btn btn-mini btn-info " title="Edit Member"><i class="icon-edit"></i></a> <br>
									    	<a href="<?php echo base_url(); ?>kwadmin/memberview/<?php echo $row->id; ?>" class="btn btn-mini btn-primary" title="Lihat Data Member"><i class="icon-eye-open"></i></a>
									    	<a href="#" class="btn btn-mini btn-primary" title="Reset Password" onclick="return confirm('Apakah anda yakin ingin me-reset password member ini ?');"><i class="icon-repeat"></i></a>   
									    	<a href="#" class="btn btn-mini btn-danger" title="Hapus Member" onclick="return confirm('Apakah anda yakin ingin menghapus member ini ?');"><i class="icon-remove"></i></a></div></td>
									  </tr>
									  <?php 
									  	$i++;
									} ?>
									  
								</table>
								<div class="control-group">
									<label class="control-label">Total Anggota: <?php echo $jml; ?> orang</label>
								</div>

								<?php echo $pagination; ?>
								
         	 				</div><!--/row-->
						</div>								
					</div><!-- end row-fluid -->					
				</div><!-- end span12 -->
			</div><!-- end row-fluid -->
		</div><!-- end container -->
	</div><!-- end content -->
	
	<?php $this->load->view('admin/footer'); ?>