<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Gaji_karyawan Read</h2>
        <table class="table">
	    <tr><td>Id Karyawan</td><td><?php echo $id_karyawan; ?></td></tr>
	    <tr><td>Id Absen</td><td><?php echo $id_absen; ?></td></tr>
	    <tr><td>Id Jabatan</td><td><?php echo $id_jabatan; ?></td></tr>
	    <tr><td>Gaji Pokok</td><td><?php echo $gaji_pokok; ?></td></tr>
	    <tr><td>Tunjanggan Jabatan</td><td><?php echo $tunjanggan_jabatan; ?></td></tr>
	    <tr><td>Potongan</td><td><?php echo $potongan; ?></td></tr>
	    <tr><td>Gaji Bersih</td><td><?php echo $gaji_bersih; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('gaji_karyawan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>