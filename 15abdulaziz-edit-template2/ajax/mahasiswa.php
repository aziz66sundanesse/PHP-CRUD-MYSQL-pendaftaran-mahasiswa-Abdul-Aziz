<?php
require '../functions.php';
$keyword = $_GET["keyword"];


$query = "SELECT * FROM mahasiswa 
                    WHERE
                nama LIKE '%$keyword%' OR
                npm LIKE '%$keyword%' OR
                email LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%'
                ";
$mahasiswa = query($query);





?>

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">	
    <tr>
		<th>No.</th>
		<th class="aksi1">Aksi</th>
		<th>Gambar</th>
		<th>NPM</th>
		<th>Nama</th>
		<th>Email</th>
		<th>Jurusan</th>
	</tr>
		
		
	<?php $nomer =1 ?>
	<?php foreach( $mahasiswa as $row ) : ?>
	<tr>
	

		<td><?= $nomer; ?></td>	
		<td class="aksi2">
			<a href="ubah.php?id=<?= $row ["id"]; ?>" >ubah</a> |
			<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin');">Hapus</a>
		</td>
		<td><img src="img/<?= $row["gambar"]; ?>" width="50px"></td>
		<td><?= $row["npm"]; ?></td>
		<td><?= $row["nama"]; ?></td>
		<td><?= $row["email"]; ?></td>
		<td><?= $row["jurusan"]; ?></td>
		</tr>
	<?php $nomer++; ?>	
	<?php endforeach; ?>
	</table>