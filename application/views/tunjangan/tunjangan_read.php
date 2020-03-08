<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Tunjangan Read</h2>
        <table class="table">
	    <tr><td>Besar Tunjangan</td><td><?php echo $besar_tunjangan; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td>Tgl Update</td><td><?php echo $tgl_update; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('tunjangan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>