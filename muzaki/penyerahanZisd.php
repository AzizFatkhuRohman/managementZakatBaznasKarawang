<?php 
include '../database.php';
session_start();
	if(!$_SESSION['kategoriUser']="Muzaki"){
		header("location:../index.php");
	}
  $query = mysqli_query($conn, "SELECT * FROM `user` WHERE username='$_SESSION[username]'");
  $res = mysqli_fetch_array($query);
  if(isset($_POST['submit'])){
    $kategori = $_POST['kategori'];
    $noTransaksi = $_POST['noTransaksi'];
    $tanggal = $_POST['tanggal'];
    $noNpwz = $_POST['noNpwz'];
    $namaMuzaki = $_POST['namaMuzaki'];
    $alamat = $_POST['alamat'];
    $jenisDana = $_POST['jenisDana'];
    $jumlahDana = $_POST['jumlahDana'];
    $noBuktiSetor = $_POST['noBuktiSetor'];
    $fileTransfer =$_FILES['fileTransfer']['name'];
    $tmpFile = $_FILES['fileTransfer']['tmp_name'];
    if(empty($kategori) || empty($noTransaksi) || empty($tanggal) || empty($noNpwz) || 
    empty($namaMuzaki) || empty($alamat) || empty($jenisDana) || empty($jumlahDana) || 
    empty($noBuktiSetor) || empty($fileTransfer)){
      echo'<script>alert("Kolom Tidak Boleh Kosong")</script>';
    }else{
      move_uploaded_file($tmpFile, '../assets/fileTransferZisd/'.$fileTransfer);
      $sql = mysqli_query($conn, "INSERT INTO penerimaanzisd (kategori,noTransaksi,tanggal,noNpwz,namaMuzaki,
      alamat,jenisDana,jumlahDana,noBuktiSetor,fileTransfer) VALUES ('$kategori',$noTransaksi,'$tanggal',
      '$noNpwz','$namaMuzaki','$alamat','$jenisDana','$jumlahDana','$noBuktiSetor','$fileTransfer')");
      echo'<script>alert("Data Berhasil Dikirim")</script>';
    }
  }
	?>
<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Baznas | Muzaki</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="dashboard.php" class="app-brand-link">
              <span class="app-brand-text demo menu-text fw-bolder ms-2">Baznas<br>Muzaki</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
              <a href="dashboard.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Pages</span></li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Input Penyerahan</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="penyerahanZisd.php" class="menu-link">
                    <div data-i18n="Without menu">Penyerahan Zakat, Infak, Sedekah, DSKL</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="penyerahanZakatFitrah.php" class="menu-link">
                    <div data-i18n="Without navbar">Penyerahan Zakat Fitrah</div>
                  </a>
                </li>
              </ul>
            </li>

            
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    
                    <li>
                      <a class="dropdown-item" href="profile.php">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">Profile</span>
                      </a>
                    </li>
                   
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="../logout.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->
 <!-- Content wrapper -->
 <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Input Penyerahan /</span> Penyerahan Zakat, Infak, Sedekah, DSKL</h4>

              <div class="row">
                <div>
                  <div class="card mb-4">
                    <h5 class="card-header">Input Data Zakat, Infak, Sedekah, DSKL</h5>
                    <div class="card-body">
                    <form method="post" enctype='multipart/form-data'>
                      
                    <input type="text" name='namaMuzaki' value='<?= $res['nama'];?>' hidden>
                    <input type="text" name='alamat' value='<?= $res['alamat'];?>' hidden>
                    
                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Kategori Penyerahan</label>
                    <select class="form-select" aria-label="Default select example" name='kategori'>
                    <option value="Zakat">Zakat</option>
                    <option value="Infak">Infak</option>
                    <option value="Sedekah">Sedekah</option>
                    <option value="DSKL">DSKL</option>
                    </select>
                    </div>
                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">No Transaksi</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="No Transaksi" name='noTransaksi'>
                    </div>
                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="exampleFormControlInput1" name='tanggal'>
                    </div>
                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">No NPWZ</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="no NPWZ" name='noNpwz'>
                    </div>
                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Jenis Dana</label>
                    <select class="form-select" aria-label="Default select example" name='jenisDana'>
                    <option value="Pribadi">Pribadi</option>
                    <option value="Lembaga">Lembaga</option>
                    </select>
                    </div>
                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Jumlah Dana<br>Hanya angka!</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="200000" name='jumlahDana'>
                    </div>
                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">No Bukti Setor</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="No Bukti Setor" name='noBuktiSetor'>
                    </div>
                    <div class="mb-3">
                    <label for="formFile" class="form-label">Unggah Bukti Transfer</label>
                    <input class="form-control" type="file" id="formFile" name='fileTransfer'>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class='btn btn-primary' name='submit' value='submit'>
                    </div>
                    </form>

                    </div>
                  </div>
                </div>
                    </div>
                </div>
              </div>
            <!-- / Content -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
