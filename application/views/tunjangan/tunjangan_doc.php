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
        <h2>Tunjangan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Besar Tunjangan</th>
		<th>Keterangan</th>
		<th>Tgl Update</th>
		
            </tr><?php
            foreach ($tunjangan_data as $tunjangan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tunjangan->besar_tunjangan ?></td>
		      <td><?php echo $tunjangan->keterangan ?></td>
		      <td><?php echo $tunjangan->tgl_update ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>