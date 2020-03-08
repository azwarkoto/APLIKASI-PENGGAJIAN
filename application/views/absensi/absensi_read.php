<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Absensi Read</h2>
        <table class="table">
	    <tr><td>Nama Karyawan</td><td><?php echo $nama_karyawan; ?></td></tr>
	    <tr><td>Waktu Masuk</td><td><?php echo $waktu_masuk; ?></td></tr>
	    <tr><td>Waktu Keluar</td><td><?php echo $waktu_keluar; ?></td></tr>
	    <tr><td>Tgl Tahun</td><td><?php echo $tgl_tahun; ?></td></tr>
	    <tr><td>Jumlah Kehadiran</td><td><?php echo $jumlah_kehadiran; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('absensi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>