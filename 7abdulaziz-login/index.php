<?php

require 'functions.php';
$mahasiswa =query ("SELECT * FROM mahasiswa");

//tombol cari di tekan
if (isset($_POST["cari"])){
	$mahasiswa = cari($_POST["katakunci"]);
}



//ambil data dari mahasiswa/ atau query
//$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

// ambil  data (fatch) mahasiswa dari objec result
//mysqli_fetch_row() 	// mengembalikan array numerik
//mysqli_fetch_assoc() 	// mengembalikna array assosiatif
//mysqli_fetch_array() 	// mengembalikan keduanya
//mysqli_fetch_object()

//while($mhs = mysqli_fetch_assoc($result)){
//	var_dump(!$mhs);
//}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pendaftaran Mahasiswa</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
	
	<a href="tambah.php">Tambah data mahasiswa</a>
	<br>
	<form action="" method="post">
		<input type="search" name="katakunci" autofocus placeholder="Masukan Kata Kunci" >
		<button type="submit" name="cari" > Cari </button>
	</form><br>

    <table border="1" cellpadding="10" cellspacing="0">
	
    <tr>
		<th>No.</th>
		<th>Aksi</th>
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
		<td>
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
	


        
</body>

</html>