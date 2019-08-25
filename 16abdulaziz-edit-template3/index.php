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

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pendaftaran Mahasiswa Universitas Indraprasta PGRI - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet"> -->

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">


</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="">Pendaftaran Mahasiswa Unindra</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Tentang saya</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">Keluar</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Halaman</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Login Screens:</h6>
          <a class="dropdown-item" href="login.php">Login</a>
          <a class="dropdown-item" href="registrasi.php">Tambah User</a>
          <a class="dropdown-item" href="forgot-password.html">Lupa Kata sandi</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tambah.php">
          <i class="fas fa-fw fa-plus-square"></i>
          <span>Tambah Mahasiswa</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="" onclick="cetak()">
          <i class="fas fa-fw fa-print"></i>
          <span>Cetak Halaman</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Icon Cards-->
        <!-- <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-plus"></i>
                </div>
                <div class="mr-5">Tamabah Mahasiswa!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="tambah.php">
                <span class="float-left">Tambah</span>
                <span class="float-right">
                  <i class="fas fa-plus"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-print"></i>
                </div>
                <div class="mr-5">Print Halaman</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#" onclick="cetak()">
                <script> function cetak(){window.print();}</script>
                <span class="float-left">Print</span>
                <span class="float-right">
                  <i class="fas fa-print"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5" >123 New Orders!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5">13 New Tickets!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div> -->

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
              <!-- tombol cari -->
              <form action="" method="post" class="hide-cari">
                  <input type="text" name="keyword" autofocus placeholder="Masukan Kata Kunci" id="keyword" class="form-control">
                  <!-- <button type="submit" name="cari" id="tombol-cari" > Cari </button> -->
                </form>
          </div>
          <div class="card-body">
            <div class="table-responsive">             
              
              <div id="container">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                      <th>No.</th>
                      <th class="hide-aksi">Aksi</th>
                      <th>Gambar</th>
                      <th>NPM</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Jurusan</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                      <th>No.</th>
                      <th class="hide-aksi">Aksi</th>
                      <th>Gambar</th>
                      <th>NPM</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Jurusan</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr>
                    <?php $nomer =1 ?>
                      <?php foreach( $mahasiswa as $row ) : ?>
                      <tr>
                        <td><?= $nomer; ?></td>	
                        <!-- " onclick="return confirm('Yakin');" -->

                        <td class="hide-aksi">
                          <a class="btn btn-success" href="ubah.php?id=<?= $row ["id"]; ?>" >Ubah</a>
                          <a class="btn btn-danger" href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin');">Hapus</a>
                        </td>
                        <td><img src="img/<?= $row["gambar"]; ?>" width="50px"></td>
                        <td><?= $row["npm"]; ?></td>
                        <td><?= $row["nama"]; ?></td>
                        <td><?= $row["email"]; ?></td>
                        <td><?= $row["jurusan"]; ?></td>
                        </tr>
                      <?php $nomer++; ?>	
                      <?php endforeach; ?>
                  </tr>                  
                </tbody>
              </table>
            </div>
          </div>
          <div>

          </div>
          <div class="card-footer ">
                        <!-- navigasi-->
                        <?php if($halamanAktif >1): ?>
                        <a class="halaman" href="?halaman=<?= $halamanAktif -1 ;?>"><button class="btn btn-primary">Sebelumny</button></a>
                        <?php endif;?>
                        
                        <?php for($i=1; $i <= $jumlahHalaman; $i++) : ?>
                          <?php  if($i == $halamanAktif) : ?>
                            <a class="halaman" href="?halaman=<?= $i; ?>" style="font-weight: bold; color: blue;"><?= $i; ?></a>
                            <?php else : ?>
                            <a class="halaman" href="?halaman=<?= $i; ?>" ><?= $i; ?></a>
                          <?php endif; ?>
                        <?php endfor;?>
                        
                        
                        <?php if($halamanAktif <$jumlahHalaman): ?>
                        <a class="halaman" href="?halaman=<?= $halamanAktif +1 ;?>">
                          <button class="btn btn-primary">Selanjutnya</button> 
                        </a>
                        <?php endif;?>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Abdul Aziz 201643501288</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ingin Keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Jika Anda keluar Sesi ini akan di akhiri.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Print halaman -->
  <script> function cetak(){window.print();}</script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>


  <!-- cari java script -->
  <script src="js/script.js"></script>

  <!-- plugin sweetalert -->
  <script src="vendor/sweetalert/sweetalert2.all.min.js"></script>

</body>

</html>
