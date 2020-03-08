<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Jabatan Read</h2>
        <table class="table">
	    <tr><td>Nama Jabatan</td><td><?php echo $nama_jabatan; ?></td></tr>
	    <tr><td>Gaji Pokok</td><td><?php echo $gaji_pokok; ?></td></tr>
	    <tr><td>Tgl Gjian</td><td><?php echo $tgl_gjian; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('jabatan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>