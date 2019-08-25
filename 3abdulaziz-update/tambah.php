<?php
require 'functions.php';
//koneksi Ke DBMS
						//alamat	user   password		nama database
$conn = mysqli_connect("localhost", "root","","pendaftaran-mahasiswa");

//apakah tombol submit sudah di tekan
if( isset($_POST["submit"])){	
	////apakah data berhasil ditambahakan	
	if(tambah($_POST) > 0){
		echo "
			<script>
				alert('data berhasil di tambahka');
				document.location.href = 'index.php';
			</script>
			";
	}else{
		echo "<script>
				alert('data gagal di tambahka');
				document.location.href = 'index.php';
			</script>
			";
	}
//	//var_dump(mysqli_affected_rows($conn));
//	if(mysqli_affected_rows($conn)> 0){
//		echo "berhasil";
//		
//	}else{
//		echo "gagal";
//		echo "<br>";
//		echo mysqli_error($conn);
//	}
	
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tambah data mahasiswa</title>
</head>

<body>
	<h1>Tambah data mahasiswa</h1>
	
	<form action="" method="POST">
	<ul>
		<li>
			<label for="npm">NPM :</label>
			<input type="text" name="npm" id="npm" required>
		</li>
		<li>
			<label for="nama">Nama :</label>
			<input type="text" name="nama" id="nama">
		</li>
		<li>
			<label for="email">Email :</label>
			<input type="email" name="email" id="email">
		</li>
		<li>
			<label for="jurusan">Jurusan :</label>
			<input type="text" name="jurusan" id="jurusan">
		</li>
		<li>
			<label for="gambar">Gambar :</label>
			<input type="text" name="gambar" id="gambar">
		</li>
			<li>
			<button type="submit" name="submit">Tambah Data</button>
			</li>
	</ul>
	
	</form>
</body>
</html>