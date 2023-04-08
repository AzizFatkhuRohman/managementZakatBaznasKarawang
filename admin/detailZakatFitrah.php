<?php
include '../database.php';
session_start();
	if(!$_SESSION['kategoriUser']="Admin"){
		header("location:../index.php");
	}
$idZakatFitrah = $_GET['idZakatFitrah'];
$query = mysqli_query($conn, "SELECT * FROM penerimaanZakatFitrah WHERE idZakatFitrah=$idZakatFitrah");

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

    <title>Baznas | Admin</title>

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
              <span class="app-brand-text demo menu-text fw-bolder ms-2">Baznas | Admin</span>
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

            <!-- Layouts -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div data-i18n="Layouts">Data Pengguna</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="dataMuzaki.php" class="menu-link">
                    <div data-i18n="Without menu">Data Muzaki</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="dataMustahik.php" class="menu-link">
                    <div data-i18n="Without navbar">Data Mustahik</div>
                  </a>
                </li>
                
              </ul>
            </li>

            <!-- Pages -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Pages</span></li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Penerimaan</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="penerimaanZisd.php" class="menu-link">
                    <div data-i18n="Without menu">Penerimaan Zakat, Infak, Sedekah, DSKL</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="penerimaanZakatFitrah.php" class="menu-link">
                    <div data-i18n="Without navbar">Penerimaan Zakat Fitrah</div>
                  </a>
                </li>
                
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Proposal Permohonan Bantuan</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="proposalIbnuSabil.php" class="menu-link">
                    <div data-i18n="Without menu">Permohonan Bantuan Ibnu Sabil/Terlantar</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="proposalMualaf.php" class="menu-link">
                    <div data-i18n="Without navbar">Permohonan Bantuan Mualaf/Terlantar</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="proposalKarawangSehat.php" class="menu-link">
                    <div data-i18n="Without navbar">Permohonan Bantuan Karawang Sehat</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="proposalKebencanaan.php" class="menu-link">
                    <div data-i18n="Without navbar">Permohonan Bantuan Kebencanaan</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="proposalRutilahu.php" class="menu-link">
                    <div data-i18n="Without navbar">Permohonan Bantuan Rutilahu</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Pendistribusian</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="distribusiZisd.php" class="menu-link">
                    <div data-i18n="Without menu">Laporan Distribusi Zakat, Infak, Sedekah, DSKL</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="distribusiZakatFitrah.php" class="menu-link">
                    <div data-i18n="Without navbar">Laporan Distribusi Zakat Fitrah</div>
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
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Penerimaan /</span> Penerimaan Zakat Fitrah / Detail</h4>
              <div class="card">
                <?php
                while ($res=mysqli_fetch_array($query)){
                ?>
                <div class="card-body">
                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tanggal</label>
                    <input class="form-control" type="text" value="<?= $res['tanggal'];?>" aria-label="Disabled input example" disabled readonly>
                    </div>
                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Muzaki</label>
                    <input class="form-control" type="text" value="<?= $res['namaMuzaki'];?>" aria-label="Disabled input example" disabled readonly>
                    </div>
                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                    <input class="form-control" type="text" value="<?= $res['alamat'];?>" aria-label="Disabled input example" disabled readonly>
                    </div>
                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Jumlah Jiwa</label>
                    <input class="form-control" type="text" value="<?= $res['jumlahJiwa'];?>" aria-label="Disabled input example" disabled readonly>
                    </div>
                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Beras</label>
                    <input class="form-control" type="text" value="<?= $res['beras'];?> (Liter)" aria-label="Disabled input example" disabled readonly>
                    </div>
                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Uang</label>
                    <input class="form-control" type="text" value="Rp.<?= $res['uang'];?>" aria-label="Disabled input example" disabled readonly>
                    </div>
                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Zakat Mal</label>
                    <input class="form-control" type="text" value="Rp.<?= $res['zakatMal'];?>" aria-label="Disabled input example" disabled readonly>
                    </div>
                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Fidyah</label>
                    <input class="form-control" type="text" value="Rp.<?= $res['fidyah'];?>" aria-label="Disabled input example" disabled readonly>
                    </div>
                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Infak</label>
                    <input class="form-control" type="text" value="Rp.<?= $res['infak'];?>" aria-label="Disabled input example" disabled readonly>
                    </div>
                </div>
                <?php
                }
                ?>
                </div>
            </div>
            </div>
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
