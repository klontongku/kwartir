<?php $this->load->view('admin/header'); ?>

					<h1>
						Statistik
					</h1>
					<form action="" method="get">
						Pilih Tahun :<br> 
						<select name="year">
							<?php for($i=2013;$i<=date('Y');$i++){ ?>
							<option><?php echo $i; ?></option>
							<?php  } ?>
						</select><br>
						<input type="submit" value="View" class="btn btn-info">
					</form>
                    <legend>Penambahan Anggota dan Kartu <?php echo $year; ?> </legend>
						<div id="chart2" style="margin-top:20px; margin-left:20px; width:700px; height:700px;"></div>
                       <div class="well summary">
						<ul class="nav nav-header">
							<li>
								<span class="count">Anggota</span> Biru
							</li>
							<li>
								<span class="count">Kartu</span> Orange
							</li>
						</ul>

						<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.jqplot.min.js"></script>
						<script type="text/javascript" src="<?php echo base_url(); ?>js/jqplot.barRenderer.min.js"></script>
						<script type="text/javascript" src="<?php echo base_url(); ?>js/jqplot.pieRenderer.min.js"></script>
				        <script type="text/javascript" src="<?php echo base_url(); ?>js/jqplot.categoryAxisRenderer.min.js"></script>
				        <script type="text/javascript" src="<?php echo base_url(); ?>js/jqplot.pointLabels.min.js"></script>
						<script class="code" type="text/javascript">
						$(document).ready(function(){
				        var s1 = [<?php for($i=0;$i<count($kartu);$i++){ if($i==0){ echo $kartu[$i]; }else{ echo ",".$kartu[$i]; } }?>];
				        var s2 = [<?php for($i=0;$i<count($member);$i++){ if($i==0){ echo $member[$i]; }else{ echo ",".$member[$i]; } }?>];
				        var ticks = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags','Sep','Okt','Nov','Des'];
				         
				        plot2 = $.jqplot('chart2', [s1, s2], {
				            seriesDefaults: {
				                renderer:$.jqplot.BarRenderer,
				                pointLabels: { show: true }
				            },  
				            axes: {
				                xaxis: {
				                    renderer: $.jqplot.CategoryAxisRenderer,
				                    ticks: ticks
				                }
				            }
				        });
				     
				        
				    });
				    </script>

<?php $this->load->view('admin/footer'); ?>

