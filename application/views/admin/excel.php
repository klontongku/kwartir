<?php
 header("Content-type: application/octet-stream");
 header("Content-Disposition: attachment; filename=laporan.xls");
 header("Pragma: no-cache");
 header("Expires: 0");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Data <?php echo ucfirst($this->uri->segment(3)); ?> <?php if($this->input->get('from')){ echo date("d F Y",strtotime($this->input->get('from')))." s/d ".date("d F Y",strtotime($this->input->get('till'))); } ?></title>
</head>

<body>
 
 <div>
  <table>
   <?php if($this->uri->segment(3)=="member"){ ?>
   <tr><td>NIP</td><td>Nama</td><td>Role</td><td>TTL</td><td>Email</td><td>Gender</td><td>Gol Darah</td><td>Agama</td>
   	<td>Alamat</td><td>No. Telp</td><td>Golongan</td><td>Aktif</td><td>Dibuat Tgl</td><td>Dimodifikasi Tgl</td></tr>
   <?php }else{ ?>
   <tr><td>Tanggal</td><td>Deskripsi</td></tr>
   <?php } ?>
	<?php foreach($data as $row){ 
			if($this->uri->segment(3)=="member"){ ?>  
   <tr><td><?php echo $row->NIP; ?></td><td><?php echo $row->name; ?></td><td><?php if($row->role_id==1){ echo "User"; }else if($row->role_id==2){ echo "Pegawai"; }else{ echo "Admin"; }?></td><td><?php echo $row->hometown.",".date("d F Y",strtotime($row->birthday)); ?></td>
   	<td><?php echo $row->email; ?></td><td><?php if($row->gender=="male"){ echo "Pria"; }else{ echo "Wanita"; } ?></td><td><?php echo $row->blood_type; ?></td>
   	<td><?php echo $row->religius; ?></td><td><?php echo $row->address; ?></td><td><?php echo "'".$row->phone; ?></td>
   	<td><?php
   		switch($row->gugus_depan){
			case '00': echo "Mabiran"; break;
			case '01': echo "Andalan Ranting"; break;
			case '02': echo "Dewan Kerja Ranting"; break;
			case '03': echo "Pembina / Mabigus"; break;
			case '04': echo "Anggota"; break;
		}?></td><td><?php if($row->active==0){ echo "Tidak"; }else{ echo "Ya"; }?></td><td><?php echo date("d F Y,H:i",strtotime($row->created)); ?></td>
		<td><?php echo date("d F Y,H:i",strtotime($row->modified)); ?></td>
   </tr>
  	<?php 
  			}else{ ?>
  		<tr><td><?php echo date("d F Y,H:i",strtotime($row->created)); ?></td><td><?php echo $row->description_log; ?></td></tr>
  	<?php 	}
  		} ?>
  </table>
 </div> 
</body>
</html>