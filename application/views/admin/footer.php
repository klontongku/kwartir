<?php if($this->session->flashdata('message')!=''){ ?>
<script>
alert("<?php echo $this->session->flashdata('message'); ?>");
</script>
<?php } ?>

</div>
		</div>
		
	</body>
</html>