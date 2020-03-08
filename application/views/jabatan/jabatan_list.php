<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Jabatan List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('jabatan/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('jabatan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('jabatan'); ?>" class="btn btn-default">Reset</a>
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
		<th>Nama Jabatan</th>
		<th>Gaji Pokok</th>
		<th>Tgl Gjian</th>
		<th>Action</th>
            </tr><?php
            foreach ($jabatan_data as $jabatan)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $jabatan->nama_jabatan ?></td>
			<td><?php echo $jabatan->gaji_pokok ?></td>
			<td><?php echo $jabatan->tgl_gjian ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('jabatan/read/'.$jabatan->id_jabatan),'Read'); 
				echo ' | '; 
				echo anchor(site_url('jabatan/update/'.$jabatan->id_jabatan),'Update'); 
				echo ' | '; 
				echo anchor(site_url('jabatan/delete/'.$jabatan->id_jabatan),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('jabatan/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('jabatan/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>