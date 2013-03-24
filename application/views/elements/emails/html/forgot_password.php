<p><?php echo 'Anda telah melakukan permintaan untuk mereset password Anda . Untuk melanjutkan proses reset, silahkan kunjungi link di bawah ini.'?></p>
<p><?php echo 'password baru anda adalah : '.$new_password?></p>
<p style="border:1px solid #ccc;padding:10px;text-align:center;background:#ffffd8">
	<?php echo anchor('users/verify_reset_password/'.$user_id.'/'.$code_activation.'/', 'Klik disini');?>
</p>
<p><?php echo 'setelah berhasil konfirmasi, silahkan anda login dengan password baru anda';?></p>
<p><?php echo 'setelah berhasil konfirmasi, silahkan anda login dengan password baru anda';?></p>