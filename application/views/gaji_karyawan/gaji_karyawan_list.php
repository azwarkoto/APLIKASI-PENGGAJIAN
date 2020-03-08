<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Gaji_karyawan List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('gaji_karyawan/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('gaji_karyawan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('gaji_karyawan'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Karyawan</th>
		<th>Id Absen</th>
		<th>Id Jabatan</th>
		<th>Gaji Pokok</th>
		<th>Tunjanggan Jabatan</th>
		<th>Potongan</th>
		<th>Gaji Bersih</th>
		<th>Action</th>
            </tr><?php
            foreach ($gaji_karyawan_data as $gaji_karyawan)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $gaji_karyawan->id_karyawan ?></td>
			<td><?php echo $gaji_karyawan->id_absen ?></td>
			<td><?php echo $gaji_karyawan->id_jabatan ?></td>
			<td><?php echo $gaji_karyawan->gaji_pokok ?></td>
			<td><?php echo $gaji_karyawan->tunjanggan_jabatan ?></td>
			<td><?php echo $gaji_karyawan->potongan ?></td>
			<td><?php echo $gaji_karyawan->gaji_bersih ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('gaji_karyawan/read/'.$gaji_karyawan->id_transaksi),'Read'); 
				echo ' | '; 
				echo anchor(site_url('gaji_karyawan/update/'.$gaji_karyawan->id_transaksi),'Update'); 
				echo ' | '; 
				echo anchor(site_url('gaji_karyawan/delete/'.$gaji_karyawan->id_transaksi),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('gaji_karyawan/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('gaji_karyawan/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>