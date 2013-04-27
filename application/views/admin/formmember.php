<?php $this->load->view('admin/header'); ?>

<div class="span10 contact">
							<ul class="breadcrumb">
							  <li><a href="#">Admin Page</a> <span class="divider">/</span></li>
							  <?php if($this->uri->segment(3)){ ?>
							  <li><a href="#">Ubah Data Pengguna</a></li>
							  <?php }else{ ?>
							  <li><a href="#">Tambah Pengguna</a></li>
							  <?php } ?>
							</ul>

							<?php if($this->uri->segment(3)){ ?>
							<h2>Ubah Data Member</h2>
							<?php }else{ ?>
							<h2>Tambah Member Baru</h2>
							<?php } ?>
							
												
								<div class="control-group">
									<label class="control-label">Nama :</label>
									<div class="controls"><?php

			$data = array(
               		'id' => 'name',
					'name' => 'name',
			   		);

			if($this->uri->segment(3)){
				$data['value'] = $name;
			}else{
				$data['value'] = set_value('name');
			}

            echo form_input($data);
            echo form_error('name');
		?></div>
								</div>

								<div class="control-group">
									<label class="control-label">Tempat Tanggal Lahir :</label>
									<div class="controls"><?php

			$data = array(
               		'id' => 'home',
					'name' => 'home',
			   		);

			if($this->uri->segment(3)){
				$data['value'] = $home;
			}else{
				$data['value'] = set_value('home');
			}

            echo form_input($data);
            echo form_error('home');
		?>
		<div class="well">
			<input type="text" class="span2" value="02-16-2012" id="dp1"/>
			</div>
	</div>
								</div>
													
							
						</div>

						</div><!-- end row-fluid -->					
				</div><!-- end span12 -->
			</div><!-- end row-fluid -->
		</div><!-- end container -->
	</div>
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-datepicker.js"></script>
 <script>
			  $(document).ready(function(){
			  		$('#dp1').datepicker({
						format: 'mm-dd-yyyy'
					});
			  });
			  </script>
<?php $this->load->view('admin/footer'); ?>