<?php $this->load->view('admin/header'); ?>

<h1>
						Dashboard
					</h1>
					<div class="hero-unit">
						<h1>
							Welcome!
						</h1>
						<p>
							SCMIS - Scout Management Information System
						</p>
						<p>
							SCMIS merupakan sistem informasi yang menyediakan data anggota pramuka, 
                            yang terintegrasi dengan sistem registrasi dan kartu anggota pramuka.
						</p>
					</div>
					<div class="well summary">
						<ul>
							<li>
								<span class="count"><?php echo $total; ?></span> Anggota
							</li>
							<li>
								<span class="count"><?php echo $thismonth; ?></span> Anggota Baru Bulan Ini
							</li>
							<li>
								<span class="count"><?php echo $reactive; ?></span> Re-Active Anggota
							</li>
							<li class="last">
								<span class="count"><?php echo $printed; ?></span> Kartu Anggota
							</li>
						</ul>
					</div>
					<h3>Anggota Baru Terdaftar</h3>
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>
									NIP
								</th>
								<th>
									Nama
								</th>
								<!--<th>
									Jabatan
								</th>-->
								<th>
									Golongan
								</th>
                                <th>
									Tanggal
								</th>
							</tr>
						</thead>
						<tbody>

							<?php foreach($latest as $row){ ?>
							<tr>
								<td>
									<?php echo $row->NIP; ?>
								</td>
								<td>
									<?php echo $row->name; ?>
								</td>
								<td>
									<?php
									switch($row->gugus_depan){
										case '00': echo "Mabiran"; break;
										case '01': echo "Andalan Ranting"; break;
										case '02': echo "Dewan Kerja Ranting"; break;
										case '03': echo "Pembina / Mabigus"; break;
										case '04': echo "Anggota"; break;
									}
									?>
								</td>
								
                                <td>
									<?php echo date("d/m/Y",strtotime($row->created)); ?>
								</td>
							</tr>
							<?php } ?>

						</tbody>
					</table>
					<ul class="pager">
						<li class="next">
							<a href="<?php echo base_url(); ?>kwadmin/userlist">More &rarr;</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

<?php $this->load->view('admin/footer'); ?>