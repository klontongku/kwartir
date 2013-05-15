<?php $this->load->view('admin/header'); ?>

					<h1>
						Banner
					</h1>
                    <p>Untuk Banner depan di halaman Home, Maximum banner yang ditampilkan 5 buah banner. Dengan resolusi 1200 x 350 pixel</p>
                    <?php
                    	$jml = count($banners);
                    	if($jml < 5){
                    ?>
                    <p><a class="toggle-link" href="<?php echo base_url(); ?>kwadmin/addbanner"><i class="icon-plus"></i> Tambah Banner</a></p>
					<?php } ?>
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>
									Banner Photo
								</th>
								<th>
									Judul
								</th>
								<th>
									Tanggal Upload
								</th>
                                <th>
									Action
								</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach($banners as $row){ ?>
							<tr>
								<td>
									<center><img src="<?php echo base_url(); ?>images/views/banners/<?php echo $row->image; ?>" width="200"></center>
								</td>
								<td>
									<?php echo $row->title; ?>
								</td>
								<td>
									<?php echo date('d/m/y',strtotime($row->created)); ?>
								</td>
                                <td>
                                	<?php if($jml>1){ ?>
                         			<a href="<?php echo base_url(); ?>kwadmin/deletebanner/<?php echo $row->banner_id; ?>" title="Delete Kegiatan" onclick="return confirm('Apakah anda yakin ingin menghapus banner ini ?');"><i class="icon-remove"></i> Delete</a>
                                    <?php } ?>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
                    <center>
                    
                    </center>
					

<?php $this->load->view('admin/footer'); ?>