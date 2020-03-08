<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Absensi List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Karyawan</th>
		<th>Waktu Masuk</th>
		<th>Waktu Keluar</th>
		<th>Tgl Tahun</th>
		<th>Jumlah Kehadiran</th>
		
            </tr><?php
            foreach ($absensi_data as $absensi)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $absensi->nama_karyawan ?></td>
		      <td><?php echo $absensi->waktu_masuk ?></td>
		      <td><?php echo $absensi->waktu_keluar ?></td>
		      <td><?php echo $absensi->tgl_tahun ?></td>
		      <td><?php echo $absensi->jumlah_kehadiran ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>