<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Jabatan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Jabatan</th>
		<th>Gaji Pokok</th>
		<th>Tgl Gjian</th>
		
            </tr><?php
            foreach ($jabatan_data as $jabatan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $jabatan->nama_jabatan ?></td>
		      <td><?php echo $jabatan->gaji_pokok ?></td>
		      <td><?php echo $jabatan->tgl_gjian ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>