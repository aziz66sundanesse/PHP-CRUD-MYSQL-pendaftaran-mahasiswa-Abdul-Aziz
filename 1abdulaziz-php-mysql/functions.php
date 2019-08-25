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