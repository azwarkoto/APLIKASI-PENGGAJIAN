<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Jabatan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Jabatan <?php echo form_error('nama_jabatan') ?></label>
            <input type="text" class="form-control" name="nama_jabatan" id="nama_jabatan" placeholder="Nama Jabatan" value="<?php echo $nama_jabatan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Gaji Pokok <?php echo form_error('gaji_pokok') ?></label>
            <input type="text" class="form-control" name="gaji_pokok" id="gaji_pokok" placeholder="Gaji Pokok" value="<?php echo $gaji_pokok; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl Gjian <?php echo form_error('tgl_gjian') ?></label>
            <input type="text" class="form-control" name="tgl_gjian" id="tgl_gjian" placeholder="Tgl Gjian" value="<?php echo $tgl_gjian; ?>" />
        </div>
	    <input type="hidden" name="id_jabatan" value="<?php echo $id_jabatan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('jabatan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>