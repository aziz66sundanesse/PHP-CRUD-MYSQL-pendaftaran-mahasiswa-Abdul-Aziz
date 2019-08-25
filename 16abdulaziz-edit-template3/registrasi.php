<?php

require 'functions.php';

if(isset($_POST["register"])){
	
	
	if(registrasi($_POST)>0){
		echo "<script>
				alert('user baru barhasil di tambahkan');
			  </script>";
	}else{
		echo mysqli_error($conn);
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

  <title>Registrasi Akun</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Daftar Akun</div>
      <div class="card-body">
        <form action="" method="post">
          
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="username" name="username" class="form-control" placeholder="user name" required="required">
              <label for="username">Nama Pengguna</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="password" name="password" class="form-control" placeholder="Kata Sandi" required="required">
                  <label for="password">Kata Sandi</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="password2" name="password2" class="form-control" placeholder="Konfirmasi Kata Sandi" required="required">
                  <label for="password2">Konfirmasi Kata Sandi</label>
                </div>
              </div>
            </div>
          </div>
          <button type="submit" id="submit" name="register" class="btn btn-primary btn-block" >Daftar</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.php">Sudah punya Akun</a>
          <a class="d-block small" href="forgot-password.html">Lupa Kata Sandi?</a>
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
