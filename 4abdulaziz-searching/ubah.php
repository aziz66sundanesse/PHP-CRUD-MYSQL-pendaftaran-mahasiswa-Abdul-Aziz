<?php
require 'functions.php';

//ambil data dari URL
$id = $_GET["id"];

//query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id=$id")[0];

//koneksi Ke DBMS
						//alamat	user   password		nama database
$conn = mysqli_connect("localhost", "root","","pendaftaran-mahasiswa");

//apakah tombol submit sudah di tekan
if( isset($_POST["submit"])){	
	////apakah data berhasil ditambahakan	
	if(ubah($_POST) > 0){
		echo "
			<script>
				alert('data berhasil di ubah');
				document.location.href = 'index.php';
			</script>
			";
	}else{
		echo "<script>
				alert('data gagal di ubah');
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
<title>ubah data mahasiswa</title>
</head>

<body>
	<h1>ubah data mahasiswa</h1>
	
	<form action="" method="POST">
		<input type="hidden" name="id" value="<?= $mhs["id"]; ?>"
	<ul>
		<li>
			<label for="npm">NPM :</label>
			<input type="text" name="npm" id="npm" required value="<?=$mhs ["npm"]; ?>">
		</li>
		<li>
			<label for="nama">Nama :</label>
			<input type="text" name="nama" id="nama" value="<?=$mhs ["nama"]; ?>">
		</li>
		<li>
			<label for="email">Email :</label>
			<input type="email" name="email" id="email"value="<?=$mhs ["email"]; ?>">
		</li>
		<li>
			<label for="jurusan">Jurusan :</label>
			<input type="text" name="jurusan" id="jurusan"value="<?=$mhs ["jurusan"]; ?>">
		</li>
		<li>
			<label for="gambar">Gambar :</label>
			<input type="text" name="gambar" id="gambar" value="<?=$mhs ["gambar"]; ?>">
		</li>
			<li>
			<button type="submit" name="submit">ubah Data</button>
			</li>
	</ul>
	
	</form>
</body>
</html>