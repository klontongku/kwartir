<?php $this->load->view('admin/header'); ?>
					<h1>
						Export Data
					</h1>
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>
									Jenis Data
								</th>
                                <th>
									Action
								</th>
								<th>
									Advance
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									Total Keseluruhan Anggota
								</td>
								<td>
									<ul class="nav btn-navbar">
                                    	<li><a href="<?php echo base_url(); ?>kwadmin/exportexcel/member" title="Export Semua Anggota"><i class="icon-download"></i> Download</a></li>
                                    </ul>
								</td>
								<td>
									<ul class="nav btn-navbar">
                                    	<li><a class="toggle-link" href="#advance-anggota"><i class="icon-download"></i> Download</a></li>
                                    </ul>
										<form action="<?php echo base_url(); ?>kwadmin/exportexcel/member" method="get" id="advance-anggota" class="form-horizontal hidden">
											<fieldset>
												<legend>Advance Data</legend>
													<label class="control-label" for="select01">Waktu</label>
													<div class="controls">
														<input type="text" name="from" class="input-medium" id="dp1" placeholder=" Cth: 2012/01/11">
														<input type="text" name="till" class="input-medium" id="dp2" placeholder="Cth: 2012/01/30">
													</div>
												
												<div class="form-actions">
													<button type="submit" class="btn btn-primary">Download</button>
												</div>
											</fieldset>
									</form>
								</td>
							</tr>
							<tr>
								<td>
									Total Keseluruhan Log Aktivitas
								</td>
								<td>
									<ul class="nav btn-navbar">
                                    	<li><a href="<?php echo base_url(); ?>kwadmin/exportexcel/log" title="Export Semua Log"><i class="icon-download"></i> Download</a></li>
                                    </ul>
								</td>
								<td>
									<ul class="nav btn-navbar">
                                    	<li><a class="toggle-link" href="#advance-log"><i class="icon-download"></i> Download</a></li>
                                    </ul>
										<form action="<?php echo base_url(); ?>kwadmin/exportexcel/log" method="get" id="advance-log" class="form-horizontal hidden">
											<fieldset>
												<legend>Advance Data</legend>
													<label class="control-label" for="select01">Waktu</label>
													<div class="controls">
														<input type="text" name="from" class="input-medium" id="dp3" placeholder="Cth: 2012/01/11">
														<input type="text" name="till" class="input-medium" id="dp4" placeholder="Cth: 2012/01/30">
													</div>
												
												<div class="form-actions">
													<button type="submit" class="btn btn-primary">Download</button>
												</div>
											</fieldset>
									</form>
								</td>
							</tr>
						</tbody>
					</table>
					<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-datepicker.js"></script>
 <script>
			  $(document).ready(function(){
			  		$('#dp1,#dp2,#dp3,#dp4').datepicker({
						format: 'yyyy-mm-dd'
					});
			  });
			  </script>
                    <center>
					
				</center>

<?php $this->load->view('admin/footer'); ?>