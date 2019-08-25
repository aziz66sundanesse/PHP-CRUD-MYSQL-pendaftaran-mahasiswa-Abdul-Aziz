<?php
session_start();

if (!isset($_SESSION["login"])){
	header("Location: login.php");
}

require 'functions.php';
//koneksi Ke DBMS
						//alamat	user   password		nama database
$conn = mysqli_connect("localhost", "root","","pendaftaran-mahasiswa");

//apakah tombol submit sudah di tekan
if( isset($_POST["submit"])){	
	
	//upload gambar
	
	
	
	//apakah data berhasil ditambahakan	
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
	
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tambah data mahasiswa</title>

<!-- Custom fonts for this template-->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

<!-- Custom styles for this template-->
<link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">

<div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Tambah Data mahasiswa</div>
      <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">          	  
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="npm" name="npm" class="form-control" autofocus="autofocus" >
                  <label for="npm">NPM</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="nama" name="nama" class="form-control"  >
                  <label for="nama">Nama</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
		  <div class="form-row">
            <div class="col-md-6">
              <div class="form-label-group">
              	<input type="email" id="email" name="email"class="form-control" placeholder="Email address" required="required" >
			    <label for="email">Alamat email</label>
			    </div>
              </div>           
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="jurusan" name="jurusan" class="form-control" placeholder="Password" required="required">
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
		  
			
		
		  
          <button type="submit" name="submit" class="btn btn-primary btn-block" >Tambah Data</button>
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

	