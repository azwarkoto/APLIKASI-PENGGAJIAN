<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Absensi <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Karyawan <?php echo form_error('nama_karyawan') ?></label>
            <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" placeholder="Nama Karyawan" value="<?php echo $nama_karyawan; ?>" />
        </div>
	    <div class="form-group">
            <label for="time">Waktu Masuk <?php echo form_error('waktu_masuk') ?></label>
            <input type="time" class="form-control" name="waktu_masuk" id="waktu_masuk" placeholder="Waktu Masuk" value="<?php echo $waktu_masuk; ?>" />
        </div>
	    <div class="form-group">
            <label for="time">Waktu Keluar <?php echo form_error('waktu_keluar') ?></label>
            <input type="time" class="form-control" name="waktu_keluar" id="waktu_keluar" placeholder="Waktu Keluar" value="<?php echo $waktu_keluar; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl Tahun <?php echo form_error('tgl_tahun') ?></label>
            <input type="date" class="form-control" name="tgl_tahun" id="tgl_tahun" placeholder="Tgl Tahun" value="<?php echo $tgl_tahun; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jumlah Kehadiran <?php echo form_error('jumlah_kehadiran') ?></label>
            <input type="text" class="form-control" name="jumlah_kehadiran" id="jumlah_kehadiran" placeholder="Jumlah Kehadiran" value="<?php echo $jumlah_kehadiran; ?>" />
        </div>
	    <input type="hidden" name="id_absensi" value="<?php echo $id_absensi; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('absensi') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>