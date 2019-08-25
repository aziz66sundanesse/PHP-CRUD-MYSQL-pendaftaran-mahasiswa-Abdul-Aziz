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

?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Pendaftaran Mahasiswa</title>

	<style>
	
	@media print{
		.logout, .tambah, .form-cari, .aksi1, .cetak, .halaman, .aksi2{
			display : none;
		}

	}
	</style>

	

</head>
<body>
	
	<a href="logout.php" class="logout">Logout</a> <br>
	<button class="cetak" onclick="cetak()">Print Halaman</button>
	<script>
		function cetak(){
			window.print();
		}
	</script>
	
    <h1>Daftar Mahasiswa</h1>
	
	<a href="tambah.php" class="tambah">Tambah data mahasiswa</a>
	<br>
	<form action="" method="post" class="form-cari">
		<input type="text" name="keyword" autofocus placeholder="Masukan Kata Kunci" id="keyword">
		<button type="submit" name="cari" id="tombol-cari" > Cari </button>
	</form>
	
	<!-- navigasi-->
	<?php if($halamanAktif >1): ?>
	<a class="halaman" href="?halaman=<?= $halamanAktif -1 ;?>">&lArr;</a>
	<?php endif;?>
	
	<?php for($i=1; $i <= $jumlahHalaman; $i++) : ?>
		<?php  if($i == $halamanAktif) : ?>
			<a class="halaman" href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
			<?php else : ?>
			<a class="halaman" href="?halaman=<?= $i; ?>" ><?= $i; ?></a>
		<?php endif; ?>
	<?php endfor;?>
	
	
	<?php if($halamanAktif <$jumlahHalaman): ?>
	<a class="halaman" href="?halaman=<?= $halamanAktif +1 ;?>">&rArr;</a>
	<?php endif;?>
	
	<br>
	<div id="container">
    <table border="1" cellpadding="10" cellspacing="0">
	
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
	</div>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/script.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/popper.min.js"></script>
</body>

</html>