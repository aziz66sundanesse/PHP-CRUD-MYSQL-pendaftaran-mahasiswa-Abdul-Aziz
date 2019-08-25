<?php
session_start();

if (!isset($_SESSION["login"])){
	header("Location: login.php");
}

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

	
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Ubah Data</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Ubah Data mahasiswa</div>
      <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
          	  <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
		      <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="npm" name="npm" class="form-control" autofocus="autofocus" value="<?=$mhs ["npm"]; ?>">
                  <label for="npm">NPM</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="nama" name="nama" class="form-control"  value="<?=$mhs ["nama"]; ?>">
                  <label for="nama">Nama</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
		  <div class="form-row">
            <div class="col-md-6">
              <div class="form-label-group">
              	<input type="email" id="email" name="email"class="form-control" placeholder="Email address" required="required" value="<?=$mhs ["email"]; ?>">
			    <label for="email">Alamat email</label>
			    </div>
              </div>           
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="jurusan" name="jurusan" class="form-control" placeholder="Password" required="required"value="<?=$mhs ["jurusan"]; ?>">
                  <label for="jurusan">Jurusan</label>
                </div>
			  </div>
			</div>
		  </div> 

		  <div class="input-group mb-3">
				<div class="input-group-prepend">
				  <span class="input-group-text">Unggah</span>
				</div>
				<div class="custom-file">
				  <input type="file" name="gambar" id="gambar" class="custom-file-input" >
				  <label class="custom-file-label" for="gambar">Pilih Gambar</label>
				</div>
			  </div>
		  

		  <div class="text-center">
				<img src="img/<?= $mhs ['gambar']; ?>" width="400px" class="rounded" alt="...">
			  </div><br>
		
		  
          <button type="submit" name="submit" class="btn btn-primary btn-block" >Ubah Data</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="index2.php">Kembali Ke Dassboard</a>
          <a class="d-block small" href="logout.php">Logout</a>
		</div>
	  </div>
	</div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
		  <!-- <label for="gambar">Gambar :</label><br>
		  <img src="img/<?= $mhs ['gambar']; ?>" width="50px"><br>
		  <input type="file" name="gambar" id="gambar">
		   -->