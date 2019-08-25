<?php


// Konek Ke database
$conn = mysqli_connect("localhost","root","","pendaftaran-mahasiswa");

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows =[];
	while($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;
}

function tambah ($data){
	global $conn;
	//ambil data dari tiap form
	
	$nama = htmlspecialchars( $data["nama"]);
	$npm = htmlspecialchars( $data["npm"]);
	$email = htmlspecialchars( $data["email"]);
	$jurusan = htmlspecialchars( $data["jurusan"]);
	$gambar = htmlspecialchars($data["gambar"]);
	
	//query insert data
	$query ="INSERT INTO mahasiswa 
				VALUE 
			('','$nama','$npm', '$email','$jurusan','$gambar')
			";
	mysqli_query($conn, $query);
	
	return mysqli_affected_rows($conn);
	
	

}
	

function ubah ($data){
	global $conn;
	//ambil data dari tiap form
	$id = $data["id"];
	$nama = htmlspecialchars( $data["nama"]);
	$npm = htmlspecialchars( $data["npm"]);
	$email = htmlspecialchars( $data["email"]);
	$jurusan = htmlspecialchars( $data["jurusan"]);
	$gambar = htmlspecialchars($data["gambar"]);
	
	//query insert data
	$query ="UPDATE mahasiswa SET
				nama ='$nama',
				npm ='$npm',
				email = '$email',
				jurusan ='$jurusan',
				gambar = '$gambar'
			WHERE id = $id
			";
	mysqli_query($conn, $query);
	
	return mysqli_affected_rows($conn);
}


function hapus($id){
	global $conn;
	mysqli_query($conn,"DELETE FROM mahasiswa WHERE id= $id");
	
	return mysqli_affected_rows($conn);
}

function cari ($katakunci){
	$query = "SELECT * FROM mahasiswa 
				WHERE
				nama LIKE '%$katakunci%' OR
				npm LIKE '%$katakunci%' OR
				email LIKE '%$katakunci%' OR
				jurusan LIKE '%$katakunci%'
			";
	return query ($query);
}


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>