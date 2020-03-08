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
        <h2>Gaji_karyawan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Karyawan</th>
		<th>Id Absen</th>
		<th>Id Jabatan</th>
		<th>Gaji Pokok</th>
		<th>Tunjanggan Jabatan</th>
		<th>Potongan</th>
		<th>Gaji Bersih</th>
		
            </tr><?php
            foreach ($gaji_karyawan_data as $gaji_karyawan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $gaji_karyawan->id_karyawan ?></td>
		      <td><?php echo $gaji_karyawan->id_absen ?></td>
		      <td><?php echo $gaji_karyawan->id_jabatan ?></td>
		      <td><?php echo $gaji_karyawan->gaji_pokok ?></td>
		      <td><?php echo $gaji_karyawan->tunjanggan_jabatan ?></td>
		      <td><?php echo $gaji_karyawan->potongan ?></td>
		      <td><?php echo $gaji_karyawan->gaji_bersih ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>