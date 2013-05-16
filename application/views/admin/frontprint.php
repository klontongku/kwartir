<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="<?php echo base_url(); ?>css/style_kartu.css" rel="stylesheet">
<title>Front Print</title>
</head>

<body>
<div class="bleed">
	<div class="trim">
    	<div class="save">
        	<div class="header">
            <div class="logo"><img src="<?php echo base_url(); ?>images/TUNAS.jpg"></div>
            <div class="judul">KARTU TANDA ANGGOTA <br> GERAKAN PRAMUKA</div>
            
          </div>
            <div class="nama"><?php echo strtoupper($name); ?></div>
            <div class="foto"><img src="<?php echo base_url(); ?>images/views/users/<?php echo $image; ?>" ></div>
            <div class="identitas">
              <table border="0">
                <tbody><tr>
                  <td>Nomor Anggota</td>
                  <td>: <?php echo $nip; ?></td>
                </tr>
                <tr>
                  <td>Tempat/Tgl Lahir</td>
                  <td>: <?php echo $home; ?>, <?php echo $dob; ?></td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td><span>: <?php echo $address; ?></span></td>
                </tr>
                <tr>
                  <td>Agama</td>
                  <td>: <?php echo $religion; ?></td>
                </tr>
                <tr>
                  <td>Jabatan/Golongan</td>
                  <td>: <?php 
                      switch($depan){
                        case '00': echo "Mabiran"; break;
                        case '01': echo "Andalan Ranting"; break;
                        case '02': echo "Dewan Kerja Ranting"; break;
                        case '03': echo "Pembina / Mabigus"; break;
                        case '04': echo "Anggota"; break;
                      }
                   ?></td>
                </tr>
                <tr>
                  <td>Kwartiran</td>
                  <td>: <?php echo $ranting; ?></td>
                </tr>
                <tr>
                  <td>Gol.Darah</td>
                  <td>: <?php echo $blood; ?></td>
                </tr>
              </tbody></table>
            </div>
            <div class="berlaku">Berlaku s/d : <?php echo date('d M'); ?> <?php echo date('Y')+3; ?></div>
            <div class="rightside">Kwartir Cabang Gerakan Pramuka Kota Bogor <br>Ketua,</div>
        </div>
    </div>
</div>


</body></html>