<?php $this->load->view('admin/header'); ?>

<h1>Member #<?php echo $this->uri->segment(3); ?></h1>

<table class="table table-bordered table-striped">
                            	<tbody><tr>
                                	<td>Foto</td>
                                    <td><img src="<?php echo base_url(); ?>images/views/users/<?php echo $image; ?>?v=<?php echo microtime(); ?>"></td>
                            	</tr>
                                <tr>
                                	<td>Nama</td>
                                    <td><?php echo $name; ?></td>
                            	</tr>
                                <tr>
                                	<td>NIP</td>
                                    <td><?php echo $nip; ?></td>
                            	</tr>
                                <tr>
                                	<td>Tempat Tanggal Lahir</td>
                                    <td><?php echo $hometown.", ".date('d/m/Y', strtotime($dob)); ?></td>
                            	</tr>
                                <tr>
                                	<td>Email</td>
                                    <td><?php echo $email; ?></td>
                            	</tr>
                                <tr>
                                	<td>Telp</td>
                                    <td><?php echo $phone; ?></td>
                            	</tr>
                                <tr>
                                	<td>Jenis Kelamin</td>
                                    <td><?php if($gender=="male") echo "Pria"; else echo "Wanita"; ?></td>
                            	</tr>
                                <tr>
                                	<td>Golongan Darah</td>
                                    <td><?php echo $blood; ?></td>
                            	</tr>
                                 <tr>
                                	<td>Agama</td>
                                    <td><?php echo $agama; ?></td>
                            	</tr>
                                 <tr>
                                	<td>Golongan</td>
                                    <td><?php switch($depan){
										case '00': echo "Mabiran"; break;
										case '01': echo "Andalan Ranting"; break;
										case '02': echo "Dewan Kerja Ranting"; break;
										case '03': echo "Pembina / Mabigus"; break;
										case '04': echo "Anggota"; break;
									} ?></td>
                            	</tr>
                                	<tr><td>Alamat</td>
                                    <td><?php echo $address; ?></td>
                            	</tr>
                                 <tr>
                                	<td>Aktif</td>
                                    <td><?php if($active==1) echo "Ya"; else echo "Belum"; ?></td>
                            	</tr>
                                <tr>
                                	<td>Status Print</td>
                                    <td><?php if($printed==0){ echo "Belum"; }else{ echo "Sudah"; }?></td>
                            	</tr>
                                <tr>
                                	<td>Status Ambil</td>
                                    <td><?php if($taken==0){ echo "Belum"; }else{ echo "Sudah"; }?></td>
                            	</tr>
                                <tr>
                                	<td>Terdaftar Sejak</td>
                                    <td><?php echo date('d/m/Y', strtotime($created)); ?></td>
                            	</tr>
                                <?php if($this->input->cookie('kwrole',TRUE) > 1){ ?>
                            	 <tr>
                                	<td></td>

                                	<td><div class="control">
										<a href="<?php echo base_url(); ?>kwadmin/frontprint/<?php echo $this->uri->segment(3); ?>" class="btn btn-info">Print Depan</a>
										<a href="<?php echo base_url(); ?>kwadmin/backprint/<?php echo $this->uri->segment(3); ?>" class="btn btn-info">Print Belakang</a>
										<a href="<?php echo base_url(); ?>kwadmin/setprinted/<?php echo $this->uri->segment(3); ?>" onclick="return confirm('Apakah anda yakin akan mengeset member ini sudah tercetak kartunya ?')" class="btn btn-info">Set Tercetak</a>	
										<a href="<?php echo base_url(); ?>kwadmin/settaken/<?php echo $this->uri->segment(3); ?>" onclick="return confirm('Apakah anda yakin akan mengeset member ini sudah terambil kartunya ?')" class="btn btn-info">Set Terambil</a>
										</div>
									</td>
                            	</tr>
                                <?php } ?>
                            </tbody></table>



<?php $this->load->view('admin/footer'); ?>