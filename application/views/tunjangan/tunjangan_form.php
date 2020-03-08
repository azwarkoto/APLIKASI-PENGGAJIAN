<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Tunjangan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Besar Tunjangan <?php echo form_error('besar_tunjangan') ?></label>
            <input type="text" class="form-control" name="besar_tunjangan" id="besar_tunjangan" placeholder="Besar Tunjangan" value="<?php echo $besar_tunjangan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Keterangan <?php echo form_error('keterangan') ?></label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl Update <?php echo form_error('tgl_update') ?></label>
            <input type="text" class="form-control" name="tgl_update" id="tgl_update" placeholder="Tgl Update" value="<?php echo $tgl_update; ?>" />
        </div>
	    <input type="hidden" name="id_tunjangan_jabatan" value="<?php echo $id_tunjangan_jabatan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tunjangan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>