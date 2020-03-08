<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Karyawan List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('karyawan/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('karyawan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('karyawan'); ?>" class="btn btn-default">Reset</a>
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
		<th>Nama Karyawan</th>
		<th>Tempat Lahir</th>
		<th>Tgl Lahir</th>
		<th>Agama</th>
		<th>Alamat Karyawan</th>
		<th>No Hp</th>
		<th>Email</th>
		<th>Password</th>
		<th>Foto</th>
		<th>Id Jabatan</th>
		<th>Action</th>
            </tr><?php
            foreach ($karyawan_data as $karyawan)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $karyawan->nama_karyawan ?></td>
			<td><?php echo $karyawan->tempat_lahir ?></td>
			<td><?php echo $karyawan->tgl_lahir ?></td>
			<td><?php echo $karyawan->agama ?></td>
			<td><?php echo $karyawan->alamat_karyawan ?></td>
			<td><?php echo $karyawan->no_hp ?></td>
			<td><?php echo $karyawan->email ?></td>
			<td><?php echo $karyawan->password ?></td>
			<td><?php echo $karyawan->foto ?></td>
			<td><?php echo $karyawan->id_jabatan ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('karyawan/read/'.$karyawan->id_karyawan),'Read'); 
				echo ' | '; 
				echo anchor(site_url('karyawan/update/'.$karyawan->id_karyawan),'Update'); 
				echo ' | '; 
				echo anchor(site_url('karyawan/delete/'.$karyawan->id_karyawan),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('karyawan/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('karyawan/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>