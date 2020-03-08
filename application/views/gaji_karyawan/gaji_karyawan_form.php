<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Gaji_karyawan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Karyawan <?php echo form_error('id_karyawan') ?></label>
            <input type="text" class="form-control" name="id_karyawan" id="id_karyawan" placeholder="Id Karyawan" value="<?php echo $id_karyawan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Absen <?php echo form_error('id_absen') ?></label>
            <input type="text" class="form-control" name="id_absen" id="id_absen" placeholder="Id Absen" value="<?php echo $id_absen; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Jabatan <?php echo form_error('id_jabatan') ?></label>
            <input type="text" class="form-control" name="id_jabatan" id="id_jabatan" placeholder="Id Jabatan" value="<?php echo $id_jabatan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Gaji Pokok <?php echo form_error('gaji_pokok') ?></label>
            <input type="text" class="form-control" name="gaji_pokok" id="gaji_pokok" placeholder="Gaji Pokok" value="<?php echo $gaji_pokok; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tunjanggan Jabatan <?php echo form_error('tunjanggan_jabatan') ?></label>
            <input type="text" class="form-control" name="tunjanggan_jabatan" id="tunjanggan_jabatan" placeholder="Tunjanggan Jabatan" value="<?php echo $tunjanggan_jabatan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Potongan <?php echo form_error('potongan') ?></label>
            <input type="text" class="form-control" name="potongan" id="potongan" placeholder="Potongan" value="<?php echo $potongan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Gaji Bersih <?php echo form_error('gaji_bersih') ?></label>
            <input type="text" class="form-control" name="gaji_bersih" id="gaji_bersih" placeholder="Gaji Bersih" value="<?php echo $gaji_bersih; ?>" />
        </div>
	    <input type="hidden" name="id_transaksi" value="<?php echo $id_transaksi; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('gaji_karyawan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>