<?php
session_start();

if (!isset($_SESSION["login"])){
	header("Location: login.php");
}
require 'functions.php';

//penghalamanan
//konfigurasi
$jumlahDataPerHalaman = 5;
$jumlahData =count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman =ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"]))? $_GET["halaman"] :1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
//


$mahasiswa =query ("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");

//tombol cari di tekan
if (isset($_POST["cari"])){
	$mahasiswa = cari($_POST["keyword"]);
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
	
	<a href="logout.php">Logout</a>
	
    <h1>Daftar Mahasiswa</h1>
	
	<a href="tambah.php">Tambah data mahasiswa</a>
	<br>
	<form action="" method="post">
		<input type="text" name="keyword" autofocus placeholder="Masukan Kata Kunci" id="keyword">
		<button type="submit" name="cari" id="tombol-cari" > Cari </button>
	</form>
	
	<!-- navigasi-->
	<?php if($halamanAktif >1): ?>
	<a href="?halaman=<?= $halamanAktif -1 ;?>">&lArr;</a>
	<?php endif;?>
	
	<?php for($i=1; $i <= $jumlahHalaman; $i++) : ?>
		<?php  if($i == $halamanAktif) : ?>
			<a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
			<?php else : ?>
			<a href="?halaman=<?= $i; ?>" ><?= $i; ?></a>
		<?php endif; ?>
	<?php endfor;?>
	
	
	<?php if($halamanAktif <$jumlahHalaman): ?>
	<a href="?halaman=<?= $halamanAktif +1 ;?>">&rArr;;</a>
	<?php endif;?>
	
	<br>
	<div id="container">
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
	</div>

<script src="js/script.js"></script>

</body>

</html>