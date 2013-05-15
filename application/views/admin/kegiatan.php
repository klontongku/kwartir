<?php $this->load->view('admin/header'); ?>

					<h1>
						Kegiatan
					</h1>
                    <form class="form-horizontal" action="" method="get">
							<div class="input-prepend">
								  <input class="span2" name="keyword" type="text"  placeholder="Cari">
								  <button type="submit" class="btn btn-info">Search</button>
							</div>
					</form>
                    <p><a class="toggle-link" href="<?php echo base_url(); ?>kwadmin/addactivity"><i class="icon-plus"></i> Tambah Kegiatan</a></p>
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>
									Photo
								</th>
								<th>
									Title
								</th>
								<th>
									Tanggal Upload
								</th>
                                <th>
									Tanggal Edit
								</th>
								<th>
									Uploader
								</th>
								<th>
									Last Editor
								</th>
                                <th>
									Action
								</th>
							</tr>
						</thead>
						<tbody>
							<?php 
									  $i=0;
									  foreach($activities as $row){ ?>
							<tr>
								<td>
									<a href="<?php echo base_url(); ?>activities/detail/<?php echo $row->activity_id; ?>/<?php echo strtolower(str_replace(" ","-",preg_replace("/[^a-zA-Z0-9\s]/","",$row->title))) ?>" target="_blank" class="btn btn-mini btn-primary" title="Lihat Data Kegiatan"><img src="<?php echo base_url(); ?>images/views/activity/<?php echo $row->image; ?>" width="200"></a>
								</td>
								<td>
									<?php echo $row->title; ?>
								</td>
								<td>
									<?php echo date("d/m/Y",strtotime($row->created)); ?>
								</td>
                                <td>
									<?php echo date("d/m/Y",strtotime($row->modified)); ?>
								</td>
								<td>
									<?php echo $row->name; ?>
								</td>
                                <td>
									<?php echo $editor[$i]; ?>
								</td>
                                <td width="100">
									<ul class="nav btn-navbar">
                                    	<li><a href="<?php echo base_url(); ?>kwadmin/editactivity/<?php echo $row->activity_id; ?>" title="Edit Kegiatan"><i class="icon-edit"></i> Edit</a></li>
                         				<li><a href="<?php echo base_url(); ?>kwadmin/deleteactivity/<?php echo $row->activity_id; ?>" title="Delete Kegiatan" onclick="return confirm('Apakah anda yakin ingin menghapus kegiatan ini ?');"><i class="icon-remove"></i> Delete</a></li>
                                    </ul>
								</td>
							</tr>
							<?php 
									  	$i++;
									} ?>
						</tbody>
					</table>
                    <center>
                    <?php echo $pagination; ?>
                    </center>
					
				</div>
			</div>
		</div>


<?php $this->load->view('admin/footer'); ?>