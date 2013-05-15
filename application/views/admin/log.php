<?php $this->load->view('admin/header'); ?>

					<h1>
						Log Aktivitas
					</h1>

					<form action="" method="get" id="edit-profile" class="form-horizontal">
						<fieldset>
							<div class="control-group">
								<input type="text" class="input-xlarge" name="dari" id="dp1" placeholder="Dari" <?php
								if($this->input->get("dari")){ echo 'value="'.$this->input->get("dari").'"'; }?>> s/d	
								<input type="text" class="input-xlarge" name="sampai" id="dp2" placeholder="Sampai" <?php
								if($this->input->get("sampai")){ echo 'value="'.$this->input->get("sampai").'"'; }?>>
								<button type="submit" class="btn btn-info">View</button>
						</div></fieldset>
					</form>

					 <table class="table table-bordered table-striped">
                            	<thead>
									<tr>
										<th width="150">
											Tanggal
										</th>
										<th>
											Log Description
										</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach($log as $row){ ?>
                            	<tr>
                                	<td><?php echo date("d/m/Y H:i",strtotime($row->created)); ?></td>
                                    <td><?php echo $row->description_log; ?></td>
                            	</tr>
                            	<?php } ?>
                            	</tbody>
                            </table>
                            <center>
                            	<?php echo $pagination; ?>
                            <center>

                            <script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-datepicker.js"></script>
 <script>
			  $(document).ready(function(){
			  		$('#dp1,#dp2').datepicker({
						format: 'yyyy-mm-dd'
					});
			  });
			  </script>

<?php $this->load->view('admin/footer'); ?>